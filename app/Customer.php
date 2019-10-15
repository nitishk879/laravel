<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    public $primaryKey = 'customer_id';

    public function company(){
        return $this->belongsTo('App\Customer'); //, 'company_id', 'customer_id'
    }
}
