<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            // $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->string('job')->nullable();
            $table->string('nationality')->nullable();
            $table->string('educational_qualification')->nullable();
            $table->unsignedBigInteger('how_know_id')->nullable();
            $table->text('skills')->nullable();
            $table->text('experiences')->nullable();
            $table->text('motives')->nullable();
            // $table->unsignedBigInteger('field_id')->nullable();
            // $table->text('volunteer_category')->nullable();
            $table->text('favorite_time')->nullable();
            $table->boolean('has_car')->default(false);
            $table->foreign('how_know_id')->references('id')->on('reasons')->onDelete('cascade');
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
        Schema::dropIfExists('volunteers');
    }
}
