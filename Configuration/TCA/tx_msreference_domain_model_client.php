<?php

declare(strict_types=1);

use Clickstorm\GoMapsExt\Evaluation\Double6Evaluator;

defined('TYPO3') or die;

$llPath = 'LLL:EXT:ms_reference/Resources/Private/Language/locallang_db.xlf';
$table = 'tx_msreference_domain_model_client';

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
        'searchFields' => 'title,class,perex,text',
        'iconfile' => 'EXT:ms_reference/Resources/Public/Icons/' . $table . '.png',
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, class, perex, text;;;richtext:rte_transform[mode=ts_links], link_external,
             --div--;' . $llPath . ':' . $table . '.tab_media, images,
             --div--;' . $llPath . ':' . $table . '.tab_contact, street, city, zip, --palette--;GPS;gps;2,,
             --div--;' . $llPath . ':' . $table . '.tab_relations, reference',
        ],
    ],
    'palettes' => [
        'gps' => [
            'canNotCollapse' => true,
            'showitem' => 'gps_latitude, gps_longitude, address, --linebreak--, map',
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
        'link_external' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.link_external',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
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
        'reference' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.references',
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
                'multiple' => 0,
            ],
        ],
        'city' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'street' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.street',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'zip' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.zip',
            'config' => [
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim',
            ],
        ],
        'gps_latitude' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.gps_latitude',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,' . Double6Evaluator::class,
            ],
        ],
        'gps_longitude' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.gps_longitude',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,' . Clickstorm\GoMapsExt\Evaluation\Double6Evaluator::class,
            ],
        ],
        'address' => [
            'exclude' => 1,
            'label' => $llPath . ':' . $table . '.address',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'map' => [
            'label' => $llPath . ':' . $table . '.gps_map',
            'config' => [
                'type' => 'user',
                'renderType' => 'GomapsextMapElement',
                'parameters' => [
                    'longitude' => 'gps_latitude',
                    'latitude' => 'gps_longitude',
                    'address' => 'address',
                    'street' => 'street',
                    'zip' => 'zip',
                    'city' => 'city',
                ],
            ],
        ],
    ],
];
