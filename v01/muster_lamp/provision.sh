#!/bin/bash

if [[ ! -d /.provision ]]; then
    mkdir /.provision
fi

if [[ -f /tmp/vagrant-shell ]]; then
	# VAGRANT ONLY!
	#ln -fs /vagrant/conf /tmp/conf
	mkdir -p /tmp/conf/
	cp -rv /vagrant/conf/* /tmp/conf/
fi

if [[ ! -f /.provision/initial ]]; then

    apt-get update >/dev/null
	apt-get upgrade >/dev/null
	hostname start.lamp
    apt-get install -y libcurl3 libcurl4-gnutls-dev >/dev/null
    apt-get install -y git-core
    apt-get install -y vim
    apt-get install -y python-software-properties

    touch /.provision/initial
fi

if [[ ! -f /.provision/localize ]]; then
    
	echo "Europe/Zurich" > /etc/timezone
	dpkg-reconfigure -f noninteractive tzdata
	locale-gen de_CH.UTF-8
	locale-gen fr_CH.UTF-8
	locale-gen it_CH.UTF-8
	dpkg-reconfigure locales -plow
	update-locale LANG=ch_DE.UTF-8 LC_TIME=ch_DE.UTF-8 LC_MESSAGES=POSIX

    touch /.provision/localize
fi

if [[ ! -f /.provision/apache ]]; then

	apt-get install -y apache2-mpm-prefork php5 php5-curl php5-dev php5-gd php5-idn php5-imagick php5-imap \
	php5-cli php5-mysql php5-sqlite php5-xcache php5-mcrypt php5-xsl php5-intl php5-xdebug
	a2enmod suexec rewrite ssl actions include vhost_alias
	make-ssl-cert generate-default-snakeoil
	cat /tmp/conf/httpd.conf > /etc/apache2/httpd.conf
	ln -fs /fhl_dev /var/www/vhosts
	chown -R www-data:www-data /var/www/vhosts
	service apache2 restart

    touch /.provision/apache
fi

if [[ ! -f /.provision/php54 ]]; then

	add-apt-repository -y ppa:ondrej/php5-oldstable
	apt-get update >/dev/null
	apt-get install -y php5
	
	cat /tmp/conf/php.ini > /etc/php5/apache2/php.ini
	mkdir /var/lib/php5/session
	chown www-data:www-data /var/lib/php5/session
	cat /tmp/conf/xcache.ini > /etc/php5/apache2/conf.d/xcache.ini
	cat /tmp/conf/xdebug.ini > /etc/php5/apache2/conf.d/20-xdebug.ini

	service apache2 restart

    touch /.provision/php54
fi

if [[ ! -f /.provision/pear ]]; then
	apt-get install php-pear
	service apache2 restart
    touch /.provision/pear
fi

if [[ ! -f /.provision/phing ]]; then
	pear channel-discover pear.phing.info
	pear install [--alldeps] phing/phing
	service apache2 restart
    touch /.provision/phing
fi

if [[ ! -f /.provision/composer ]]; then
	curl -sS https://getcomposer.org/installer | php
	mv composer.phar /usr/local/bin/composer
    touch /.provision/composer
fi

if [[ ! -f /.provision/mysql ]]; then

	debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password root'
	debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password root'
	apt-get install -y mysql-server-5.5
	
	mkdir /var/www/phpmyadmin
	git clone --depth=1 https://github.com/phpmyadmin/phpmyadmin.git /var/www/phpmyadmin
	git --git-dir=/var/www/phpmyadmin/.git checkout tags/RELEASE_4_2_3
	cat /tmp/conf/pma.conf.php > /var/www/phpmyadmin/config.inc.php
	mysql -u root -proot < /var/www/phpmyadmin/examples/create_tables.sql 

	chown -R www-data:www-data /var/www/phpmyadmin

    touch /.provision/mysql
fi

# if [[ ! -f /.provision/openjdk ]]; then

# 	apt-get install -y openjdk-7-jdk
# 	# tuning für neo4j
# 	echo "vagrant		soft     nofile  40000" >> /etc/security/limits.conf
# 	echo "vagrant		hard     nofile  40000" >> /etc/security/limits.conf
# 	echo "session    required   pam_limits.so" >> /etc/pam.d/su
# 	mkdir -p /var/neo4j/data/graph.db
# 	chown -R vagrant:www-data /var/neo4j/

#     touch /.provision/openjdk
# fi
