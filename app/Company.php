<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";
    protected $fillable = [ 'company_name', 'company_phone'];
    protected $primaryKey = "company_id";

    public function customers(){
        return $this->hasMany('App\Customer');
    }
}
