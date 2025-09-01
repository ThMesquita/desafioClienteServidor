CREATE DATABASE cliente_servidor;

USE cliente_servidor;

CREATE TABLE mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conteudo VARCHAR(255) NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);