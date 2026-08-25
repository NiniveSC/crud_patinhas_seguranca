CREATE DATABASE sistema_patinhas_seguranca;
USE sistema_patinhas_seguranca;

CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(100) NOT NULL
);

CREATE TABLE animal (
    id_animal INT AUTO_INCREMENT PRIMARY KEY,
    nome_animal VARCHAR(100) NOT NULL,
    tipo_animal VARCHAR(100) NOT NULL,
    raca_animal VARCHAR(100) NOT NULL,
    idade_animal DATE NOT NULL,
    cliente_id INT NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES cliente(id_cliente)
);