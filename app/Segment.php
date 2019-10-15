<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    protected $table = "service_segments";

    public $keyType;

    public function services(){
        return $this->belongsTo('App\Service');
    }

    public function items(){
        return $this->hasMany('App\Item');
    }
}
