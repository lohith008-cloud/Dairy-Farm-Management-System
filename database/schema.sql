-- Dairy Farm Management System Database Schema
-- MySQL Version 5.7+

CREATE DATABASE IF NOT EXISTS dairy_farm_db;
USE dairy_farm_db;

-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    role ENUM('admin', 'staff', 'manager') DEFAULT 'staff',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Cattle table
CREATE TABLE cattle (
    id VARCHAR(10) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    breed VARCHAR(50),
    age INT,
    status ENUM('Healthy', 'Observation', 'Under Treatment') DEFAULT 'Healthy',
    health_check_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Milk production table
CREATE TABLE milk_production (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cattle_id VARCHAR(10),
    date_recorded DATE,
    liters DECIMAL(10, 2),
    fat_percentage DECIMAL(5, 2),
    protein_percentage DECIMAL(5, 2),
    quality VARCHAR(50),
    FOREIGN KEY (cattle_id) REFERENCES cattle(id)
);

-- Inventory table
CREATE TABLE inventory (
    id INT PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    quantity DECIMAL(10, 2),
    unit VARCHAR(20),
    reorder_level INT,
    status ENUM('In Stock', 'Low Stock', 'Out of Stock'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Customers table
CREATE TABLE customers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(20),
    address TEXT
);

-- Orders table
CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    order_date DATE,
    status ENUM('Pending', 'Processing', 'Completed', 'Cancelled') DEFAULT 'Pending',
    total_amount DECIMAL(10, 2),
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);

-- Order items table
CREATE TABLE order_items (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    item_id INT,
    quantity DECIMAL(10, 2),
    unit_price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (item_id) REFERENCES inventory(id)
);

-- Sample data
INSERT INTO users (username, password, email, role) VALUES
('admin', 'admin123', 'admin@dairyfarm.com', 'admin'),
('staff1', 'staff123', 'staff1@dairyfarm.com', 'staff');

INSERT INTO cattle (id, name, breed, age, status) VALUES
('C001', 'Bessie', 'Holstein', 4, 'Healthy'),
('C002', 'Molly', 'Jersey', 3, 'Healthy'),
('C003', 'Daisy', 'Guernsey', 5, 'Observation');

INSERT INTO inventory (item_name, category, quantity, unit, reorder_level, status) VALUES
('Cattle Feed', 'Feed', 250, 'kg', 100, 'In Stock'),
('Milk Bottles', 'Supplies', 45, 'pieces', 20, 'In Stock'),
('Vaccines', 'Medicine', 15, 'vials', 10, 'In Stock');
