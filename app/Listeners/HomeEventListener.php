<?php

namespace App\Listeners;

use App\Events\HomeEvent;

class HomeEventListener {

    public function __construct() {
        //
    }

    public function handle(HomeEvent $event) {
        info($event->message);
    }
}
