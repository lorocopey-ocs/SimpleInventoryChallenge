-- phpMyAdmin SQL Dump
-- version 5.2.1

-- Servidor: localhost
-- Tiempo de generación: 18-04-2024 a las 23:32:25
-- Versión de PHP: 7.4.4-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Base de datos: project


CREATE TABLE product (
  id int(11) NOT NULL,
  proname varchar(100) NOT NULL,
  amount varchar(100) NOT NULL,
  time timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- Insercion de la tabla product

INSERT INTO product (id, proname, amount, time) VALUES
(108, 'Zapato', '10', '2024-04-18 20:16:56'),
(110, 'Camisa', '10', '2024-04-18 20:46:15'),


-- --------------------------------------------------------

--
-- Creacion de tabla usuario
--

CREATE TABLE user (
  id int(11) NOT NULL,
  username varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  name varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Insercion de tabla usuario
--

INSERT INTO user (id, username, password, name) VALUES
(20, 'YALENE', '3456', 'Alejandra Muñoz Pastes');


-- Indices de la tabla product
--
ALTER TABLE product
  ADD PRIMARY KEY (id);

--
-- Indices de la tabla user
--
ALTER TABLE user
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla product
--
ALTER TABLE product
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla user
--
ALTER TABLE user
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

