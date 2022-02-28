# Step 1: Create and select the database (CSIT415).
DROP DATABASE IF EXISTS CSIT415; 
CREATE DATABASE CSIT415; 
USE CSIT415; 

# Step 2: Create a table (named accounts) with multiple fields.
CREATE TABLE ACCOUNTS( 
   accountID         INT            NOT NULL   AUTO_INCREMENT, 
   email             VARCHAR(255)   NOT NULL, 
   password          VARCHAR(50)    NOT NULL, 
   firstName         VARCHAR(50)    NOT NULL, 
   lastName          VARCHAR(50)    NOT NULL, 
   account_type      VARCHAR(255)   NOT NULL,
  PRIMARY KEY (accountID) 
);

# Step 3: Populate with three users. 
INSERT INTO ACCOUNTS (accountID, email, password, firstName, lastName, account_type) VALUES 
(1, 'jj@montclair.edu', 'sesame', 'John', 'Johnson', 'Teacher'), 
(2, 'kk@montclair.edu', 'password', 'Karen', 'King', 'Student'), 
(3, 'sd@montclair.edu', 'superman', 'Superman', 'Duper', 'Student'); 

# Step 4: Create a database server user named "account_username" that can query database (main purpose is so it can be used in the creation of a PDO object).
# Grant the user full privileges. 
GRANT SELECT, INSERT, DELETE, UPDATE
ON database_name.*
TO account_username@localhost
IDENTIFIED BY 'account_user_password';



