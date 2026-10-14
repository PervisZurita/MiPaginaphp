-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2026 a las 05:57:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `etica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `numero_articulo` varchar(20) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `contenido` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'Ética científica'),
(2, 'Integridad científica'),
(3, 'Consentimiento informado'),
(4, 'Protección de datos personales'),
(5, 'Confidencialidad y privacidad'),
(6, 'Evaluación ética'),
(7, 'Comités de ética'),
(8, 'Principios éticos'),
(9, 'Derechos de los participantes'),
(10, 'Responsabilidad del investigador'),
(11, 'Plagio y honestidad académica'),
(12, 'Autoría y publicación científica'),
(13, 'Conflictos de interés'),
(14, 'Metodología científica'),
(15, 'Recolección y análisis de datos'),
(16, 'Inteligencia artificial en la investigación'),
(17, 'Seguridad de la información'),
(18, 'Investigación con seres humanos'),
(19, 'Bienestar animal'),
(20, 'Responsabilidad ambiental'),
(21, 'Riesgos y beneficios'),
(22, 'Normativa institucional'),
(23, 'Financiamiento de la investigación'),
(24, 'Divulgación científica'),
(25, 'Recursos y orientación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias2`
--

CREATE TABLE `categorias2` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias2`
--

INSERT INTO `categorias2` (`id`, `nombre`, `descripcion`) VALUES
(1, 'OBJETIVO Y ALCANCE', 'Capítulo I. Artículos 1 y 2.'),
(2, 'PRINCIPIOS ÉTICOS', 'Capítulo II. Artículos 3 y 4.'),
(3, 'PERTINENCIA DE LA INVESTIGACIÓN CIENTÍFICA', 'Capítulo III. Artículos 5 y 6.'),
(4, 'COMPETENCIAS DIDÁCTICAS DEL INVESTIGADOR', 'Capítulo IV. Artículos 7 y 8.'),
(5, 'TRANSPARENCIA Y CONFIDENCIALIDAD DE LA INFORMACIÓN', 'Capítulo V. Artículos 9 y 10.'),
(6, 'HONESTIDAD ACADÉMICA', 'Capítulo VI. Artículos 11 y 12.'),
(7, 'INVESTIGACIÓN CIENTÍFICA', 'Capítulo VII. Artículos 13 y 14.'),
(8, 'VINCULACIÓN CON LA SOCIEDAD Y COOPERACIÓN INTERINSTITUCIONAL', 'Capítulo VIII. Artículos 15 y 16.'),
(9, 'COMITÉ DE ÉTICA EN LA INVESTIGACIÓN', 'Capítulo IX. Artículos 17 y 18.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_faq`
--

CREATE TABLE `categorias_faq` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias_faq`
--

INSERT INTO `categorias_faq` (`id`, `categoria`) VALUES
(12, 'Autoría y publicación científica'),
(19, 'Bienestar animal'),
(7, 'Comités de ética'),
(5, 'Confidencialidad y privacidad'),
(13, 'Conflictos de interés'),
(3, 'Consentimiento informado'),
(9, 'Derechos de los participantes'),
(24, 'Divulgación científica'),
(1, 'Ética científica'),
(6, 'Evaluación ética'),
(23, 'Financiamiento de la investigación'),
(2, 'Integridad científica'),
(16, 'Inteligencia artificial en la investigación'),
(18, 'Investigación con seres humanos'),
(14, 'Metodología científica'),
(22, 'Normativa institucional'),
(11, 'Plagio y honestidad académica'),
(8, 'Principios éticos'),
(4, 'Protección de datos personales'),
(15, 'Recolección y análisis de datos'),
(25, 'Recursos y orientación'),
(20, 'Responsabilidad ambiental'),
(10, 'Responsabilidad del investigador'),
(21, 'Riesgos y beneficios'),
(17, 'Seguridad de la información');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_etica2`
--

CREATE TABLE `codigo_etica2` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `articulo` varchar(50) DEFAULT NULL,
  `contenido` text NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `codigo_etica2`
--

INSERT INTO `codigo_etica2` (`id`, `titulo`, `articulo`, `contenido`, `categoria_id`) VALUES
(1, 'Alcance', 'Art. 2', 'El Código se aplica en las facultades, sedes, carreras y niveles de pregrado y posgrado de la Universidad, así como a participantes e investigadores externos vinculados mediante convenios. Reconoce al ser humano como sujeto de derechos sin discriminación y a la naturaleza como sujeto de derechos, promoviendo la protección ambiental y el respeto a la vida.', 1),
(2, 'Objetivo', 'Art. 1', 'Establece los principios, valores éticos y acciones que orientan la investigación científica en la Universidad Técnica Luis Vargas Torres de Esmeraldas. La investigación responde a las necesidades sociales, al desarrollo sostenible, a la diversidad cultural y a la igualdad de género. El investigador debe actuar con responsabilidad y obtener resultados verificables.', 1),
(3, 'Principios éticos en la investigación científica', 'Art. 4', 'Comprende la pertinencia de la investigación, las competencias del investigador, la transparencia y confidencialidad, la vinculación con la sociedad, la cooperación interinstitucional y los comités de ética. Incluye honestidad académica, respeto por la dignidad humana y la biodiversidad, consentimiento informado, protección de participantes, confidencialidad, respeto a los animales, transparencia, legitimidad, solidaridad y pertinencia. La investigación debe orientarse al bien común.', 2),
(4, 'Ámbito', 'Art. 3', 'Los principios éticos constituyen los lineamientos establecidos en el Código para orientar el desempeño de docentes, estudiantes, investigadores, personal administrativo y directivo en sus actividades científicas.', 2),
(5, 'Acciones', 'Art. 6', 'Para consolidar la pertinencia de la investigación, la comunidad universitaria debe participar en actividades de investigación y vinculación local, nacional e internacional; aplicar los lineamientos jurídicos e institucionales para formular y ejecutar investigaciones; y justificar los proyectos ante la comunidad científica interesada.', 3),
(6, 'Ámbito', 'Art. 5', 'La investigación científica debe responder a las demandas y necesidades de la sociedad, al sistema de planificación nacional, a los Objetivos de Desarrollo Sostenible, a la diversidad cultural y a la igualdad de género. Se fundamenta en la visión, misión, objetivos estratégicos y valores institucionales de la UTLVTE.', 3),
(7, 'Acciones', 'Art. 8', 'Las competencias se desarrollan mediante formación en métodos de investigación, propiedad intelectual y derechos de autor; actualización de métodos de enseñanza; planificación conforme a las líneas institucionales y los Objetivos de Desarrollo Sostenible; rigor científico; selección de personal capacitado; participación en las fases del proyecto; reconocimiento de autoría; cooperación con auditorías y capacitación para cumplir los indicadores de calidad institucional.', 4),
(8, 'Ámbito', 'Art. 7', 'El desarrollo de competencias didácticas de docentes, estudiantes, investigadores y personal universitario permite generar productos científicos con pertinencia social, ambiental y tecnológica que respondan a los indicadores de calidad de la UTLVTE.', 4),
(9, 'Acciones', 'Art. 10', 'Los autores son responsables de presentar los resultados. Las bases de datos y registros científicos deben manejarse con responsabilidad, veracidad y legitimidad, sin falsificar ni interpretar incorrectamente los resultados. Se establecen acciones para regular el acceso y gestión de datos, cumplir acuerdos de confidencialidad, organizar bases de datos, documentar su origen y calidad, respetar los derechos de autor, preservar la documentación y gestionar la propiedad intelectual mediante la Dirección de Investigación.', 5),
(10, 'Ámbito', 'Art. 9', 'La información generada por las investigaciones de docentes, estudiantes e investigadores, así como la de las personas participantes, debe protegerse y resguardarse. El Comité de Ética establecerá mecanismos para monitorear investigaciones con propósitos éticamente cuestionables y remitir los casos al Consejo Superior Universitario.', 5),
(11, 'Acciones', 'Art. 12', 'La honestidad académica exige reconocer las fuentes de datos, textos, imágenes y otros materiales; no apropiarse de ideas de otros durante evaluaciones; no ocultar participantes o colaboradores; respetar los derechos de autor; no manipular información para obtener ventajas; no destruir propiedad intelectual; prevenir el plagio; no aceptar beneficios que influyan en decisiones; respetar las autorizaciones sobre materiales; registrar la propiedad intelectual y no divulgar resultados inéditos durante la investigación.', 6),
(12, 'Ámbito', 'Art. 11', 'Las autoridades, profesores, investigadores, personal de apoyo y estudiantes deben actuar contra el fraude y la deshonestidad académica. Estas conductas comprenden la vulneración de los derechos de autor, el incumplimiento de normas éticas, la mentira, el engaño, el robo y el uso de materiales no autorizados en evaluaciones, tareas, informes o investigaciones.', 6),
(13, 'Acciones', 'Art. 14', 'La investigación comprende formulación, ejecución y evaluación. Incluye trabajos de titulación, proyectos, libros, capítulos, artículos, ponencias y otros productos científicos; uso transparente y equitativo de recursos financieros; informes de gestión; difusión de resultados; responsabilidad sobre la identidad digital; respeto de los derechos de autor; revisión por pares y evaluación académica; prevención del plagio y autoplagio; y pertinencia de los resultados frente a las necesidades sociales y científicas.', 7),
(14, 'Ámbito', 'Art. 13', 'La investigación científica de pregrado, posgrado y proyectos debe utilizar diseños cualitativos, cuantitativos o mixtos con pertinencia social, capaces de responder a problemas y aportar soluciones sostenibles en los ámbitos territorial y ambiental desde la UTLVTE.', 7),
(15, 'Acciones', 'Art. 16', 'La vinculación y cooperación se concreta mediante el fortalecimiento de relaciones interinstitucionales; el respeto a la diversidad cultural y territorial; el cuidado de la infraestructura y los equipos de las organizaciones colaboradoras; la cooperación en investigaciones e intercambio de conocimientos; y la transferencia y difusión de resultados a las comunidades involucradas.', 8),
(16, 'Ámbito', 'Art. 15', 'Docentes, estudiantes, investigadores y personal universitario deben promover estrategias de vinculación y cooperación entre la actividad académica, la sociedad y la naturaleza. Estas acciones buscan solucionar problemas sociales y contribuir a una sociedad equitativa y justa mediante la responsabilidad social universitaria.', 8),
(17, 'Acciones', 'Art. 18', 'Los miembros del Comité deben conocer los proyectos de investigación, supervisar las investigaciones cuando sea necesario, recomendar la suspensión de investigaciones que incumplan los principios éticos o disposiciones legales, elaborar informes de seguimiento y comunicar fallas al Consejo Superior Universitario, además de realizar las funciones necesarias para cumplir el Código y sensibilizar a la comunidad científica sobre la ética en la investigación.', 9),
(18, 'Ámbito', 'Art. 17', 'El Comité de Ética vigila el cumplimiento del Código en trabajos de titulación, proyectos, libros, artículos, ponencias y otras producciones científicas, especialmente ante conflictos internos. Está adscrito al Vicerrectorado de Investigación, Innovación y Postgrado y se integra por cinco docentes-investigadores titulares con actividad investigadora y publicaciones de alto impacto. Sus miembros son seleccionados por el Consejo Superior Universitario y se renuevan cada tres años. Cuenta con presidente y vicepresidente.', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_opciones`
--

CREATE TABLE `cuestionario_opciones` (
  `id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `opcion` text NOT NULL,
  `es_correcta` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cuestionario_opciones`
--

INSERT INTO `cuestionario_opciones` (`id`, `pregunta_id`, `opcion`, `es_correcta`) VALUES
(1, 1, 'Obtener resultados sin importar los medios utilizados', 0),
(2, 1, 'Garantizar una investigación responsable y honesta', 1),
(3, 1, 'Evitar compartir los resultados', 0),
(4, 1, 'Conseguir reconocimiento personal únicamente', 0),
(5, 2, 'Utilizar instrumentos de medición', 0),
(6, 2, 'Consultar libros científicos', 0),
(7, 2, 'Presentar ideas ajenas como propias sin reconocer la fuente', 1),
(8, 2, 'Comparar resultados de diferentes estudios', 0),
(9, 3, 'Eliminar los nombres de los autores', 0),
(10, 3, 'Copiar la información sin referencias', 0),
(11, 3, 'Modificar la fuente para ocultar su origen', 0),
(12, 3, 'Citar correctamente las fuentes consultadas', 1),
(13, 4, 'Modificar datos para confirmar una hipótesis', 0),
(14, 4, 'Ocultar resultados desfavorables', 0),
(15, 4, 'Comunicar los datos y resultados de forma veraz', 1),
(16, 4, 'Inventar información para completar el estudio', 0),
(17, 5, 'La obligación de participar en todo estudio', 0),
(18, 5, 'La aceptación libre después de recibir información suficiente', 1),
(19, 5, 'La publicación de datos personales', 0),
(20, 5, 'La autorización para cambiar los resultados', 0),
(21, 6, 'Publicarlos siempre con nombres completos', 0),
(22, 6, 'Compartirlos sin restricciones', 0),
(23, 6, 'Protegerlos y respetar la privacidad de los participantes', 1),
(24, 6, 'Entregarlos a cualquier persona que los solicite', 0),
(25, 7, 'Reconocerlo, corregirlo y comunicarlo', 1),
(26, 7, 'Eliminar todos los registros del estudio', 0),
(27, 7, 'Ocultarlo para evitar críticas', 0),
(28, 7, 'Culpar a otros investigadores sin verificar los hechos', 0),
(29, 8, 'Revisar los datos obtenidos', 0),
(30, 8, 'Inventar observaciones o resultados inexistentes', 1),
(31, 8, 'Repetir una medición correctamente', 0),
(32, 8, 'Consultar publicaciones científicas', 0),
(33, 9, 'Ignorarlo si beneficia al investigador', 0),
(34, 9, 'Ocultarlo a los responsables del proyecto', 0),
(35, 9, 'Cambiar los resultados para evitarlo', 0),
(36, 9, 'Declararlo y gestionarlo de forma transparente', 1),
(37, 10, 'Publicar datos inventados para completar el artículo', 0),
(38, 10, 'Omitir las contribuciones de otros autores', 0),
(39, 10, 'Presentar resultados auténticos y reconocer las fuentes', 1),
(40, 10, 'Copiar publicaciones sin citar sus autores', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_preguntas`
--

CREATE TABLE `cuestionario_preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `explicacion` text DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cuestionario_preguntas`
--

INSERT INTO `cuestionario_preguntas` (`id`, `pregunta`, `categoria`, `explicacion`, `estado`, `fecha_creacion`) VALUES
(1, '¿Cuál es el objetivo principal de la ética en la investigación científica?', 'Principios éticos', 'La ética promueve investigaciones honestas, responsables y respetuosas.', 1, '2026-10-09 07:19:52'),
(2, '¿Qué es el plagio en la investigación científica?', 'Integridad científica', 'El plagio consiste en presentar ideas o trabajos ajenos como propios sin reconocer su autoría.', 1, '2026-10-09 07:19:52'),
(3, '¿Qué se debe hacer al utilizar información de otros autores?', 'Citación y referencias', 'Se deben citar las fuentes para reconocer la autoría y permitir la verificación de la información.', 1, '2026-10-09 07:19:52'),
(4, '¿Qué significa actuar con honestidad científica?', 'Honestidad científica', 'Implica comunicar los métodos, datos y resultados de manera veraz.', 1, '2026-10-09 07:19:52'),
(5, '¿Qué es el consentimiento informado?', 'Derechos de los participantes', 'Es el proceso mediante el cual una persona recibe información suficiente y acepta participar libremente.', 1, '2026-10-09 07:19:52'),
(6, '¿Cómo deben protegerse los datos personales de los participantes?', 'Confidencialidad', 'Los datos deben protegerse y utilizarse conforme al consentimiento y las normas aplicables.', 1, '2026-10-09 07:19:52'),
(7, '¿Qué debe hacer un investigador si descubre un error en sus resultados?', 'Responsabilidad científica', 'Debe reconocer el error, corregirlo y comunicarlo de manera transparente.', 1, '2026-10-09 07:19:52'),
(8, '¿Qué se considera una fabricación de datos?', 'Integridad científica', 'Consiste en inventar datos o resultados que nunca fueron obtenidos.', 1, '2026-10-09 07:19:52'),
(9, '¿Qué debe hacer un investigador cuando existe un conflicto de intereses?', 'Conflicto de intereses', 'Debe declararlo de forma transparente y gestionarlo adecuadamente.', 1, '2026-10-09 07:19:52'),
(10, '¿Cuál es una responsabilidad ética al publicar una investigación?', 'Publicación responsable', 'Presentar resultados auténticos, reconocer las contribuciones y citar las fuentes utilizadas.', 1, '2026-10-09 07:19:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_respuestas`
--

CREATE TABLE `cuestionario_respuestas` (
  `id` int(11) NOT NULL,
  `resultado_id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `opcion_id` int(11) DEFAULT NULL,
  `es_correcta` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cuestionario_respuestas`
--

INSERT INTO `cuestionario_respuestas` (`id`, `resultado_id`, `pregunta_id`, `opcion_id`, `es_correcta`) VALUES
(1, 1, 1, 1, 0),
(2, 1, 2, 5, 0),
(3, 1, 3, 11, 0),
(4, 1, 4, 16, 0),
(5, 1, 5, 19, 0),
(6, 1, 6, 23, 1),
(7, 1, 7, 25, 1),
(8, 1, 8, 32, 0),
(9, 1, 9, 36, 1),
(10, 1, 10, 39, 1),
(11, 2, 1, 2, 1),
(12, 2, 2, 7, 1),
(13, 2, 3, 12, 1),
(14, 2, 4, 15, 1),
(15, 2, 5, 18, 1),
(16, 2, 6, 23, 1),
(17, 2, 7, 25, 1),
(18, 2, 8, 29, 0),
(19, 2, 9, 36, 1),
(20, 2, 10, 39, 1),
(21, 3, 1, 2, 1),
(22, 3, 2, 7, 1),
(23, 3, 3, 12, 1),
(24, 3, 4, 15, 1),
(25, 3, 5, 18, 1),
(26, 3, 6, 23, 1),
(27, 3, 7, 25, 1),
(28, 3, 8, 29, 0),
(29, 3, 9, 36, 1),
(30, 3, 10, 39, 1),
(31, 4, 1, 2, 1),
(32, 4, 2, 7, 1),
(33, 4, 3, 12, 1),
(34, 4, 4, 15, 1),
(35, 4, 5, 18, 1),
(36, 4, 6, 23, 1),
(37, 4, 7, 25, 1),
(38, 4, 8, 29, 0),
(39, 4, 9, 36, 1),
(40, 4, 10, 39, 1),
(41, 5, 1, 2, 1),
(42, 5, 2, 7, 1),
(43, 5, 3, 12, 1),
(44, 5, 4, 15, 1),
(45, 5, 5, 18, 1),
(46, 5, 6, 23, 1),
(47, 5, 7, 25, 1),
(48, 5, 8, 29, 0),
(49, 5, 9, 36, 1),
(50, 5, 10, 39, 1),
(51, 6, 1, 2, 1),
(52, 6, 2, 7, 1),
(53, 6, 3, 12, 1),
(54, 6, 4, 15, 1),
(55, 6, 5, 18, 1),
(56, 6, 6, 23, 1),
(57, 6, 7, 25, 1),
(58, 6, 8, 29, 0),
(59, 6, 9, 36, 1),
(60, 6, 10, 39, 1),
(61, 7, 1, 2, 1),
(62, 7, 2, 7, 1),
(63, 7, 3, 12, 1),
(64, 7, 4, 15, 1),
(65, 7, 5, 18, 1),
(66, 7, 6, 23, 1),
(67, 7, 7, 25, 1),
(68, 7, 8, 29, 0),
(69, 7, 9, 36, 1),
(70, 7, 10, 39, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario_resultados`
--

CREATE TABLE `cuestionario_resultados` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `puntuacion` decimal(5,2) NOT NULL DEFAULT 0.00,
  `total_preguntas` int(11) NOT NULL,
  `respuestas_correctas` int(11) NOT NULL DEFAULT 0,
  `fecha_realizacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cuestionario_resultados`
--

INSERT INTO `cuestionario_resultados` (`id`, `usuario_id`, `puntuacion`, `total_preguntas`, `respuestas_correctas`, `fecha_realizacion`) VALUES
(1, NULL, 40.00, 10, 4, '2026-10-09 07:39:37'),
(2, NULL, 90.00, 10, 9, '2026-10-09 07:41:47'),
(3, 5, 90.00, 10, 9, '2026-10-09 16:46:20'),
(4, 5, 90.00, 10, 9, '2026-10-09 16:46:31'),
(5, 5, 90.00, 10, 9, '2026-10-09 16:48:37'),
(6, 5, 90.00, 10, 9, '2026-10-09 16:48:46'),
(7, 5, 90.00, 10, 9, '2026-10-09 16:52:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `archivo` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `titulo`, `descripcion`, `archivo`, `fecha_creacion`) VALUES
(1, 'CODIGO DE ETICA DE LA INVESTIGACION DE LA FLACSO', '', 'CRwBBJyvTqrmCfYasbPbnd4u.pdf', '2026-10-09 16:35:13'),
(2, 'CÓDIGO DE ÉTICA EN LA INVESTIGACIÓN UNIVERSIDAD DE GUAYAQUIL', '', 'PG1UaeSMgjRmewEFV4heyinJ.pdf', '2026-10-09 16:35:51'),
(3, 'CODOGO DE ÉTICA DE INVESTIGACIÓN UTELVT', '', '12pOCp5DFaTTDLH6xKG4RStu.pdf', '2026-10-09 16:36:34'),
(4, 'CODIGO DE ETICA DE LA INVESTIGACION DE LA FLACSOW', '', 'LVs_tnqHWq2bI_mAz6M3aaS_.pdf', '2026-10-10 23:57:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`id`, `usuario_id`, `titulo`, `contenido`, `fecha_creacion`) VALUES
(1, 5, 'ni idea', 'no sie', '2026-10-07 00:54:59'),
(2, 5, 'mejor', 'mmmm', '2026-10-07 01:11:49'),
(3, 5, 'fdfsfdfsfsf', 'fdfdfdf', '2026-10-07 01:43:17'),
(4, 5, 'ffsdsdsd', 'dfdfdfdf', '2026-10-07 01:48:03'),
(5, 5, 'fdfsfdfsfsf', 'fdfdfdf', '2026-10-07 01:57:34'),
(6, 5, 'fdfsfdfsfsf', 'fdfdfdf', '2026-10-07 01:58:06'),
(7, 5, 'fdfsfdfsfsf', 'dfdfdfdf', '2026-10-07 02:11:24'),
(8, 5, 'dddddddddddddddd', 'dddddddddddddddd', '2026-10-07 02:21:08'),
(9, 5, 'fdfsfdfsfsf', 'ds', '2026-10-08 23:25:41'),
(10, 5, 'tetef', 'ffrf', '2026-10-09 15:40:22'),
(11, 5, 'DSDS', 'DSDDS', '2026-10-10 18:55:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fororespuestas`
--

CREATE TABLE `fororespuestas` (
  `id` int(11) NOT NULL,
  `foro_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `fororespuestas`
--

INSERT INTO `fororespuestas` (`id`, `foro_id`, `usuario_id`, `contenido`, `fecha_creacion`) VALUES
(1, 10, 5, 'ddsd', '2026-10-09 15:55:18'),
(4, 11, 5, 'hola', '2026-10-12 22:37:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infografias`
--

CREATE TABLE `infografias` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `archivo` varchar(255) NOT NULL,
  `enlace` varchar(500) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `infografias`
--

INSERT INTO `infografias` (`id`, `titulo`, `descripcion`, `archivo`, `enlace`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(1, 'Infografía sobre el Código de Ética en la Investigación Científica UTLVTE', 'buena', '97c2e4f820a1b861cc4ba26bf1676182.jpeg', 'https://www.studocu.com/ec/document/universidad-tecnica-luis-vargas-torres/etica-profesional/infografia-sobre-el-codigo-de-etica-en-la-investigacion-cientifica-utlvte/137360194?sid=6f89331b-8870-47ed-9290-a8890ef6e98b1791679334', '2026-10-11 00:51:16', '2026-10-11 00:51:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `pregunta` varchar(500) NOT NULL,
  `respuesta` text NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`pregunta`, `respuesta`, `categoria`) VALUES
('¿Qué es la ética de la investigación científica?', 'Es el conjunto de principios y normas que orientan la conducta responsable de quienes realizan investigación científica.', 'General'),
('¿Qué es un Código de Ética?', 'Es un conjunto de principios, valores y normas que orientan la conducta de las personas dentro de una actividad o institución.', 'General'),
('¿Cuál es el objetivo de un Código de Ética de investigación?', 'Orientar a los investigadores para que desarrollen sus actividades de manera responsable, honesta, transparente y respetuosa.', 'General'),
('¿Por qué es importante la ética en la investigación?', 'Porque ayuda a proteger a los participantes, garantizar la integridad científica y promover investigaciones responsables.', 'General'),
('¿Quiénes deben cumplir las normas éticas de investigación?', 'Las deben cumplir los investigadores y demás personas involucradas en actividades de investigación, de acuerdo con las normas aplicables.', 'General'),
('¿Qué significa realizar una investigación responsable?', 'Significa desarrollar la investigación respetando principios éticos, científicos, legales y sociales.', 'General'),
('¿Qué relación existe entre ciencia y ética?', 'La ética orienta la manera en que se obtiene, analiza, comunica y utiliza el conocimiento científico.', 'General'),
('¿Por qué debe existir ética en la ciencia?', 'Porque los resultados de la ciencia pueden afectar a personas, comunidades, animales, instituciones y al medio ambiente.', 'General'),
('¿Qué valores deben estar presentes en una investigación?', 'Entre ellos se encuentran la honestidad, responsabilidad, respeto, transparencia, justicia e integridad.', 'General'),
('¿Qué significa actuar éticamente como investigador?', 'Significa tomar decisiones respetando los principios científicos, los derechos de las personas y las normas aplicables.', 'General'),
('¿Qué es la integridad científica?', 'Es el compromiso de realizar y comunicar la investigación con honestidad, rigor, transparencia y responsabilidad.', 'Principios'),
('¿Qué significa actuar con honestidad en una investigación?', 'Significa presentar de manera fiel los métodos, datos, resultados y conclusiones obtenidos.', 'Principios'),
('¿Qué significa tener responsabilidad científica?', 'Significa asumir las consecuencias de las decisiones y acciones realizadas durante el proceso de investigación.', 'Principios'),
('¿Qué significa transparencia en la investigación?', 'Significa comunicar de forma clara y verificable los métodos, procedimientos, datos y resultados relevantes.', 'Principios'),
('¿Qué significa respeto en la investigación?', 'Significa reconocer y proteger la dignidad, derechos, privacidad y autonomía de las personas participantes.', 'Principios'),
('¿Qué significa objetividad científica?', 'Significa procurar que las conclusiones se basen en evidencia y métodos científicos, evitando manipulaciones deliberadas.', 'Principios'),
('¿Qué significa justicia en la investigación?', 'Significa procurar un trato equitativo y evitar discriminaciones injustificadas durante el proceso de investigación.', 'Principios'),
('¿Por qué es importante la responsabilidad social de la ciencia?', 'Porque la investigación puede generar efectos sobre la sociedad y debe procurar desarrollarse considerando sus posibles consecuencias.', 'Principios'),
('¿Qué significa respeto por la autonomía?', 'Significa reconocer la capacidad de las personas para tomar decisiones libres e informadas sobre su participación.', 'Principios'),
('¿Por qué es importante la transparencia científica?', 'Porque permite que otras personas comprendan, evalúen y, cuando corresponda, reproduzcan el trabajo realizado.', 'Principios'),
('¿Qué es un participante de investigación?', 'Es una persona que participa voluntariamente en un estudio de investigación bajo las condiciones establecidas para dicho estudio.', 'Participantes'),
('¿Qué es el consentimiento informado?', 'Es el proceso mediante el cual una persona recibe información adecuada sobre una investigación antes de decidir si participa.', 'Participantes'),
('¿La participación en una investigación debe ser voluntaria?', 'En general, la participación debe basarse en una decisión libre e informada, conforme a las normas éticas aplicables.', 'Participantes'),
('¿Puede una persona retirar su participación?', 'Dependiendo del estudio y de las normas aplicables, los participantes pueden tener derecho a retirar su participación sin consecuencias indebidas.', 'Participantes'),
('¿Qué información debe recibir un participante?', 'Debe recibir información comprensible sobre aspectos relevantes del estudio, sus procedimientos, posibles riesgos, beneficios y condiciones de participación.', 'Participantes'),
('¿Por qué se debe proteger a los participantes?', 'Porque las investigaciones deben respetar sus derechos, dignidad, seguridad, privacidad y bienestar.', 'Participantes'),
('¿Qué es la privacidad de los participantes?', 'Es el derecho de las personas a mantener protegida su información personal y los aspectos de su vida que no desean hacer públicos.', 'Participantes'),
('¿Qué es la confidencialidad?', 'Es el deber de proteger la información obtenida durante la investigación y evitar su divulgación no autorizada.', 'Participantes'),
('¿Cómo se deben manejar los datos personales de los participantes?', 'Deben manejarse de acuerdo con las normas de protección de datos, privacidad y confidencialidad que correspondan.', 'Participantes'),
('¿Qué debe hacer un investigador si identifica un riesgo para los participantes?', 'Debe evaluar y gestionar el riesgo siguiendo los procedimientos éticos, científicos y legales correspondientes.', 'Participantes'),
('¿Qué es el plagio?', 'Es presentar como propio el trabajo, ideas, palabras o aportes de otra persona sin reconocer adecuadamente su autoría.', 'Integridad científica'),
('¿Cómo se puede evitar el plagio?', 'Mediante la correcta citación de fuentes, el uso de referencias bibliográficas y el reconocimiento de las ideas de otros autores.', 'Integridad científica'),
('¿Qué es la fabricación de datos?', 'Es inventar datos, resultados u observaciones que no fueron obtenidos realmente durante una investigación.', 'Integridad científica'),
('¿Qué es la falsificación de datos?', 'Es alterar, manipular u omitir deliberadamente información o resultados de una investigación de manera que se distorsione su contenido.', 'Integridad científica'),
('¿Qué diferencia existe entre fabricación y falsificación?', 'La fabricación implica crear datos inexistentes, mientras que la falsificación implica manipular o alterar datos existentes.', 'Integridad científica'),
('¿Qué es una mala conducta científica?', 'Es una conducta que vulnera los principios de integridad y buenas prácticas de la investigación.', 'Integridad científica'),
('¿Por qué no se deben manipular los resultados?', 'Porque hacerlo puede producir conclusiones falsas y afectar la confianza en la investigación científica.', 'Integridad científica'),
('¿Se pueden publicar resultados negativos?', 'Sí. Los resultados negativos o que no confirman una hipótesis pueden aportar información científica importante.', 'Integridad científica'),
('¿Por qué es importante conservar los datos de investigación?', 'Porque permite respaldar los resultados y facilitar su revisión, verificación o reproducción cuando corresponda.', 'Integridad científica'),
('¿Qué debe hacer un investigador si descubre un error en sus resultados?', 'Debe comunicarlo y corregirlo de manera transparente siguiendo los procedimientos correspondientes.', 'Integridad científica'),
('¿Qué es la autoría científica?', 'Es el reconocimiento de las personas que realizaron contribuciones intelectuales sustanciales a una investigación o publicación.', 'Publicaciones'),
('¿Quién debe aparecer como autor de una investigación?', 'Deben reconocerse como autores quienes hayan realizado contribuciones sustanciales de acuerdo con los criterios de autoría aplicables.', 'Publicaciones'),
('¿Qué es una referencia bibliográfica?', 'Es la información que permite identificar y localizar una fuente utilizada en una investigación o publicación.', 'Publicaciones'),
('¿Por qué se deben citar las fuentes?', 'Para reconocer las contribuciones de otros autores, respaldar la información y evitar el plagio.', 'Publicaciones'),
('¿Qué es una publicación científica?', 'Es un documento que comunica resultados, análisis o aportes científicos siguiendo criterios académicos y científicos.', 'Publicaciones'),
('¿Qué es la publicación duplicada?', 'Es la publicación sustancialmente repetida de un mismo trabajo o contenido sin la debida transparencia o justificación.', 'Publicaciones'),
('¿Qué es una revista científica?', 'Es una publicación académica que difunde trabajos de investigación y otros contenidos científicos mediante procesos editoriales establecidos.', 'Publicaciones'),
('¿Qué significa reconocer las contribuciones de otros investigadores?', 'Significa citar, agradecer o atribuir adecuadamente los aportes realizados por otras personas según corresponda.', 'Publicaciones'),
('¿Por qué es importante revisar una publicación antes de enviarla?', 'Porque permite identificar errores, verificar referencias y comprobar que el contenido cumple con los criterios científicos y éticos correspondientes.', 'Publicaciones'),
('¿Qué es la revisión por pares?', 'Es un proceso mediante el cual especialistas evalúan un trabajo científico antes de su publicación o aceptación en determinados contextos.', 'Publicaciones'),
('¿Qué es un conflicto de interés?', 'Es una situación en la que intereses personales, económicos, profesionales o institucionales pueden influir o aparentar influir en una decisión relacionada con una investigación.', 'Conflictos de interés'),
('¿Por qué deben declararse los conflictos de interés?', 'Porque su declaración permite mantener la transparencia y evaluar posibles influencias sobre la investigación.', 'Conflictos de interés'),
('¿Un conflicto de interés significa necesariamente una conducta incorrecta?', 'No necesariamente. La existencia de un conflicto debe identificarse y gestionarse de manera transparente según las normas aplicables.', 'Conflictos de interés'),
('¿Qué puede generar un conflicto de interés?', 'Puede surgir por relaciones económicas, profesionales, personales, institucionales u otros intereses que puedan influir en la investigación.', 'Conflictos de interés'),
('¿Cómo se debe gestionar un conflicto de interés?', 'Debe declararse y gestionarse mediante los mecanismos establecidos por la institución o las normas aplicables.', 'Conflictos de interés'),
('¿Por qué es importante la independencia del investigador?', 'Porque ayuda a reducir influencias indebidas y favorece que las decisiones científicas se basen en evidencia.', 'Conflictos de interés'),
('¿Cuál es una de las principales responsabilidades del investigador?', 'Realizar la investigación de manera rigurosa, honesta, responsable y respetuosa de las normas aplicables.', 'Responsabilidades'),
('¿Qué responsabilidad tiene el investigador sobre los datos?', 'Debe procurar que los datos sean obtenidos, almacenados, analizados y comunicados de manera responsable y conforme a las normas aplicables.', 'Responsabilidades'),
('¿Qué responsabilidad tiene un investigador frente a los participantes?', 'Debe respetar sus derechos, dignidad, privacidad, seguridad y autonomía conforme a las normas correspondientes.', 'Responsabilidades'),
('¿Qué responsabilidad tiene un investigador frente a la sociedad?', 'Debe considerar las posibles consecuencias de su investigación y comunicar sus resultados de manera responsable.', 'Responsabilidades'),
('¿Por qué un investigador debe conocer las normas éticas?', 'Porque necesita identificar sus obligaciones y desarrollar sus actividades de acuerdo con los principios y requisitos aplicables.', 'Responsabilidades'),
('¿Qué debe hacer un investigador ante una posible falta ética?', 'Debe comunicarla o reportarla mediante los mecanismos institucionales o normativos correspondientes.', 'Responsabilidades'),
('¿Por qué es importante la formación ética de los investigadores?', 'Porque ayuda a desarrollar criterios para identificar y enfrentar adecuadamente los dilemas éticos que pueden surgir durante una investigación.', 'Responsabilidades'),
('¿Qué significa actuar con responsabilidad profesional?', 'Significa cumplir las obligaciones propias de la actividad científica y asumir responsablemente las consecuencias de las decisiones tomadas.', 'Responsabilidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasfrecuentes`
--

CREATE TABLE `preguntasfrecuentes` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `pregunta` varchar(500) NOT NULL,
  `respuestas` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntasfrecuentes`
--

INSERT INTO `preguntasfrecuentes` (`id`, `categoria_id`, `pregunta`, `respuestas`) VALUES
(1, 12, '¿Se deben publicar resultados negativos?', 'Sí, cuando sean relevantes y se comuniquen con rigor, porque también contribuyen al conocimiento científico.'),
(2, 12, '¿Por qué se deben declarar las contribuciones?', 'Para reconocer de manera transparente el trabajo de cada persona y aclarar sus responsabilidades.'),
(3, 12, '¿Qué es la publicación duplicada?', 'Es publicar nuevamente un trabajo sustancialmente igual sin una justificación y divulgación adecuadas.'),
(4, 12, '¿Qué es la autoría honoraria?', 'Es incluir como autor a alguien que no cumple los criterios de contribución, lo que compromete la transparencia.'),
(5, 12, '¿Quién debe aparecer como autor de una publicación?', 'Quienes hayan realizado contribuciones sustanciales y cumplan los criterios de autoría establecidos.'),
(6, 19, '¿Qué debe justificar un proyecto con animales?', 'La necesidad científica, la elección del modelo, el número de animales y las medidas de bienestar y reducción del daño.'),
(7, 19, '¿Cómo se reduce el sufrimiento animal?', 'Mediante procedimientos refinados, personal capacitado, supervisión veterinaria y criterios humanitarios adecuados.'),
(8, 19, '¿Se necesita autorización para investigar con animales?', 'Cuando lo exijan las normas, se deben obtener las autorizaciones y evaluaciones correspondientes antes de comenzar.'),
(9, 19, '¿Qué es el principio de las tres erres?', 'Es reemplazar animales cuando sea posible, reducir su número y refinar los procedimientos para minimizar el sufrimiento.'),
(10, 19, '¿Qué significa bienestar animal en investigación?', 'Significa proteger la salud y el bienestar de los animales y evitarles dolor o sufrimiento innecesarios.'),
(11, 7, '¿El comité de ética reemplaza al investigador?', 'No. El investigador conserva la responsabilidad de conducir el estudio de manera ética y segura.'),
(12, 7, '¿El investigador puede ignorar las observaciones del comité?', 'Debe atender las decisiones y requisitos aplicables; si discrepa, debe seguir el procedimiento institucional establecido.'),
(13, 7, '¿Quiénes pueden integrar un comité de ética?', 'Personas con conocimientos científicos, éticos, jurídicos y, según las reglas aplicables, representantes de la comunidad.'),
(14, 7, '¿Cuál es la función principal del comité de ética?', 'Proteger los derechos, la seguridad y el bienestar de las personas participantes.'),
(15, 7, '¿Qué es un comité de ética de investigación?', 'Es un órgano independiente que revisa los aspectos éticos de proyectos de investigación conforme a sus competencias.'),
(16, 5, '¿Qué hacer si se divulga información confidencial?', 'Debe notificarse a los responsables correspondientes y aplicarse el protocolo de respuesta y las obligaciones legales pertinentes.'),
(17, 5, '¿Se pueden compartir datos de investigación?', 'Sí, cuando exista autorización o una base válida, y se apliquen las medidas de protección correspondientes.'),
(18, 5, '¿Cómo se mantiene la identidad de los participantes protegida?', 'Usando códigos, restringiendo el acceso y eliminando identificadores cuando sea posible.'),
(19, 5, '¿Qué diferencia hay entre privacidad y confidencialidad?', 'La privacidad protege el ámbito personal; la confidencialidad regula el manejo y la divulgación de la información obtenida.'),
(20, 5, '¿Qué significa confidencialidad en una investigación?', 'Significa evitar que la información privada de los participantes sea divulgada a personas no autorizadas.'),
(21, 13, '¿Quién debe conocer un conflicto de interés?', 'Las instancias institucionales pertinentes, los comités correspondientes y otras partes cuando las reglas de transparencia lo exijan.'),
(22, 13, '¿Debe declararse el financiamiento privado?', 'Sí. Deben revelarse las fuentes de financiamiento y las condiciones que puedan afectar la independencia del estudio.'),
(23, 13, '¿Cómo se gestiona un conflicto de interés?', 'Se declara oportunamente y se aplican medidas como supervisión independiente o separación de determinadas decisiones.'),
(24, 13, '¿Un conflicto de interés siempre implica una falta ética?', 'No necesariamente. El problema depende de la situación y de cómo se declare, evalúe y gestione.'),
(25, 13, '¿Qué es un conflicto de interés?', 'Es una situación en la que intereses secundarios pueden influir o parecer influir en el juicio profesional del investigador.'),
(26, 3, '¿El consentimiento debe ser comprensible?', 'Sí. Debe utilizar un lenguaje claro, accesible y adecuado para la población participante.'),
(27, 3, '¿Quién puede otorgar el consentimiento?', 'Una persona con capacidad para decidir; en casos especiales se aplican las reglas de representación y asentimiento correspondientes.'),
(28, 3, '¿Se puede retirar el consentimiento?', 'Sí. La persona puede retirar su participación de acuerdo con las condiciones informadas y la normativa aplicable.'),
(29, 3, '¿Qué información debe incluir el consentimiento?', 'El objetivo, los procedimientos, los riesgos, los beneficios, la privacidad y los derechos de los participantes.'),
(30, 3, '¿Qué es el consentimiento informado?', 'Es la aceptación libre y voluntaria de una persona después de recibir información suficiente sobre el estudio.'),
(31, 9, '¿Se puede discriminar a una persona al seleccionarla para un estudio?', 'No. La selección debe basarse en criterios científicos y éticos justificados, sin discriminación injustificada.'),
(32, 9, '¿Qué ocurre si un participante sufre un daño relacionado con el estudio?', 'Debe activarse el procedimiento de atención previsto y cumplirse las obligaciones éticas, institucionales y legales aplicables.'),
(33, 9, '¿Los participantes tienen derecho a hacer preguntas?', 'Sí. Deben poder solicitar aclaraciones antes y durante su participación.'),
(34, 9, '¿Pueden negarse a participar en un estudio?', 'Sí. La participación debe ser voluntaria y no debe imponerse mediante amenazas o presiones indebidas.'),
(35, 9, '¿Qué derechos tienen los participantes?', 'Tienen derecho a recibir información, decidir libremente, proteger su privacidad y recibir un trato digno.'),
(36, 24, '¿Se pueden divulgar resultados antes de verificarlos?', 'Deben evitarse afirmaciones definitivas sin evidencia suficiente y señalar claramente cualquier resultado preliminar.'),
(37, 24, '¿Por qué deben explicarse las limitaciones de un estudio?', 'Porque ayudan a interpretar correctamente los resultados y evitan conclusiones que la evidencia no respalda.'),
(38, 24, '¿Cómo deben comunicarse los resultados científicos?', 'Con claridad, precisión y contexto, explicando las limitaciones y evitando afirmaciones exageradas.'),
(39, 24, '¿Qué es la divulgación científica?', 'Es comunicar el conocimiento científico a públicos especializados o generales de manera comprensible y responsable.'),
(40, 1, '¿Qué sucede si una investigación no respeta la ética?', 'Puede ocasionar daños, pérdida de confianza, sanciones institucionales y rechazo de sus resultados.'),
(41, 1, '¿Quién debe cumplir las normas éticas?', 'Todos los investigadores, estudiantes, docentes, colaboradores y responsables del estudio.'),
(42, 1, '¿Cuál es el objetivo de la ética en la investigación?', 'Garantizar que los estudios se realicen con integridad, responsabilidad y respeto por los derechos humanos.'),
(43, 1, '¿Por qué es importante la ética científica?', 'Porque protege a los participantes, promueve la confianza pública y favorece resultados fiables.'),
(44, 1, '¿Qué es la ética científica?', 'Es el conjunto de principios y valores que orientan una investigación responsable, honesta y respetuosa.'),
(45, 6, '¿Puede solicitarse una nueva evaluación durante el estudio?', 'Sí, cuando existan cambios importantes, incidentes o nuevas circunstancias que puedan afectar la seguridad o los derechos.'),
(46, 6, '¿Qué aspectos revisa una evaluación ética?', 'Los riesgos, beneficios, selección de participantes, consentimiento, privacidad y protección de grupos vulnerables.'),
(47, 6, '¿Qué documentos pueden solicitarse para evaluar un proyecto?', 'El protocolo, el consentimiento informado, los instrumentos, el plan de datos y otros documentos pertinentes.'),
(48, 6, '¿Cuándo debe realizarse la evaluación ética?', 'Antes de iniciar las actividades que requieren revisión, según la normativa y las reglas institucionales.'),
(49, 6, '¿Qué es una evaluación ética?', 'Es la revisión de un proyecto para identificar riesgos, proteger a los participantes y comprobar que se respeten los principios éticos.'),
(50, 23, '¿Qué hacer si el financiador exige ocultar resultados?', 'Debe protegerse la integridad científica y buscar asesoría institucional antes de aceptar o ejecutar esa exigencia.'),
(51, 23, '¿Cómo se deben administrar los fondos de investigación?', 'Con transparencia, registros verificables y uso conforme al presupuesto, los acuerdos y las normas aplicables.'),
(52, 23, '¿Puede un financiador cambiar los resultados de un estudio?', 'No debe manipularse la evidencia; los acuerdos de financiamiento deben preservar la integridad y la independencia científica.'),
(53, 23, '¿Por qué debe declararse quién financia un estudio?', 'Para transparentar posibles influencias y permitir evaluar la independencia de la investigación.'),
(54, 2, '¿Cómo se corrige un error científico?', 'Debe informarse con transparencia, documentarse y corregirse en los registros o publicaciones correspondientes.'),
(55, 2, '¿Qué es la falsificación de datos?', 'Es alterar, manipular u omitir datos de forma engañosa para cambiar los resultados.'),
(56, 2, '¿Qué es la fabricación de datos?', 'Es inventar datos o resultados que nunca se obtuvieron mediante la investigación.'),
(57, 2, '¿Cómo se demuestra la integridad científica?', 'Registrando datos reales, describiendo los métodos con claridad y comunicando los resultados sin engaños.'),
(58, 2, '¿Qué significa integridad científica?', 'Significa actuar con honestidad, transparencia, rigor y responsabilidad durante todas las etapas de la investigación.'),
(59, 16, '¿Quién responde por los resultados generados con IA?', 'Las personas investigadoras siguen siendo responsables de verificar, interpretar y comunicar los resultados que utilizan.'),
(60, 16, '¿Se deben introducir datos personales en herramientas de IA?', 'Solo cuando exista una base válida y garantías adecuadas; deben evitarse las herramientas que no protejan correctamente la información.'),
(61, 16, '¿La inteligencia artificial puede inventar referencias?', 'Sí. Por eso es necesario verificar cada referencia y comprobar que las fuentes citadas realmente existen.'),
(62, 16, '¿Debe declararse el uso de inteligencia artificial?', 'Debe declararse cuando lo exijan las políticas institucionales, editoriales o del proyecto, indicando el uso realizado.'),
(63, 16, '¿Se puede utilizar inteligencia artificial en una investigación?', 'Sí, si su uso es apropiado, transparente y compatible con las normas institucionales, la privacidad y la integridad científica.'),
(64, 18, '¿Qué debe hacerse si un participante quiere abandonar el estudio?', 'Debe respetarse su decisión y seguirse el procedimiento establecido para su retiro, sin represalias.'),
(65, 18, '¿Se pueden realizar experimentos sin informar a los participantes?', 'En general se requiere información y consentimiento; cualquier excepción debe estar expresamente permitida y contar con revisión apropiada.'),
(66, 18, '¿Cómo se protege a los grupos vulnerables?', 'Mediante salvaguardas adicionales, justificación de su inclusión y procedimientos de consentimiento adecuados.'),
(67, 18, '¿Toda investigación con personas necesita revisión ética?', 'Depende del tipo de estudio y de la normativa aplicable; el investigador debe confirmar los requisitos antes de comenzar.'),
(68, 18, '¿Qué requisitos éticos tiene la investigación con seres humanos?', 'Debe proteger la dignidad, los derechos, la seguridad y el bienestar de los participantes, y contar con las revisiones necesarias.'),
(69, 14, '¿Se puede cambiar el método durante una investigación?', 'Sí, si existe una justificación válida, se documentan los cambios y se cumplen las aprobaciones necesarias.'),
(70, 14, '¿Qué significa reproducibilidad?', 'Es la posibilidad de obtener resultados consistentes al repetir análisis o procedimientos con información y métodos adecuados.'),
(71, 14, '¿Qué es una hipótesis?', 'Es una proposición comprobable que plantea una posible explicación o relación entre variables.'),
(72, 14, '¿Por qué debe justificarse el método de investigación?', 'Porque permite comprobar que el método responde a los objetivos y produce evidencia adecuada.'),
(73, 14, '¿Qué es la metodología científica?', 'Es el conjunto de métodos y procedimientos usados para formular preguntas, obtener evidencia y analizar resultados.'),
(74, 22, '¿Las normas éticas institucionales sustituyen las leyes?', 'No. Deben cumplirse tanto las normas institucionales como las leyes y regulaciones aplicables.'),
(75, 22, '¿Qué ocurre si se incumple el reglamento institucional?', 'Pueden aplicarse medidas correctivas o disciplinarias de acuerdo con el procedimiento y las normas vigentes.'),
(76, 22, '¿Dónde se consultan las reglas éticas de una universidad?', 'En los reglamentos, códigos de ética, políticas de investigación y canales oficiales de la institución.'),
(77, 22, '¿Qué es una normativa institucional de investigación?', 'Es el conjunto de reglas y procedimientos que orientan y regulan la investigación dentro de una institución.'),
(78, 11, '¿Qué hacer si se detecta plagio en un trabajo?', 'Debe documentarse la evidencia y seguirse el procedimiento académico o institucional correspondiente.'),
(79, 11, '¿Qué es la manipulación académica?', 'Es alterar o presentar de forma engañosa trabajos, fuentes, datos o resultados para obtener una ventaja indebida.'),
(80, 11, '¿Parafrasear elimina la obligación de citar?', 'No. Las ideas ajenas deben citarse aunque se expresen con palabras propias.'),
(81, 11, '¿Cómo se puede evitar el plagio?', 'Citando las fuentes, usando comillas para las citas textuales y elaborando referencias completas.'),
(82, 11, '¿Qué es el plagio académico?', 'Es presentar ideas, palabras, datos u obras ajenas como propias sin reconocer adecuadamente su origen.'),
(83, 8, '¿Qué significa respetar la autonomía?', 'Significa reconocer la capacidad de las personas para decidir libremente sobre su participación.'),
(84, 8, '¿Qué significa justicia en la investigación?', 'Significa distribuir de manera equitativa las cargas y los beneficios, y seleccionar participantes con criterios justos.'),
(85, 8, '¿Qué significa no maleficencia?', 'Significa evitar daños innecesarios y reducir los riesgos previsibles.'),
(86, 8, '¿Qué significa beneficencia?', 'Implica procurar beneficios razonables para los participantes o la sociedad mediante la investigación.'),
(87, 8, '¿Cuáles son los principios básicos de la ética en investigación?', 'Entre ellos están el respeto por las personas, la beneficencia, la no maleficencia y la justicia.'),
(88, 4, '¿Cuánto tiempo deben conservarse los datos?', 'Durante el periodo necesario según el protocolo, las obligaciones legales y las políticas institucionales.'),
(89, 4, '¿Qué es la minimización de datos?', 'Es recopilar únicamente los datos adecuados, pertinentes y necesarios para los objetivos del estudio.'),
(90, 4, '¿Se pueden recopilar datos sin informar a la persona?', 'Solo cuando exista una base jurídica válida y se cumplan las excepciones y salvaguardas previstas por la normativa aplicable.'),
(91, 4, '¿Cómo se protegen los datos personales?', 'Limitando su acceso, usando medidas de seguridad y recopilando solo la información necesaria.'),
(92, 4, '¿Qué son los datos personales?', 'Son datos que identifican o permiten identificar a una persona directa o indirectamente.'),
(93, 15, '¿Qué debe hacerse con los datos incompletos?', 'Deben tratarse mediante métodos apropiados y reportarse sus limitaciones sin ocultar información relevante.'),
(94, 15, '¿Por qué es importante documentar el análisis?', 'Para permitir la revisión de los procedimientos, detectar errores y comprender cómo se obtuvieron las conclusiones.'),
(95, 15, '¿Se pueden eliminar datos que contradicen la hipótesis?', 'No deben eliminarse de forma engañosa; cualquier exclusión debe tener una justificación metodológica documentada.'),
(96, 15, '¿Qué es un dato de investigación?', 'Es una observación, medición, registro o información utilizada para responder una pregunta científica.'),
(97, 15, '¿Cómo deben recopilarse los datos?', 'Con procedimientos adecuados, consistentes, transparentes y respetuosos de los derechos de las personas.'),
(98, 25, '¿Qué debo hacer si observo una posible falta ética?', 'Documenta los hechos de manera responsable y utiliza los canales institucionales establecidos para comunicar la situación.'),
(99, 25, '¿A quién puedo acudir si tengo dudas sobre consentimiento informado?', 'Al responsable del proyecto, a la unidad de investigación o al comité de ética competente.'),
(100, 25, '¿Qué documentos debo revisar antes de investigar?', 'El código de ética, los reglamentos institucionales, las normas aplicables y las guías pertinentes al tipo de estudio.'),
(101, 25, '¿Dónde puedo solicitar orientación ética para un proyecto?', 'Puedes consultar a la unidad de investigación, al comité de ética o a la autoridad académica correspondiente.'),
(102, 20, '¿Qué debe hacerse si un estudio puede afectar un ecosistema?', 'Se deben evaluar los riesgos, obtener los permisos requeridos y establecer medidas para proteger el entorno.'),
(103, 20, '¿Cómo puede una investigación reducir su huella ambiental?', 'Optimizando recursos, reduciendo residuos, usando materiales responsables y planificando los desplazamientos cuando sea posible.'),
(104, 20, '¿Por qué debe evaluarse el impacto ambiental?', 'Para identificar posibles daños y establecer medidas de prevención, mitigación y seguimiento.'),
(105, 20, '¿Cómo se gestionan los residuos de laboratorio?', 'Deben clasificarse, almacenarse y eliminarse mediante procedimientos seguros y conforme a las normas aplicables.'),
(106, 20, '¿Qué es la responsabilidad ambiental en investigación?', 'Es prevenir o reducir los impactos ambientales que pueden producir las actividades científicas.'),
(107, 10, '¿Por qué debe documentarse el proceso de investigación?', 'Porque permite verificar los procedimientos, comprender los resultados y mantener la trazabilidad del trabajo.'),
(108, 10, '¿Puede el investigador cambiar el protocolo sin autorización?', 'Los cambios deben seguir el procedimiento de aprobación correspondiente, salvo medidas urgentes para eliminar un peligro inmediato, que deben notificarse según las reglas aplicables.'),
(109, 10, '¿Qué debe hacer el investigador ante un riesgo inesperado?', 'Debe proteger a los participantes, documentar el incidente y comunicarlo según el protocolo y las normas aplicables.'),
(110, 10, '¿El investigador debe informar los conflictos de interés?', 'Sí. Debe declarar las relaciones o intereses que puedan influir, o parecer influir, en el estudio.'),
(111, 10, '¿Cuál es la responsabilidad principal del investigador?', 'Diseñar y ejecutar el estudio con rigor, honestidad, respeto a los participantes y cumplimiento de las normas aplicables.'),
(112, 21, '¿Se puede continuar un estudio si aparecen riesgos graves inesperados?', 'Debe reevaluarse la situación y adoptarse medidas de protección, incluida la suspensión cuando sea necesaria.'),
(113, 21, '¿Qué debe hacerse para reducir los riesgos?', 'Deben establecerse medidas preventivas, protocolos de seguridad y procedimientos de respuesta ante incidentes.'),
(114, 21, '¿Cómo se evalúa la relación entre riesgos y beneficios?', 'Se valoran la probabilidad y gravedad de los daños frente a los beneficios esperados y el valor científico del estudio.'),
(115, 21, '¿Qué es un riesgo en investigación?', 'Es la posibilidad de que ocurra un daño físico, psicológico, social, económico o relacionado con la privacidad.'),
(116, 17, '¿Qué hacer ante un incidente de seguridad?', 'Debe reportarse de inmediato a los responsables y seguirse el procedimiento institucional para contenerlo y evaluar sus consecuencias.'),
(117, 17, '¿Por qué no se deben compartir contraseñas?', 'Porque compartirlas aumenta el riesgo de accesos indebidos y dificulta identificar quién realizó cada acción.'),
(118, 17, '¿Qué es una copia de seguridad?', 'Es una copia de los datos que permite recuperarlos si se pierden o dañan los archivos originales.'),
(119, 17, '¿Cómo se protegen los archivos de investigación?', 'Con controles de acceso, contraseñas seguras, copias de respaldo y almacenamiento autorizado.'),
(120, 17, '¿Qué es la seguridad de la información?', 'Es la protección de la información frente a accesos, alteraciones, pérdidas o divulgaciones no autorizadas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `auth_key` varchar(45) DEFAULT NULL,
  `access_token` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(64) DEFAULT NULL,
  `password_reset_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `nombre`, `apellido`, `password_hash`, `auth_key`, `access_token`, `role`, `correo`, `password_reset_token`, `password_reset_expires_at`) VALUES
(5, 'Nayeli Garcia', 'Nayeli', 'Garcia', '$2y$13$0mTrZc6usJrk.rnNrHeM5.9N9Oc23KrmMMf3ndBMIWT8fC2TQ6ho2', 'GEmROtQFE9D3Dx1oHKJkTSeRaS1O7E6V', 'xFG2B1Y5swi_NL6EWuihkkiZnNaCN6NO', 'admin', 'milekaguevara20@gamil.com', NULL, NULL),
(9, 'pervis2021', 'PERVIS', 'ZURITA', '$2y$13$yszCUWE5yPx.bFfGrmJ6h.CWy8UxM7MxHJtm2vcFj67AAvovPElae', 'YgolwQydsNWCY6bOlixHjr_56tWG-KAn', 'v0o1esLNFZ0RBR4Vzd0i5x7hGkUg22X0', 'user', 'perviszurita@gmail.com', '6deb089fbaf432ba232bfd83fe8c08be16561914db73eea992a50aad4ed30c4f', '2026-10-13 04:01:01'),
(10, 'pervis2021B', 'PERVIS', 'ZURITA', '$2y$13$/Pie66cIOz0/DWjrMQ2ZeuH8GCSwqAthUIWgoemUYdiFs3OjAhwDm', 'MQcUanPhEK7mtnzX7or0MEiGBFJotnYq', 'N9s93X7d46XJtgO1G_9fir4oHKwT4vCn', 'user', 'perviszurit1a@gmail.com', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `categorias2`
--
ALTER TABLE `categorias2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_faq`
--
ALTER TABLE `categorias_faq`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoria` (`categoria`);

--
-- Indices de la tabla `codigo_etica2`
--
ALTER TABLE `codigo_etica2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_categoria_id2` (`categoria_id`);

--
-- Indices de la tabla `cuestionario_opciones`
--
ALTER TABLE `cuestionario_opciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_opcion_pregunta` (`pregunta_id`);

--
-- Indices de la tabla `cuestionario_preguntas`
--
ALTER TABLE `cuestionario_preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuestionario_respuestas`
--
ALTER TABLE `cuestionario_respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_respuesta_resultado` (`resultado_id`),
  ADD KEY `fk_respuesta_pregunta` (`pregunta_id`),
  ADD KEY `fk_respuesta_opcion` (`opcion_id`);

--
-- Indices de la tabla `cuestionario_resultados`
--
ALTER TABLE `cuestionario_resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resultado_usuario` (`usuario_id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foro_usuario` (`usuario_id`);

--
-- Indices de la tabla `fororespuestas`
--
ALTER TABLE `fororespuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_respuesta_foro` (`foro_id`),
  ADD KEY `fk_respuesta_usuario` (`usuario_id`);

--
-- Indices de la tabla `infografias`
--
ALTER TABLE `infografias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntasfrecuentes`
--
ALTER TABLE `preguntasfrecuentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_preguntas_categoria` (`categoria_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `uk_user_correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `categorias2`
--
ALTER TABLE `categorias2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categorias_faq`
--
ALTER TABLE `categorias_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `codigo_etica2`
--
ALTER TABLE `codigo_etica2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `cuestionario_opciones`
--
ALTER TABLE `cuestionario_opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `cuestionario_preguntas`
--
ALTER TABLE `cuestionario_preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cuestionario_respuestas`
--
ALTER TABLE `cuestionario_respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `cuestionario_resultados`
--
ALTER TABLE `cuestionario_resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `fororespuestas`
--
ALTER TABLE `fororespuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `infografias`
--
ALTER TABLE `infografias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `preguntasfrecuentes`
--
ALTER TABLE `preguntasfrecuentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `codigo_etica2`
--
ALTER TABLE `codigo_etica2`
  ADD CONSTRAINT `fk_codigo_etica2_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias2` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionario_opciones`
--
ALTER TABLE `cuestionario_opciones`
  ADD CONSTRAINT `fk_opcion_pregunta` FOREIGN KEY (`pregunta_id`) REFERENCES `cuestionario_preguntas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cuestionario_respuestas`
--
ALTER TABLE `cuestionario_respuestas`
  ADD CONSTRAINT `fk_respuesta_opcion` FOREIGN KEY (`opcion_id`) REFERENCES `cuestionario_opciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_respuesta_pregunta` FOREIGN KEY (`pregunta_id`) REFERENCES `cuestionario_preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_respuesta_resultado` FOREIGN KEY (`resultado_id`) REFERENCES `cuestionario_resultados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuestionario_resultados`
--
ALTER TABLE `cuestionario_resultados`
  ADD CONSTRAINT `fk_resultado_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `user` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `fk_foro_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `fororespuestas`
--
ALTER TABLE `fororespuestas`
  ADD CONSTRAINT `fk_respuesta_foro` FOREIGN KEY (`foro_id`) REFERENCES `foro` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_respuesta_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `preguntasfrecuentes`
--
ALTER TABLE `preguntasfrecuentes`
  ADD CONSTRAINT `fk_preguntas_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias_faq` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
