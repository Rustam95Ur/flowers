<?php


namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use TCG\Voyager\Traits\Translatable;

class Type extends Model
{
    use Translatable;

    protected $translatable = ['title'];

    public function parentId(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }
}
