-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: database:3306
-- Tiempo de generación: 12-06-2023 a las 12:30:28
-- Versión del servidor: 8.0.33
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `SIBW`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cientificos`
--

CREATE TABLE `cientificos` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_muerte` date DEFAULT NULL,
  `lugar_nacimiento` varchar(50) NOT NULL,
  `lugar_muerte` varchar(50) DEFAULT NULL,
  `texto` text NOT NULL,
  `link_wiki` varchar(100) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `publicado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cientificos`
--

INSERT INTO `cientificos` (`id`, `nombre`, `fecha_nacimiento`, `fecha_muerte`, `lugar_nacimiento`, `lugar_muerte`, `texto`, `link_wiki`, `imagen`, `publicado`) VALUES
(1, 'Margaritas Salas', '1938-11-20', '2019-11-07', 'Asturias', 'Madrid', 'Margarita Salas Falgueras sturias, marquesa de Canero, fue una bioqumica espaola. \n                        Licenciada en ciencias qumicas, fue discpula de Severo Ochoa,con quien trabaj en los Estados Unidos \n                        despus de hacerlo con Alberto Sols en Madrid con el tambin cientfico Eladio Viuela,\n                        ambos se encargaron de impulsar la investigacin espaola en el campo de la bioqumica y de la biologa molecular.\n    \n                         Inici el desarrollo de la biologa molecular en Espaa, y desarroll su trabajo como profesora vinculada ad honorem \n                        del Consejo Superior de Investigaciones Cientficas (CSIC), en el Centro de Biologa Molecular Severo Ochoa de Madrid (CSIC-UAM). \n                        Tambin fue acadmica de la Real Academia Espaola (RAE) desde 2003, y censora de la Junta de Gobierno desde 2008.\n                        En 2016 se convirti en la primera mujer en recibir la Medalla Echegaray, otorgada por la Real Academia de Ciencias Exactas, Fsicas y Naturales.\n\n                         Entre sus aportaciones cientficas ms importantes, destacan la determinacin de que la lectura del mensaje gentico transcurre en la direccin 5 a 3; \n                        la demostracin de que la p6, protena de tipo histona, coopera con la protena p4 en la represin del promotor temprano A2c y en la activacin del promotor tardo A3; \n                        la demostracin de que el triplete sin sentido UAA da lugar a la terminacin de la cadena polipeptdica en un sistema de Escherichia coli; \n                        el descubrimiento de una glucoquinasa especfica para la fosforilacin de glucosa en hgado de rata cuya sntesis depende de insulina; y su investigacin acerca de la ADN polimerasa del virus bacterifago.\n                    ', 'https://es.wikipedia.org/wiki/Margarita_Salas', 'imgs/MargaritaSalas.jpg', 1),
(2, 'Evelyn Berezin', '1925-04-12', '2018-12-08', 'Nueva York', 'Nueva York', 'Evelyn Berezin fue una ingeniera y empresaria estadounidense, pionera en la creacin de la primera computadora de procesamiento de textos.\n Graduada en matemticas por la Universidad de Nueva York, Berezin trabaj en diversas compaas, como Teleregister y Underwood Corporation, donde se dedic al desarrollo de sistemas informticos. En 1969 fund su propia empresa, Redactron Corporation, que en 1971 lanz la primera computadora de procesamiento de textos, la cual revolucion la industria editorial y periodstica.\n\n Berezin tambin fue una defensora de la igualdad de gnero en el campo de la tecnologa y trabaj para promover la educacin y la participacin de las mujeres en este mbito. En 2018 falleci a los 93 aos de edad en Nueva York.', 'https://es.wikipedia.org/wiki/Evelyn_Berezin', 'imgs/EvelynBerezin.jpg', 0),
(3, 'Maria Dierssen Sotos', '1965-03-18', NULL, 'Barcelona', NULL, 'Mara Dierssen Soto es una cientfica espaola especializada en gentica molecular y neurociencia.\n\n Licenciada y doctorada en Biologa por la Universidad de Barcelona, es investigadora en el Centro de Regulacin Genmica de Barcelona, donde lidera el grupo de investigacin sobre Sndrome de Down y Neurobiologa Celular.\n\n Dierssen ha realizado importantes aportaciones en el estudio del sndrome de Down y en la identificacin de nuevos mecanismos y dianas teraputicas para enfermedades neurolgicas. Tambin ha sido reconocida por su labor en la divulgacin cientfica y la promocin de la igualdad de gnero en la ciencia.', 'https://es.wikipedia.org/wiki/Mar%C3%ADa_Dierssen', 'imgs/MaraDierssenSotos.jpg', 0),
(4, 'Stephanie Shirley', '1933-09-16', NULL, 'Alemania', NULL, 'Stephanie Shirley, tambin conocida como Steve Shirley, es una empresaria y filntropa britnica de origen alemn.\n Es conocida por haber fundado en 1962 la compaa Freelance Programmers, que empleaba principalmente a mujeres en un momento en que la industria de la tecnologa estaba dominada por hombres.\n Shirley fue pionera en la utilizacin de trabajadores autnomos para la industria tecnolgica y en la venta de acciones de la compaa a sus empleados.', 'https://web.unican.es/noticias/Paginas/2022/julio_2022/cerebro-determina-somos.aspx/', 'imgs/StephanieShirley.png', 0),
(5, 'Rosalind Franklin', '1920-07-25', '1958-04-16', 'Londres', 'Londres', 'Rosalind Franklin fue una biofsica y cristalgrafa britnica cuyo trabajo fue fundamental para el descubrimiento de la estructura del ADN. Naci en Londres en 1920 y estudi en la Universidad de Cambridge, donde se especializ en fsica y qumica.\n\n En 1951, Franklin se traslad al Kings College de Londres, donde trabaj con Maurice Wilkins en la difraccin de rayos X de molculas biolgicas, incluyendo el ADN. Sus imgenes de difraccin de rayos X del ADN fueron esenciales para el descubrimiento de su estructura de doble hlice por James Watson y Francis Crick en 1953.\n\n A pesar de su contribucin vital al descubrimiento, Franklin no fue reconocida por su trabajo en vida. Muri de cncer de ovario en 1958, a los 37 aos. Su legado ha sido reivindicado en aos posteriores, y se considera una pionera en la cristalografa de rayos X y la estructura de macromolculas.\n\n Adems de su trabajo en el ADN, Franklin tambin hizo importantes contribuciones a la comprensin de la estructura del virus del mosaico del tabaco y el virus del polio, as como a la estructura de las fibras de carbn. Fue miembro de la Royal Society de Londres y ha sido homenajeada con mltiples premios y distinciones pstumos.', 'https://es.wikipedia.org/wiki/Rosalind_Franklin', 'imgs/Franklin.jpg', 0),
(6, 'Katherine Johnson', '1918-08-26', '2020-02-24', 'Virginia, Estados Unidos', 'Virginia, Estados Unidos', 'Katherine Johnson fue una matemtica y fsica estadounidense conocida por su trabajo en la NASA en la era espacial. Naci en White Sulphur Springs, Virginia Occidental en 1918 y se gradu de la Universidad de Virginia Occidental en 1937.\n En 1953, Johnson comenz a trabajar en la NASA, donde su trabajo incluy clculos de trayectorias para el programa espacial de los Estados Unidos. Fue fundamental en el xito de misiones como el vuelo de Alan Shepard en 1961, el primer vuelo tripulado de los Estados Unidos, y el vuelo de John Glenn en 1962, el primer estadounidense en orbitar la Tierra.\n Johnson se destac por su habilidad para realizar clculos complejos a mano y su rigor matemtico. Su trabajo tambin fue importante en el desarrollo de sistemas de navegacin por satlite y la exploracin espacial.', 'https://es.wikipedia.org/wiki/Katherine_Johnson', 'imgs/KatherineJohnson.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int NOT NULL,
  `id_cientifico` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `email` varchar(100) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_cientifico`, `nombre`, `fecha`, `hora`, `email`, `comentario`) VALUES
(3, 4, 'Juan Perez', '2023-04-17', '12:30:00', 'juan.perez@email.com', 'Este es mi primer comentario. [Modificado por el moderador]'),
(6, 5, 'Juan Perez', '2023-04-17', '13:00:00', 'juan.perez@email.com', 'Este es mi segundo comentario'),
(11, 3, 'Carlos Garcia', '2023-04-17', '16:00:00', 'carlos.garcia@email.com', 'Este es mi primer comentario'),
(12, 3, 'Carlos Garcia', '2023-04-17', '17:00:00', 'carlos.garcia@email.com', 'Este es mi segundo comentario'),
(21, 2, 'moderador', '2023-05-28', '14:16:36', 'moderador@gmail.com', 'Nuevo comentario [Modificado por el moderador]'),
(23, 1, 'Raul Ramirez', '2023-03-18', '17:36:04', 'raulr@gmail.com', 'Gracias! Me ha servido de gran ayuda.'),
(24, 1, 'Marta Lopez', '2023-03-12', '10:06:04', 'martalopez@gmail.com', 'Es genial!!'),
(25, 4, 'Juan Perez', '2023-04-17', '12:30:00', 'juan.perez@email.com', 'Este es mi primer comentario'),
(26, 4, 'Juan Perez', '2023-04-17', '13:00:00', 'juan.perez@email.com', 'Este es mi segundo comentario'),
(27, 5, 'Juan Perez', '2023-04-17', '12:30:00', 'juan.perez@email.com', 'Este es mi primer comentario'),
(28, 5, 'Juan Perez', '2023-04-17', '13:00:00', 'juan.perez@email.com', 'Este es mi segundo comentario'),
(29, 6, 'Juan Perez', '2023-04-17', '12:30:00', 'juan.perez@email.com', 'Este es mi primer comentario'),
(30, 6, 'Juan Perez', '2023-04-17', '13:00:00', 'juan.perez@email.com', 'Este es mi segundo comentario'),
(31, 2, 'Maria Rodriguez', '2023-04-17', '14:00:00', 'maria.rodriguez@email.com', 'Este es mi primer comentario'),
(32, 2, 'Maria Rodriguez', '2023-04-17', '15:00:00', 'maria.rodriguez@email.com', 'Este es mi segundo comentario'),
(33, 3, 'Carlos Garcia', '2023-04-17', '16:00:00', 'carlos.garcia@email.com', 'Este es mi primer comentario'),
(34, 3, 'Carlos Garcia', '2023-04-17', '17:00:00', 'carlos.garcia@email.com', 'Este es mi segundo comentario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int NOT NULL,
  `id_cientifico` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `pie` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `id_cientifico`, `nombre`, `ruta`, `pie`) VALUES
(5, 1, 'MargaritaSalas2', 'imgs/Margaritasalas2.jpg', NULL),
(6, 1, 'MargaritaSalas3', 'imgs/MargaritaSalas3.jpg', 'En el laboratorio'),
(7, 1, 'MargaritaSalas4', 'imgs/MargaritaSalas4.jpg', NULL),
(8, 1, 'MargaritaSalas5', 'imgs/MargaritaSalas5.png', 'De nia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hastags`
--

CREATE TABLE `hastags` (
  `hastag` varchar(100) NOT NULL,
  `id_cientifico` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `hastags`
--

INSERT INTO `hastags` (`hastag`, `id_cientifico`) VALUES
('cientifica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prohibidas`
--

CREATE TABLE `prohibidas` (
  `id` int NOT NULL,
  `palabra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `prohibidas`
--

INSERT INTO `prohibidas` (`id`, `palabra`) VALUES
(1, 'palabra'),
(2, 'texto'),
(3, 'parrafo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitiosInteres`
--

CREATE TABLE `sitiosInteres` (
  `id` int NOT NULL,
  `id_cientifico` int NOT NULL,
  `texto` varchar(50) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `sitiosInteres`
--

INSERT INTO `sitiosInteres` (`id`, `id_cientifico`, `texto`, `ruta`) VALUES
(13, 1, 'Portal UGR', 'https://www.ugr.es/'),
(14, 2, 'Portal UGR', 'https://www.ugr.es/'),
(15, 3, 'Portal UGR', 'https://www.ugr.es/'),
(16, 4, 'Portal UGR', 'https://www.ugr.es/'),
(17, 5, 'Portal UGR', 'https://www.ugr.es/'),
(18, 6, 'Portal UGR', 'https://www.ugr.es/'),
(19, 1, 'Biografa', 'https://es.wikipedia.org/wiki/Margarita_Salas'),
(20, 2, 'Biografa', 'https://es.wikipedia.org/wiki/Evelyn_Berezin'),
(21, 3, 'Biografa', 'https://es.wikipedia.org/wiki/Mar%C3%ADa_Dierssen'),
(22, 4, 'Biografa', 'https://web.unican.es/noticias/Paginas/2022/julio_2022/cerebro-determina-somos.aspx/'),
(23, 5, 'Biografa', 'https://es.wikipedia.org/wiki/Rosalind_Franklin'),
(24, 6, 'Biografa', 'https://es.wikipedia.org/wiki/Katherine_Johnson');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `passwd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `correo`, `passwd`, `tipo`) VALUES
('alba', 'alba@correo.es', 'alba', 'registrado'),
('gestor', 'gestor@gmail.com', '1234', 'gestor'),
('moderador', 'moderador@gmail.com', '1234', 'moderador'),
('super', 'super@gmail.com', '1234', 'super');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cientificos`
--
ALTER TABLE `cientificos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cientifico` (`id_cientifico`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cientifico` (`id_cientifico`);

--
-- Indices de la tabla `hastags`
--
ALTER TABLE `hastags`
  ADD PRIMARY KEY (`hastag`),
  ADD KEY `id_cientifico` (`id_cientifico`);

--
-- Indices de la tabla `prohibidas`
--
ALTER TABLE `prohibidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sitiosInteres`
--
ALTER TABLE `sitiosInteres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cientifico` (`id_cientifico`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cientificos`
--
ALTER TABLE `cientificos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `prohibidas`
--
ALTER TABLE `prohibidas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sitiosInteres`
--
ALTER TABLE `sitiosInteres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_cientifico`) REFERENCES `cientificos` (`id`);

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_cientifico`) REFERENCES `cientificos` (`id`);

--
-- Filtros para la tabla `hastags`
--
ALTER TABLE `hastags`
  ADD CONSTRAINT `hastags_ibfk_1` FOREIGN KEY (`id_cientifico`) REFERENCES `cientificos` (`id`);

--
-- Filtros para la tabla `sitiosInteres`
--
ALTER TABLE `sitiosInteres`
  ADD CONSTRAINT `sitiosInteres_ibfk_1` FOREIGN KEY (`id_cientifico`) REFERENCES `cientificos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
