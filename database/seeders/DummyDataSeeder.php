<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Accounts\Database\Seeders\UsersTableSeeder;
use Modules\Countries\Database\Seeders\CountriesTableSeeder;
use Modules\HowKnow\Database\Seeders\ReasonSeederTableSeeder;
use Modules\Settings\Database\Seeders\SettingsDatabaseSeeder;
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
    }
}
