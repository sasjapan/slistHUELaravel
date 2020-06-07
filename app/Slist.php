<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Slist extends Model
{
    //
    protected  $fillable = [
        'list_name', 'done', 'duedate', 'creator_id'
    ];

//gehört user / hilfsbedürfitgen
    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
    //wird bearbeitet von Helfer? / gehört helfer
    // ToDo

    //Funktion für Items in der liste
    public function items() : HasMany
    {
        return $this ->hasMany(Item::class );
    }

    //Funktion für Items in der liste
    public function feedback() : HasMany
    {
        return $this ->hasMany(Feedback::class );
    }
    /*
    //Funktion für Items in der liste
    public function users() : HasMany
    {
        return $this ->hasMany(User::class );
    }*/
    public function setDone(){
        return $this->done = true;
    }
    //Gibt den Helfer zurück
    public function helper(){
        return $this->helper_id;
    }
    //Gibt den Ersteller zurück
    public function creator(){
        return $this->creator_id;
    }

}


