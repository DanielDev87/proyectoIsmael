CREATE DATABASE IF NOT EXISTS mydatabase CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

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
  area VARCHAR(100) NOT NULL,
  university_id INT NOT NULL,
  approx_price DECIMAL(10, 2),
  FOREIGN KEY (university_id) REFERENCES universities(id) ON DELETE CASCADE
);

-- Insertar universidades
INSERT INTO universities (name, city) VALUES 
('Universidad de Antioquia', 'Medellin'),
('Universidad Nacional de Colombia', 'Medellin'),
('Universidad EAFIT', 'Medellin'),
('Universidad Pontificia Bolivariana', 'Medellin'),
('Instituto Tecnologico Pascual Bravo', 'Medellin'),
('Politécnico Jaime Isaza Cadavid', 'Medellin'),
('Colegio Mayor de Antioquia', 'Medellin'),
('Universidad de Medellin', 'Medellin'),
('Universidad Lasallista', 'Medellin'),
('Tecnologico de Antioquia', 'Medellin');

-- Insertar carreras con áreas y precios aproximados
INSERT INTO careers (name, area, university_id, approx_price) VALUES
('Ingenieria de Sistemas', 'Ingenieria', 1, 8500000),
('Medicina', 'Salud', 1, 12000000),
('Derecho', 'Humanidades', 1, 8000000),
('Ingenieria Civil', 'Ingenieria', 2, 9500000),
('Arquitectura', 'Ingenieria', 2, 10000000),
('Biologia', 'Ciencias', 2, 7000000),
('Administracion de Empresas', 'Negocios', 3, 11000000),
('Ingenieria de Produccion', 'Ingenieria', 3, 9500000),
('Comunicacion Social', 'Humanidades', 3, 8500000),
('Psicologia', 'Salud', 4, 9000000),
('Contaduria Pública', 'Negocios', 4, 7000000),
('Diseño Gráfico', 'Arte', 4, 9500000),
('Ingenieria Eléctrica', 'Ingenieria', 5, 7500000),
('Tecnologia en Gestion Ambiental', 'Ciencias', 5, 6000000),
('Administracion Pública', 'Gobernanza', 5, 5500000),
('Ingenieria Electronica', 'Ingenieria', 6, 8500000),
('Cine y Audiovisuales', 'Arte', 6, 6500000),
('Deportes y Recreacion', 'Deportes', 6, 5000000),
('Trabajo Social', 'Humanidades', 7, 6000000),
('Tecnologia en Salud Ocupacional', 'Salud', 7, 7500000),
('Diseño de Modas', 'Arte', 7, 8500000),
('Ciencias Politicas', 'Humanidades', 8, 9000000),
('Ingenieria Industrial', 'Ingenieria', 8, 9500000),
('Quimica Farmacéutica', 'Ciencias', 8, 11000000),
('Negocios Internacionales', 'Negocios', 9, 8000000),
('Gestion Empresarial', 'Negocios', 9, 7000000),
('Educacion Infantil', 'Educacion', 9, 5500000),
('Tecnologia en Criminalistica', 'Ciencias', 10, 6500000),
('Sistemas de Informacion', 'Tecnologia', 10, 8500000),
('Tecnologia en Logistica', 'Negocios', 10, 6000000);

-- Insertar usuarios
INSERT INTO users (username, password) VALUES
('admin', '$2y$10$xtSDF6eyBnyvSMTWvFGeKugFN2m9vhqRZowkBBKLHanjFF3jVhlsW');
