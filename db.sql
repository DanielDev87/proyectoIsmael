-- Tabla de usuarios
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

-- Tabla de universidades
CREATE TABLE universities (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  city VARCHAR(50) NOT NULL
);

-- Tabla de carreras vinculada a universidades
CREATE TABLE careers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  university_id INT NOT NULL,
  FOREIGN KEY (university_id) REFERENCES universities(id) ON DELETE CASCADE
);


-- Insertar universidades
INSERT INTO universities (name, city) VALUES 
('Harvard University', 'Cambridge'),
('Stanford University', 'Stanford'),
('MIT', 'Cambridge');

-- Insertar carreras
INSERT INTO careers (name, university_id) VALUES
('Computer Science', 1),
('Law', 1),
('Engineering', 2),
('Business Administration', 3);


-- Insertar usuarios
INSERT INTO users (username, password) VALUES
('admin', '123456');
