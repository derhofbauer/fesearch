<?php

/*
 * Copyright notice
 *
 * (c) 2017 Alexander Hofbauer <hofbauer.alexander@gmail.com>
 *
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 */

defined('TYPO3_MODE') or die('Access denied.');

$boot = function () {
    // Register Plugin
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Derhofbauer.fesearch',
        'searchbox',
        'LLL:EXT:fesearch/Resources/Private/Language/locallang.xlf:plugin.backendTitle',
        'EXT:fesearch/ext_icon.svg'
        );

    // Add FlexForm
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['fesearch_searchbox'] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        'fesearch_searchbox',
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
