<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'title',
        'code'
    ];
    public function products(){
        return $this->belongsToMany('App\Product');
    }
    public static function add($fields){
        $color = new static;
        $color->fill($fields);
        $color->save();

        return $color;
    }
    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }
    public function remove(){
        $this->delete();
    }
}
