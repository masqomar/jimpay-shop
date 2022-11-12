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
        Schema::create('merchant_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('credit');
			$table->integer('debit');
			$table->string('type');
			$table->enum('transaction_type', ['masuk', 'keluar']);
			$table->date('date');
			$table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignId('merchant_id')->constrained('users');
			$table->string('method');
			$table->string('note');
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
        Schema::dropIfExists('merchant_transactions');
    }
};
