<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'distance_calculators';
    protected $fillable = ['name','pincode1','pincode2','output','status'];
}
