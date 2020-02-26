<?php

namespace AnyImage\Moderation\Tests;


use AnyImage\Moderation\Models\Field;
use AnyImage\Moderation\Models\Rule;
use AnyImage\Moderation\Models\WhitelistedValue;
use AnyImage\Moderation\ModerationClass;
use App\Models\WhitelistedDomain;

class ModerationTest extends TestCase
{
    /**
     * @test
     */
    //    public function it_honors_whitelist()
    //    {
    //
    //        $this->seed( \SeverityTableSeeder::class );
    //        $this->seed( \FieldTableSeeder::class );
    //
    //        $fields = Field::pluck( 'id' );
    //        $rule = Rule::create( [
    //            'severity_id' => 1,
    //            'pattern'     => 'porn',
    //        ] );
    //        $rule->fields()->sync( $fields );
    //
    //        WhitelistedValue::create( [
    //            'field_id' => 1,
    //            'value'    => 'porn',
    //        ] );
    //
    //        Field::whereTitle( 'url' )->get()->each( function ( $v )
    //        {
    //            $v->whitelisted_values()->create( [ 'value' => 'porn', ] );
    //        } );
    //
    //        $moderation = ModerationClass::make( [
    //            'title'       => 'Watch porn video free',
    //            'description' => 'Gangbang blowjob',
    //            'url'         => 'http://xvideos.com',
    //        ] );
    //        $this->assertTrue( $moderation->passes() );
    //    }

    /**
     * @test
     */
    public function it_blocks_porn()
    {

        $this->seed(\SeverityTableSeeder::class);
        $this->seed(\FieldTableSeeder::class);

        $fields = Field::pluck('id');
        $rule = Rule::create([
            'severity_id' => 1,
            'pattern'     => 'porn',
        ]);
        $rule->fields()->sync($fields);
        $rule = Rule::create([
            'severity_id' => 2,
            'pattern'     => 'blowjob',
        ]);
        $rule->fields()->sync($fields);

        $moderation = ModerationClass::make([
            'title'       => 'Watch porn video free',
            'description' => 'Gangbang blowjob',
            'url'         => 'http://xvideos.com',
        ]);

        $this->assertTrue($moderation->fails());
        $this->assertEquals($moderation->violations()->count(), 7);

    }
}
