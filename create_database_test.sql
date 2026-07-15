-- ============================================================================
-- Step 1: Initialize Database
-- ============================================================================
DROP DATABASE IF EXISTS csit415; 
CREATE DATABASE csit415 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; 
USE csit415; 

-- ============================================================================
-- Step 2: Create Normalized Tables with Explicit Foreign Keys
-- ============================================================================

CREATE TABLE accounts ( 
   account_id    INT UNSIGNED NOT NULL AUTO_INCREMENT, 
   email_address VARCHAR(255) NOT NULL UNIQUE, 
   password      VARCHAR(255) NOT NULL, -- Expanded to 255 to safely store 60-char Bcrypt hashes
   first_name    VARCHAR(50)  NOT NULL, 
   last_name     VARCHAR(50)  NOT NULL, 
   account_type  ENUM('student', 'instructor', 'admin') NOT NULL DEFAULT 'student',
   created_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (account_id) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE courses ( 
   course_number  INT UNSIGNED NOT NULL AUTO_INCREMENT, 
   instructor_id  INT UNSIGNED NOT NULL, -- CRITICAL FIX: Relational FK instead of string name
   course_name    VARCHAR(100) NOT NULL, 
   term           VARCHAR(50)  NOT NULL, 
   days           VARCHAR(50)  NOT NULL, 
   start_end_time VARCHAR(50)  NOT NULL,
   section        VARCHAR(20)  NOT NULL,
   PRIMARY KEY (course_number),
   CONSTRAINT fk_course_instructor 
      FOREIGN KEY (instructor_id) REFERENCES accounts(account_id) 
      ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE course_roster ( 
   roster_id     INT UNSIGNED NOT NULL AUTO_INCREMENT,
   course_number INT UNSIGNED NOT NULL,
   student_id    INT UNSIGNED NOT NULL, -- CRITICAL FIX: Links to account_id instead of duplicating strings
   enrolled_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (roster_id),
   
   -- Prevent enrolling the exact same student into the exact same course twice
   UNIQUE KEY unique_enrollment (course_number, student_id),
   
   CONSTRAINT fk_roster_course 
      FOREIGN KEY (course_number) REFERENCES courses(course_number) 
      ON DELETE CASCADE ON UPDATE CASCADE,
   CONSTRAINT fk_roster_student 
      FOREIGN KEY (student_id) REFERENCES accounts(account_id) 
      ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================================
-- Step 3: Populate with Normalized Seed Data
-- ============================================================================
-- Note: Replace these legacy SHA-1 strings with password_hash($pass, PASSWORD_BCRYPT) in production
INSERT INTO accounts (account_id, email_address, password, first_name, last_name, account_type) VALUES 
(1, 'jj@montclair.edu',     '9788b833f5e94013b7e83a51a4792ea322020945', 'John',    'Johnson', 'instructor'), 
(2, 'kk@montclair.edu',     '7c6b25ee4af6db0472e5c338206a5cbae911c08b', 'Karen',   'King',    'student'), 
(3, 'sd@montclair.edu',     '8b0c689ddba0d0ebc7ab0a320635f35c0f1ae23f', 'Siperus', 'Dare',    'student'),
(4, 'bill@montclair.edu',   'ced6caf3d89c2a7ec8795de512ecb68fab24268d', 'Bill',    'Bob',     'student'),
(5, 'johnpe@montclair.edu', '11051bdbdd7cbaec855d92db2ded7cfc940b99c6', 'John',    'Pe',      'instructor');

-- Seed courses linking instructor_id directly to account_id 1 (John Johnson) and 5 (John Pe)
INSERT INTO courses (course_number, instructor_id, course_name, term, days, start_end_time, section) VALUES
(1, 1, 'Introduction to Java Programming', 'Fall 2026', 'Mon/Wed', '10:00 AM - 11:15 AM', '01'),
(2, 5, 'Database Systems & SQL',           'Fall 2026', 'Tue/Thu', '02:00 PM - 03:15 PM', '02');

-- Seed roster linking student_id directly to accounts table
INSERT INTO course_roster (roster_id, course_number, student_id) VALUES 
(1, 1, 2), -- Karen King enrolled in Course 1
(2, 1, 3), -- Siperus Dare enrolled in Course 1
(3, 2, 4); -- Bill Bob enrolled in Course 2

-- ============================================================================
-- Step 4: Create Scoped Database Server User (MySQL 8.0+ Compliant)
-- ============================================================================
DROP USER IF EXISTS 'canvas'@'localhost';

-- Explicitly separate user creation from privilege assignment
CREATE USER 'canvas'@'localhost' IDENTIFIED BY 'software';

-- Grant privileges STRICTLY to csit415 database (Never use ON *)
GRANT SELECT, INSERT, UPDATE, DELETE ON csit415.* TO 'canvas'@'localhost';

FLUSH PRIVILEGES;
