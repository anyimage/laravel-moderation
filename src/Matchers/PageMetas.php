<?php


namespace AnyImage\Moderation\Matchers;

use Symfony\Component\DomCrawler\Crawler;

class PageMetas extends PageSource
{
    protected function match()
    {
        $targetHtml = $this->download($this->value);
        return (new StringMatcher($this->rule, $this->getMetas($targetHtml)))->match();
    }

    public function getMetas($html)
    {
        if (strpos($html, '</html>') === false) {
            return false;
        }

        if (strlen($html) > config('moderation.download_max_size', 10000)) {
            return false;
        }

        $metastrings = collect();
        $crawler = new Crawler($html);
        $crawler->filter('title')->each(function ($tag) use ($metastrings)
        {
            $metastrings->push($tag->text());
        });
        $selectors = collect(config('moderation.metas.selectors', []))->implode(',');
        $crawler->filter($selectors)->each(function ($tag) use ($metastrings)
        {
            $metastrings->push($tag->attr('content'));
        });

        $metas = $metastrings->map(function ($v)
        {
            return strtolower($v);
        })->implode(' ');

        return $metas;
    }
}
