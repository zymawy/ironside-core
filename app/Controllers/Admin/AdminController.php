<?php

namespace Bpocallaghan\Titan\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Validation\ValidationException;
use Bpocallaghan\Titan\Http\Controllers\Admin\TitanAdminController;

class AdminController extends TitanAdminController
{
    /**
     * Generate a filename and try to move the file
     * @param $attributes
     * @return string
     * @throws ValidationException
     */
    protected function moveDocument(&$attributes)
    {
        // get and move file
        $file = $attributes['file'];
        $filename = token() . '.' . $file->extension();
        $file->move(upload_path('documents'), $filename);
        unset($attributes['file']); // remove from attributes

        if (!\File::exists(upload_path('documents') . $filename)) {
            $validator = \Validator::make([], ['file' => 'required'],
                ['file.required' => 'Something went wrong, we could not upload the file. Please try again.']);

            throw new ValidationException($validator);
        }

        return $filename;
    }
}