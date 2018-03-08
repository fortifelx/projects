<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    public function products(){
        return $this->hasMany('App\Product');
    }
    public static function add($title){
        $producer = new static;
        $producer->title = $title;
        $producer->save();

        return $producer;
    }
    public function edit($title){
        $this->title = $title;
        $this->save();
    }
    public function remove(){
        $this->delete();
    }
}
