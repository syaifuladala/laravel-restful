<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function(Blueprint $b){
            $b->id();
            $b->string('email',100)->unique();
            $b->string('first_name',50);
            $b->string('last_name',50)->nullable();
            $b->string('city',50)->nullable();
            $b->string('address',100)->nullable();
            $b->string('password',100);
            $b->string('token',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
