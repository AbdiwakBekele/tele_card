<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('phone_no');
            $table->unsignedBigInteger('group_id')->index();
            
            $table->unsignedBigInteger('sales_manager')->nullable(); 
            $table->string('address')->nullable();
            $table->string('discount')->nullable(); 
            $table->string('account_type')->nullable();
            $table->string('title')->nullable();
            $table->integer('activation_pin')->nullable();
            $table->string('activation_status')->nullable(); 
            $table->string('account_status')->nullable();
            $table->string('license')->nullable();

            $table->foreign('group_id')
                  ->references('id')
                  ->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};