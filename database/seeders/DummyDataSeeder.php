<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Accounts\Database\Seeders\UsersTableSeeder;
use Modules\Countries\Database\Seeders\CountriesTableSeeder;
use Modules\Donations\Database\Seeders\DonationMethodTableSeeder;
use Modules\Donations\Database\Seeders\DonationTableSeeder;
use Modules\HowKnow\Database\Seeders\ReasonSeederTableSeeder;
use Modules\Services\Database\Seeders\ServiceTableSeeder;
use Modules\Settings\Database\Seeders\ContactusTableSeeder;
use Modules\Settings\Database\Seeders\SettingsDatabaseSeeder;
use Modules\Settings\Database\Seeders\SubscribersTableSeeder;
use Modules\Volunteers\Database\Seeders\FieldTableSeeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(ReasonSeederTableSeeder::class);
        $this->call(SettingsDatabaseSeeder::class);
        $this->call(FieldTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(DonationTableSeeder::class);
        $this->call(SubscribersTableSeeder::class);
        $this->call(ContactusTableSeeder::class);
        // $this->call(DonationMethodTableSeeder::class);

    }
}
