<?php

namespace Zymawy\Ironside\Http\Controllers\Dashboard\Reports;

use App\Http\Requests;
use Zymawy\Ironside\Models\FAQ;
use Zymawy\Ironside\Models\FeedbackPurchase;
use Illuminate\Http\Request;
use Zymawy\Ironside\Models\FeedbackArtwork;
use Zymawy\Ironside\Models\FeedbackGigapan;
use Zymawy\Ironside\Models\FeedbackPackage;
use Zymawy\Ironside\Models\FeedbackContactUs;
use Zymawy\Ironside\Models\FeedbackWeddingPackage;
use Zymawy\Ironside\Http\Controllers\Dashboard\IronsideDashboardController;

class SummaryController extends IronsideDashboardController
{
    public function index()
    {
        $items = $this->getData();

        return $this->view('titan::reports.summary', compact('items'));
    }

    private function getData()
    {
        $result = [];

        $result[] = ['', ''];
        $result[] = ['<strong>Feedback Forms</strong>', ''];
        $result[] = ['Contact Us', FeedbackContactUs::count()];

        $result[] = ['', ''];
        $result[] = ['<strong>Item 2</strong>', ''];
        $result[] = ['Total xx', '0'];

        return $result;
    }
}