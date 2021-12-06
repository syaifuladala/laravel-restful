<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function(Blueprint $b){
            $b->id();
            $b->string('title',100);
            $b->string('category',50);
            $b->double('price');
            $b->text('description');
            $b->integer('stock');
            $b->boolean('free_shipping');
            $b->double('rate');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
