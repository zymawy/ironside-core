<?php

namespace Zymawy\Ironside\Http\Controllers\Website;

use App\Http\Requests;
use Illuminate\Http\Request;
use Zymawy\Ironside\Models\FeedbackContactUs;
use Zymawy\Ironside\Events\ContactUsFeedback;
use Zymawy\Ironside\Http\Controllers\Traits\GoogleCaptcha;

class ContactUsController extends WebsiteController
{
    use GoogleCaptcha;

    public function index()
    {
        return $this->view('ironside::contact');
    }

    public function feedback(Request $request)
    {
        $attributes = request()->validate(FeedbackContactUs::$rules);

        // validate google captcha
        //$response = $this->validateCaptcha($request);
        //if ($response->isSuccess()) {

            $row = FeedbackContactUs::create([
                'firstname'    => $attributes['firstname'],
                'lastname'     => $attributes['lastname'],
                'phone'        => $attributes['phone'],
                'email'        => $attributes['email'],
                'content'      => $attributes['content'],
                'client_ip'    => $request->getClientIp(),
                'client_agent' => $request->header('User-Agent'),
            ]);

            event(new ContactUsFeedback($row));

            return json_response('Thank you for contacting us.');
        //}

        //return $this->captchaResponse($response);
    }
}