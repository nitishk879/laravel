<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "service_brands";
    public $primaryKey = 'brand_id';

    public function service(){
        return $this->belongsTo('App\Service');
    }

    public function items(){
        return $this->hasMany('App\Item');
    }
}
