-- DATABASE CREATION
DROP DATABASE IF EXISTS my_cover;
CREATE DATABASE my_cover;

-- DATABASE SELECTION
USE my_cover;


-- TABLE DROP
DROP TABLE IF EXISTS news;
DROP TABLE IF EXISTS news_sources;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS categories;

-- TABLE CREATION
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(200) NOT NULL
);

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(200) NOT NULL,
    cellphone INT NOT NULL,
    fk_role_id INT DEFAULT 2,
    FOREIGN KEY (fk_role_id) REFERENCES roles(id)
);

CREATE TABLE news_sources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    fk_category_id INT,
    fk_user_id INT,
    FOREIGN KEY (fk_category_id) REFERENCES categories(id),
    FOREIGN KEY (fk_user_id) REFERENCES users(id)
);

CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    short_description VARCHAR(200) NOT NULL,
    image VARCHAR(255) NOT NULL,
    permalink VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    fk_news_sources_id INT,
    fk_user_id INT,
    fk_category_id INT,
    FOREIGN KEY (fk_news_sources_id) REFERENCES news_sources(id),
    FOREIGN KEY (fk_user_id) REFERENCES users(id),
    FOREIGN KEY (fk_category_id) REFERENCES categories(id)
);