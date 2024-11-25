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
('Universidad de Antioquia', 'Medellín'),
('Universidad Nacional de Colombia', 'Medellín'),
('Universidad EAFIT', 'Medellín'),
('Universidad Pontificia Bolivariana', 'Medellín'),
('Instituto Tecnológico Pascual Bravo', 'Medellín'),
('Politécnico Jaime Isaza Cadavid', 'Medellín'),
('Colegio Mayor de Antioquia', 'Medellín'),
('Universidad de Medellín', 'Medellín'),
('Universidad Lasallista', 'Medellín'),
('Tecnológico de Antioquia', 'Medellín');

-- Insertar carreras con áreas y precios aproximados
INSERT INTO careers (name, area, university_id, approx_price) VALUES
('Ingeniería de Sistemas', 'Ingeniería', 1, 8500000),
('Medicina', 'Salud', 1, 12000000),
('Derecho', 'Humanidades', 1, 8000000),
('Ingeniería Civil', 'Ingeniería', 2, 9500000),
('Arquitectura', 'Ingeniería', 2, 10000000),
('Biología', 'Ciencias', 2, 7000000),
('Administración de Empresas', 'Negocios', 3, 11000000),
('Ingeniería de Producción', 'Ingeniería', 3, 9500000),
('Comunicación Social', 'Humanidades', 3, 8500000),
('Psicología', 'Salud', 4, 9000000),
('Contaduría Pública', 'Negocios', 4, 7000000),
('Diseño Gráfico', 'Arte', 4, 9500000),
('Ingeniería Eléctrica', 'Ingeniería', 5, 7500000),
('Tecnología en Gestión Ambiental', 'Ciencias', 5, 6000000),
('Administración Pública', 'Gobernanza', 5, 5500000),
('Ingeniería Electrónica', 'Ingeniería', 6, 8500000),
('Cine y Audiovisuales', 'Arte', 6, 6500000),
('Deportes y Recreación', 'Deportes', 6, 5000000),
('Trabajo Social', 'Humanidades', 7, 6000000),
('Tecnología en Salud Ocupacional', 'Salud', 7, 7500000),
('Diseño de Modas', 'Arte', 7, 8500000),
('Ciencias Políticas', 'Humanidades', 8, 9000000),
('Ingeniería Industrial', 'Ingeniería', 8, 9500000),
('Química Farmacéutica', 'Ciencias', 8, 11000000),
('Negocios Internacionales', 'Negocios', 9, 8000000),
('Gestión Empresarial', 'Negocios', 9, 7000000),
('Educación Infantil', 'Educación', 9, 5500000),
('Tecnología en Criminalística', 'Ciencias', 10, 6500000),
('Sistemas de Información', 'Tecnología', 10, 8500000),
('Tecnología en Logística', 'Negocios', 10, 6000000);

-- Insertar usuarios
INSERT INTO users (username, password) VALUES
('admin', '123456');
