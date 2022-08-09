<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');

            $table->decimal('price');
            $table->unsignedInteger('quantity')->default(10);

            $table->string('name');
            $table->text('description');
            $table->nullableTimestamps();

            $table->text('image')->nullable();
            $table->bigInteger('caregory_id')->unsigned()->nullable(false);
            $table->foreign('caregory_id')->references('id')->on('categories')->onDelete('cascade');

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
