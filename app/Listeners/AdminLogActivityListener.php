<?php

namespace App\Listeners;

use App\Services\Activity;

class AdminLogActivityListener
{
    private $activity;
    public function __construct()
    {
        $this->activity = new Activity();
    }

    public function handle($event)
    {
        $this->activity->insertLogs($event->logs);
    }
}
