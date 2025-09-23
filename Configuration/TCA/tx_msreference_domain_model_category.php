<?php

declare(strict_types=1);

defined('TYPO3') or die;

$llPath = 'LLL:EXT:ms_reference/Resources/Private/Language/locallang_db.xlf';
$table = 'tx_msreference_domain_model_category';

return [
    'ctrl' => [
        'title' => $llPath . ':' . $table,
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
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title,subtitle,navtitle,perex,text',
        'iconfile' => 'EXT:ms_reference/Resources/Public/Icons/' . $table . '.png',
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, parent, title, subtitle, class, perex, text;;;richtext:rte_transform[mode=ts_links], images',
        ],
    ],
    'palettes' => [
        '1' => [
            'showitem' => '',
        ],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],
        'parent' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_msreference_domain_model_category',
                'foreign_table_where' => 'ORDER BY tx_msreference_domain_model_category.sorting ASC',
                'minitems' => 0,
                'maxitems' => 1,
                'items' => [
                    [
                        'label' => '',
                        'value' => 0,
                    ],
                ],
            ],
        ],
        'title' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'subtitle' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.subtitle',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'navtitle' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.navtitle',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'class' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.class',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'perex' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.perex',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'text' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.text',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'wizards' => [
                    'RTE' => [
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_rte.gif',
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                        'type' => 'script',
                        'module' => [
                            'name' => 'wizard_rte',
                        ],
                    ],
                ],
            ],
        ],
        'images' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.images',
            'config' => [
                'type' => 'file',
                'maxitems' => 99,
                'minitems' => 0,
                'allowed' => 'common-image-types',
            ],
        ],
    ],
];
