<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public static function add($email){
        $client = new static;
        $client->email = $email;
        $client->is_active = 0;
        $client->save();
    }
    public function toggleStatus(){

        if($this->is_active == 0) {
            $this->is_active = 1;
            $this->save();
            return $this;
        }
        $this->is_active = 0;
        $this->save();
        return $this;

    }
    public function remove(){
        $this->delete();
    }
}
