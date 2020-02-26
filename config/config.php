<?php

return [

    'cache' => [
        'ttl' => [
            'download' => 3600,
            'unfurl'   => 3600,
        ],
    ],

    'download_max_size' => 1000000,

    'metas' => [
        'selectors' => [
            'meta[name="keywords"]',
            'meta[name="title"]',
            'meta[name="description"]',
            'meta[name="twitter:title"]',
            'meta[name="twitter:description"]',
            'meta[name="author"]',
            'meta[property="og:title"]',
            'meta[property="og:description"]',
        ],

    ],

];

