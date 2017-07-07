#!/bin/bash

/var/www/html/vendor/bin/typo3cms database:export --exclude-tables be_sessions,fe_sessions,sys_log,cache_md5params,cache_treelist,fe_session_data,sys_lockerecords > /setup/data/sql/dump.sql