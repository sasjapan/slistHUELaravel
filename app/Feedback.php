<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    protected $fillable = [
        'description'
    ];

    public function slist() : BelongsTo
    {
        return $this ->belongsTo(Slist:: class );
    }
    public function user() : BelongsTo
    {
        return $this ->belongsTo(User:: class );
    }
}

