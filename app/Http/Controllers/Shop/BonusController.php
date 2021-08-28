<?php


namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Clients\ClientBonus;

class BonusController extends Controller
{
    public function add_bonus_user($client, int $count)
    {
        $get_current_bonus = ClientBonus::where('client_id', '=', $client)->first();
        if ($get_current_bonus) {
            $get_current_bonus->count += $count;
            $get_current_bonus->save();
        }
    }
}
