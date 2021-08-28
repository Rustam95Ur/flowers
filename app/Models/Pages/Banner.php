<?php


namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Banner extends Model
{
    use Translatable;

    protected $translatable = ['title', 'body'];
}
