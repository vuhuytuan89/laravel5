<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $table = 'cars';
    protected $fillable = ['name', 'price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public  function color() {
        // một chiếc xe có nhiều màu: 1-n
        return $this->belongsToMany('App\Color', 'car_colors');
    }

}
