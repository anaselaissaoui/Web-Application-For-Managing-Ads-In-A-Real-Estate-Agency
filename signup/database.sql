DROP DATABASE IF EXISTS gestimmo;

CREATE DATABASE gestimmo;

USE gestimmo;


CREATE TABLE client (
    id_client  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name,    VARCHAR(50),
    last_name,  VARCHAR(20),
    email,   VARCHAR(20),
    num_tel,     VARCHAR(20),
    password,    VARCHAR(20),
    Confirm_Password VARCHAR(20) 
    
);


CREATE TABLE  Annonce(
    id_annonce  INT NOT NULL  AUTO_INCREMENT,
    titre VARCHAR(20),
    prix  DECIMAL,
    date_pub DATE,
    id_client INT,
    date_dern_modif DATE,
    adresse VARCHAR(40),
    category VARCHAR(20),
    type VARCHAR(20),
    PRIMARY KEY (id_annonce),
    FOREIGN KEY (id_client) REFERENCES client(id_client)
    
    
);

CREATE TABLE  images(
    id_images INT NOT NULL  AUTO_INCREMENT,
    image VARCHAR(500),
    est_principale BOOLEAN,
    id_annonce INT,
    PRIMARY KEY (id_images),
FOREIGN KEY (id_annonce) REFERENCES annonce(id_annonce)
);