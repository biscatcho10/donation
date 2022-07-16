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
        // methods
        $methods = [
            "cash" => [
                "name" => "Cash",
                "meta_title" => "Cash",
                "meta_description" => "Cash",
                "meta_keywords" => "Cash",
            ],
            "visa" => [
                "name" => "Visa",
                "meta_title" => "Visa",
                "meta_description" => "Visa",
                "meta_keywords" => "Visa",
            ],
            "master" => [
                "name" => "Mastercard",
                "meta_title" => "Mastercard",
                "meta_description" => "Mastercard",
                "meta_keywords" => "Mastercard",
            ],
        ];

        foreach ($methods as $key => $method) {
            $donation_method = DonationMethod::create([
                "name" => $method["name"],
                "meta_title" => $method["meta_title"],
                "meta_description" => $method["meta_description"],
                "meta_keywords" => $method["meta_keywords"],
            ]);

            $image = "methods\\" . $key . ".jpg";
            $donation_method->addMedia(public_path($image))->toMediaCollection('images');
        }
    }
}
