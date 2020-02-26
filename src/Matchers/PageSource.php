<?php


namespace AnyImage\Moderation\Matchers;

class PageSource extends Matcher
{
    protected function match()
    {
        $targetHtml = $this->download($this->fix_url($this->value));
        return (new StringMatcher($this->rule, $targetHtml))->match();
    }

    protected function download($url)
    {
        return cache()->remember('content_filter_download_' . $this->fix_url($url), config('moderation.cache.ttl.download', 3600), function () use ($url)
        {
            return @download($url);
        });
    }

    protected function fix_url($url)
    {
        return rtrim((((strpos($url, 'http://') === false) && (strpos($url, 'https://') === false)) ? 'http://' . $url : $url), '/');
    }

    protected function unfurl($url)
    {
        return cache()->remember('content_filter_unfurl_' . $this->fix_url($url), config('moderation.cache.ttl.unfurl', 3600), function () use ($url)
        {
            return unfurl($url)->all();
        });
    }
}
