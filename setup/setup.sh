#!/bin/bash

EXT_KEY='fesearch'
TYPO3CMS_PATH='vendor/bin/typo3cms'

apt update
# apt upgrade -y
apt install -y \
    git-core \
    zip \
    mysql-client \
    libjpeg-dev \
    libpng-dev \
    libxpm-dev \
    libfreetype6-dev \
    libxml2-dev \
    imagemagick \
    nano

# Install & enable MySQLi
MYSQLI_INSTALLED=`php -i | grep mysqli`
if [[ -z $MYSQLI_INSTALLED ]]; then
    docker-php-ext-install mysqli
fi

GD_INSTALLED=`php -i | grep gd`
if [[ -z $GD_INSTALLED ]]; then
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-xpm-dir=/usr/
    docker-php-ext-install gd
fi

ZIP_INSTALLED=`php -i | grep 'zip'`
if [[ -z $ZIP_INSTALLED ]]; then
    docker-php-ext-install zip
fi

SOAP_INSTALLED=`php -i | grep soap`
if [[ -z $SOAP_INSTALLED ]]; then
    docker-php-ext-install soap
fi

# Install Composer
if [[ ! -f "/usr/local/bin/composer" ]]; then
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
fi

if [[ -f composer.json ]]; then
    rm composer.json
fi
ln -s /setup/root_composer.json composer.json

if [[ -d "vendor" ]]; then
    composer update
else
    composer install

    chmod 777 . -R
    echo "install:generatepackagestates"
    $TYPO3CMS_PATH install:generatepackagestates
    chmod 777 . -R
    echo "install:fixfolderstructure"
    $TYPO3CMS_PATH install:fixfolderstructure
    chmod 777 . -R

    echo "install:setup"
    $TYPO3CMS_PATH install:setup --non-interactive --force --database-user-name="root" --database-user-password="password" --database-host-name="mariadb" --database-port="3306" --database-name="typo3" --use-existing-database="typo3" --admin-user-name="admin" --admin-password="password" --site-name="EXT:fesearch" --site-setup-type="site"
    
    if [[ -f "/setup/data/sql/dump.sql" ]]; then
        echo "Database Import"
        cat /setup/data/sql/dump.sql | $TYPO3CMS_PATH database:import

        if [[ -d web/fileadmin/testfiles ]]; then
            rm web/fileadmin/testfiles -R
            ln -s /setup/data/typo3/testfiles web/fileadmin/testfiles
        fi
    fi
fi

if [[ -f web/typo3conf/AdditionalConfiguration.php ]]; then
    rm web/typo3conf/AdditionalConfiguration.php
fi
ln -s /setup/data/typo3/AdditionalConfiguration.php web/typo3conf/AdditionalConfiguration.php


if [[ ! -d web/typo3conf/ext/$EXT_KEY ]]; then
    ln -s /src/ web/typo3conf/ext/$EXT_KEY
fi

rm web/.htaccess
cp vendor/typo3/cms/_.htaccess web/.htaccess -f

chmod 777 /var/www -R
chown www-data:www-data -R /var/www

$TYPO3CMS_PATH extension:activate --extension-keys=$EXT_KEY