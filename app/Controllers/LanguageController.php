<?php

namespace Zymawy\Ironside\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class LanguageController extends Controller
{
    /**
     * @desc    To change current language
     * @request Ajax
     * @param Request $request
     */
    public function changeLanguage(Request $request){
    	if ($request->ajax()) {
    		$request->session()->put('locale', $request->getLocale());
    		$request->session()->flash('alert-success', ('app.Locale_Change_Success'));
    	}
    }
}
