-- Step 1: Create and select the database (CSIT415).
DROP DATABASE IF EXISTS csit415; 
CREATE DATABASE csit415; 
USE csit415; 

-- Step 2: Create a table (named accounts) with multiple fields.
CREATE TABLE accounts( 
   account_id        INT            NOT NULL   AUTO_INCREMENT, 
   email_address     VARCHAR(255)   NOT NULL, 
   password          VARCHAR(50)    NOT NULL,
   first_name        VARCHAR(50)    NOT NULL, 
   last_name         VARCHAR(50)    NOT NULL, 
   account_type      VARCHAR(50)    NOT NULL,
   PRIMARY KEY (account_id) 
);

-- Step 3: Populate with three users. 
INSERT INTO accounts (account_id, email_address, password, first_name, last_name,  account_type) VALUES 
(1, 'jj@montclair.edu', '6a718fbd768c2378b511f8249b54897f940e9022', 'John', 'Johnson', 'Teacher'), 
(2, 'kk@montclair.edu', '971e95957d3b74d70d79c20c94e9cd91b85f7aae', 'Karen', 'King',  'Student'), 
(3, 'sd@montclair.edu', '3f2975c819cefc686282456aeae3a137bf896ee8', 'superman', 'Superman', 'Student'); 


-- Step 4: Create a database server user named "account_username" that can query database (main purpose is so it can be used in the creation of a PDO object).
-- Creates a user and grants them full privileges. 
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO canvas@localhost
IDENTIFIED BY 'software';


