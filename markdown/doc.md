
mudar a configuracao do phpmyadmin em /etc/phpmyadmin/config-db.php

apontar para a interface do docker 

mudar a porta para a mapeada ( se for 3306 da conflito ) 

/etc/init.d/apache2 restart

systemctl restart apache2

apagar com docker container prune ; docker image prune -a ; docker builder prune ; docker system prune ; 

apt-get -y install mariadb-server mariadb-common mariadb-client phpmyadmin php php-mbstring php-zip php-gd php-json php-curl ** usar socket unix ( se for laboratorio )

docker run -p 3307:3306 --name mysql -d --network <nome da rede> mysql

docker run --name phpmyadmin -p 8080:80 -d -e PMA_HOST=172.17.0.1 -e PMA_PORT=8080 --network <nome da rede> phpmyadmin

docker network create <nome da rede>

Precisa instalar o composer na maquina para criar o projeto com composer create-projet larave/laravel crude
