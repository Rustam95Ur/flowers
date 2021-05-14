<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function parentId(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(self::class);
    }
}
