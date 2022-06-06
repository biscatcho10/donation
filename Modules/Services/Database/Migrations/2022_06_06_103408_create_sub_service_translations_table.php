<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubServiceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_service_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_service_id');
            $table->foreign('sub_service_id')->references('id')->on('sub_services')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['sub_service_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_service_translations');
    }
}
