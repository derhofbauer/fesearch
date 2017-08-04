<?php
defined('TYPO3_MODE') or die('Access denied.');

$boot = function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Derhofbauer.fesearch',
        'searchbox',
        [
            'Static' => 'searchbox'
        ],
        []
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:fesearch/Configuration/PageTSconfig/main.txt">');
};

$boot();
unset($boot);