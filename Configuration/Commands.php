<?php

return [
    't3crawler:crawl' => [
        'class' => \Walther\T3crawler\Command\CrawlerCommand::class,
        'schedulable' => true,
    ],
];
