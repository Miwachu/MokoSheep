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
                'id' => '1',
                'date' => '2003-02-24',
                'weather' => '晴れ',
                'situation' => '友だちと喧嘩',
                'image_url' => '写真',
                'evidence_of_emotion' => 'ひどいことを言った',
                'counter_evidence_of_emotion' => '私のせいではない',
                'flexible_thought' => '仲直りすれば良い',
                ]);
    }
}
