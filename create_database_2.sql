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
(1, 'jj@montclair.edu', 'sesame', 'John', 'Johnson', 'Teacher'), 
(2, 'kk@montclair.edu', 'password', 'Karen', 'King',  'Student'), 
(3, 'sd@montclair.edu', 'Duper', 'superman', 'Superman', 'Student'); 


-- Step 4: Create a database server user named "account_username" that can query database (main purpose is so it can be used in the creation of a PDO object).
-- Creates a user and grants them full privileges. 
GRANT SELECT, INSERT, DELETE, UPDATE
ON *
TO engineer@localhost
IDENTIFIED BY 'software';


