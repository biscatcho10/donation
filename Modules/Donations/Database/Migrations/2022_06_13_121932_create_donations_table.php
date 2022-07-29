<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Donations\Entities\DonationMethod;
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
            $table->foreignIdFor(DonationMethod::class)->constrained()->cascadeOnDelete();
            $table->double('amount');
            $table->enum('type', ['online', 'offline']);
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
