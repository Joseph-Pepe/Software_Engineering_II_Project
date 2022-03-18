# Step 1: Create and select the database (CSIT415).
DROP DATABASE IF EXISTS CSIT415; 
CREATE DATABASE CSIT415; 
USE CSIT415; 

# Step 2: Create a table (named accounts) with multiple fields.
CREATE TABLE ACCOUNTS( 
   accountID         INT            NOT NULL   AUTO_INCREMENT, 
   first_name        VARCHAR(50)    NOT NULL, 
   last_name         VARCHAR(50)    NOT NULL, 
   email             VARCHAR(255)   NOT NULL, 
   password          VARCHAR(50)    NOT NULL, 
   account_type      VARCHAR(50)    NOT NULL,
  PRIMARY KEY (accountID) 
);

# Step 3: Populate with three users. 
INSERT INTO ACCOUNTS (accountID, first_name, last_name, email, password, account_type) VALUES 
(1, 'John', 'Johnson','jj@montclair.edu', 'sesame', 'Teacher'), 
(2, 'Karen', 'King', 'kk@montclair.edu', 'password', 'Student'), 
(3, 'superman', 'Superman', 'sd@montclair.edu', 'Duper', 'Student'); 


# Step 4: Create a database server user named "account_username" that can query database (main purpose is so it can be used in the creation of a PDO object).
# Creates a user and grants them full privileges. 
GRANT SELECT, INSERT, DELETE, UPDATE
ON database_name.*
TO account_username@localhost
IDENTIFIED BY 'account_user_password';


