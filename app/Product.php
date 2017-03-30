<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['id','name','price','detail','cate_id'];
    // trong table nếu k có created_at, updated_at
    // thi khai báo tắt chế độ hiển thị timestamps. Nếu k sẽ báo lỗi
    public $timestamps = false;
    // get all 
    public function images() {
    	return $this->hasMany('App\Image');
    }
}
