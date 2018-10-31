<?php

namespace Zymawy\Ironside\Http\Controllers\Website;

use App\Http\Requests;
use Zymawy\Ironside\Models\News;

class HomeController extends WebsiteController
{
    /**
     * Show the home page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = News::active()->orderBy('created_at', 'DESC')->get()->take(6);

        return $this->view('ironside::home')->with('news', $items)->with('hidePageFooter', true);
    }
}
