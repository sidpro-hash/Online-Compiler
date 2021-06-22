sed -i "s/Listen 80/Listen ${PORT:-80}/g" /etc/apache2/httpd.conf
sed -i "s/User apache/User daemon/g" /etc/apache2/httpd.conf
sed -i "s/Group apache/Group daemon/g" /etc/apache2/httpd.conf
/usr/sbin/httpd -D FOREGROUND
