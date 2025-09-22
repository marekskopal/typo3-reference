<?php

declare(strict_types=1);

use MarekSkopal\Reference\Controller\ClientController;
use MarekSkopal\Reference\Controller\ReferenceController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::configurePlugin(
    'MsReference',
    'Reference',
    [
        ReferenceController::class => 'list, show',
    ],
    [],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
);

ExtensionUtility::configurePlugin(
    'MsReference',
    'Client',
    [
        ClientController::class => 'list, show',
    ],
    [],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
);
