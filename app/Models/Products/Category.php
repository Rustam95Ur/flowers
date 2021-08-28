<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use TCG\Voyager\Traits\Translatable;

class Category extends Model
{
    use Translatable;

    protected $translatable = ['name'];

    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function products(): belongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }

    public function parentId(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }

}
