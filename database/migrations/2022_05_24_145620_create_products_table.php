<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cate_id');
            $table->string('name');
            $table->string('slug');
            $table->float('price');
            $table->bigInteger('discount')->nullable();
            $table->string('condition')->nullable();
            $table->enum('status',['1','0']);
            $table->text('short');
            $table->text('desc');
            $table->string('img');
            $table->enum('new',['1','0']);
            $table->enum('feature',['1','0']);
            $table->enum('popular',['1','0']);
            $table->enum('best',['1','0']);
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
};
