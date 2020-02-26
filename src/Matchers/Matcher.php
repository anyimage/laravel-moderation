<?php


namespace AnyImage\Moderation\Matchers;


use AnyImage\Moderation\Models\Rule;

abstract class Matcher
{
    protected $value;
    /**
     * @var Rule
     */
    protected $rule;

    public function __construct(Rule $rule, $value)
    {
        $this->value = $value;
        $this->rule = $rule;
    }

    public function matches()
    {

        return $this->match();
        //        $whitelist = WhitelistedValue::all();
        //        if ( $whitelist
        //            ->where( 'field_id', $field->id )
        //            ->filter( function ( $w ) use ( $field )
        //            {
        //                return \Illuminate\Support\Str::contains( $this->data[ $field->title ], $w->value );
        //            } )
        //            ->count()
        //        )
        //        {
        //            continue;
        //        }
    }

    abstract protected function match();

}
