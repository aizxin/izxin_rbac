<?php

use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;

class SqlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fileSystem= new Filesystem();
        $database = $fileSystem->get(base_path('database/seeds') . '/' . 'larbac.sql');
        DB::connection()->getPdo()->exec($database);
    }
}
