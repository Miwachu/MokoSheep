<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('emotions')->insert([
                'id' => '1',
                'A' => '0',
                'percentage_of_A' => '10',
                'B' => '0',
                'percentage_of_B' => '10',
                'C' => '0',
                'percentage_of_C' => '10',
                'D' => '0',
                'percentage_of_D' => '10',
                'E' => '0',
                'percentage_of_E' => '10',
                'F' => '0',
                'percentage_of_F' => '10',
                
                ]);
        //
    }
    
}
