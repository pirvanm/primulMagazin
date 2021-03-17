<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{


    // aici definim tabelul care vrem sa il incarcam 
    // pentru aceasta clasa 
    protected $table = 'category';

    // public function products()
    // {
    //   //  return $this->belongsToMany('App\Product');
    // }
}
