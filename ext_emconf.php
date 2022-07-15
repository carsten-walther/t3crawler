<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 't3crawler',
    'description' => 'A wrapper for crawler to let TYPO3 CLI run recursivly through sitemap.xml.',
    'category' => 'be',
    'author' => 'Carsten Walther',
    'author_email' => 'walther.carsten@web.de',
    'state' => 'stable',
    'version' => '0.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-11.5.99'
        ]
    ]
];
