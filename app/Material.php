<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    public static function add($title){
        $material = new static;
        $material->title = $title;
        $material->save();

        return $material;
    }
    public function edit($title){
        $this->title = $title;
        $this->save();
    }
    public function remove(){
        $this->delete();
    }
}
