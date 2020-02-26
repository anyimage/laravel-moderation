<?php

use AnyImage\Moderation\Models\Field;
use Illuminate\Database\Seeder;

class FieldTableSeeder extends Seeder
{

    public function run()
    {
        //DB::table('fields')->delete();

        // title
        Field::create([
            'title'       => 'title',
            'description' => 'Card Title',
            'priority'    => 10,
            'matcher'     => \AnyImage\Moderation\Matchers\StringMatcher::class,
        ]);
        Field::create([
            'title'       => 'description',
            'description' => 'Card Description',
            'priority'    => 10,
            'matcher'     => \AnyImage\Moderation\Matchers\StringMatcher::class,
        ]);
        Field::create([
            'title'       => 'url',
            'description' => 'Card URL',
            'priority'    => 10,
            'matcher'     => \AnyImage\Moderation\Matchers\StringMatcher::class,
        ]);


        Field::create([
            'title'       => 'url',
            'description' => 'Destination Page HTML',
            'priority'    => 0,
            'matcher'     => \AnyImage\Moderation\Matchers\PageSource::class,
        ]);
        Field::create([
            'title'       => 'url',
            'description' => 'Destination Page Metas',
            'priority'    => 0,
            'matcher'     => \AnyImage\Moderation\Matchers\PageMetas::class,
        ]);
        Field::create([
            'title'       => 'url',
            'description' => 'Destination Website Main Page HTML',
            'priority'    => 0,
            'matcher'     => \AnyImage\Moderation\Matchers\MainPageSource::class,
        ]);
        Field::create([
            'title'       => 'url',
            'description' => 'Destination Website Main Page Metas',
            'priority'    => 0,
            'matcher'     => \AnyImage\Moderation\Matchers\StringMatcher::class,
        ]);
    }
}
