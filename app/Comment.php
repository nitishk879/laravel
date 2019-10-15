<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public $primaryKey = 'comment_id';

    public function post(){
        return $this->belongsTo('App\Post');
    }

}
