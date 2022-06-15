<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Donations\Entities\Donor;
use Modules\Services\Entities\Service;

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
            $table->foreignIdFor(Donor::class)->constrained()->cascadeOnDelete();
            $table->double('amount');
            $table->string('currency')->nullable();
            $table->boolean('payment_status')->default(false);
            $table->date('payment_date')->nullable();
            $table->text('payment_details')->nullable();
            $table->enum('type', ['general', 'special'])->default('general');
            $table->foreignIdFor(Service::class)->constrained()->cascadeOnDelete()->nullable();
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
