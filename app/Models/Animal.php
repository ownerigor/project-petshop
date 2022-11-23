<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $with = ['breed'];

    //..define the relationship with Brand 
    public function breed(){
        return $this->belongsTo(Breed::class);
    }    
}
