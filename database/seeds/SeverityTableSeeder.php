<?php

use AnyImage\Moderation\Models\Severity;
use Illuminate\Database\Seeder;

class SeverityTableSeeder extends Seeder
{

    public function run()
    {
        //DB::table('severities')->delete();

        // low
        Severity::create([
            'name' => 'low',
        ]);

        // moderate
        Severity::create([
            'name' => 'moderate',
        ]);

        // high
        Severity::create([
            'name' => 'high',
        ]);
    }
}
