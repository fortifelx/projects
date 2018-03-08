<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;



    public function products(){
        return $this->hasMany(Product::class);
    }

    public static function add($title){
            $category = new static;
            $category->title = $title;
            $category->save();

            return $category;
    }
    public function edit($title){
        $this->title = $title;
        $this->save();
    }
    public function remove(){
        $this->delete();
    }




    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
