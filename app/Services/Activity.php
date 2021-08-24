<?php

namespace App\Services;

use App\Services\Admin;
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
}
