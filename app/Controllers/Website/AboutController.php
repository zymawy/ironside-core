<?php

namespace Zymawy\Ironside\Http\Controllers\Website;

use Illuminate\Http\Request;

use App\Http\Requests;

class AboutController extends WebsiteController
{
	public function index()
	{
        return $this->view('titan::about');
	}
}