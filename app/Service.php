<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    public $primaryKey = 'service_id';

    public function brands(){
        return $this->hasMany('App\Brand');
    }

    public function segments(){
        return $this->hasMany('App\Segment');
    }
}
