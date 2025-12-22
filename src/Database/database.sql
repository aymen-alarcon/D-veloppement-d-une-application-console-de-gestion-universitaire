CREATE TABLE
    users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(150) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        role ENUM ('admin', 'user') NOT NULL,
        created_at TIMESTAMP
    );

CREATE TABLE
    departments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(150) NOT NULL UNIQUE,
        created_at TIMESTAMP
    );

CREATE TABLE
    formateurs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        email VARCHAR(150) UNIQUE,
        created_at TIMESTAMP
    );

CREATE TABLE
    students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        email VARCHAR(150) UNIQUE,
        department_id INT,
        created_at TIMESTAMP,
        FOREIGN KEY (department_id) REFERENCES departments (id)
    );

CREATE TABLE
    courses (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(150) NOT NULL,
        department_id INT NOT NULL,
        formateur_id INT NOT NULL,
        created_at TIMESTAMP,
        FOREIGN KEY (department_id) REFERENCES departments (id),
        FOREIGN KEY (formateur_id) REFERENCES formateurs (id)
    );

ALTER TABLE students ADD course_id INT NULL,
ADD FOREIGN KEY (course_id) REFERENCES courses (id);