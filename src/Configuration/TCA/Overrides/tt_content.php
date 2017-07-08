<?php
defined('TYPO3_MODE') or die('Access denied.');

$boot = function() {
    // Register Plugin
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'fesearch',
        'fesearch',
        'LLL:EXT:fesearch/Resources/Private/Language/locallang.xlf:plugin.backendTitle',
        'EXT:fesearch/Resources/Public/Icons/image.svg'
        );

    // Add FlexForm
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['fesearch_fesearch'] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        'fesearch_fesearch',
        'FILE:EXT:fesearch/Configuration/FlexForms/FesearchPlugin.xml'
        );

    // Add "Exclude from Fesearch" Checkbox to all tt_contents
    // $temporaryColumns = [
    //     'tx_fesearch_excludeFromFesearch' => array(
    //         'exclude' => 0,
    //         'label' => 'LLL:EXT:fesearch/Resources/Private/Language/locallang.xlf:tt_content.excludeFromFesearch',
    //         'config' => array(
    //             'type' => 'check'
    //         )
    //     )
    // ];
    // \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    //     'tt_content',
    //     $temporaryColumns
    // );
    // \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    //     'tt_content',
    //     'tx_fesearch_excludeFromFesearch'
    // );
};

$boot();
unset($boot);