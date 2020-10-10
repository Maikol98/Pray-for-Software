<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'id'        => 1,
            'name'      => 'Maikol Sanchez',
            'email'     => 'greco98@gmail.com',
            'password'  => bcrypt('123456789')
        ]);

        DB::table('users')->insert([
            'id'        => 2,
            'name'      => 'Juan Perez',
            'email'     => 'perez@gmail.com',
            'password'  => bcrypt('123456789')
        ]);
    }
}
