<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AdminLogActivityEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $logs;

    public function __construct($logs)
    {
        $this->logs = $logs;
    }
}
