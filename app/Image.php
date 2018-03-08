<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    public function products(){
        return $this->belongsTo('App\Product');
    }
    public static function addImage(Request $request){
        $product_id = $request->product_id;
        $slug = Product::find($product_id);
        $path = Storage::putFile($slug, $request->file('image'));

    }
}
