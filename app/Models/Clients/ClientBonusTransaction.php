<?php


namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class ClientBonusTransaction extends Model
{
    const REGISTER_TYPE = 1;
    const PAYMENT_TYPE = 2;
}
