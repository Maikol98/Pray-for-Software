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
            'id'            => 1,
            'name'          => 'Maikol Sanchez',
            'email'         => 'maikol@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 1
        ]);

        DB::table('users')->insert([
            'id'            => 2,
            'name'          => 'Juan Perez',
            'email'         => 'perez@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 2
        ]);
        DB::table('users')->insert([
            'id'            => 3,
            'name'          => 'Bruno Diaz',
            'email'         => 'diazBruno@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 3
        ]);
        DB::table('users')->insert([
            'id'            => 4,
            'name'          => 'Jose Sandoval',
            'email'         => 'jose@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 4
        ]);
        DB::table('users')->insert([
            'id'            => 5,
            'name'          => 'Ana Frank',
            'email'         => 'AnaFrank@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 5
        ]);
        DB::table('users')->insert([
            'id'            => 6,
            'name'          => '',
            'email'         => 'perez@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 6
        ]);
        DB::table('users')->insert([
            'id'            => 7,
            'name'          => 'Juan Perez',
            'email'         => 'perez@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 7
        ]);
        DB::table('users')->insert([
            'id'            => 8,
            'name'          => 'Juan Perez',
            'email'         => 'perez@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 8
        ]);
        DB::table('users')->insert([
            'id'            => 9,
            'name'          => 'Juan Perez',
            'email'         => 'perez@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 9
        ]);
        DB::table('users')->insert([
            'id'            => 10,
            'name'          => 'Juan Perez',
            'email'         => 'perez@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 10
        ]);
        DB::table('users')->insert([
            'id'            => 11,
            'name'          => 'Juan Perez',
            'email'         => 'perez@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 11
        ]);
        DB::table('users')->insert([
            'id'            => 12,
            'name'          => 'Juan Perez',
            'email'         => 'perez@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 12
        ]);
        DB::table('users')->insert([
            'id'            => 13,
            'name'          => 'Juan Perez',
            'email'         => 'perez@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 13
        ]);

        DB::table('users')->insert([
            'id'            => 14,
            'name'          => 'Juan Perez',
            'email'         => 'perez@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 14
        ]);

        DB::table('users')->insert([
            'id'            => 15,
            'name'          => 'Juan Perez',
            'email'         => 'perez@gmail.com',
            'password'      => bcrypt('123456789'),
            'id_persona'    => 15
        ]);
    }
}
