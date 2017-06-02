<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cate_id');
            $table->string('name');
            $table->string('alias');
            $table->string('desc')->nullable();
            $table->longText('content')->nullable();
            $table->integer('price')->default(0);
            $table->integer('order')->default(0);
            $table->integer('status')->default(1);
            $table->integer('position')->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_key')->nullable();
            $table->string('meta_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
