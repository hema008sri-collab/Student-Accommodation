CREATE DATABASE IF NOT EXISTS student_accommodation;
USE student_accommodation;

CREATE TABLE IF NOT EXISTS properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    type ENUM('PG', 'Flat', 'Hostel') NOT NULL,
    rent DECIMAL(10, 2) NOT NULL,
    location VARCHAR(255) NOT NULL,
    sharing VARCHAR(50) NOT NULL,
    image_url VARCHAR(255) DEFAULT 'https://via.placeholder.com/300x200'
);

INSERT INTO properties (title, type, rent, location, sharing, image_url) VALUES
('Luxury PG for Men', 'PG', 8500.00, 'Dundigal', '2 Sharing', 'https://images.unsplash.com/photo-1555854877-bab0e564b8d5?w=500'),
('Cozy 2BHK Apartment', 'Flat', 15000.00, 'Bachupally', 'Entire Flat', 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=500'),
('Comfort Girls Hostel', 'Hostel', 6000.00, 'Dundigal', '3 Sharing', 'https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?w=500'),
('Modern Student PG', 'PG', 7500.00, 'Kukatpally', '2 Sharing', 'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=500');