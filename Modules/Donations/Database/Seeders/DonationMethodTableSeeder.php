<?php

namespace Modules\Donations\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Donations\Entities\DonationMethod;

class DonationMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // loop on images in methods folder
        foreach (glob(base_path('modules/donations/database/seeds/methods/*')) as $image) {
            $name = basename($image);
            $method = DonationMethod::create([
                'name' => $name,
                'meta_title' => $name,
                'meta_description' => $name,
                'meta_keywords' => $name,
            ]);
            $method->addMedia($image)->toMediaCollection('images');
        }

    }
}
