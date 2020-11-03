<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baju extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsToMany('App\Models\User');
        }
        
    public function orders(){
        return $this->belongsToMany('App\Models\Order');
        }
       
}
