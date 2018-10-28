<?php

namespace Zymawy\Ironside\Http\Controllers\Dashboard\History;

use App\Http\Requests;
use Zymawy\Ironside\Models\LogActivity;
use Zymawy\Ironside\Models\LogDashboardActivity;
use Zymawy\Ironside\Http\Controllers\Dashboard\IronsideDashboardController;

class HistoryController extends IronsideDashboardController
{
    public function website()
    {
        $actions = LogActivity::getLatest();

        return $this->view('titan::history.website', compact('actions'));
    }

    public function admin()
    {
        $activities = LogAdminActivity::getLatest();

        return $this->view('titan::history.admin', compact('activities'));
    }
}