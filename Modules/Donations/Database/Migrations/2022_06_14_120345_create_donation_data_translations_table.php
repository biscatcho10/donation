<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationDataTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_data_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donation_data_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');
            $table->text('thanks_msg');

            $table->unique(['donation_data_id', 'locale']);
            $table->foreign('donation_data_id')->references('id')->on('donation_data')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_data_translations');
    }
}
