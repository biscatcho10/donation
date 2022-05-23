<?php

namespace Modules\Settings\Database\Seeders;

use Illuminate\Database\Seeder;
use Laraeast\LaravelSettings\Facades\Settings;

class SettingsDatabaseSeeder extends Seeder
{
    /**
     * The list of the files keys.
     *
     * @var array
     */
    protected $files = [
        'logo',
        'favicon',
        'loginLogo',
        'loginBackground',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
   {
        Settings::set('name:en', 'Donation System');
        Settings::set('name:ar', 'نظام التبرعات');

        Settings::set('description:en', 'Donation System');
        Settings::set('description:ar', 'نظام التبرعات');

        Settings::set('meta_description:en', 'Donation System');
        Settings::set('meta_description:ar', 'نظام التبرعات');

        // images
        foreach ($this->files as $file) {
            Settings::set($file)->addMedia(__DIR__ . '/images/' . $file . '.png')
                ->preservingOriginal()
                ->toMediaCollection($file);
        }
    }
}
