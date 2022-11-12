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
        Schema::create('donation_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
			$table->foreignId('donation_id')->constrained('donations')->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
			$table->integer('amount');
			$table->boolean('private');
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
        Schema::dropIfExists('donation_transactions');
    }
};
