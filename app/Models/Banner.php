<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Banner extends Model
{
    use Translatable;

    protected $translatable = ['title', 'body'];
}
