<?php

namespace App\Services;

use App\Events\AdminLogActivityEvent;

class Activity
{
    private $logActivity;

    public function __construct()
    {
        $this->logActivity = Admin::injectModel('LogActivity');
    }

    public function insertLogs($logs): void
    {
        $this->logActivity->create($logs);
    }

    public static function eventLogs($logs): void
    {
        if (config('admin.logs')) {
            event(new AdminLogActivityEvent($logs));
        }
    }
}
