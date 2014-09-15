#!/usr/bin/env bash

export DEBIAN_FRONTEND=noninteractive

#update portage
apt-get update
#install important stuff
apt-get install vim

#install php and apache
apt-get install -y apache2-mpm-prefork php5 php5-curl php5-dev php5-gd php5-idn php5-imagick php5-imap php5-mysql php5-mcrypt
a2enmod suexec rewrite ssl actions include vhost_alias

#install xdebug
apt-get install php5-xdebug

#install db
apt-get -q -y install mysql-server
mysqladmin -u root password toor
cp /vagrant/config/phpMyAdmin/config.inc.php /var/www/phpMyAdmin

#setup db
mysql -uroot -ptoor < "/vagrant/config/mysql/db_user.sql"


#link for default webroot
#ln -fs /vagrant/src /var/www/src

#apache config
sudo a2dissite default

cp /vagrant/config/apache/web /etc/apache2/sites-available/web
a2ensite web
cp /vagrant/config/apache/phpMyAdmin /etc/apache2/sites-available/phpMyAdmin
a2ensite phpMyAdmin

#config xdebug
cp /vagrant/config/apache/xdebug.ini /etc/php5/conf.d/




#install phpmyadmin
apt-get install unzip
wget http://downloads.sourceforge.net/project/phpmyadmin/phpMyAdmin/4.0.6/phpMyAdmin-4.0.6-all-languages.zip
unzip phpMyAdmin-4.0.6-all-languages.zip
mv phpMyAdmin-4.0.6-all-languages/ /var/www/phpMyAdmin/
cp /vagrant/config/phpMyAdmin/config.inc.php /var/www/phpMyAdmin/config.inc.php
chown www-data /var/www/phpMyAdmin -R
chmod 775 /var/www/phpMyAdmin -R

/etc/init.d/apache2 restart