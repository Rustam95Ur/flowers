<?php


namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Size extends Model
{
    use Translatable;

    protected $translatable = ['title'];

}
