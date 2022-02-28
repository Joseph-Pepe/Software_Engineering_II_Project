# Step 1: Create and select the database (CSIT415).
DROP DATABASE IF EXISTS CSIT415; 
CREATE DATABASE CSIT415; 
USE CSIT101; 

# Step 2: Create a table (named administrator) with five fields.
CREATE TABLE administrators( 
   adminID           INT            NOT NULL   AUTO_INCREMENT, 
   email             VARCHAR(255)   NOT NULL, 
   password          VARCHAR(255)   NOT NULL, 
   firstName         VARCHAR(255)   NOT NULL, 
   lastName          VARCHAR(255)   NOT NULL, 
  PRIMARY KEY (adminID) 
);

# Step 3: Populate with three users. 
INSERT INTO administrators (adminID, email, password, firstName, lastName) VALUES 
(1, 'jj@gmail.com', 'sesame', 'John', 'Johnson'), 
(2, 'kk@gmail.com', 'password', 'Karen', 'King'), 
(3, 'sd@gmail.com', 'superman', 'Superman', 'Duper'); 

# Step 4: Create a user named "account_username" that can query database (main purpose is so it can be used in the creation of a PDO object).
# Grant the user full privileges. 
GRANT SELECT, INSERT, DELETE, UPDATE
ON database_name.*
TO account_username@localhost
IDENTIFIED BY 'account_user_password';



