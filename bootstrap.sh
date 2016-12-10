#!/usr/bin/env bash

# se añaden los sources de Multiuniverse(que dan acceso a muchas librerias y software privativo).
cat > /etc/apt/sources.list.d/multiverse.list << EOF
deb http://archive.ubuntu.com/ubuntu trusty multiverse
deb http://archive.ubuntu.com/ubuntu trusty-updates multiverse
deb http://security.ubuntu.com/ubuntu trusty-security multiverse
EOF

#instalacion de apache2 y php5
apt-get update
apt-get install -y apache2
apt-get install -y php5 php5-cli php5-fpm curl php5-curl php5-mcrypt php5-xdebug

#instalacion de mysql y su modulo para php
debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
apt-get install -y mysql-server mysql-client php5-mysql

#instalancion de composer

curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

#instalacion de las dependecias del proyecto symfony
cd /vagrant && composer install

if ! [ -L /var/www ]; then
  rm -rf /var/www
  ln -fs /vagrant/web /var/www
fi

#instalacion de Git
apt-get install -y git


#se añaden los colores al prompt de la linea de comandos:
echo "PS1='\n\[\033[32m\][\w]\n\[\e[1;33m\]\u\[\e[1;32m\]@\h $\[\e[0m\] '" >> /home/vagrant/.bashrc

# configurar la zona horaria correcta del server: sudo dpkg-reconfigure tzdata
# modificar el DocumentRoot para que apunte a /var/www en /etc/apache2/sites-available/000-default.conf

