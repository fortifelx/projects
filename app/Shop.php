<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected $fillable = [
        'name',
        'shortDescription',
        'description',
        'email',
        'phone_one',
        'phone_two',
        'phone_three',
        'phone_four',
        'phone_five',
        'delivery',
        'payment',
        'guaranty',
        'return',
        'howBuy',
    ];
    public static function add($fields){
        $shop = new static;
        $shop->fill($fields);
        $shop->save();

        return $shop;
    }
    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }
}
