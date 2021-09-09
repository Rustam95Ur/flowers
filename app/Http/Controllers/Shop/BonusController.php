<?php


namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Clients\ClientBonus;
use App\Models\Clients\ClientBonusTransaction;
use TCG\Voyager\Facades\Voyager;

class BonusController extends Controller
{
    /**
     * @param int $client_id
     * @param $payment_info
     */
    public function add_payment_bonus(int $client_id, $payment_info)
    {
        $get_current_bonus = ClientBonus::where('client_id', '=', $client_id)->first();
        $cashback_percent = Voyager::setting('site.cashback_percent');
        $get_transaction = ClientBonusTransaction::where('payment_id', '=', $payment_info->id)
            ->where('type', '=', ClientBonusTransaction::ADD_TYPE)->first();
        if ($cashback_percent and !$get_transaction) {
            $cashback_value = ((int)$payment_info->original_price) / 100 * (int)$cashback_percent;
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
                'payment_total' => $payment_info->total,
            ];
            $save_transaction = new ClientBonusTransaction();
            $save_transaction->bonus_id = $get_current_bonus->id;
            $save_transaction->payment_id = $payment_info->id;
            $save_transaction->type = ClientBonusTransaction::ADD_TYPE;
            $save_transaction->request = json_encode($transaction_request);
            $save_transaction->count = (int)$cashback_value;
            $save_transaction->is_success = true;
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
            $save_transaction->is_success = true;
            $save_transaction->save();
        }
    }

    /**
     * @param int $client_id
     * @param int $payment_id
     */
    public function temporary_use_bonus(int $client_id, int $payment_id)
    {
        $check_bonus = ClientBonus::where('client_id', $client_id)->first();
        if ($check_bonus) {
            $save_transaction = new ClientBonusTransaction();
            $save_transaction->bonus_id = $check_bonus->id;
            $save_transaction->type = ClientBonusTransaction::USED_TYPE;
            $save_transaction->count = $check_bonus->count;
            $save_transaction->payment_id = $payment_id;
            $save_transaction->is_success = null;
            $save_transaction->save();
            $check_bonus->count = 0;
            $check_bonus->save();
        }
    }

    /**
     * @param int $payment_id
     */
    public function used_payment_bonus(int $payment_id)
    {
        $get_transaction = ClientBonusTransaction::where('payment_id', '=', $payment_id)
            ->where('type', '=', ClientBonusTransaction::USED_TYPE)
            ->where('is_success', '=', null)->first();
        if ($get_transaction) {
            $get_client_bonus = ClientBonus::where('id', $get_transaction->bonus_id)->first();
            $get_client_bonus->count = 0;
            $get_client_bonus->save();
            $get_transaction->is_success = true;
            $get_transaction->save();
        }
    }

    /**
     * @param int $payment_id
     */
    public function deactivate_used_bonus(int $payment_id)
    {
        $get_transaction = ClientBonusTransaction::where('payment_id', '=', $payment_id)
            ->where('type', '=', ClientBonusTransaction::USED_TYPE)
            ->where('is_success', '=', null)->first();
        if ($get_transaction) {
            $get_client_bonus = ClientBonus::where('id', $get_transaction->bonus_id)->first();
            $get_client_bonus->count += $get_transaction->count;
            $get_client_bonus->save();
            $get_transaction->is_success = false;
            $get_transaction->save();
        }
    }
}
