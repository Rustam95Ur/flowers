<?php


namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Currency extends Model
{
    use Translatable;

    protected $translatable = ['title'];

    /**
     * @param $currency_code
     * @return mixed
     */
    public static function get_currency_value($currency_code)
    {
        $currency = Currency::where('code', $currency_code)->first();
        return $currency->value;
    }

    /**
     * @param $currency_code
     * @return mixed
     */
    public static function get_currency_title($currency_code)
    {
        $currency = Currency::where('code', $currency_code)->first();
        return $currency->title;
    }
}
