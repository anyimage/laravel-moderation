<?php


namespace AnyImage\Moderation\Matchers;

class StringMatcher extends Matcher
{
    protected function match()
    {
        return $this->rule->apply($this->value);
    }
}
