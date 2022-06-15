<?php

namespace Modules\Services\Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Services\Entities\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for($i = 0; $i < 15; $i++) {

            $service = Service::create([
                'name:en' => $faker->name,
                'name:ar' => $faker->name,
                'description:en' => $faker->text,
                'description:ar' => $faker->text,
                'meta_title' => $faker->text,
                'meta_description' => $faker->text,
                'meta_keywords' => $faker->text,
            ]);

        }
    }
}
