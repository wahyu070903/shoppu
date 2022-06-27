<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountTable extends Migration
{
    public function up()
    {
        Schema::create('discount', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->decimal('discount',4,2);
            $table->string('start');
            $table->string('end');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('discount');
    }
}
