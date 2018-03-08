<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apeal extends Model
{
    protected $fillable = [
      'name',
      'theme',
      'email',
      'title',
      'text'
    ];
    public static function add($fields){
        $apeal = new static;
        $apeal->fill($fields);
        $apeal->save();

        return $apeal;
    }
    public function remove(){
        $this->delete();
    }
}
