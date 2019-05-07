<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Lolo',
            'email' => 'test1@gmail.com',
            'password' => bcrypt('1234567'),
        ]);
        DB::table('users')->insert([
            'name' => 'Mikele',
            'email' => 'test2@gmail.com',
            'password' => bcrypt('1234567'),
        ]);
    }
}
