<?php

namespace Modules\Donations\Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Donations\Entities\Donation;
use Modules\Donations\Entities\Donor;
use Modules\Services\Entities\Service;

class DonationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create();

        for($i = 0; $i < 100; $i++) {

            $donor = Donor::create([
                'name' => $fake->name,
                'email' => $fake->email,
                'phone' => $fake->phoneNumber
            ]);

            $donation = Donation::create([
                'donor_id' => $donor->id,
                'amount' => $fake->randomFloat(2, 0, 100),
                'currency' => $fake->currencyCode,
                'payment_status' => $fake->boolean,
                'payment_date' => $fake->dateTime,
                'payment_details' => $fake->text,
                'type' => $fake->randomElement(['general', 'special']),
                'service_id' => $fake->randomElement(Service::pluck('id')->toArray())
            ]);

        }
    }
}
