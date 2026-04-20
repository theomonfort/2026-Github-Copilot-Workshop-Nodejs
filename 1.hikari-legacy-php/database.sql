-- Hikari Denki SAV Database Schema
-- Created: 2005-06-01 by Tanaka-san
-- MySQL 4.1 compatible
-- Password: hikari2005 (don't change it, it's hardcoded everywhere)

CREATE DATABASE IF NOT EXISTS hikari_sav CHARACTER SET utf8;
USE hikari_sav;

-- Contact messages from the form
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    product_ref VARCHAR(50),
    subject VARCHAR(50),
    message TEXT,
    created_at DATETIME,
    status ENUM('new', 'read', 'replied', 'closed') DEFAULT 'new'
) ENGINE=MyISAM;

-- Spare parts catalog
CREATE TABLE spare_parts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reference VARCHAR(50) NOT NULL,
    name VARCHAR(200) NOT NULL,
    name_jp VARCHAR(200),
    category VARCHAR(50),
    product_model VARCHAR(100),
    price DECIMAL(10,2),
    stock ENUM('En stock', 'Sur commande', 'Rupture') DEFAULT 'En stock',
    image_url VARCHAR(200),
    created_at DATETIME,
    updated_at DATETIME
) ENGINE=MyISAM;

-- Product registrations for warranty
CREATE TABLE product_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    serial_number VARCHAR(50) NOT NULL,
    product_name VARCHAR(200),
    product_model VARCHAR(100),
    purchase_date DATE,
    warranty_end DATE,
    customer_name VARCHAR(100),
    customer_email VARCHAR(100),
    customer_phone VARCHAR(20),
    registered_at DATETIME
) ENGINE=MyISAM;

-- Insert some demo spare parts
INSERT INTO spare_parts (reference, name, name_jp, category, product_model, price, stock, created_at) VALUES
('FZ-Y30SFE', 'Filtre HEPA de remplacement', '交換用HEPAフィルター', 'purificateur', 'IP-Y30EU', 45.00, 'En stock', NOW()),
('FZ-Y30DFE', 'Filtre de désodorisation', '脱臭フィルター', 'purificateur', 'IP-Y30EU', 32.00, 'En stock', NOW()),
('RRMCGA935WJSA', 'Télécommande LUMINA', 'LUMINAリモコン', 'televiseur', 'LM-32/40/46X600E', 28.50, 'En stock', NOW()),
('RUNTKA397WJQZ', 'Carte alimentation LCD', 'LCD電源基板', 'televiseur', 'LM-32X600E', 89.00, 'Sur commande', NOW()),
('GCOVPA206WRKZ', 'Plateau tournant micro-ondes', '電子レンジ回転皿', 'microonde', 'R-642BKW', 22.00, 'En stock', NOW()),
('PCOVPA267WREZ', 'Anneau de rotation micro-ondes', '回転リング', 'microonde', 'R-642BKW', 12.50, 'En stock', NOW()),
('UNT-Y1087DETZ', 'Module IonPure', 'IonPureイオン発生ユニット', 'purificateur', 'IP-Y30EU/IP-860E', 55.00, 'En stock', NOW());

-- Insert demo product registrations
INSERT INTO product_registrations (serial_number, product_name, product_model, purchase_date, warranty_end, customer_name, customer_email, registered_at) VALUES
('SN-2005-00142', 'LUMINA LM-32X600E', 'LM-32X600E', '2005-06-15', '2007-06-15', 'Yamada Taro', 'yamada@example.com', NOW()),
('SN-2005-00287', 'IonPure IP-Y30EU', 'IP-Y30EU', '2005-09-20', '2007-09-20', 'Suzuki Hanako', 'suzuki@example.com', NOW());
