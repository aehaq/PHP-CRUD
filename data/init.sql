DROP DATABASE IF EXISTS simplecrud_php_aeh;

CREATE DATABASE simplecrud_php_aeh;

USE simplecrud_php_aeh;

CREATE TABLE users (
    id INT (11) AUTO_INCREMENT NOT NULL,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    location VARCHAR(100) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);