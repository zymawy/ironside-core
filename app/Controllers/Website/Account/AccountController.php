<?php

namespace Zymawy\Ironside\Http\Controllers\Website\Account;

use App\Http\Requests;
use Illuminate\Http\Request;
use Bpocallaghan\FAQ\Models\FAQ;
use Zymawy\Ironside\Http\Controllers\Website\WebsiteController;

class AccountController extends WebsiteController
{
	public function index()
	{
	    //$faq = FAQ::whereHas('category', function($query) {
	    //    return $query->where('name', 'Account');
        //})->orderBy('list_order')->get();
        // , compact('faq')

		return $this->view('titan::account.account');
	}
}