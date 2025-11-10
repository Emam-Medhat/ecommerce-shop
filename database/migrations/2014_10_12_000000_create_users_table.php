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
            $table->string('name');                           // اجبارى
            $table->string('email')->unique();               // اجبارى
            $table->timestamp('email_verified_at')->nullable(); // يبقى nullable
            $table->string('password');                       // اجبارى
            $table->string('profile_picture');               // اجبارى
            $table->string('phone');                         // اجبارى
            $table->string('address');                       // اجبارى
             $table->enum('role', ['user', 'admin', 'seller'])->default('user');        // اجبارى مع default
            $table->rememberToken()->nullable();             // يبقى nullable
            $table->timestamps();
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
