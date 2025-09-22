<?php

declare(strict_types=1);

defined('TYPO3') or die();

$llPath = 'LLL:EXT:ms_reference/Resources/Private/Language/locallang_db.xlf';

return [
    'ctrl' => [
        'title' => $llPath . ':tx_msreference_domain_model_param',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'dividers2tabs' => true,
        'sortby' => 'sorting',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden'
        ],
        'searchFields' => 'title',
        'iconfile' => 'EXT:ms_reference/Resources/Public/Icons/tx_msreference_domain_model_param.png'
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, class'
        ]
    ],
    'palettes' => [
        '1' => [
            'showitem' => ''
        ]
    ],
    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check'
            ]
        ],
        'title' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_param.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true
            ]
        ],
        'class' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_param.class',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ]
    ]
];
