<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "service_items";

    public $keyType;

    public $primaryKey = 'item_id';

    public function services(){
        return $this->belongsTo('App\Service');
    }

    public function brands(){
        return $this->belongsTo('App\Brand');
    }

    public function segments(){
        return $this->belongsTo('App\Segment');
    }
}
