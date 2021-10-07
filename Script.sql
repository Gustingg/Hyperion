/* Modelo_Logico: */

CREATE TABLE cliente (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nomeRazaoSocial VARCHAR(100) NOT null,
    cpfCnpj VARCHAR(25)  NOT null UNIQUE,
    endereco VARCHAR(80)  NOT null,
    telefone VARCHAR(80)  NOT null,
    email VARCHAR(80)  NOT null,
    senha VARCHAR(50)  NOT null
);

CREATE TABLE empresa (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    razaosocial VARCHAR(100) NOT null,
    cnpj VARCHAR(25)  NOT null UNIQUE,
    endereco VARCHAR(80)  NOT null,
    email VARCHAR(80)  NOT null,
    telefone VARCHAR(80)  NOT null,
    senha VARCHAR(50)  NOT null
);

CREATE TABLE interesses (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    interesses VARCHAR(500) NOT null,
    id_cliente INTEGER
);

CREATE TABLE categorias (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    categorias VARCHAR(500) NOT null,
    id_empresa INTEGER
);

CREATE TABLE titulo (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(500) NOT null,
    id_categorias INTEGER
);

CREATE TABLE descricao (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(500) NOT null,
    id_categorias INTEGER
);



 
ALTER TABLE interesses ADD CONSTRAINT FK_interesses_2
    FOREIGN KEY (id_cliente)
    REFERENCES cliente (id);
 
ALTER TABLE categorias ADD CONSTRAINT FK_categorias_2
    FOREIGN KEY (id_empresa)
    REFERENCES empresa (id);

ALTER TABLE titulo ADD CONSTRAINT FK_titulo_2
    FOREIGN KEY (id_categorias)
    REFERENCES categorias (id);

ALTER TABLE descricao ADD CONSTRAINT FK_descricao_2
    FOREIGN KEY (id_categorias)
    REFERENCES categorias (id);