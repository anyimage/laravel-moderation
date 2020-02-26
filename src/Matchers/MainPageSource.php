<?php


namespace AnyImage\Moderation\Matchers;

class MainPageSource extends PageSource
{
    protected function match()
    {
        return (new PageSource($this->rule, $this->getDomainOfUrl($this->value)))->match();
    }

    protected function getDomainOfUrl($url)
    {
        return parse_url($this->fix_url($url), PHP_URL_HOST);
    }

}
