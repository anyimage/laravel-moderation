<?php

namespace AnyImage\Moderation\Tests;


class ExampleTest extends TestCase
{
    /** @test */
    public function test_suite_works()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function it_runs_the_migrations()
    {
        $this->seed(\SeverityTableSeeder::class);

        //        Severity::all()->dd();

        $s = \DB::table('moderation__severities')->where('id', '=', 1)->first();
        $this->assertEquals($s->name, 'low');
    }
}
