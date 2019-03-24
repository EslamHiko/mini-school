<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
          'name' => 'Admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('secret'),
          'admin' => '1',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('users')->insert([
          'name' => 'User',
          'email' => 'user@user.com',
          'password' => bcrypt('secret'),
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    }
}
