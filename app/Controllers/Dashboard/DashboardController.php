<?php

namespace Zymawy\Ironside\Http\Controllers\Dashboard;

use App\Http\Requests;
use Illuminate\Http\Request;

class DashboardController extends AdminController
{
	public function index()
	{
	    return $this->view('ironside::dashboard');
	}
}