<?php

namespace Bpocallaghan\Titan\Http\Controllers\Auth;

use App\Http\Requests;
use Bpocallaghan\Titan\Models\LogLogin;
use Illuminate\Http\Request;
use Bpocallaghan\Titan\Http\Controllers\Website\WebsiteController;

class AuthController extends WebsiteController
{
    protected $baseViewPath = 'auth.';

    /**
     * @param \Illuminate\Http\Request $request
     * @param string                   $status
     */
    protected function logLogin(Request $request, $status = '')
    {
        LogLogin::create([
            'username'     => $request->get('email'),
            'status'       => $status,
            'role'         => 'website_admin',
            'client_ip'    => $request->getClientIp(),
            'client_agent' => $_SERVER['HTTP_USER_AGENT'],
        ]);
    }
}