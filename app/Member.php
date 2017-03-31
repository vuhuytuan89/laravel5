<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $table = "members";

    protected $fillable = ['user', 'level', 'pass'];

    public $timestamps = false;

}
