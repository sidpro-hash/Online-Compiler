sed -i "s/Listen 80/Listen ${PORT:-80}/g" /etc/apache2/ports.conf
cd "/usr/sbin" 
apache2ctl -D FOREGROUND
