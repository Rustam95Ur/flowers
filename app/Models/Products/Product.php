<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{
    protected $table = 'products';

    use Translatable;

    protected $translatable = ['title', 'description', 'seo_title'];
    /**
     * @param Builder $builder
     * @param QueryFilter $filters
     * @return Builder
     */
    public function scopeFilter(Builder $builder, QueryFilter $filters): Builder
    {
        return $filters->apply($builder);
    }

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    /**
     * @return BelongsToMany
     */
    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'product_color');
    }

    /**
     * @return BelongsToMany
     */
    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_size');
    }

    /**
     * @return BelongsToMany
     */
    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'product_type');
    }

    /**
     * @return BelongsToMany
     */
    public function intendeds(): BelongsToMany
    {
        return $this->belongsToMany(Intended::class, 'product_intended');
    }

    /**
     * @return BelongsToMany
     */
    public function extra_products(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'product_extra', 'product_id', 'extra_product_id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeExtra($query)
    {
        return $query->where('is_extra', 1);
    }

    /**
     * @return hasOne
     */
    public function city_price(): hasOne
    {
        return $this->hasOne(ProductCityPrice::class, 'product_id')->where('city_id', '=', session('city', 0));
    }

    /**
     * @return float|int|mixed
     */
    public function getUpdatedPriceAttribute()
    {
        $product_price = $this->getAttributes()['price'];
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

    public static function size_price($product_id, $size_id, $product_price)
    {
        $product_size_price = ProductSizePrice::where('product_id', $product_id)->where('size_id', $size_id)->first();
        if ($product_size_price) {
            $number_percent = 0;
            if (Voyager::setting('site.price_update')) {
                $percent = Voyager::setting('site.price_update');
                $number_percent = $product_size_price->price / 100 * $percent;
            }
            $product_price = $product_size_price->price + $number_percent;
        }
        return $product_price;
    }
}
