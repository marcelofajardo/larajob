<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('address')->nullable()->default(null);
            $table->string('phone_number')->nullable()->defult(null);
            $table->string('gender');
            $table->string('dob');
            $table->string('experience')->nullable()->default(null);
            $table->string('bio')->nullable()->default(null);
            $table->string('cover_letter')->nullable()->default(null);
            $table->string('resume')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
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
        Schema::dropIfExists('profiles');
    }
}
