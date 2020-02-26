<?php


namespace AnyImage\Moderation\Matchers;

class MainPageMetas extends MainPageSource
{
    protected function match()
    {
        return (new PageMetas($this->rule, $this->getDomainOfUrl($this->value)))->match();
    }

}
