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
            $table->uuid("uuid");
            $table->string('full_name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('mobile')->nullable()->unique();
            $table->string('mobile_verification_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->text("description")->nullable();
            $table->string("thumbnail"  )->nullable();
            $table->string("profile")->nullable();
            $table->enum("gender",["male","female"]);
            $table->enum("relationship",["single","married","engaged"]);
            $table->string("location")->nullable();
            $table->string("address")->nullable();
            $table->boolean("is_private")->default(0);
            $table->boolean("is_banned")->default(0);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
