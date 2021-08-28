<?php


namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const STATUS_WAIT = 0;
    const STATUS_PAID = 1;
    const STATUS_CANCELED = 2;
}
