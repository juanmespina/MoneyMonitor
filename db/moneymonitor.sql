-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2021 a las 20:27:00
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moneymonitor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accountbolivares`
--

CREATE TABLE `accountbolivares` (
  `id` int(11) NOT NULL,
  `money` float NOT NULL,
  `exchangeRate_id` int(11) NOT NULL,
  `active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `accountbolivares`
--

INSERT INTO `accountbolivares` (`id`, `money`, `exchangeRate_id`, `active`) VALUES
(2, 97000000, 7, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Carne o Pollo'),
(2, 'Verdura'),
(3, 'Acompañantes'),
(4, 'Frutas'),
(5, 'Golosinas'),
(6, 'Carro'),
(7, 'Casa'),
(8, 'Comida callejera'),
(9, 'Perros'),
(10, 'Gato'),
(11, 'Peluqueria'),
(12, 'Medicina'),
(13, 'Panaderia'),
(14, 'Charcuteria'),
(15, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exchangerate`
--

CREATE TABLE `exchangerate` (
  `id` int(11) NOT NULL,
  `rate` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `exchangerate`
--

INSERT INTO `exchangerate` (`id`, `rate`, `date`) VALUES
(7, 1500000, '2021-01-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expense`
--

CREATE TABLE `expense` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` float DEFAULT NULL,
  `dollars` float NOT NULL,
  `member_id` int(11) NOT NULL,
  `member_memberLevel_id` int(10) UNSIGNED NOT NULL,
  `paymentMethod_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `expense`
--

INSERT INTO `expense` (`id`, `amount`, `dollars`, `member_id`, `member_memberLevel_id`, `paymentMethod_id`, `description`, `category_id`, `date`) VALUES
(14, 0, 20, 4, 1, 5, ' Carro', 15, '2021-01-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `memberLevel_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `member`
--

INSERT INTO `member` (`id`, `name`, `password`, `memberLevel_id`) VALUES
(4, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `memberlevel`
--

CREATE TABLE `memberlevel` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `memberlevel`
--

INSERT INTO `memberlevel` (`id`, `level`) VALUES
(1, 'Administrador'),
(2, 'Estandar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `active` tinyint(4) NOT NULL,
  `description` text DEFAULT NULL,
  `member_id` int(11) NOT NULL,
  `member_memberLevel_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `id` int(11) NOT NULL,
  `method` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paymentmethod`
--

INSERT INTO `paymentmethod` (`id`, `method`) VALUES
(1, 'Débito'),
(3, 'Efectivo'),
(4, 'Efectivo en dólares'),
(7, 'Efectivo USD'),
(2, 'Pago Móvil'),
(5, 'Zelle o Transferencia normal en dólares');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accountbolivares`
--
ALTER TABLE `accountbolivares`
  ADD PRIMARY KEY (`id`,`exchangeRate_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_accountBolivares_exchangeRate1_idx` (`exchangeRate_id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exchangerate`
--
ALTER TABLE `exchangerate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idexchangeRate_UNIQUE` (`id`);

--
-- Indices de la tabla `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`,`member_id`,`member_memberLevel_id`,`paymentMethod_id`,`category_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_expense_member1_idx` (`member_id`,`member_memberLevel_id`),
  ADD KEY `fk_expense_paymentMethod1_idx` (`paymentMethod_id`),
  ADD KEY `fk_expense_category1_idx` (`category_id`);

--
-- Indices de la tabla `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`,`memberLevel_id`),
  ADD UNIQUE KEY `idmember_UNIQUE` (`id`),
  ADD KEY `fk_member_memberLevel_idx` (`memberLevel_id`);

--
-- Indices de la tabla `memberlevel`
--
ALTER TABLE `memberlevel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`,`member_id`,`member_memberLevel_id`),
  ADD KEY `fk_note_member1_idx` (`member_id`,`member_memberLevel_id`);

--
-- Indices de la tabla `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `method_UNIQUE` (`method`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accountbolivares`
--
ALTER TABLE `accountbolivares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `exchangerate`
--
ALTER TABLE `exchangerate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `memberlevel`
--
ALTER TABLE `memberlevel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accountbolivares`
--
ALTER TABLE `accountbolivares`
  ADD CONSTRAINT `fk_accountBolivares_exchangeRate1` FOREIGN KEY (`exchangeRate_id`) REFERENCES `exchangerate` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `fk_expense_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_expense_member1` FOREIGN KEY (`member_id`,`member_memberLevel_id`) REFERENCES `member` (`id`, `memberLevel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_expense_paymentMethod1` FOREIGN KEY (`paymentMethod_id`) REFERENCES `paymentmethod` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `fk_member_memberLevel` FOREIGN KEY (`memberLevel_id`) REFERENCES `memberlevel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_note_member1` FOREIGN KEY (`member_id`,`member_memberLevel_id`) REFERENCES `member` (`id`, `memberLevel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
