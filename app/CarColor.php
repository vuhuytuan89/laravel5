<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarColor extends Model
{
    //
    protected $table = 'car_colors';
    protected $fillable = ['car_id', 'color_id'];
}
