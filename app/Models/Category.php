<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Category extends Model
{
    use Translatable;

    protected $translatable = ['slug', 'name'];

    protected $table = 'categories';

    protected $fillable = ['slug', 'name'];

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class, 'id');
    }

    public function parentId(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(self::class);
    }

    public function getTotalProductsAttribute(){
        return $this->hasMany(Product::class, 'id')->where('id',$this->id)->count();
    }
}
