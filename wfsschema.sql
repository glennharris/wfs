-----------------------------------------------------------------
-- Create database schema required for Wiseman Financial Services
-- Online Financial Advice Web App
-- (c) 2014 
-- Author: Glenn Harris (glenn.harris@gmail.com)
-- Last Modified: 29/04/2014
------------------------------------------------------------------
CREATE DATABASE wfs;


CREATE TABLE wfs.clients (
	client_id INT AUTO_INCREMENT PRIMARY KEY,
	name_id INT
);

CREATE TABLE wfs.names (
	name_id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(50),
	last_name VARCHAR(50),
	date_of_birth DATE,
	gender INT,
	marital_status INT,
	work_status INT,
	will INT,
	power_of_attorney INT,
	contact_id INT,
);

CREATE TABLE wfs_contacts (
	contact_id INT AUTO_INCREMENT PRIMARY KEY,
	unit_number INT,
	street_number VARCHAR(10),
	street_name VARCHAR(50),
	suburb VARCHAR(50),
	state_id INT,
	country_id INT,
	email VARCHAR(50),
	phone VARCHAR(20)
);

CREATE TABLE wfs.assets(
	asset_id INT AUTO_INCREMENT PRIMARY KEY,
	asset_type_id INT,
	asset_value VARCHAR(20)
)

CREATE TABLE wfs.asset_types (
	asset_type_id INT AUTO_INCREMENT PRIMARY KEY,
	description VARCHAR(150)
)

CREATE TABLE wfs.liabilities (
	liability_id INT AUTO_INCREMENT PRIMARY KEY,
	liability_type_id INT,
	liability_value VARCHAR(20)
)

CREATE TABLE wfs.liability_types (
	liability_type_id INT AUTO_INCREMENT PRIMARY KEY,
	description VARCHAR(150)
)

CREATE TABLE wfs.incomes (
	income_id INT AUTO_INCREMENT PRIMARY KEY,
	income_type_id INT,
	income_value VARCHAR(20)
)

CREATE TABLE wfs.income_types (
	income_type_id INT AUTO_INCREMENT PRIMARY KEY,
	description VARCHAR(150)
)

CREATE TABLE wfs.health_issues (
	health_issue_id INT AUTO_INCREMENT PRIMARY KEY,
	name_id INT,
	description VARCHAR(255)
);

CREATE TABLE wfs.gender (
	gender_id INT AUTO_INCREMENT PRIMARY KEY,
	description VARCHAR(10),
	PRIMARY KEY (GENDER_ID)
);

CREATE TABLE wfs.marital_status (
	marital_status_id INT AUTO_INCREMENT PRIMARY KEY,
	description VARCHAR(20)
);

CREATE TABLE wfs.work_status (
	work_status_id INT AUTO_INCREMENT PRIMARY KEY,
	description VARCHAR(20)
);