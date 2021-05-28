<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\QueryFilter;
use App\Models\Category;
use TCG\Voyager\Facades\Voyager;

class Product extends Model
{
    protected $table = 'products';

    public function scopeFilter(Builder $builder, QueryFilter $filters): Builder
    {
        return $filters->apply($builder);
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function colors(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'product_color');
    }

    public function sizes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_size');
    }

    public function types(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'product_type');
    }

    public function intendeds(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Intended::class, 'product_intended');
    }

    public function extra_products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(self::class, 'product_extra', 'product_id', 'extra_product_id');
    }

    public function scopeExtra($query)
    {
        return $query->where('is_extra', 1);
    }

    public function city_price(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(ProductCityPrice::class, 'product_id')->where('city_id', '=', session('city', 0));
    }

    public function getUpdatedPriceAttribute()
    {
        $product_price =  $this->getAttributes()['price'];
        if ($this->city_price()->value('price')) {

            $product_price = $this->city_price()->value('price');
        }
        $number_percent = 0;
        if (Voyager::setting('site.price_update')) {
            $percent = Voyager::setting('site.price_update');
            $number_percent = $product_price / 100 * $percent;
        }
        return $product_price + $number_percent;
    }


}
