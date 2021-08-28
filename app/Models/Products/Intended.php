<?php


namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Intended extends Model
{
    use Translatable;

    protected $translatable = ['title'];
}
