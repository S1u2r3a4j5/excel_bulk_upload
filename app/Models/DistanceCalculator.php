<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DistanceCalculator extends Model
{
    
    protected $fillable = ['name','pincode1','pincode2','output','status'];
}
