﻿--
-- Script was generated by Devart dbForge Studio 2019 for MySQL, Version 8.2.23.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 19.04.2020 17:30:55
-- Server version: 5.5.5-10.3.13-MariaDB-log
-- Client version: 4.1
--

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE stanki;

--
-- Drop table `nakladnaya`
--
DROP TABLE IF EXISTS nakladnaya;

--
-- Drop table `stanok`
--
DROP TABLE IF EXISTS stanok;

--
-- Drop table `detal`
--
DROP TABLE IF EXISTS detal;

--
-- Drop table `sklad`
--
DROP TABLE IF EXISTS sklad;

--
-- Drop table `user`
--
DROP TABLE IF EXISTS user;

--
-- Drop table `type_stanok`
--
DROP TABLE IF EXISTS type_stanok;

--
-- Set default database
--
USE stanki;

--
-- Create table `type_stanok`
--
CREATE TABLE type_stanok (
  type_id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  PRIMARY KEY (type_id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `user`
--
CREATE TABLE user (
  user_id int(11) NOT NULL AUTO_INCREMENT,
  FIO varchar(155) DEFAULT NULL,
  PRIMARY KEY (user_id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `sklad`
--
CREATE TABLE sklad (
  sklad_id int(11) NOT NULL AUTO_INCREMENT,
  numder int(11) DEFAULT NULL,
  adres varchar(55) DEFAULT NULL,
  S int(11) DEFAULT NULL,
  PRIMARY KEY (sklad_id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `detal`
--
CREATE TABLE detal (
  detal_id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  cena int(11) DEFAULT NULL,
  PRIMARY KEY (detal_id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `stanok`
--
CREATE TABLE stanok (
  stanok_id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  type_id int(11) DEFAULT NULL,
  date_start date DEFAULT NULL,
  srok_e int(11) DEFAULT NULL,
  date_close date DEFAULT NULL,
  detal_id int(11) DEFAULT NULL,
  PRIMARY KEY (stanok_id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create foreign key
--
ALTER TABLE stanok
ADD CONSTRAINT FK_stanok_detal_detal_id FOREIGN KEY (detal_id)
REFERENCES detal (detal_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE stanok
ADD CONSTRAINT FK_stanok_type_stanok_type_id FOREIGN KEY (type_id)
REFERENCES type_stanok (type_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `nakladnaya`
--
CREATE TABLE nakladnaya (
  nakladnaya_id int(11) NOT NULL AUTO_INCREMENT,
  data_p date DEFAULT NULL,
  sklad_id int(11) DEFAULT NULL,
  detal_id int(11) DEFAULT NULL,
  user_id int(11) DEFAULT NULL,
  PRIMARY KEY (nakladnaya_id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create foreign key
--
ALTER TABLE nakladnaya
ADD CONSTRAINT FK_nakladnaya_detal_detal_id FOREIGN KEY (detal_id)
REFERENCES detal (detal_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE nakladnaya
ADD CONSTRAINT FK_nakladnaya_sklad_sklad_id FOREIGN KEY (sklad_id)
REFERENCES sklad (sklad_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE nakladnaya
ADD CONSTRAINT FK_nakladnaya_user_user_id FOREIGN KEY (user_id)
REFERENCES user (user_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Dumping data for table type_stanok
--
-- Table stanki.type_stanok does not contain any data (it is empty)

-- 
-- Dumping data for table user
--
-- Table stanki.user does not contain any data (it is empty)

-- 
-- Dumping data for table sklad
--
-- Table stanki.sklad does not contain any data (it is empty)

-- 
-- Dumping data for table detal
--
-- Table stanki.detal does not contain any data (it is empty)

-- 
-- Dumping data for table stanok
--
-- Table stanki.stanok does not contain any data (it is empty)

-- 
-- Dumping data for table nakladnaya
--
-- Table stanki.nakladnaya does not contain any data (it is empty)

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;