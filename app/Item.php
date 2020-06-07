<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $fillable = [
        'name' , 'amount', 'maxPrice'
    ];

    public function slist(): BelongsTo
    {
        return $this->belongsTo(Slist::class );
    }
}
