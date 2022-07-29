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

        for($i = 0; $i < 50; $i++) {

            // offline donation
            $donor1 = Donor::create([
                'name' => $fake->name,
                'email' => $fake->email,
                'phone' => $fake->phoneNumber,
                'address' => $fake->address,
                'nearest_landmark' => $fake->streetName,
            ]);
            $donation = Donation::create([
                'donor_id' => $donor1->id,
                'amount' => $fake->randomFloat(2, 0, 100),
                'type' => 'offline',
                'donation_method_id' => 1,
                'paid_at' => $fake->dateTimeBetween('-1 years', 'now'),
            ]);



            // online donation
            $donor2 = Donor::create([
                'name' => $fake->name,
            ]);
            $donation = Donation::create([
                'donor_id' => $donor2->id,
                'amount' => $fake->randomFloat(2, 0, 100),
                'type' => 'online',
                'donation_method_id' => 2,
                'paid_at' => $fake->dateTimeBetween('-1 years', 'now'),
            ]);

        }
    }
}
