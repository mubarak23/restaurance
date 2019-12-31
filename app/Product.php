<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'price', 'rating'
    ];

    public function review(){
        return $this->hasMany('App\Review');
    }

    
}
