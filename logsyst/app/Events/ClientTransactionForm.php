<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class ClientTransactionForm extends Event
{
    use SerializesModels;

    public $event;

    public function __construct($event)
    {
        $this->event = $event;
    }
}
