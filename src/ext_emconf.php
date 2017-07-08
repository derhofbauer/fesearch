<?php

/***************************************************************
 * Extension Manager/Repository config file for "EXT:fesearch".
 ***************************************************************/

$EM_CONF['fesearch'] = array(
    'title' => 'Frontend Search',
    'description' => 'Simple JavaScript Frontend Search',
    'category' => 'plugin',
    'author' => 'Alexander Hofbauer',
    'author_email' => 'hofbauer.alexander@gmail.com',
    'shy' => '',
    'priority' => '',
    'module' => '',
    'state' => 'alpha',
    'internal' => '',
    'uploadfolder' => 0,
    'createDirs' => '',
    'modify_tables' => '', 
    'clearCacheOnLoad' => 0,
    'lockType' => '',
    'version' => '1.0.0',
    'constraints' => array(
        'depends' => array(
            'extbase' => '*',
            'fluid' => '*',
            'typo3' => '7.6.0-7.6.99',
        ),
        'conflicts' => array(
        ),
        'suggests' => array(
        ),
    ),
    'autoload' => array(
        'psr-4' => array(
            'Derhofbauer\\Fesearch\\' => 'Classes/'
        )
    )
);

?>