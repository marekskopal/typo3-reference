<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die;

$pluginSignature = ExtensionUtility::registerPlugin('MsReference', 'Reference', 'Reference - Portfolio');
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:ms_reference/Configuration/FlexForms/FlexformReference.xml',
    $pluginSignature,
);
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.plugin, pi_flexform, pages, recursive',
    $pluginSignature,
    'after:palette:headers',
);

$pluginSignature = ExtensionUtility::registerPlugin('MsReference', 'Client', 'Reference - Clients');
ExtensionManagementUtility::addPiFlexFormValue('*', 'FILE:EXT:ms_reference/Configuration/FlexForms/FlexformClient.xml', $pluginSignature);
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.plugin, pi_flexform, pages, recursive',
    $pluginSignature,
    'after:palette:headers',
);
