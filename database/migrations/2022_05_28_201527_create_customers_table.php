<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('cpf', 11);
            $table->string('email', 100);
            $table->string('address', 120)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('zip_code', 8)->nullable();
            $table->string('neighborhood', 100)->nullable();
            $table->string('number', 20)->nullable();
            $table->string('complement', 100)->nullable();
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
        Schema::dropIfExists('customers');
        Schema::table('customer', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('cpf', 11);
            $table->string('email', 100);
            $table->string('address', 120)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('zip_code', 8)->nullable();
            $table->string('neighborhood', 100)->nullable();
            $table->string('number', 20)->nullable();
            $table->string('complement', 100)->nullable();
            $table->timestamps();
        });
    }
}
