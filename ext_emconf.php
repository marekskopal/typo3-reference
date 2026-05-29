<?php

declare(strict_types=1);

$EM_CONF[$_EXTKEY] = [
    'title' => 'Reference',
    'description' => '',
    'category' => 'plugin',
    'author' => 'Marek Skopal',
    'author_email' => 'skopal.marek@gmail.com',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-14.3.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
];
