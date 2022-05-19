<?php

namespace Modules\Installer\Entities\Utilities;

use Database\Seeders\LaratrustSeeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

/**
 * Class Installer
 *
 * Contains all of the Business logic to install the app. Either through the CLI or the `/install` web UI.
 *
 * @package App\Utilities
 */
class Installer
{
    public static function checkServerRequirements()
    {
        $requirements = [];

        if (ini_get('safe_mode')) {
            $requirements[] = trans('install.requirements.disabled', ['feature' => 'Safe Mode']);
        }

        if (ini_get('register_globals')) {
            $requirements[] = trans('install.requirements.disabled', ['feature' => 'Register Globals']);
        }

        if (ini_get('magic_quotes_gpc')) {
            $requirements[] = trans('install.requirements.disabled', ['feature' => 'Magic Quotes']);
        }

        if (!ini_get('file_uploads')) {
            $requirements[] = trans('install.requirements.enabled', ['feature' => 'File Uploads']);
        }

        if (!function_exists('proc_open')) {
            $requirements[] = trans('install.requirements.enabled', ['feature' => 'proc_open']);
        }

        if (!function_exists('proc_close')) {
            $requirements[] = trans('install.requirements.enabled', ['feature' => 'proc_close']);
        }

        if (!class_exists('PDO')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'MySQL PDO']);
        }

        if (!extension_loaded('bcmath')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'BCMath']);
        }

        if (!extension_loaded('ctype')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'Ctype']);
        }

        if (!extension_loaded('curl')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'cURL']);
        }

        if (!extension_loaded('dom')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'DOM']);
        }

        if (!extension_loaded('fileinfo')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'FileInfo']);
        }

        if (!extension_loaded('gd')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'GD']);
        }

        if (!extension_loaded('json')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'JSON']);
        }

        if (!extension_loaded('mbstring')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'Mbstring']);
        }

        if (!extension_loaded('openssl')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'OpenSSL']);
        }

        if (!extension_loaded('tokenizer')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'Tokenizer']);
        }

        if (!extension_loaded('xml')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'XML']);
        }

        if (!extension_loaded('zip')) {
            $requirements[] = trans('install.requirements.extension', ['extension' => 'ZIP']);
        }

        if (!is_writable(base_path('storage/app'))) {
            $requirements[] = trans('install.requirements.directory', ['directory' => 'storage/app']);
        }

        if (!is_writable(base_path('storage/app/public'))) {
            $requirements[] = trans('install.requirements.directory', ['directory' => 'storage/app/public']);
        }

        if (!is_writable(base_path('storage/framework'))) {
            $requirements[] = trans('install.requirements.directory', ['directory' => 'storage/framework']);
        }

        if (!is_writable(base_path('storage/logs'))) {
            $requirements[] = trans('install.requirements.directory', ['directory' => 'storage/logs']);
        }

        if (Console::run('help') !== true) {
            $requirements[] = trans('install.error.php_version', ['php_version' => '7.4']);
        }

        return $requirements;
    }

    /**
     * Create a default .env file.
     *
     * @return void
     * @throws \Exception
     */
    public static function createDefaultEnvFile()
    {
        // Rename file
        if (!is_file(base_path('.env')) && is_file(base_path('.env.example'))) {
            File::copy(base_path('.env.example'), base_path('.env'));
        }

        // Update .env file
        static::updateEnv([
            'APP_KEY' => 'base64:' . base64_encode(random_bytes(32)),
        ]);
    }

    public static function createDbTables($host, $port, $database, $username, $password, $prefix = null)
    {
        if (!static::isDbValid($host, $port, $database, $username, $password)) {
            return false;
        }

        // Set database details
        static::saveDbVariables($host, $port, $database, $username, $password, $prefix);

        // Try to increase the maximum execution time
        set_time_limit(300); // 5 minutes

        // Create tables
        Artisan::call('migrate', ['--force' => true]);

        // Create Permissions
        Artisan::call('db:seed', ['--class' => LaratrustSeeder::class, '--force' => true]);

        return true;
    }

    /**
     * Check if the database exists and is accessible.
     *
     * @param $host
     * @param $port
     * @param $database
     * @param $username
     * @param $password
     *
     * @return bool
     */
    public static function isDbValid($host, $port, $database, $username, $password)
    {
        Config::set('database.connections.install_test', [
            'host' => $host,
            'port' => $port,
            'database' => $database,
            'username' => $username,
            'password' => $password,
            'driver' => $connection = config('database.default', 'mysql'),
            'charset' => config("database.connections.$connection.charset", 'utf8mb4'),
        ]);

        try {
            DB::connection('install_test')->getPdo();
        } catch (\Exception $e) {
            return false;
        }

        // Purge test connection
        DB::purge('install_test');

        return true;
    }

    public static function saveDbVariables($host, $port, $database, $username, $password, $prefix = null)
    {
        // Update .env file
        static::updateEnv([
            'DB_HOST' => $host,
            'DB_PORT' => $port,
            'DB_DATABASE' => $database,
            'DB_USERNAME' => $username,
            'DB_PASSWORD' => '"' . $password . '"',
            'DB_PREFIX' => $prefix,
        ]);

        $con = config('database.default', 'mysql');

        // Change current connection
        $db = Config::get('database.connections.' . $con);

        $db['host'] = $host;
        $db['database'] = $database;
        $db['username'] = $username;
        $db['password'] = $password;
        $db['prefix'] = $prefix;

        Config::set('database.connections.' . $con, $db);

        DB::purge($con);
        DB::reconnect($con);
    }

    public static function createUser($name, $email, $phone, $password, $locale)
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        $root = \Modules\Accounts\Entities\Admin::firstOrCreate([
            'email' => 'root@demo.com',
        ], \Modules\Accounts\Entities\Admin::factory()->raw([
            'name' => 'Root',
            'email' => 'root@demo.com',
            'phone' => '01156382044',
        ]));

        $root->attachRole('super_admin');

        $root->setVerified();

        $admin = \Modules\Accounts\Entities\Admin::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => \Hash::make($password),
        ]);

        $admin->attachRole('super_admin');

        $admin->setVerified();

        $customer = \Modules\Accounts\Entities\Customer::firstOrCreate([
            'email' => 'customer@demo.com',
        ], \Modules\Accounts\Entities\Customer::factory()->raw([
            'name' => 'Customer',
            'email' => 'customer@demo.com',
            'phone' => '01552416535',
        ]));

        $customer->setVerified();

        $provider = \Modules\Accounts\Entities\Provider::firstOrCreate([
            'email' => 'provider@demo.com',
        ], \Modules\Accounts\Entities\Provider::factory()->raw([
            'name' => 'مورد 1',
            'email' => 'provider@demo.com',
            'phone' => '01156382042',
        ]));

        $provider->attachRoles(['provider']);

        $provider->setVerified();

        $newProvider = \Modules\Accounts\Entities\Provider::firstOrCreate([
            'email' => 'newprovider@demo.com',
        ], \Modules\Accounts\Entities\Provider::factory()->raw([
            'name' => 'مورد 2',
            'email' => 'newprovider@demo.com',
            'phone' => '6958471425',
        ]));

        $newProvider->attachRoles(['provider']);

        $newProvider->setVerified();
    }

    public static function finalTouches()
    {
        // Update .env file
        $env = [
            'APP_INSTALLED' => 'true',
            'APP_DEBUG' => 'true',
        ];

        if (!app()->runningInConsole()) {
            $env['APP_URL'] = request()->getUriForPath('');
        }

        static::updateEnv($env);

        // Rename the robots.txt file
        try {
            File::move(base_path('robots.txt.dist'), base_path('robots.txt'));
        } catch (\Exception $e) {
            // nothing to do
        }

        // create storage link folder
        try {
            Artisan::call('storage:link');
        } catch (\Exception $e) {
            // nothing to do
        }
    }

    public static function updateEnv($data)
    {
        if (empty($data) || !is_array($data) || !is_file(base_path('.env'))) {
            return false;
        }

        $env = file_get_contents(base_path('.env'));

        $env = explode("\n", $env);

        foreach ($data as $data_key => $data_value) {
            $updated = false;

            foreach ($env as $env_key => $env_value) {
                $entry = explode('=', $env_value, 2);

                // Check if new or old key
                if ($entry[0] == $data_key) {
                    $env[$env_key] = $data_key . '=' . $data_value;
                    $updated = true;
                } else {
                    $env[$env_key] = $env_value;
                }
            }

            // Lets create if not available
            if (!$updated) {
                $env[] = $data_key . '=' . $data_value;
            }
        }

        $env = implode("\n", $env);

        file_put_contents(base_path('.env'), $env);

        return true;
    }
}
