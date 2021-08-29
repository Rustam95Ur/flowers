<?php

namespace App\Providers;

use App\Http\Controllers\Shop\BonusController;

class ActivateRegisterBonus
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
     * @param ClientRegistered $event
     * @return void
     */
    public function handle(ClientRegistered $event)
    {
        $client_id = $event->client_id;
        $bonus_activate = new BonusController();
        $bonus_activate->register_bonus($client_id);
    }
}
