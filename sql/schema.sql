DROP DATABASE IF EXISTS yeticave;

CREATE DATABASE yeticave
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(128) NOT NULL UNIQUE,
    name VARCHAR(255),
    password CHAR(255) NOT NULL,
    contacts VARCHAR(255)
);

CREATE TABLE categories (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    eng_name VARCHAR(255)
);

CREATE TABLE items (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  image VARCHAR(255) DEFAULT NULL,
  first_price INT NOT NULL,
  expiry_date TIMESTAMP NOT NULL,
  step_bet INT NOT NULL,
  author_id INT,
  FOREIGN KEY (author_id) REFERENCES users(id),
  winner_id INT,
  FOREIGN KEY (winner_id) REFERENCES users(id),
  category_id INT,
  FOREIGN KEY (category_id) REFERENCES categories(id)
);

CREATE TABLE bets (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  price INT NOT NULL,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES users(id),
  item_id INT,
  FOREIGN KEY (item_id) REFERENCES items(id)
);

CREATE INDEX c_name ON categories(name);
CREATE INDEX i_name ON items(name);
