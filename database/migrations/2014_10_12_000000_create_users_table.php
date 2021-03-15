<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->text('avatar')->nullable();
            $table->boolean("status")->default(0);
            $table->string('location')->nullable();
            $table->boolean('is_designer')->default(0);

            $table->string('token')->nullable();
            $table->string('code')->nullable();
            $table->text('firebase_token')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('reset_token')->nullable();
            $table->enum('reset_verified',['yes','no'])->default('no');
            $table->enum('app_notification_status',['yes','no'])->default('yes');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
