CREATE DATABASE IF NOT EXISTS crud_php
CHARACTER SET=utf8
COLLATE utf8_unicode_ci;

USE test;

CREATE TABLE IF NOT EXISTS users(
    id INT(5) NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50),
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT charset=utf8 COLLATE=utf8_unicode_ci;