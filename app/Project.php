<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $guarded =[];



    public function season()
    {
        return $this->belongsTo('App\Season');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
