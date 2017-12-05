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
          [
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
            'is_admin' => true
          ],
          [
            'name' => 'user',
            'email' => 'user@email.com',
            'password' => bcrypt('password'),
            'is_admin' => false
          ]
        ]);
    }
}
