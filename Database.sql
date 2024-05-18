CREATE DATABASE wedding_bridge;

USE wedding_bridge;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL,
    address VARCHAR(255),
    password VARCHAR(255) NOT NULL
);
