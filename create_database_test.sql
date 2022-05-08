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
   course_number     INT            NOT NULL,
   instructor        VARCHAR(50)    NOT NULL,
   section           VARCHAR(50)    NOT NULL,
   term              VARCHAR(50)    NOT NULL, 
   days              VARCHAR(50)    NOT NULL, 
   course_name       VARCHAR(50)    NOT NULL,
   students          VARCHAR(500)   NOT NULL,
);

CREATE TABLE courses( 
   course_number     INT            NOT NULL   AUTO_INCREMENT, 
   instructor        VARCHAR(50)    NOT NULL, 
   term              VARCHAR(50)    NOT NULL, 
   days              VARCHAR(50)    NOT NULL, 
   course_name       VARCHAR(50)    NOT NULL, 
   start_end_time    VARCHAR(50)    NOT NULL,
   section           VARCHAR(50)    NOT NULL,
   PRIMARY KEY (course_number) 
);

-- Step 3: Populate with three users. 
INSERT INTO accounts (account_id, email_address, password, first_name, last_name,  account_type) VALUES 
(1, 'jj@montclair.edu', '9788b833f5e94013b7e83a51a4792ea322020945', 'John', 'Johnson', 'instructor'), 
(2, 'kk@montclair.edu', '7c6b25ee4af6db0472e5c338206a5cbae911c08b', 'Karen', 'King',  'student'), 
(3, 'sd@montclair.edu', '8b0c689ddba0d0ebc7ab0a320635f35c0f1ae23f', 'Siperus', 'Dare', 'student'); 
(4, 'bill@montclair.edu', 'ced6caf3d89c2a7ec8795de512ecb68fab24268d', 'Bill', 'Bob', 'student'); 
(5, 'johnpe@montclair.edu', '11051bdbdd7cbaec855d92db2ded7cfc940b99c6', 'John', 'Pe', 'instructor');

-- Step 4: Populate with three users. 
INSERT INTO courses (course_number, instructor, term, days, course_name, start_end_time,  section) VALUES 
(1, 'John Pe', 'fall (08/01/22 - 12/10/22)', '[mon, fri]', 'Software Engineering II', '01'),
(2, 'John Pe', 'fall (08/01/22 - 12/10/22)', '[mon, fri]', 'Software Engineering I', '01'),

-- Step 5: Create a database server user named "account_username" that can query database (main purpose is so it can be used in the creation of a PDO object).
-- Creates a user and grants them full privileges. 
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO canvas@localhost
IDENTIFIED BY 'software';


