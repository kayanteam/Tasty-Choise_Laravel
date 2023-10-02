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
        Schema::create('pull_requests', function (Blueprint $table) {
           
            $table->id();
            $table->string('name');
            $table->unsignedFloat('amount')->default(0);
            $table->string('iban_number')->nullable();
            $table->string('account_number')->nullable();
            $table->enum('status' , ['pending' ,'accepted' , 'rejected'])->default('pending');
            $table->foreignId('restaurant_id')->constrained('restaurants')->cascadeOnDelete();
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
        Schema::dropIfExists('pull_requests');
    }
};
