<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
          $table->id();
          $table->string('name')->nullable();
          $table->foreignId('jenisservice_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
          $table->text('description')->nullable();
          $table->double('rate')->nullable();
          $table->integer('price')->nullable();
          $table->string('picturePath')->nullable();
          $table->softDeletes();
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
        Schema::dropIfExists('services');
    }
}
