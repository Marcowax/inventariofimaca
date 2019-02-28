<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
			$table->string('name', 50)->nullable($value = false);
			$table->string('email', 30)->nullable($value = false)->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password', 60)->nullable($value = false);
			$table->enum('administrator', ['Sí', 'No'])->nullable($value = false);
            $table->timestamps();
			$table->rememberToken();
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
