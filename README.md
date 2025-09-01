Diferença ubuntu para amazon linux
Criei um par de chaves igual o passo a passo do amazon linux

instalei o git (sudo apt update, sudo apt install git)
clonei o projeto na instancia (git clone <meu_repositorio>)
entrei no projeto com o comando cd
entrei no servidor com cd
instalei o php sudo apt install php8.3-cli
install maria db sudo apt install mariadb-server mariadb-client -y
sudo systemctl start mariadb
sudo systemctl enable mariadb
sudo mysql_secure_installation(dei yes para tudo)

entrei no prompt do mariaDb(sudo mysql -u root -p)

criei o banco

CREATE DATABASE cliente_servidor;
USE cliente_servidor;

CREATE TABLE mensagens (
id INT AUTO_INCREMENT PRIMARY KEY,
conteudo VARCHAR(255) NOT NULL,
data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
EXIT;

instalei o apache (sudo apt update
sudo apt install apache2 php libapache2-mod-php -y
)

removi a página principal do apache /var/www/html/index.html
(sudo rm index.html)
