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
        Settings::set('name:en', 'Green Apple System');
        Settings::set('name:ar', 'عيادات جرين ابل');

        Settings::set('description:en', 'Green Apple System');
        Settings::set('description:ar', 'عيادات جرين ابل');

        Settings::set('meta_description:en', 'Green Apple System');
        Settings::set('meta_description:ar', 'عيادات جرين ابل');

        // images
        foreach ($this->files as $file) {
            Settings::set($file)->addMedia(__DIR__ . '/images/' . $file . '.png')
                ->preservingOriginal()
                ->toMediaCollection($file);
        }
    }
}
