<?php

namespace Modules\Volunteers\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Volunteers\Entities\Field;

class FieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $field = [
            [
                'name_ar' => 'تعليم',
                'name_en' => 'Education',
            ],
            [
                'name_ar' => 'صحة',
                'name_en' => 'Health',
            ],
            [
                'name_ar' => 'بيئة',
                'name_en' => 'Environment',
            ],
            [
                'name_ar' => 'أشغال يدوية',
                'name_en' => 'Physical Activities',
            ],
            [
                'name_ar' => 'علاقات عامة',
                'name_en' => 'General Relations',
            ],
            [
                'name_ar' => 'تسويق',
                'name_en' => 'Marketing',
            ],
            [
                'name_ar' => 'تدريب',
                'name_en' => 'Training',
            ],
            [
                'name_ar' => 'ترفيه',
                'name_en' => 'Entertainment',
            ],
            [
                'name_ar' => 'تدبير تمويل',
                'name_en' => 'Financial Management',
            ],
            [
                'name_ar' => 'أخرى',
                'name_en' => 'Others',
            ],
        ];

        foreach ($field as $key => $value) {
            Field::create([
                'name:ar' => $value['name_ar'],
                'name:en' => $value['name_en'],
            ]);
        }
    }
}
