<?php 
// $GLOBALS['TYPO3_CONF_VARS']['DB']['database'] = getenv('MYSQL_DATABASE');
// $GLOBALS['TYPO3_CONF_VARS']['DB']['host']     = getenv('MYSQL_DB_HOST');
// $GLOBALS['TYPO3_CONF_VARS']['DB']['username'] = getenv('MYSQL_ROOT_USER');
// $GLOBALS['TYPO3_CONF_VARS']['DB']['password'] = getenv('MYSQL_ROOT_PASSWORD');

if(\TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext()->isDevelopment()) {
    foreach ($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'] as $cacheName => $cacheConfiguration) {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheName]['backend'] = \TYPO3\CMS\Core\Cache\Backend\NullBackend::class;
    }
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 1;
}
?>