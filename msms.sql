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


INSERT INTO medicines (name, groupe, price, expiry_date, quantity) VALUES
('Paracetamol', 'Analgesic', 2.50, '2026-05-01', 150),
('Amoxicillin', 'Antibiotic', 8.00, '2026-03-15', 100),
('Ibuprofen', 'NSAID', 3.20, '2026-07-20', 200),
('Cetirizine', 'Antihistamine', 1.80, '2026-08-10', 180),
('Metformin', 'Antidiabetic', 5.50, '2027-01-05', 120),
('Atorvastatin', 'Statin', 6.75, '2027-02-25', 90),
('Omeprazole', 'Proton Pump Inhibitor', 4.30, '2026-11-30', 140),
('Azithromycin', 'Antibiotic', 9.50, '2026-09-12', 80),
('Losartan', 'Antihypertensive', 7.10, '2027-04-18', 110),
('Aspirin', 'NSAID', 2.20, '2026-12-22', 160),
('Ranitidine', 'Antacid', 3.90, '2026-06-14', 130),
('Salbutamol', 'Bronchodilator', 4.80, '2026-10-05', 100),
('Clopidogrel', 'Antiplatelet', 6.40, '2027-03-08', 95),
('Diclofenac', 'NSAID', 2.90, '2026-08-25', 175),
('Levothyroxine', 'Thyroid Hormone', 5.00, '2027-01-20', 105),
('Furosemide', 'Diuretic', 3.30, '2026-09-30', 115),
('Doxycycline', 'Antibiotic', 7.25, '2026-12-05', 85),
('Montelukast', 'Antiasthmatic', 5.60, '2027-02-14', 90),
('Hydroxychloroquine', 'Antimalarial', 8.40, '2026-11-02', 70),
('Insulin', 'Antidiabetic', 12.50, '2026-07-07', 60);
