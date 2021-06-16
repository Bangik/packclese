<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transactions', function (Blueprint $table) {
          $table->id();
          $table->foreignId('transaction_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
          $table->foreignId('service_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
          $table->string('address')->nullable();
          $table->string('address_detail')->nullable();
          $table->string('origin')->nullable();
          $table->string('destination')->nullable();
          $table->integer('weight')->nullable();
          $table->string('courier')->nullable();
          $table->string('space')->nullable();
          $table->date('start')->nullable();
          $table->date('end')->nullable();
          $table->string('extra')->nullable();
          $table->string('voucher_code')->nullable();
          $table->integer('subtotal');
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
        Schema::dropIfExists('detail_transactions');
    }
}
