<?php


namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Clients\ClientBonus;
use App\Models\Clients\ClientBonusTransaction;
use TCG\Voyager\Facades\Voyager;

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

    /**
     * @param int $client_id
     */
    public function register_bonus(int $client_id)
    {
        $check_bonus = ClientBonus::where('client_id', $client_id)->first();
        $register_bonus = Voyager::setting('site.register_bonus');
        if (!$check_bonus and $register_bonus) {
            $save_bonus = new ClientBonus();
            $save_bonus->client_id = $client_id;
            $save_bonus->count = $register_bonus;
            $save_bonus->save();
            $save_transaction = new ClientBonusTransaction();
            $save_transaction->bonus_id = $save_bonus->id;
            $save_transaction->type = ClientBonusTransaction::REGISTER_TYPE;
            $save_transaction->count = $register_bonus;
            $save_transaction->save();
        }
    }
}
