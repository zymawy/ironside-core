<?php

namespace Zymawy\Ironside\Http\Controllers\Api;

use App\Http\Requests;
use Illuminate\Http\Request;
use Zymawy\Ironside\Models\NewsletterSubscriber;

class NewsletterController extends ApiController
{
    public function subscribe()
    {
        $attributes = request()->validate(NewsletterSubscriber::$rules);

        $user = NewsletterSubscriber::create($attributes);

        log_activity("Subscribed to Newsletter", "{$user->fullname} subscribed to the Newsletter.", $user);

        return json_response('You\'ve successfully subscribed to our Newsletter');
    }
}