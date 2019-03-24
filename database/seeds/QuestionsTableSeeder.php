<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('questions')->insert([
          'video_id' => 'a8ZpAf_tNh0',
          'question' => 'Create A Fresh Laravel App Called blog -laravel new blog-',
          'answer' => 'laravel new blog',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('questions')->insert([
          'video_id' => 'YU2e1Xs4UDU',
          'question' => 'Create A Model Named post -php artisan make:model post-',
          'answer' => 'php artisan make:model post',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

      ]);
    }
}
