<?php


namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class City extends Model
{
    use Translatable;

    protected $translatable = ['title'];
}
