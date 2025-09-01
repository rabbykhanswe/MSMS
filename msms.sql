create database msms;
use msms;


create table users(
    id int auto_increment primary key,
    first_name varchar(20),
    last_name varchar(20),
    email varchar(20) UNIQUE,
    birth_date date,
    nid bigint,
    username varchar(20) UNIQUE,
    password varchar(20)
    );
    


create table medicines(
    id int auto_increment primary key,
    name varchar(50) UNIQUE,
    groupe varchar(50),
    price decimal(10,2),
    expiry_date date,
    quantity int
);


CREATE TABLE memos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    phone BIGINT,
    customer_name VARCHAR(50),
    customer_phone VARCHAR(20) NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10,2) NOT NULL
);

CREATE TABLE memo_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    memo_id INT,
    medicine_id INT,
    quantity INT,
    price DECIMAL(10,2),
    subtotal DECIMAL(10,2),
    FOREIGN KEY (memo_id) REFERENCES memos(id) ON DELETE CASCADE,
    FOREIGN KEY (medicine_id) REFERENCES medicines(id) ON DELETE CASCADE
);
