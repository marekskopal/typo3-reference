<?php

declare(strict_types=1);

defined('TYPO3') or die();

$llPath = 'LLL:EXT:ms_reference/Resources/Private/Language/locallang_db.xlf';

return [
    'ctrl' => [
        'title' => $llPath . ':tx_msreference_domain_model_client',
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
        'searchFields' => 'title,class,perex,text',
        'iconfile' => 'EXT:ms_reference/Resources/Public/Icons/tx_msreference_domain_model_client.png'
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, class, perex, text;;;richtext:rte_transform[mode=ts_links], link_external, images, reference'
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
            'label' => $llPath . ':tx_msreference_domain_model_client.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true
            ]
        ],
        'class' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_client.class',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'perex' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_client.perex',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'text' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_client.text',
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
                            'name' => 'wizard_rte'
                        ]
                    ]
                ]
            ]
        ],
        'link_external' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_client.link_external',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'images' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_client.images',
            'config' => [
                'type' => 'file',
                'maxitems' => 99,
                'minitems' => 0,
                'allowed' => 'common-image-types',
            ],
        ],
        'reference' => [
            'exclude' => 1,
            'label' => $llPath . ':tx_msreference_domain_model_client.references',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_msreference_domain_model_reference',
                'foreign_table_where' => ' AND tx_msreference_domain_model_reference.sys_language_uid IN (-1, 0) ORDER BY tx_msreference_domain_model_reference.title ASC',
                'MM' => 'tx_msreference_reference_client_mm',
                'MM_opposite_field' => 'clients',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 99,
                'multiple' => 0
			]
		]
	]
];
