<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tentors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('NIK')->unique()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->string('POB')->nullable();
            $table->date('DOB')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('religion')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('job_status')->nullable();
            $table->string('last_education')->nullable();
            $table->string('major')->nullable();
            $table->tinyInteger('verified_by')->nullable();
            $table->string('branch_id')->nullable();
            $table->string('token')->nullable();
            $table->tinyInteger('account_status')->nullable();
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
        Schema::dropIfExists('tentors');
    }
}
