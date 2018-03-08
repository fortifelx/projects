<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{

    use Sluggable;

    protected $fillable = [
        'title',
        'price',
        'oldPrice',
        'width',
        'height',
        'depth',
        'description',
        'video',
        'illustration'
    ];

    public function category(){
        return $this->hasOne(Category::class);
    }
    public function producer(){
        return $this->hasOne(Producer::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function type(){
        return $this->belongsToMany(Type::class, 'products_types', 'product_id', 'type_id');
    }
    public function color(){
        return $this->belongsToMany(Color::class, 'products_colors');
    }
    public function material(){
        return $this->belongsToMany(Material::class, 'products_materials');
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }



    public static function add($fields){
        $product = new static;
        $product->fill($fields);
        $product->save();

        return $product;
    }
    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }

    /**
     * @throws \Exception
     */
    public function remove(){

        Storage::delete('uploads', $this->illustration);

        $this->delete();
    }

    public function uploadIllustration($image){

        if($image == null) {return;};

        Storage::delete('uploads', $this->illustration);

        $filename = str_random(10) . '.' . $image->extension();
        $image->saveAs('uploads', $filename);
        $this->illustration = $filename;
        $this->save();
    }

    public function getIllustration(){
        if($this->illustration == null) {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->illustration;
    }

     public function setCategory($id){
        if($id == null) {return;}
        $category = Category::find($id);
        $this->category()->save($category);
    }
    public function setProducer($id){
        if($id == null) {return;}
        $category = Producer::find($id);
        $this->category()->save($category);
    }
    public function setColor($ids){
        if ($ids == null) {return;}

        $this->color()->sync($ids);
    }
    public function setType($ids){
        if ($ids == null) {return;}

        $this->type()->sync($ids);
    }
    public function setMaterial($ids){
        if ($ids == null) {return;}

        $this->material()->sync($ids);
    }
    public function setPublished(){
        $this->is_published = 1;
        $this->save();
    }
    public function setUnpublished(){
        $this->is_published = 0;
        $this->save();
    }
    public function toggleStatus($value){
        if($value == null){
            return $this->setUnpublished();
        }
        return $this->setPublished();
    }
    public function setPromotion(){
        $this->is_promotion = 1;
        $this->save();
    }
    public function setUnpromotion(){
        $this->is_promotion = 0;
        $this->save();
    }
    public function togglePromotion($value){
        if($value == null){
            return $this->setUnpromotion();
        }
        return $this->setPromotion();

    }
    public function addImage(Request $request){
        $product_id = $request->product_id;
        $slug = Product::find($product_id);
        $path = Storage::putFile($slug, $request->file('image'));
    }
    public function removeImage($image){
        Storage::delete($image);
    }
    public function getImages($slug){

        $images = Storage::files($slug);
        return $images;
    }




}
