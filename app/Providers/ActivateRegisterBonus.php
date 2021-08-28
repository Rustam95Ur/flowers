<?php

namespace App\Providers;

use App\Models\Clients\ClientBonus;
use App\Providers\ClientRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use TCG\Voyager\Facades\Voyager;

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
     * @param  ClientRegistered  $event
     * @return void
     */
    public function handle(ClientRegistered $event)
    {
        $client_id = $event->client_id;
        $check_bonus = ClientBonus::where('client_id', $client_id)->first();
        if (!$check_bonus and Voyager::setting('site.register_bonus')) {
            $save_bonus = new ClientBonus();
            $save_bonus->client_id = $client_id;
            $save_bonus->count = Voyager::setting('site.register_bonus');
            $save_bonus->save();
        }
    }
}
