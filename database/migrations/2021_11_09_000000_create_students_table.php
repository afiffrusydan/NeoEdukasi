<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyText('gender')->nullable();
            $table->string('POB')->nullable();
            $table->date('DOB')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('class')->nullable();
            $table->string('curriculum')->nullable();
            $table->string('subjects')->nullable();
            $table->tinyInteger('branch_id')->nullable();
            $table->string('token')->nullable();
            $table->tinyInteger('account_status');
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
        Schema::dropIfExists('students');
    }
}
