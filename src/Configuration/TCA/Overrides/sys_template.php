<?php
defined('TYPO3_MODE') or die('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'fesearch',
    'Configuration/TypoScript',
    'FE Search'
    );