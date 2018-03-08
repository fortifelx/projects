<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function products(){
        return $this->belongsToMany('App\Product');
    }
    public static function add($title){
        $type = new static;
        $type->title = $title;
        $type->save();

        return $type;
    }
    public function edit($title){
        $this->title = $title;
        $this->save();
    }
    public function remove(){
        $this->delete();
    }
}
