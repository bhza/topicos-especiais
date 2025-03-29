
mudar a configuracao do phpmyadmin em /etc/phpmyadmin/config-db.php

apontar para a interface do docker 

mudar a porta para a mapeada ( se for 3306 da conflito ) 

/etc/init.d/apache2 restart

systemctl restart apache2

apagar com docker container prune ; docker image prune -a ; docker builder prune ; docker system prune ; 

apt-get -y install mariadb-server mariadb-common mariadb-client phpmyadmin php php-mbstring php-zip php-gd php-json php-curl ** usar socket unix ( se for laboratorio )


