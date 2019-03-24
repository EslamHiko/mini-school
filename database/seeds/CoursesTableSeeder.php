<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('courses')->insert([
          'title' => 'Laravel',
          'link' => 'https://www.youtube.com/playlist?list=PL3ZhWMazGi9IYymniZgqwnYuPFDvaEHJb',
          'descreption' => 'Laravel',
          'link_id' => 'PL3ZhWMazGi9IYymniZgqwnYuPFDvaEHJb',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
      DB::table('courses')->insert([
          'title' => 'Data Structures',
          'link' => 'https://www.youtube.com/playlist?list=PL2_aWCzGMAwI3W_JlcBbtYTwiQSsOTa6P',
          'descreption' => 'Data Structures',
          'link_id' => 'PL2_aWCzGMAwI3W_JlcBbtYTwiQSsOTa6P',
          'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

    }
}
