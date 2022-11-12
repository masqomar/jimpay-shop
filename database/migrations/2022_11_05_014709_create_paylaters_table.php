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
        Schema::create('paylaters', function (Blueprint $table) {
            $table->id();
            $table->string('code');
			$table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignId('paylater_provider_id')->constrained('paylater_providers')->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignId('bank_id')->constrained('banks')->cascadeOnUpdate()->cascadeOnDelete();
			$table->integer('bank_account_number');
			$table->string('bank_account_name');
			$table->date('start_date');
			$table->string('status');
			$table->integer('amount');
			$table->integer('duration');
			$table->date('finish_date');
			$table->text('note');
			$table->string('image')->nullable();
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
        Schema::dropIfExists('paylaters');
    }
};
