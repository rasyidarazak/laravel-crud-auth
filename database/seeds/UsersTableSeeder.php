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
      \App\User::create([
          'name' => 'Rasyid Arazak',
          'username' => 'rasyidarazak',
          'password' => bcrypt('12345678'),
          'email' => 'rasyidarazak@gmail.com',
      ]);
    }
}
