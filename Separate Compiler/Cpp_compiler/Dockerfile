#Download base image ubuntu 18.04
FROM ubuntu:18.04

# LABEL about the custom image
LABEL maintainer="Gabu Siddharth"
LABEL version="1.1"
LABEL description="This is custom Docker Image for the Online Compiler."

#Install tzdata and set timezone.
#Update all packages run the 'apt update' command before installing any packages.
#we need to use -y flag otherwise it will ask for yes/no?
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y tzdata && apt-get install -y software-properties-common

#Install C/C++ Compiler
RUN add-apt-repository -y ppa:ubuntu-toolchain-r/test
RUN apt-get update -y && apt-get install -y gcc g++

#Install apache2 and PHP
RUN apt-get update  
RUN apt-get -y install apache2 
RUN apt-get -y install apache2-utils
RUN apt-get update -y
RUN add-apt-repository ppa:ondrej/php
#Install apache, PHP, and supplimentary programs. openssh-server, curl, and lynx-cur are for debugging the container.
RUN apt-get update && apt-get -y upgrade && DEBIAN_FRONTEND=noninteractive apt-get -y install apache2 php7.4 php7.4-mysql libapache2-mod-php7.4 curl lynx-common

# Enable apache mods.
RUN a2enmod php7.4
RUN a2enmod rewrite

#Remove any unnecessary files
RUN apt-get clean

#Setup Apache2 servers                                               
#Debian configuration requires the environment variables APACHE_RUN_USER, APACHE_RUN_GROUP, and APACHE_PID_FILE to be set
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_PID_FILE /var/run/apache2.pid
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2

#Expose ports for local not for heroku
#EXPOSE 80

#Change Permission
RUN chmod -R 777 /var/www/html/
RUN chmod -R 777 /usr/local/bin/

#Copy files to webserver 
COPY 'Cpp_compiler' /var/www/html/
COPY 'run-apache2.sh' /usr/local/bin/

# Remove Default index.html
RUN rm /var/www/html/index.html

#Start services for heroku
CMD ["run-apache2.sh"]

#Start services for local
#CMD ["/usr/sbin/apache2ctl","-D","FOREGROUND"]




