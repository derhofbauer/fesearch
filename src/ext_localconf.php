<?php
defined('TYPO3_MODE') or die('Access denied.');

$boot = function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'DerHofbauer.fesearch',
        'Pi1',
        [],
        []
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:imgdb/Configuration/TSconfig/main.txt">');
};

$boot();
unset($boot);