<?php


namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class ClientBonusTransaction extends Model
{
    const REGISTER_TYPE = 1;
    const ADD_TYPE = 2;
    const USED_TYPE = 3;
}
