<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donor_id');
            $table->unsignedBigInteger('amount');
            $table->string('currency')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_id')->nullable();
            $table->boolean('payment_status')->default(false);
            $table->date('payment_date')->nullable();
            $table->text('payment_details')->nullable();
            $table->enum('type', ['general', 'special'])->default(false);
            $table->unsignedBigInteger('service_id')->nullable();

            $table->foreign('donor_id')->references('id')->on('donors');
            $table->foreign('service_id')->references('id')->on('services');
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
        Schema::dropIfExists('donations');
    }
}
