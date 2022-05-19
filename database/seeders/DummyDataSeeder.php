<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Accounts\Database\Seeders\UsersTableSeeder;
use Modules\Branches\Database\Seeders\BranchesDatabaseSeeder;
use Modules\Countries\Database\Seeders\CountriesTableSeeder;
use Modules\Diet\Database\Seeders\DietDatabaseSeeder;
use Modules\Employee\Database\Seeders\EmployeeDatabaseSeeder;
use Modules\Employee\Database\Seeders\JobTitleDatabaseSeeder;
use Modules\Examinations\Database\Seeders\ExaminationsDatabaseSeeder;
use Modules\HowKnow\Database\Seeders\ReasonSeederTableSeeder;
use Modules\Labs\Database\Seeders\LabsDatabaseSeeder;
use Modules\Package\Database\Seeders\PackageDatabaseSeeder;
use Modules\Patient\Database\Seeders\OperativeHistoryTableSeeder;
use Modules\Patient\Database\Seeders\PatientTableSeeder;
use Modules\Region\Database\Seeders\RegionTableSeeder;
use Modules\Service\Database\Seeders\ServiceDatabaseSeeder;
use Modules\Sessions\Database\Seeders\SessionsDatabaseSeeder;
use Modules\Settings\Database\Seeders\SettingsDatabaseSeeder;
use Modules\Stock\Database\Seeders\CategoryTableSeeder;
use Modules\Stock\Database\Seeders\ProductTableSeeder;
use Modules\Stock\Database\Seeders\SupplierTableSeeder;
use Modules\UserType\Database\Seeders\UserTypeDatabaseSeeder;

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
        $this->call(SettingsDatabaseSeeder::class);
    }
}
