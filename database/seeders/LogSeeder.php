<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
                
        DB::table('logs')->insert([
                'id' => '2',
                'date' => '2023-09-03',
                'weather' => 'くもり',
                'situation' => '仕事でミス',
                'A' => '20',
                'B' => '20',
                'C' => '20' ,
                'D' => '20',
                'E' => '20' ,
                'F' => '20',
                'image_url' => '写真',
                'emotion'=>'感情',
                'evidence_of_emotion' => 'ひどいことを言った',
                'counter_evidence_of_emotion' => '私のせいではない',
                'flexible_thought' => '仲直りすれば良い',
                ]);
    }
}
