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

CREATE TABLE class_roster( 
   
);

CREATE TABLE courses( 
   course_number     INT            NOT NULL   AUTO_INCREMENT, 
   instructor        VARCHAR(50)    NOT NULL, 
   term              VARCHAR(50)    NOT NULL, 
   days              VARCHAR(50)    NOT NULL, 
   class_name        VARCHAR(50)    NOT NULL, 
   start_time        VARCHAR(50)    NOT NULL,
   end_time          VARCHAR(50)    NOT NULL,
   start_date        VARCHAR(50)    NOT NULL,
   end_date          VARCHAR(50)    NOT NULL,
   section           VARCHAR(50)    NOT NULL,
   PRIMARY KEY (course_number) 
);

-- Step 3: Populate with three users. 
INSERT INTO accounts (account_id, email_address, password, first_name, last_name,  account_type) VALUES 
(1, 'jj@montclair.edu', 'cretas', 'John', 'Johnson', 'Teacher'), 
(2, 'kk@montclair.edu', 'sesame', 'Karen', 'King',  'Student'), 
(3, 'sd@montclair.edu', 'guard', 'superman', 'Superman', 'Student'); 


-- Step 4: Create a database server user named "account_username" that can query database (main purpose is so it can be used in the creation of a PDO object).
-- Creates a user and grants them full privileges. 
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO canvas@localhost
IDENTIFIED BY 'software';


