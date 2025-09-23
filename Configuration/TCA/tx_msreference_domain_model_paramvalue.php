<?php

declare(strict_types=1);

defined('TYPO3') or die();

$llPath = 'LLL:EXT:ms_reference/Resources/Private/Language/locallang_db.xlf';
$table = 'tx_msreference_domain_model_paramvalue';

return [
    'ctrl' => [
        'title' => $llPath . ':' . $table,
        'label' => 'param_value',
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
        'searchFields' => 'param_value',
        'hideTable' => true,
        'iconfile' => 'EXT:ms_reference/Resources/Public/Icons/' . $table . '.png'
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, param, param_value'
        ]
    ],
    'palettes' => [
        '1' => [
            'showitem' => ''
        ]
    ],
    'columns' => [
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check'
            ]
        ],
        'param' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.param',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_msreference_domain_model_param',
                'foreign_table_where' => ' AND tx_msreference_domain_model_param.sys_language_uid IN (-1, 0) ORDER BY tx_msreference_domain_model_param.sorting',
                'size' => 1,
                'maxitems' => 1
            ]
        ],
        'param_value' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.param_value',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'reference' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ]
    ]
];
