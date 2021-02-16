<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function categories() {
        return $this->belongsToMany('App\Category');
    }
    public function findByID($id) {
        if(empty($id)) {
            return null;
        }
        return self::find($id);
    }
}
