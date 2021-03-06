#!/usr/bin/env bash

### Apache Install
sudo apt-get update
sudo apt-get install -y apache2
sudo rm -rf /var/www
sudo ln -fs /vagrant /var/www

wget -qO- 127.0.0.1

###Set Locale
update-locale LANGUAGE=de_CH.utf8 LC_MESSAGES=POSIX

ntpdate ntp.ubuntu.com



### PHP5 Install
# Add repo for latest PHP
sudo add-apt-repository -y ppa:ondrej/php5
# Update Again
sudo apt-get update
sudo apt-get install -y git-core php5 apache2 libapache2-mod-php5 php5-mysql php5-curl php5-gd php5-mcrypt php5-xdebug
sudo apt-get install libapache2-mod-php5
sudo /etc/init.d/apache2 restart

###Install Mysql
export DEBIAN_FRONTEND=noninteractive
sudo apt-get -q -y install mysql-server
sudo apt-get install php5-mysql
sudo apt-get install mysql-client-core-5.5

sed -i "$cfg['Servers'][$i]['host'] = 'db_server';" /etc/phpmyadmin/config.inc.php


### PHP Config
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini




