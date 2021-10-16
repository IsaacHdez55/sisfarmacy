<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateLastLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {

        date_default_timezone_set('America/Bogota');

        $date = date('Y-m-d');
        $time = date('H:i:s');

        $dateCurrent = $date.' '.$time;

        $event->user->last_login = $dateCurrent;
        $event->user->save();
    }
}
