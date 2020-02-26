<?php

use AnyImage\Moderation\Models\Rule;
use Illuminate\Database\Seeder;

class RuleTableSeeder extends Seeder
{

    public function run()
    {
        //DB::table('rules')->delete();

        // 'watch now'
        Rule::create([
            'severity_id' => 2,
            'pattern'     => 'watch now',
            'is_regex'    => false,
        ]);

        // 'xvideos.com'
        Rule::create([
            'severity_id' => 2,
            'pattern'     => 'xvideos.com',
            'is_regex'    => false,
        ]);
    }
}
