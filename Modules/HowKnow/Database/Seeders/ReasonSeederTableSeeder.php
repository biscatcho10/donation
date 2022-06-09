<?php

namespace Modules\HowKnow\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HowKnow\Entities\Reason;

class ReasonSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reasons = [
            [
                'name_en' => 'Facebook',
                'name_ar' => 'الفيسبوك'
            ],
            [
                'name_en' => 'Twitter',
                'name_ar' => 'التويتر'
            ],
            [
                'name_en' => 'Instagram',
                'name_ar' => 'الانستجرام'
            ],
            [
                'name_en' => 'Our Website',
                'name_ar' => 'موقعنا'
            ],
            [
                'name_en' => 'Friend',
                'name_ar' => 'صديق'
            ],
            [
                'name_en' => 'TV Show',
                'name_ar' => 'حوار تليفزيوني'
            ],
            [
                'name_en' => 'Other',
                'name_ar' => 'أخرى'
            ]
        ];


        foreach ($reasons as $reason) {
            Reason::create([
                'reason:en' => $reason['name_en'],
                'reason:ar' => $reason['name_ar']
            ]);
        }
    }
}
