CREATE DATABASE sms_project;
USE sms_project;

-- USERS (Admin login)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- STUDENTS
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(20)
);

-- COURSES
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    course_code VARCHAR(20) UNIQUE
);

-- ENROLLMENTS (Many-to-Many)
CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    course_id INT,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

-- DEFAULT ADMIN USER (password: 123456)
INSERT INTO users (username, password)
VALUES ('admin', '$2y$10$wH6F9n6H5kQ9Qv8J6fJ0RO6Qy6Y5ZxWZ6zQ0qzJ8Z8z6Z6Z6Z6Z6');