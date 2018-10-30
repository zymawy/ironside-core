<?php

namespace Zymawy\Ironside\Http\Controllers\Dashboard;

use App\Http\Requests;

class AnalyticsController extends AdminController
{
    public function summary()
    {
        return $this->view('ironside::analytics.summary');
    }

    public function devices()
    {
        return $this->view('ironside::analytics.devices');
    }

    public function visitsReferrals()
    {
        return $this->view('ironside::analytics.visits_referrals');
    }

    public function interests()
    {
        return $this->view('ironside::analytics.interests');
    }

    public function demographics()
    {
        return $this->view('ironside::analytics.demographics');
    }
}