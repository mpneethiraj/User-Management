<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status');
            $table->string('name', 40);
            $table->string('username', 80)->unique();
            $table->string('email_address', 80)->unique();
            $table->string('password', 80);
            $table->string('telephone', 30);
            $table->date('date_of_birth');
            $table->string('profile_photo', 256);
            $table->string('address', 256);
            $table->string('city', 100);
            $table->string('State', 100);
            $table->string('country', 100);
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
        Schema::dropIfExists('customer');
    }
}
