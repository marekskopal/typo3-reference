<?php

declare(strict_types=1);

defined('TYPO3') or die();

$llPath = 'LLL:EXT:ms_reference/Resources/Private/Language/locallang_db.xlf';

return [
    'ctrl' => [
        'title' => $llPath . ':tx_msreference_domain_model_reference',
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
        'searchFields' => 'title,subtitle,navtitle,url,images,files,realization_date,gps_latitude,gps_longitude,text',
        'iconfile' => 'EXT:ms_reference/Resources/Public/Icons/tx_msreference_domain_model_reference.png'
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, subtitle, navtitle, important, url,realization_date, category, --palette--;GPS;gps;2,--div--;LLL:EXT:ms_reference/Resources/Private/Language/locallang_db.xlf:tx_msreference_domain_model_reference.tab_params, param_values,--div--;LLL:EXT:ms_reference/Resources/Private/Language/locallang_db.xlf:tx_msreference_domain_model_reference.tab_media, images, files, --div--;LLL:EXT:ms_reference/Resources/Private/Language/locallang_db.xlf:tx_msreference_domain_model_reference.tab_texts, perex, text,--div--;LLL:EXT:ms_reference/Resources/Private/Language/locallang_db.xlf:tx_msreference_domain_model_reference.tab_relations,clients,similar_references,--div--;LLL:EXT:ms_reference/Resources/Private/Language/locallang_db.xlf:tx_msreference_domain_model_reference.tab_seo,meta_keywords, meta_description'
        ]
    ],
    'palettes' => [
        'gps' => [
            'canNotCollapse' => true,
            'showitem' => 'gps_latitude, gps_longitude, --linebreak--, map'
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
            'label' => $llPath . ':tx_msreference_domain_model_reference.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true
            ]
        ],
        'subtitle' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.subtitle',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'navtitle' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.navtitle',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'important' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.important',
            'config' => [
                'type' => 'check'
            ]
        ],
        'url' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.url',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'images' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.images',
            'config' => [
                'type' => 'file',
                'maxitems' => 99,
                'minitems' => 0,
                'allowed' => 'common-image-types',
            ],
        ],
        'files' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.files',
            'config' => [
                'type' => 'file',
                'maxitems' => 99,
                'minitems' => 0,
                'allowed' => '*',
            ],
        ],
        'realization_date' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.realization_date',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'default' => null,
                'nullable' => true,
            ]
        ],
        'category' => [
            'exclude' => 0,
            'label' => $llPath . ':tx_msreference_domain_model_reference.category',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'tx_msreference_domain_model_category',
                'foreign_table_where' => ' AND tx_msreference_domain_model_category.sys_language_uid IN (-1, 0) ORDER BY tx_msreference_domain_model_category.uid',
                "MM" => "tx_msreference_reference_category_mm",
                'minitems' => 0,
                'maxitems' => 30,
                'renderMode' => 'tree',
                'treeConfig' => [
                    'parentField' => 'parent',
                    'appearance' => [
                        'expandAll' => true,
                        'showHeader' => true,
                        'maxLevels' => 2,
                        'nonSelectableLevels' => '0,1'
                    ]
                ]
            ]
        ],
        'param_values' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.param_values',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_msreference_domain_model_paramvalue',
                'foreign_field' => 'reference',
                'maxitems' => 999,
                'appearance' => [
                    'collapseAll' => 1,
                    'expandSingle' => 1,
                    'newRecordLinkPosition' => 'bottom',
                    'useSortable' => 1,
                    'showSynchronizationLink' => 1,
                    'showAllLocalizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                ]
            ]
        ],
        'gps_latitude' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.gps_latitude',
            'config' => [
                'type' => 'input',
                'size' => 15,
                'eval' => 'double11'
            ]
        ],
        'gps_longitude' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.gps_longitude',
            'config' => [
                'type' => 'input',
                'size' => 15,
                'eval' => 'double11'
            ]
        ],
        'map' => [
            'label' => $llPath . ':tx_msreference_domain_model_reference.gps_map',
            'config' => [
                'type' => 'none',
                'userFunc' => 'Skopal\\MsReference\\TCA\\Map->render',
                'parameters' => [
                    'latitude' => 'gps_latitude',
                    'longitude' => 'gps_longitude'
                ]
            ]
        ],
        'perex' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.perex',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'text' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.text',
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
                        'module' => [
                            'rte'
                        ],
                        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                        'type' => 'script'
                    ]
                ]
            ],
            'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]'
        ],
        'meta_keywords' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.meta_keywords',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'meta_description' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.meta_description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'current_project' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.current_project',
            'config' => [
                'type' => 'check'
            ]
        ],
        'similar_references' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.similar_references',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_msreference_domain_model_reference',
                'foreign_table_where' => ' AND tx_msreference_domain_model_reference.sys_language_uid IN (-1, 0) ORDER BY tx_msreference_domain_model_reference.title ASC',
                'MM' => 'tx_msreference_reference_similar_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 99,
                'multiple' => 0
            ]
        ],
        'clients' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_reference.clients',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_msreference_domain_model_client',
                'foreign_table_where' => ' AND tx_msreference_domain_model_client.sys_language_uid IN (-1, 0) ORDER BY tx_msreference_domain_model_client.title ASC',
                'MM' => 'tx_msreference_reference_client_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 99,
                'multiple' => 0
            ]
        ],
        'sorting' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ]
    ]
];
