<?php


namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Clients\ClientBonus;
use App\Models\Clients\ClientBonusTransaction;
use TCG\Voyager\Facades\Voyager;

class BonusController extends Controller
{
    /**
     * @param $client_id
     * @param $payment_info
     */
    public function add_payment_bonus($client_id, $payment_info)
    {
        $get_current_bonus = ClientBonus::where('client_id', '=', $client_id)->first();
        $cashback_percent = Voyager::setting('site.cashback_percent');
        if ($cashback_percent) {
            $cashback_value = (int)$payment_info->total / 100 * (int)$cashback_percent;
            if ($get_current_bonus) {
                $get_current_bonus->count += $cashback_value;
                $get_current_bonus->save();
            } else {
                $get_current_bonus = new ClientBonus();
                $get_current_bonus->client_id = $client_id;
                $get_current_bonus->count = (int)$cashback_value;
                $get_current_bonus->save();
            }
            $transaction_request = [
                'payment_id' => $payment_info->id,
                'payment_total' => $payment_info->total,
            ];
            $save_transaction = new ClientBonusTransaction();
            $save_transaction->bonus_id = $get_current_bonus->id;
            $save_transaction->type = ClientBonusTransaction::PAYMENT_TYPE;
            $save_transaction->request = json_encode($transaction_request);
            $save_transaction->count = (int)$cashback_value;
            $save_transaction->save();
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
