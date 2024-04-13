-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.26 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para ucb
CREATE DATABASE IF NOT EXISTS `ucb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ucb`;

-- Volcando estructura para tabla ucb.administrativoforms
CREATE TABLE IF NOT EXISTS `administrativoforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `formmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `competencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `administrativoforms_formmodel_id_foreign` (`formmodel_id`),
  CONSTRAINT `administrativoforms_formmodel_id_foreign` FOREIGN KEY (`formmodel_id`) REFERENCES `formmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.administrativoforms: ~10 rows (aproximadamente)
INSERT INTO `administrativoforms` (`id`, `formmodel_id`, `factor`, `descripcion`, `competencia`, `ponderacion`, `created_at`, `updated_at`) VALUES
	(12, 47, 'Destreza laboral', 'Capacidad de aplicar destrezas, habilidades y conocimientos que sean necesarios para ser efectivo en el contenido funcional específico del puesto', 'COMPETENCIAS TÉCNICAS', 40, '2023-12-17 23:46:34', '2023-12-17 23:46:34'),
	(13, 47, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 30, '2023-12-17 23:46:35', '2023-12-17 23:46:35'),
	(14, 47, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 30, '2023-12-17 23:46:35', '2023-12-17 23:46:35'),
	(15, 47, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 50, '2023-12-17 23:46:35', '2023-12-17 23:46:35'),
	(16, 47, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 50, '2023-12-17 23:46:35', '2023-12-17 23:46:35'),
	(17, 47, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:35', '2023-12-17 23:46:35'),
	(18, 47, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:36', '2023-12-17 23:46:36'),
	(19, 47, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:36', '2023-12-17 23:46:36'),
	(20, 47, 'Trabajo en equipo', 'Capacidad de interactuar de manera efectiva con el equipo de trabajo, generando sinergias,  para lograr una meta común.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:36', '2023-12-17 23:46:36'),
	(21, 47, 'Responsabilidad', 'Capacidad de cumplir con compromisos laborales asumidos con dedicación y esfuerzo.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:36', '2023-12-17 23:46:36');

-- Volcando estructura para tabla ucb.arbolcargos
CREATE TABLE IF NOT EXISTS `arbolcargos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cargo_dependiente` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel_id` bigint unsigned NOT NULL,
  `cargo_jefe` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `arbolcargos_nivel_id_foreign` (`nivel_id`),
  KEY `arbolcargos_cargo_jefe_foreign` (`cargo_jefe`),
  CONSTRAINT `arbolcargos_cargo_jefe_foreign` FOREIGN KEY (`cargo_jefe`) REFERENCES `jcargos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `arbolcargos_nivel_id_foreign` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.arbolcargos: ~157 rows (aproximadamente)
INSERT INTO `arbolcargos` (`id`, `cargo_dependiente`, `nivel_id`, `cargo_jefe`, `created_at`, `updated_at`) VALUES
	(1, 'PROCURADOR', 4, 1, '2023-12-01 20:51:07', '2023-12-01 20:51:07'),
	(3, 'ENCARGADO(A) DE PROCESOS TÉCNICOS DE BIBLIOTECA', 2, 3, '2023-12-01 22:56:29', '2023-12-01 22:56:29'),
	(4, 'ENCARGADO(A) DE SERVICIOS DE BIBLIOTECA', 2, 3, '2023-12-01 22:56:54', '2023-12-01 22:56:54'),
	(5, 'ENCARGADO(A) DE INFORMÁTICA DE  BIBLIOTECA', 2, 3, '2023-12-01 22:57:11', '2023-12-01 22:57:11'),
	(6, 'ASISTENTE ADMINISTRATIVO(A)', 5, 3, '2023-12-01 22:57:33', '2023-12-01 22:57:33'),
	(7, 'TECNICO DE PROCESOS BIBLIOTECARIOS', 4, 4, '2023-12-01 22:58:18', '2023-12-01 22:58:18'),
	(8, 'TÉCNICO DE SERVICIOS DE BIBLIOTECA', 4, 5, '2023-12-01 22:58:46', '2023-12-01 22:58:46'),
	(9, 'TÉCNICO INFORMÁTICO DE BIBLIOTECA', 4, 4, '2023-12-01 22:59:16', '2023-12-01 22:59:16'),
	(10, 'ESPECIALISTA DE  BALLET CLÁSICO', 3, 6, '2023-12-01 22:59:48', '2023-12-01 22:59:48'),
	(11, 'ESPECIALISTA EN DANZA MODERNA', 3, 6, '2023-12-01 23:00:13', '2023-12-01 23:00:13'),
	(12, 'ESPECIALISTA  EN BALLET FOLKLÓRICO', 3, 6, '2023-12-01 23:00:27', '2023-12-01 23:00:27'),
	(13, 'ESPECIALISTA EN MÚSICA CORAL', 3, 6, '2023-12-01 23:00:43', '2023-12-01 23:00:43'),
	(14, 'ESPECIALISTA EN TEATRO Y ARTES ESCÉNICAS', 3, 6, '2023-12-01 23:00:57', '2023-12-01 23:00:57'),
	(15, 'ASISTENTE ADMINISTRATIVO', 5, 6, '2023-12-01 23:01:23', '2023-12-01 23:01:23'),
	(16, 'GESTOR DE ARTE Y CULTURA', 3, 6, '2023-12-01 23:02:52', '2023-12-01 23:02:52'),
	(17, 'ENCARGADO(A) DE LABORATORIO DE QUÍMICA', 2, 7, '2023-12-01 23:03:11', '2023-12-01 23:03:11'),
	(18, 'ASISTENTE ADMINISTRATIVO(A)', 5, 8, '2023-12-01 23:03:55', '2023-12-01 23:03:55'),
	(19, 'JEFE DEL DEPARTAMENTO DE TECNOLOGÍA Y SISTEMAS', 2, 8, '2023-12-01 23:04:17', '2023-12-01 23:04:17'),
	(21, 'JEFE DEL DEPARTAMENTO DE RECURSOS HUMANOS', 2, 8, '2023-12-01 23:04:49', '2023-12-01 23:04:49'),
	(22, 'JEFE DE LA UNIDAD DE CONTABILIDAD Y FINANZAS', 2, 8, '2023-12-01 23:04:59', '2023-12-01 23:04:59'),
	(23, 'JEFE DE LA UNIDAD DE ADQUISICIONES Y CONTRATACIONES', 2, 8, '2023-12-01 23:05:20', '2023-12-01 23:05:20'),
	(24, 'JEFE DE LA UNIDAD DE CONTROL DE GESTIÓN', 2, 8, '2023-12-01 23:05:38', '2023-12-01 23:05:38'),
	(25, 'JEFE DE LA UNIDAD DE INFRAESTRUCTURA', 2, 8, '2023-12-01 23:05:53', '2023-12-01 23:05:53'),
	(26, 'JEFE DE LA UNIDAD DEPORTES', 2, 8, '2023-12-01 23:06:08', '2023-12-01 23:06:08'),
	(27, 'ENCARGADO(A) DE  SERVICIOS ADMINISTRATIVOS ESTUDIANTILES', 2, 8, '2023-12-03 00:04:55', '2023-12-03 00:04:55'),
	(28, 'ENCARGADO(A) DEL CONSULTORIO MÉDICO', 2, 8, '2023-12-03 00:05:12', '2023-12-03 00:05:12'),
	(29, 'ANALISTA ADMINISTRADOR DE REDES Y HARDWARE', 3, 9, '2023-12-03 00:05:34', '2023-12-03 00:05:34'),
	(30, 'TÉCNICO EN REDES Y HARDWARE', 4, 9, '2023-12-03 00:05:59', '2023-12-03 00:05:59'),
	(31, 'ANALISTA DE SISTEMAS PROGRAMADOR', 3, 9, '2023-12-03 00:06:18', '2023-12-03 00:06:18'),
	(32, 'ANALISTA DE SISTEMAS', 3, 9, '2023-12-03 00:06:43', '2023-12-03 00:06:43'),
	(33, 'TECNICO PROGRAMADOR', 4, 9, '2023-12-03 00:07:00', '2023-12-03 00:07:00'),
	(34, 'ANALISTA DE RECURSOS HUMANOS', 3, 10, '2023-12-03 00:07:26', '2023-12-03 00:07:26'),
	(35, 'ANALISTA CONTABLE DE CUENTAS POR PAGAR', 3, 11, '2023-12-03 00:07:48', '2023-12-03 00:07:48'),
	(36, 'ANALISTA DE ACTIVOS FIJOS Y CONTABILIDAD', 3, 11, '2023-12-03 00:08:04', '2023-12-03 00:08:04'),
	(37, 'TÉCNICO DE CONTABILIDAD Y FINANZAS', 4, 11, '2023-12-03 00:08:29', '2023-12-03 00:08:29'),
	(38, 'TECNICO DE APOYO CONTABLE', 4, 11, '2023-12-03 00:08:39', '2023-12-03 00:08:39'),
	(39, 'TÉCNICO DE CONTABILIDAD', 4, 11, '2023-12-03 00:08:50', '2023-12-03 00:08:50'),
	(40, 'TÉCNICO DE CONTABILIDAD Y PAGOS', 4, 11, '2023-12-03 00:09:03', '2023-12-03 00:09:03'),
	(41, 'TÉCNICO DE ADQUISICIONES Y CONTRATACIONES', 4, 12, '2023-12-03 00:09:28', '2023-12-03 00:09:28'),
	(42, 'ANALISTA FINANCIERO(A)', 3, 13, '2023-12-03 00:09:55', '2023-12-03 00:09:55'),
	(43, 'ANALISTA ADMINISTRATIVO FINANCIERO DE POSTGRADO', 3, 13, '2023-12-03 00:10:16', '2023-12-03 00:10:16'),
	(44, 'ENCARGADO(A) DE MANTENIMIENTO', 2, 14, '2023-12-03 00:10:37', '2023-12-03 00:10:37'),
	(45, 'AUXILIAR DE SERVICIOS DE MANTENIMIENTO', 6, 15, '2023-12-03 00:10:54', '2023-12-03 00:10:54'),
	(46, 'ASISTENTE DE DEPORTES', 5, 16, '2023-12-03 00:11:18', '2023-12-03 00:11:18'),
	(47, 'MENSAJERO-CHOFER', 6, 8, '2023-12-03 00:11:38', '2023-12-03 00:11:38'),
	(48, 'DIRECTOR(A) ADMINISTRATIVO Y FINANCIERO DE SEDE', 1, 23, '2023-12-10 23:51:22', '2023-12-10 23:51:22'),
	(49, 'ENCARGADO(A) DE GESTIÓN ACADÉMICA DE POSTGRADO', 2, 17, '2023-12-16 06:47:13', '2023-12-16 06:47:13'),
	(50, 'ASISTENTE ADMINISTRATIVO(A)', 5, 17, '2023-12-16 06:48:33', '2023-12-16 06:48:33'),
	(51, 'COORDINADOR (A) DE INVESTIGACIÓN DE SEDE', 2, 17, '2023-12-16 06:48:59', '2023-12-16 06:48:59'),
	(52, 'JEFE DE UNIDAD DE REGISTRO ACADÉMICO', 2, 17, '2023-12-16 06:49:23', '2023-12-16 06:49:23'),
	(53, 'COORDINADOR(A) ACADÉMICO(A) DE DESARROLLO CURRICULAR', 2, 17, '2023-12-16 06:50:10', '2023-12-16 06:50:10'),
	(54, 'JEFE DE UNIDAD DE ADMISIÓN Y ORIENTACIÓN', 2, 17, '2023-12-16 06:50:26', '2023-12-16 06:50:26'),
	(55, 'ENCARGADO(A) DE GESTIÓN DE CALIDAD ACADÉMICA', 2, 17, '2023-12-16 06:50:48', '2023-12-16 06:50:48'),
	(56, 'ENCARGADO(A) DE SERVICIOS ESTUDIANTILES INTEGRALES', 2, 17, '2023-12-16 06:51:04', '2023-12-16 06:51:04'),
	(57, 'ANALISTA ACADÉMICO DE SEDE', 3, 17, '2023-12-16 06:51:37', '2023-12-16 06:51:37'),
	(58, 'TÉCNICO DE ARCHIVO ACADÉMICO', 4, 17, '2023-12-16 06:52:01', '2023-12-16 06:52:01'),
	(59, 'MENSAJERO ARCHIVISTA', 6, 17, '2023-12-16 06:52:27', '2023-12-16 06:52:27'),
	(60, 'ASISTENTE ADMINISTRATIVO(A)', 5, 18, '2023-12-16 06:52:55', '2023-12-16 06:52:55'),
	(61, 'TÉCNICO DE REGISTRO ACADÉMICO (REVISOR )', 4, 19, '2023-12-16 06:53:20', '2023-12-16 06:53:20'),
	(62, 'TÉCNICO DE REGISTRO ACADÉMICO (EMISIÓN DE CERTIFICADOS DE DIPLOMADO)', 4, 19, '2023-12-16 06:53:40', '2023-12-16 06:53:40'),
	(63, 'TÉCNICO DE REGISTRO ACADÉMICO (EMISIÓN DE  TITULOS PROFESIONALES)', 4, 19, '2023-12-16 06:53:50', '2023-12-16 06:53:50'),
	(64, 'TÉCNICO DE REGISTRO ACADÉMICO (EMISIÓN DE DIPLOMAS ACADÉMICOS)', 4, 19, '2023-12-16 06:54:01', '2023-12-16 06:54:01'),
	(65, 'TÉCNICO DE REGISTRO ACADÉMICO (EMISIÓN DE CERTIFICADOS)', 4, 19, '2023-12-16 06:54:21', '2023-12-16 06:54:21'),
	(66, 'ASISTENTE ADMINISTRATIVO(A) DE REGISTRO', 5, 19, '2023-12-16 06:54:39', '2023-12-16 06:54:39'),
	(67, 'ESPECIALISTA DE DESARROLLO CURRICULAR', 3, 20, '2023-12-16 06:54:51', '2023-12-16 06:55:35'),
	(68, 'ANALISTA DE ADMISIÓN Y ORIENTACIÓN-A', 3, 21, '2023-12-16 06:56:06', '2023-12-16 06:56:06'),
	(69, 'ANALISTA  DE ADMISIÓN Y ORIENTACIÓN-B', 3, 21, '2023-12-16 06:56:31', '2023-12-16 06:56:31'),
	(70, 'ANALISTA DE GESTIÓN DE CALIDAD ACADÉMICA', 3, 22, '2023-12-16 06:56:49', '2023-12-16 06:56:49'),
	(71, 'RECTOR DE SEDE', 1, 23, '2023-12-16 06:57:13', '2023-12-16 06:57:13'),
	(72, 'ESPECIALISTA DE PLANIFICACIÓN ESTRATÉGICA INSTITUCIONAL DE SEDE', 3, 23, '2023-12-16 06:57:29', '2023-12-16 06:57:29'),
	(73, 'ANALISTA ADMINISTRATIVO(A) DE BECAS', 3, 23, '2023-12-16 06:57:45', '2023-12-16 06:57:45'),
	(74, 'ANALISTA ADMINISTRATIVO(A) DE RECTORADO', 3, 23, '2023-12-16 06:58:03', '2023-12-16 06:58:03'),
	(75, 'TÉCNICO DE RECTORADO', 4, 23, '2023-12-16 06:58:18', '2023-12-16 06:58:18'),
	(76, 'JEFE DE UNIDAD DE RELACIONES PÚBLICAS E INFORMACIONES', 2, 23, '2023-12-16 06:58:40', '2023-12-16 06:58:40'),
	(77, 'JEFE DE UNIDAD DE MARKETING Y COMUNICACIÓN', 2, 23, '2023-12-16 06:58:57', '2023-12-16 06:58:57'),
	(78, 'ESPECIALISTA DE MARKETING DIGITAL', 3, 24, '2023-12-16 06:59:09', '2023-12-16 06:59:31'),
	(79, 'ESPECIALISTA DE MARKETING Y COMUNICACIÓN', 3, 24, '2023-12-16 06:59:53', '2023-12-16 06:59:53'),
	(80, 'ANALISTA DE MARKETING PARA POSTGRADO', 3, 24, '2023-12-16 07:00:10', '2023-12-16 07:00:10'),
	(81, 'TÉCNICO DE MARKETING Y COMUNICACIÓN', 4, 24, '2023-12-16 07:00:25', '2023-12-16 07:00:25'),
	(82, 'TÉCNICO DE RELACIONES PÚBLICAS', 4, 25, '2023-12-16 07:00:55', '2023-12-16 07:00:55'),
	(83, 'GESTOR DE INFORMACIONES', 5, 25, '2023-12-16 07:02:02', '2023-12-16 07:02:02'),
	(84, 'ASISTENTE DE INFORMACIONES', 5, 25, '2023-12-16 07:02:27', '2023-12-16 07:02:27'),
	(85, 'ASISTENTE DE RELACIONES PUBLICAS', 5, 25, '2023-12-16 07:02:40', '2023-12-16 07:02:40'),
	(86, 'TELEFONISTA', 5, 25, '2023-12-16 07:03:12', '2023-12-16 07:03:12'),
	(87, 'ESPECIALISTA DE FORMACIÓN ACADÉMICA Y PEDAGÓGICA', 3, 26, '2023-12-16 07:03:38', '2023-12-16 07:03:38'),
	(88, 'TÉCNICO DE INTERACCIÓN SOCIAL Y BIENESTAR COMUNITARIO', 4, 26, '2023-12-16 07:03:48', '2023-12-16 07:03:48'),
	(89, 'ESPECIALISTA DEL PROGRAMA NACIONAL DEL ADULTO MAYOR (UPTE)', 3, 26, '2023-12-16 07:04:03', '2023-12-16 07:04:03'),
	(90, 'TÉCNICO DE ESPIRITUALIDAD CRISTIANA Y TRANSVERSALIDAD PASTORAL', 4, 26, '2023-12-16 07:04:19', '2023-12-16 07:04:19'),
	(91, 'MEDIADOR(A) UNIVERSITARIO(A) DE SEDE', 3, 26, '2023-12-16 07:04:37', '2023-12-16 07:04:37'),
	(92, 'SECRETARIA DE DIRECCIÓN DE PASTORAL UNIVERSITARIA', 5, 26, '2023-12-16 07:05:04', '2023-12-16 07:05:04'),
	(93, 'ANALISTA DE POSTGRADO', 3, 27, '2023-12-16 07:15:49', '2023-12-16 07:15:49'),
	(94, 'ASISTENTE ADMINISTRATIVO', 5, 27, '2023-12-16 07:16:13', '2023-12-16 07:16:13'),
	(95, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE PSICOLOGÍA', 1, 27, '2023-12-16 07:16:47', '2023-12-16 07:16:47'),
	(96, 'DIRECTOR(A)  DEL DEPARTAMENTO ACADÉMICO DE COMUNICACIÓN SOCIAL', 1, 27, '2023-12-16 07:17:03', '2023-12-16 07:17:03'),
	(97, 'DIRECTOR(A) DEL DEPARTAMENTO DE CULTURA Y ARTE', 1, 27, '2023-12-16 07:17:19', '2023-12-16 07:17:19'),
	(98, 'DIRECTOR(A) DEL DEPARTAMENTO DE EDUCACIÓN', 1, 27, '2023-12-16 07:17:33', '2023-12-16 07:17:33'),
	(99, 'COORDINADOR(A) ACADÉMICO DEL INSTITUTO DE INVESTIGACIÓN EN CIENCIAS DEL COMPORTAMIENTO (IICC)', 2, 27, '2023-12-16 07:17:49', '2023-12-16 07:17:49'),
	(100, 'INVESTIGADOR SENIOR', 3, 28, '2023-12-16 07:18:27', '2023-12-16 07:18:27'),
	(101, 'INVESTIGADOR JUNIOR', 4, 28, '2023-12-16 07:18:56', '2023-12-16 07:18:56'),
	(102, 'JEFE DE DEPARTAMENTO DEL SECRAD', 2, 29, '2023-12-16 07:19:24', '2023-12-16 07:19:24'),
	(103, 'ESPECIALISTA DE AUDIO', 3, 29, '2023-12-16 07:19:45', '2023-12-16 07:19:45'),
	(104, 'ESPECIALISTA DE PRODUCCIÓN AUDIOVISUAL', 3, 29, '2023-12-16 07:20:04', '2023-12-16 07:20:04'),
	(105, 'ESPECIALISTA DE INCLUSIÓN, EQUIDAD Y DISCAPACIDAD', 3, 29, '2023-12-16 07:20:23', '2023-12-16 07:20:23'),
	(106, 'ANALISTA TÉCNICO DEL SECRAD', 3, 29, '2023-12-16 07:20:39', '2023-12-16 07:20:39'),
	(107, 'SECRETARIA DEL DEPARTAMENTO ACADÉMICO DE COMUNICACIÓN SOCIAL', 5, 29, '2023-12-16 07:20:54', '2023-12-16 07:20:54'),
	(114, 'ESPECIALISTA DE ENLACES EDUCATIVOS', 3, 31, '2023-12-16 07:22:53', '2023-12-16 07:22:53'),
	(115, 'ENCARGADO(A) DEL CENTRO DE IDIOMAS', 3, 31, '2023-12-16 07:23:16', '2023-12-16 07:23:16'),
	(116, 'SECRETARIA DE DIRECCIÓN / DEPARTAMENTO/ UNIDAD ACADÉMICA', 5, 31, '2023-12-16 07:23:36', '2023-12-16 07:23:36'),
	(117, 'ASISTENTE ADMINISTRATIVO(A)', 5, 32, '2023-12-16 07:24:08', '2023-12-16 07:24:08'),
	(118, 'ANALISTA DE POSTGRADO', 3, 33, '2023-12-16 07:24:31', '2023-12-16 07:24:31'),
	(119, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE ECONOMÍA', 1, 33, '2023-12-16 07:24:51', '2023-12-16 07:24:51'),
	(120, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE ADMINISTRACIÓN DE EMPRESAS', 1, 33, '2023-12-16 07:25:13', '2023-12-16 07:25:13'),
	(121, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE CONTADURÍA PÚBLICA', 1, 33, '2023-12-16 07:25:30', '2023-12-16 07:25:30'),
	(122, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERÍA COMERCIAL', 1, 33, '2023-12-16 07:25:50', '2023-12-16 07:25:50'),
	(123, 'JEFE DEL PROGRAMA ACADÉMICO DE ADMINISTRACIÓN TURÍSTICA', 2, 33, '2023-12-16 07:26:13', '2023-12-16 07:26:13'),
	(124, 'DIRECTOR(A) DEL INSTITUTO DE INVESTIGACIONES SOCIOECONÓMICAS -IISEC', 1, 33, '2023-12-16 07:26:47', '2023-12-16 07:26:47'),
	(125, 'INVESTIGADOR SENIOR', 3, 34, '2023-12-16 07:27:14', '2023-12-16 07:27:14'),
	(126, 'INVESTIGADOR', 4, 34, '2023-12-16 07:27:40', '2023-12-16 07:27:40'),
	(127, 'SECRETARIA DE DEPARTAMENTO ACADÉMICO', 5, 34, '2023-12-16 07:28:02', '2023-12-16 07:28:02'),
	(128, 'SECRETARIA DE DEPARTAMENTO', 5, 35, '2023-12-16 07:28:24', '2023-12-16 07:28:24'),
	(129, 'ASISTENTE DE ADMINISTRACIÓN DE EMPRESAS', 5, 36, '2023-12-16 07:28:45', '2023-12-16 07:28:45'),
	(130, 'TÉCNICO DE INGENIERIA COMERCIAL', 4, 37, '2023-12-16 07:29:12', '2023-12-16 07:29:12'),
	(131, 'SECRETARIA DE PROGRAMA ACADÉMICO', 5, 38, '2023-12-16 07:29:31', '2023-12-16 07:29:31'),
	(132, 'SECRETARIAS DE FACULTAD DE INGENIERIA', 5, 39, '2023-12-16 07:30:03', '2023-12-16 07:30:03'),
	(133, 'ANALISTA DE POSTGRADO', 3, 39, '2023-12-16 07:30:19', '2023-12-16 07:30:19'),
	(134, 'TÉCNICO DE POSTGRADO', 4, 39, '2023-12-16 07:30:31', '2023-12-16 07:30:31'),
	(135, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA INDUSTRIAL', 1, 39, '2023-12-16 07:30:52', '2023-12-16 07:30:52'),
	(136, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA DE SISTEMAS', 1, 39, '2023-12-16 07:31:20', '2023-12-16 07:31:20'),
	(137, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA DE AMBIENTAL', 1, 39, '2023-12-16 07:31:33', '2023-12-16 07:31:33'),
	(138, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA CIVIL', 1, 39, '2023-12-16 07:31:50', '2023-12-16 07:31:50'),
	(139, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA DE MECATRÓNICA', 1, 39, '2023-12-16 07:32:09', '2023-12-16 07:32:09'),
	(140, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA QUÍMICA', 1, 39, '2023-12-16 07:32:23', '2023-12-16 07:32:23'),
	(141, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA BIOQUÍMICA Y DE BIOPROCESOS', 1, 39, '2023-12-16 07:32:37', '2023-12-16 07:32:37'),
	(142, 'DIRECTOR(A) DEL DEPARTAMENTO DE CIENCIAS BÁSICAS', 1, 39, '2023-12-16 07:32:49', '2023-12-16 07:32:49'),
	(143, 'JEFE DE ESTUDIOS DEL PROGRAMA ACADÉMICO DE INGENIERÍA EN TELECOMUNICACIONES', 2, 39, '2023-12-16 07:33:04', '2023-12-16 07:33:04'),
	(144, 'JEFE DE ESTUDIOS DEL PROGRAMA ACADÉMICO DE INGENIERÍA BIOMÉDICA', 2, 39, '2023-12-16 07:33:25', '2023-12-16 07:33:25'),
	(145, 'ENCARGADO(A) DE LABORATORIO DE INGENIERIA CIVIL', 2, 40, '2023-12-16 07:33:44', '2023-12-16 07:33:44'),
	(146, 'TÉCNICO DE LABORATORIO DE INGENIERIA CIVIL', 4, 40, '2023-12-16 07:33:57', '2023-12-16 07:33:57'),
	(147, 'ENCARGADO(A) DE LABORATORIO DE QUÍMICA', 2, 41, '2023-12-16 07:34:23', '2023-12-16 07:34:23'),
	(148, 'ENCARGADO(A) DE LABORATORIO DE FÍSICA', 2, 41, '2023-12-16 07:34:40', '2023-12-16 07:34:40'),
	(149, 'TÉCNICO DE LABORATORIO DE QUIMICA', 4, 41, '2023-12-16 07:34:54', '2023-12-16 07:34:54'),
	(150, 'TÉCNICO DE LABORATORIO DE FISICA', 4, 41, '2023-12-16 07:35:08', '2023-12-16 07:35:08'),
	(151, 'ANALISTA DE POSTGRADO', 3, 42, '2023-12-16 07:35:26', '2023-12-16 07:35:26'),
	(152, 'DIRECTOR(A) DEL  DEPARTAMENTO DE CIENCIAS POLÍTICAS Y RELACIONES INTERNACIONALES', 1, 42, '2023-12-16 07:35:45', '2023-12-16 07:35:45'),
	(153, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE DERECHO', 1, 42, '2023-12-16 07:35:59', '2023-12-16 07:35:59'),
	(154, 'COORDINADOR(A)  ACADÉMICO DEL INSTITUTO PARA LA DEMOCRACIA', 2, 42, '2023-12-16 07:36:17', '2023-12-16 07:36:17'),
	(155, 'SECRETARIA DE DEPARTAMENTO ACADÉMICO', 5, 43, '2023-12-16 07:36:54', '2023-12-16 07:36:54'),
	(156, 'ASISTENTE ADMINISTRATIVO(A)', 5, 44, '2023-12-16 07:37:32', '2023-12-16 07:37:32'),
	(157, 'DIRECTOR(A) ACADÉMICO DE SEDE', 1, 23, '2023-12-16 07:39:14', '2023-12-16 07:40:04'),
	(158, 'DIRECTOR(A) DE PASTORAL UNIVERSITARIA', 1, 23, '2023-12-16 07:39:39', '2023-12-16 07:39:39'),
	(159, 'DIRECTOR(A) DE BIBLIOTECA CENTRAL', 1, 23, '2023-12-16 07:42:01', '2023-12-16 07:42:01'),
	(165, 'ASESOR(A) LEGAL DE SEDE', 2, 23, '2023-12-16 07:47:54', '2023-12-16 07:47:54'),
	(166, 'TÉCNICO LEGAL', 4, 1, '2023-12-16 08:14:53', '2023-12-16 08:14:53'),
	(167, 'JEFE DE UNIDAD DE ADMINISTRACIÓN DE PERSONAL', 2, 8, '2023-12-16 21:04:07', '2023-12-16 21:04:07'),
	(168, 'TÉCNICO DE PERSONAL', 4, 8, '2023-12-16 21:12:23', '2023-12-16 21:12:23'),
	(169, 'TÉCNICO DE SERVICIOS ADMINISTRATIVOS ESTUDIANTILES', 4, 8, '2023-12-16 21:30:55', '2023-12-16 21:30:55'),
	(170, 'CAJERO(A)', 4, 8, '2023-12-16 21:34:00', '2023-12-16 21:34:00');

-- Volcando estructura para tabla ucb.areas
CREATE TABLE IF NOT EXISTS `areas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.areas: ~11 rows (aproximadamente)
INSERT INTO `areas` (`id`, `area`, `created_at`, `updated_at`) VALUES
	(3, 'BIBLIOTECA CENTRAL', '2023-11-30 02:25:45', '2023-11-30 02:25:45'),
	(6, 'DIRECCIÓN ADMINISTRATIVA Y FINANCIERA DE SEDE', '2023-11-30 02:26:42', '2023-11-30 02:26:42'),
	(7, 'DIRECCIÓN ACADÉMICA DE SEDE', '2023-11-30 02:27:11', '2023-11-30 02:27:11'),
	(8, 'RECTORADO DE SEDE', '2023-11-30 02:27:27', '2023-11-30 02:27:27'),
	(9, 'DIRECCIÓN DE PASTORAL UNIVERSITARIA DE SEDE', '2023-11-30 02:27:47', '2024-01-01 23:21:16'),
	(10, 'FACULTAD DE CIENCIAS SOCIALES Y HUMANAS', '2023-11-30 02:28:01', '2023-11-30 02:28:01'),
	(11, 'FACULTAD DE CIENCIAS ECONÓMICAS Y FINANCIERAS', '2023-11-30 02:28:19', '2023-11-30 02:28:19'),
	(12, 'FACULTAD DE INGENIERÍA', '2023-11-30 02:28:34', '2024-01-02 08:20:04'),
	(13, 'FACULTAD DE DERECHO Y CIENCIAS POLÍTICAS', '2023-11-30 02:28:50', '2023-11-30 02:28:50'),
	(15, 'UNIDAD DE MARKETING Y COMUNICACIÓN', '2023-12-15 02:16:42', '2023-12-15 02:16:42'),
	(16, 'UNIDAD ACADÉMICA "EL ALTO"', '2024-01-02 09:12:15', '2024-01-02 09:12:15');

-- Volcando estructura para tabla ucb.assignments
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `evalprocess_id` bigint unsigned NOT NULL,
  `evaluador_id` bigint unsigned NOT NULL,
  `evaluado_id` bigint unsigned NOT NULL,
  `evaluador_calificacion` tinyint(1) NOT NULL DEFAULT '0',
  `evaluado_calificacion` tinyint(1) NOT NULL DEFAULT '0',
  `evaluado_deacuerdo` tinyint(1) NOT NULL DEFAULT '0',
  `finalizacion` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assignments_evalprocess_id_foreign` (`evalprocess_id`),
  KEY `assignments_evaluador_id_foreign` (`evaluador_id`),
  KEY `assignments_evaluado_id_foreign` (`evaluado_id`),
  CONSTRAINT `assignments_evalprocess_id_foreign` FOREIGN KEY (`evalprocess_id`) REFERENCES `evalproces` (`id`) ON DELETE CASCADE,
  CONSTRAINT `assignments_evaluado_id_foreign` FOREIGN KEY (`evaluado_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `assignments_evaluador_id_foreign` FOREIGN KEY (`evaluador_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1748 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.assignments: ~103 rows (aproximadamente)
INSERT INTO `assignments` (`id`, `evalprocess_id`, `evaluador_id`, `evaluado_id`, `evaluador_calificacion`, `evaluado_calificacion`, `evaluado_deacuerdo`, `finalizacion`, `created_at`, `updated_at`) VALUES
	(1643, 1, 94, 131, 1, 1, 1, 1, '2024-04-08 02:43:32', '2024-04-08 03:26:39'),
	(1644, 1, 121, 122, 0, 0, 0, 0, '2024-04-08 02:43:32', '2024-04-08 02:43:32'),
	(1645, 1, 126, 127, 0, 0, 0, 0, '2024-04-08 02:43:32', '2024-04-08 02:43:32'),
	(1646, 1, 94, 121, 1, 1, 1, 1, '2024-04-08 02:43:32', '2024-04-08 03:27:42'),
	(1647, 1, 94, 123, 1, 1, 0, 1, '2024-04-08 02:43:33', '2024-04-08 03:28:28'),
	(1648, 1, 112, 118, 0, 0, 0, 0, '2024-04-08 02:43:33', '2024-04-08 02:43:33'),
	(1649, 1, 94, 95, 0, 0, 0, 0, '2024-04-08 02:43:33', '2024-04-08 02:43:33'),
	(1650, 1, 94, 132, 1, 1, 1, 1, '2024-04-08 02:43:33', '2024-04-08 03:29:20'),
	(1651, 1, 112, 117, 0, 0, 0, 0, '2024-04-08 02:43:34', '2024-04-08 02:43:34'),
	(1652, 1, 165, 94, 0, 0, 0, 0, '2024-04-08 02:43:34', '2024-04-08 02:43:34'),
	(1653, 1, 112, 119, 0, 0, 0, 0, '2024-04-08 02:43:34', '2024-04-08 02:43:34'),
	(1654, 1, 112, 114, 0, 0, 0, 0, '2024-04-08 02:43:34', '2024-04-08 02:43:34'),
	(1655, 1, 112, 120, 0, 0, 0, 0, '2024-04-08 02:43:34', '2024-04-08 02:43:34'),
	(1656, 1, 112, 115, 0, 0, 0, 0, '2024-04-08 02:43:34', '2024-04-08 02:43:34'),
	(1657, 1, 94, 126, 0, 0, 0, 0, '2024-04-08 02:43:34', '2024-04-08 02:43:34'),
	(1658, 1, 133, 138, 0, 0, 0, 0, '2024-04-08 02:43:35', '2024-04-08 02:43:35'),
	(1659, 1, 123, 124, 0, 0, 0, 0, '2024-04-08 02:43:35', '2024-04-08 02:43:35'),
	(1660, 1, 94, 129, 0, 0, 0, 0, '2024-04-08 02:43:35', '2024-04-08 02:43:35'),
	(1661, 1, 94, 130, 0, 0, 0, 0, '2024-04-08 02:43:35', '2024-04-08 02:43:35'),
	(1662, 1, 94, 112, 0, 0, 0, 0, '2024-04-08 02:43:35', '2024-04-08 02:43:35'),
	(1663, 1, 133, 191, 0, 0, 0, 0, '2024-04-08 02:43:35', '2024-04-08 02:43:35'),
	(1664, 1, 112, 113, 0, 0, 0, 0, '2024-04-08 02:43:35', '2024-04-08 02:43:35'),
	(1665, 1, 112, 116, 0, 0, 0, 0, '2024-04-08 02:43:35', '2024-04-08 02:43:35'),
	(1666, 1, 123, 125, 0, 0, 0, 0, '2024-04-08 02:43:35', '2024-04-08 02:43:35'),
	(1667, 1, 94, 176, 0, 0, 0, 0, '2024-04-08 02:43:35', '2024-04-08 02:43:35'),
	(1668, 1, 201, 139, 0, 0, 0, 0, '2024-04-08 02:43:36', '2024-04-08 02:43:36'),
	(1669, 1, 94, 128, 0, 0, 0, 0, '2024-04-08 02:43:36', '2024-04-08 02:43:36'),
	(1670, 1, 13, 14, 0, 0, 0, 0, '2024-04-08 07:44:03', '2024-04-08 07:44:03'),
	(1671, 1, 13, 16, 0, 0, 0, 0, '2024-04-08 07:44:03', '2024-04-08 07:44:03'),
	(1672, 1, 13, 177, 0, 0, 0, 0, '2024-04-08 07:44:04', '2024-04-08 07:44:04'),
	(1673, 1, 16, 17, 1, 1, 1, 1, '2024-04-08 07:44:04', '2024-04-09 19:40:05'),
	(1674, 1, 16, 18, 1, 1, 1, 1, '2024-04-08 07:44:04', '2024-04-09 19:45:07'),
	(1675, 1, 16, 19, 1, 1, 1, 1, '2024-04-08 07:44:04', '2024-04-09 19:46:03'),
	(1676, 1, 16, 27, 1, 1, 0, 1, '2024-04-08 07:44:04', '2024-04-09 19:46:54'),
	(1677, 1, 165, 13, 0, 0, 0, 0, '2024-04-08 07:44:04', '2024-04-08 07:44:04'),
	(1678, 1, 14, 20, 0, 0, 0, 0, '2024-04-08 07:44:05', '2024-04-08 07:44:05'),
	(1679, 1, 14, 21, 0, 0, 0, 0, '2024-04-08 07:44:05', '2024-04-08 07:44:05'),
	(1680, 1, 14, 22, 0, 0, 0, 0, '2024-04-08 07:44:05', '2024-04-08 07:44:05'),
	(1681, 1, 14, 23, 0, 0, 0, 0, '2024-04-08 07:44:05', '2024-04-08 07:44:05'),
	(1682, 1, 14, 24, 0, 0, 0, 0, '2024-04-08 07:44:05', '2024-04-08 07:44:05'),
	(1683, 1, 14, 25, 0, 0, 0, 0, '2024-04-08 07:44:05', '2024-04-08 07:44:05'),
	(1684, 1, 14, 26, 0, 0, 0, 0, '2024-04-08 07:44:06', '2024-04-08 07:44:06'),
	(1685, 1, 47, 48, 0, 0, 0, 0, '2024-04-08 07:44:06', '2024-04-08 07:44:06'),
	(1686, 1, 47, 49, 0, 0, 0, 0, '2024-04-08 07:44:06', '2024-04-08 07:44:06'),
	(1687, 1, 47, 50, 0, 0, 0, 0, '2024-04-08 07:44:06', '2024-04-08 07:44:06'),
	(1688, 1, 47, 51, 0, 0, 0, 0, '2024-04-08 07:44:06', '2024-04-08 07:44:06'),
	(1689, 1, 47, 52, 0, 0, 0, 0, '2024-04-08 07:44:06', '2024-04-08 07:44:06'),
	(1690, 1, 47, 53, 0, 0, 0, 0, '2024-04-08 07:44:06', '2024-04-08 07:44:06'),
	(1691, 1, 179, 38, 0, 0, 0, 0, '2024-04-08 07:44:06', '2024-04-08 07:44:06'),
	(1692, 1, 179, 41, 0, 0, 0, 0, '2024-04-08 07:44:07', '2024-04-08 07:44:07'),
	(1693, 1, 179, 47, 0, 0, 0, 0, '2024-04-08 07:44:07', '2024-04-08 07:44:07'),
	(1694, 1, 179, 57, 0, 0, 0, 0, '2024-04-08 07:44:07', '2024-04-08 07:44:07'),
	(1695, 1, 179, 62, 0, 0, 0, 0, '2024-04-08 07:44:07', '2024-04-08 07:44:07'),
	(1696, 1, 179, 66, 0, 0, 0, 0, '2024-04-08 07:44:07', '2024-04-08 07:44:07'),
	(1697, 1, 179, 91, 0, 0, 0, 0, '2024-04-08 07:44:07', '2024-04-08 07:44:07'),
	(1698, 1, 179, 54, 0, 0, 0, 0, '2024-04-08 07:44:07', '2024-04-08 07:44:07'),
	(1699, 1, 179, 93, 0, 0, 0, 0, '2024-04-08 07:44:07', '2024-04-08 07:44:07'),
	(1700, 1, 179, 170, 0, 0, 0, 0, '2024-04-08 07:44:08', '2024-04-08 07:44:08'),
	(1701, 1, 179, 42, 0, 0, 0, 0, '2024-04-08 07:44:08', '2024-04-08 07:44:08'),
	(1702, 1, 179, 55, 0, 0, 0, 0, '2024-04-08 07:44:08', '2024-04-08 07:44:08'),
	(1703, 1, 179, 56, 0, 0, 0, 0, '2024-04-08 07:44:08', '2024-04-08 07:44:08'),
	(1704, 1, 66, 67, 0, 0, 0, 0, '2024-04-08 07:44:08', '2024-04-08 07:44:08'),
	(1705, 1, 57, 58, 0, 0, 0, 0, '2024-04-08 07:44:08', '2024-04-08 07:44:08'),
	(1706, 1, 57, 59, 0, 0, 0, 0, '2024-04-08 07:44:08', '2024-04-08 07:44:08'),
	(1707, 1, 57, 60, 0, 0, 0, 0, '2024-04-08 07:44:09', '2024-04-08 07:44:09'),
	(1708, 1, 57, 61, 0, 0, 0, 0, '2024-04-08 07:44:09', '2024-04-08 07:44:09'),
	(1709, 1, 62, 63, 0, 0, 0, 0, '2024-04-08 07:44:09', '2024-04-08 07:44:09'),
	(1710, 1, 62, 64, 0, 0, 0, 0, '2024-04-08 07:44:09', '2024-04-08 07:44:09'),
	(1711, 1, 62, 65, 0, 0, 0, 0, '2024-04-08 07:44:09', '2024-04-08 07:44:09'),
	(1712, 1, 165, 179, 0, 0, 0, 0, '2024-04-08 07:44:09', '2024-04-08 07:44:09'),
	(1713, 1, 41, 43, 0, 0, 0, 0, '2024-04-08 07:44:10', '2024-04-08 07:44:10'),
	(1714, 1, 41, 44, 0, 0, 0, 0, '2024-04-08 07:44:10', '2024-04-08 07:44:10'),
	(1715, 1, 41, 45, 0, 0, 0, 0, '2024-04-08 07:44:10', '2024-04-08 07:44:10'),
	(1716, 1, 41, 46, 0, 0, 0, 0, '2024-04-08 07:44:10', '2024-04-08 07:44:10'),
	(1717, 1, 91, 92, 0, 0, 0, 0, '2024-04-08 07:44:10', '2024-04-08 07:44:10'),
	(1718, 1, 67, 68, 0, 0, 0, 0, '2024-04-08 07:44:10', '2024-04-08 07:44:10'),
	(1719, 1, 67, 69, 0, 0, 0, 0, '2024-04-08 07:44:10', '2024-04-08 07:44:10'),
	(1720, 1, 67, 70, 0, 0, 0, 0, '2024-04-08 07:44:11', '2024-04-08 07:44:11'),
	(1721, 1, 67, 71, 0, 0, 0, 0, '2024-04-08 07:44:11', '2024-04-08 07:44:11'),
	(1722, 1, 67, 72, 0, 0, 0, 0, '2024-04-08 07:44:11', '2024-04-08 07:44:11'),
	(1723, 1, 67, 73, 0, 0, 0, 0, '2024-04-08 07:44:11', '2024-04-08 07:44:11'),
	(1724, 1, 67, 74, 0, 0, 0, 0, '2024-04-08 07:44:11', '2024-04-08 07:44:11'),
	(1725, 1, 67, 75, 0, 0, 0, 0, '2024-04-08 07:44:11', '2024-04-08 07:44:11'),
	(1726, 1, 67, 76, 0, 0, 0, 0, '2024-04-08 07:44:11', '2024-04-08 07:44:11'),
	(1727, 1, 67, 77, 0, 0, 0, 0, '2024-04-08 07:44:12', '2024-04-08 07:44:12'),
	(1728, 1, 67, 78, 0, 0, 0, 0, '2024-04-08 07:44:12', '2024-04-08 07:44:12'),
	(1729, 1, 67, 79, 0, 0, 0, 0, '2024-04-08 07:44:12', '2024-04-08 07:44:12'),
	(1730, 1, 67, 80, 0, 0, 0, 0, '2024-04-08 07:44:12', '2024-04-08 07:44:12'),
	(1731, 1, 67, 81, 0, 0, 0, 0, '2024-04-08 07:44:12', '2024-04-08 07:44:12'),
	(1732, 1, 67, 82, 0, 0, 0, 0, '2024-04-08 07:44:13', '2024-04-08 07:44:13'),
	(1733, 1, 67, 83, 0, 0, 0, 0, '2024-04-08 07:44:13', '2024-04-08 07:44:13'),
	(1734, 1, 67, 84, 0, 0, 0, 0, '2024-04-08 07:44:13', '2024-04-08 07:44:13'),
	(1735, 1, 67, 85, 0, 0, 0, 0, '2024-04-08 07:44:13', '2024-04-08 07:44:13'),
	(1736, 1, 67, 86, 0, 0, 0, 0, '2024-04-08 07:44:13', '2024-04-08 07:44:13'),
	(1737, 1, 67, 87, 0, 0, 0, 0, '2024-04-08 07:44:13', '2024-04-08 07:44:13'),
	(1738, 1, 67, 88, 0, 0, 0, 0, '2024-04-08 07:44:14', '2024-04-08 07:44:14'),
	(1739, 1, 67, 89, 0, 0, 0, 0, '2024-04-08 07:44:14', '2024-04-08 07:44:14'),
	(1740, 1, 67, 90, 0, 0, 0, 0, '2024-04-08 07:44:14', '2024-04-08 07:44:14'),
	(1741, 1, 165, 154, 0, 0, 0, 0, '2024-04-08 07:44:14', '2024-04-08 07:44:14'),
	(1742, 1, 154, 155, 0, 0, 0, 0, '2024-04-08 07:44:14', '2024-04-08 07:44:14'),
	(1743, 1, 154, 156, 0, 0, 0, 0, '2024-04-08 07:44:15', '2024-04-08 07:44:15'),
	(1744, 1, 154, 157, 0, 0, 0, 0, '2024-04-08 07:44:15', '2024-04-08 07:44:15'),
	(1745, 1, 154, 158, 0, 0, 0, 0, '2024-04-08 07:44:15', '2024-04-08 07:44:15'),
	(1746, 1, 154, 159, 0, 0, 0, 0, '2024-04-08 07:44:15', '2024-04-08 07:44:15'),
	(1747, 1, 154, 181, 0, 0, 0, 0, '2024-04-08 07:44:15', '2024-04-08 07:44:15');

-- Volcando estructura para tabla ucb.auxiliarforms
CREATE TABLE IF NOT EXISTS `auxiliarforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `formmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `competencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auxiliarforms_formmodel_id_foreign` (`formmodel_id`),
  CONSTRAINT `auxiliarforms_formmodel_id_foreign` FOREIGN KEY (`formmodel_id`) REFERENCES `formmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.auxiliarforms: ~11 rows (aproximadamente)
INSERT INTO `auxiliarforms` (`id`, `formmodel_id`, `factor`, `descripcion`, `competencia`, `ponderacion`, `created_at`, `updated_at`) VALUES
	(11, 47, 'Destreza laboral', 'Capacidad de aplicar destrezas, habilidades y conocimientos que sean necesarios para ser efectivo en el contenido funcional específico del puesto', 'COMPETENCIAS TÉCNICAS', 40, '2023-12-17 23:46:36', '2023-12-17 23:46:36'),
	(12, 47, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 30, '2023-12-17 23:46:37', '2023-12-17 23:46:37'),
	(13, 47, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 30, '2023-12-17 23:46:37', '2023-12-17 23:46:37'),
	(14, 47, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 40, '2023-12-17 23:46:37', '2023-12-17 23:46:37'),
	(15, 47, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, '2023-12-17 23:46:38', '2023-12-17 23:46:38'),
	(16, 47, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, '2023-12-17 23:46:38', '2023-12-17 23:46:38'),
	(17, 47, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:38', '2023-12-17 23:46:38'),
	(18, 47, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:38', '2023-12-17 23:46:38'),
	(19, 47, 'Trabajo en equipo', 'Capacidad de interactuar de manera efectiva con el equipo de trabajo, generando sinergias,  para lograr una meta común.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:38', '2023-12-17 23:46:38'),
	(20, 47, 'Responsabilidad', 'Capacidad de cumplir con compromisos laborales asumidos con dedicación y esfuerzo.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:38', '2023-12-17 23:46:38'),
	(21, 47, 'Iniciativa', 'Capacidad de emprender acciones, solucionar problemas rutinarios y mejorar resultados de acuerdo a la situación laboral que se presente.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:39', '2023-12-17 23:46:39');

-- Volcando estructura para tabla ucb.bodyresults
CREATE TABLE IF NOT EXISTS `bodyresults` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `version_form` bigint unsigned NOT NULL,
  `factor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `competencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `puntuacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bodyresults_user_id_foreign` (`user_id`),
  KEY `bodyresults_version_form_foreign` (`version_form`),
  CONSTRAINT `bodyresults_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bodyresults_version_form_foreign` FOREIGN KEY (`version_form`) REFERENCES `formmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.bodyresults: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ucb.cadministrativoforms
CREATE TABLE IF NOT EXISTS `cadministrativoforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `conformmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cadministrativoforms_conformmodel_id_foreign` (`conformmodel_id`),
  CONSTRAINT `cadministrativoforms_conformmodel_id_foreign` FOREIGN KEY (`conformmodel_id`) REFERENCES `conformmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.cadministrativoforms: ~4 rows (aproximadamente)
INSERT INTO `cadministrativoforms` (`id`, `conformmodel_id`, `factor`, `descripcion`, `ponderacion`, `created_at`, `updated_at`) VALUES
	(1, 5, 'Conocimiento de puesto', 'Conoce los temas relativos al ejercicio del puesto, los procedimientos de trabajo y la vinculación del puesto con otros funcionarios.', 25.00, '2024-01-22 02:29:35', '2024-01-22 02:29:35'),
	(2, 5, 'Calidad de Trabajo', 'Presenta orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 25.00, '2024-01-22 02:29:35', '2024-01-22 02:29:35'),
	(3, 5, 'Oportunidad', 'Cumple las tareas asignadas en el plazo y condiciones que se le han fijado.', 25.00, '2024-01-22 02:29:35', '2024-01-22 02:29:35'),
	(4, 5, 'Autonomía', 'Cumple con las funciones inherentes al puesto y las tareas encomendadas, sin necesidad de supervisión permanente.', 25.00, '2024-01-22 02:29:35', '2024-01-22 02:29:35');

-- Volcando estructura para tabla ucb.cargos
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel_id` bigint unsigned DEFAULT NULL,
  `area_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cargos_nivel_id_foreign` (`nivel_id`),
  KEY `cargos_area_id_foreign` (`area_id`),
  CONSTRAINT `cargos_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cargos_nivel_id_foreign` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.cargos: ~155 rows (aproximadamente)
INSERT INTO `cargos` (`id`, `cargo`, `nivel_id`, `area_id`, `created_at`, `updated_at`) VALUES
	(1, 'ASESOR(A) LEGAL DE SEDE', 2, 8, '2024-01-02 08:05:03', '2024-01-02 08:05:03'),
	(2, 'PROCURADOR', 4, 8, '2024-01-02 08:07:55', '2024-01-02 08:07:55'),
	(3, 'TÉCNICO LEGAL', 4, 8, '2024-01-02 08:08:37', '2024-01-02 08:08:37'),
	(4, 'ASISTENTE DE ADMINISTRACIÓN DE EMPRESAS', 5, 11, '2024-01-02 08:09:10', '2024-01-02 08:09:10'),
	(5, 'DIRECTOR(A) DE BIBLIOTECA CENTRAL', 1, 3, '2024-01-02 08:10:13', '2024-01-03 08:31:43'),
	(6, 'ENCARGADO(A) DE PROCESOS TÉCNICOS DE BIBLIOTECA', 2, 3, '2024-01-02 08:10:54', '2024-01-02 08:10:54'),
	(7, 'ENCARGADO(A) DE SERVICIOS DE BIBLIOTECA', 2, 3, '2024-01-02 08:12:03', '2024-01-02 08:12:03'),
	(8, 'ENCARGADO(A) DE INFORMÁTICA DE  BIBLIOTECA', 2, 3, '2024-01-02 08:12:21', '2024-01-02 08:12:21'),
	(9, 'TÉCNICO DE PROCESOS BIBLIOTECARIOS', 4, 3, '2024-01-02 08:12:54', '2024-01-02 08:12:54'),
	(10, 'TÉCNICO DE SERVICIOS DE BIBLIOTECA', 4, 3, '2024-01-02 08:13:19', '2024-01-02 08:13:19'),
	(11, 'TÉCNICO INFORMÁTICO DE BIBLIOTECA', 4, 3, '2024-01-02 08:13:48', '2024-01-02 08:13:48'),
	(12, 'DIRECTOR(A) DEPARTAMENTO DE CULTURA Y ARTE', 1, 10, '2024-01-02 08:14:22', '2024-01-02 08:14:22'),
	(13, 'ESPECIALISTA DE  BALLET CLÁSICO', 3, 10, '2024-01-02 08:14:47', '2024-01-02 08:14:47'),
	(14, 'ESPECIALISTA EN DANZA MODERNA', 3, 10, '2024-01-02 08:15:16', '2024-01-02 08:15:16'),
	(15, 'ESPECIALISTA  EN BALLET FOLKLÓRICO', 3, 10, '2024-01-02 08:15:43', '2024-01-02 08:15:43'),
	(16, 'ESPECIALISTA EN MÚSICA CORAL', 3, 10, '2024-01-02 08:16:11', '2024-01-02 08:16:11'),
	(17, 'ESPECIALISTA EN TEATRO Y ARTES ESCÉNICAS', 3, 10, '2024-01-02 08:16:36', '2024-01-02 08:16:36'),
	(18, 'GESTOR DE ARTE Y CULTURA', 3, 10, '2024-01-02 08:19:06', '2024-01-02 08:19:06'),
	(19, 'TÉCNICO DE LABORATORIO DE QUÍMICA', 4, 12, '2024-01-02 08:19:34', '2024-01-02 08:19:34'),
	(20, 'ENCARGADO(A) DE LABORATORIO DE QUÍMICA', 2, 12, '2024-01-02 08:20:45', '2024-01-02 08:20:45'),
	(21, 'TÉCNICO LABORATORIO DE FÍSICA', 4, 12, '2024-01-02 08:21:01', '2024-01-02 08:21:01'),
	(22, 'ENCARGADO(A) DE LABORATORIO DE FÍSICA', 2, 12, '2024-01-02 08:21:26', '2024-01-02 08:21:26'),
	(23, 'DIRECTOR(A) ADMINISTRATIVO Y FINANCIERO DE SEDE', 1, 6, '2024-01-02 08:21:50', '2024-01-02 08:21:50'),
	(24, 'ASISTENTE ADMINISTRATIVO(A)', 5, 6, '2024-01-02 08:22:12', '2024-01-02 08:22:12'),
	(25, 'JEFE DE DEPARTAMENTO DE TECNOLOGÍA Y SISTEMAS', 2, 6, '2024-01-02 08:22:38', '2024-01-02 08:22:38'),
	(26, 'ANALISTA ADMINISTRADOR DE REDES Y HARDWARE', 3, 6, '2024-01-02 08:23:06', '2024-01-02 08:23:06'),
	(27, 'TÉCNICO EN REDES Y HARDWARE', 4, 6, '2024-01-02 08:23:35', '2024-01-02 08:23:35'),
	(28, 'JEFE DEL DEPARTAMENTO DE RECURSOS HUMANOS', 2, 6, '2024-01-02 08:24:08', '2024-01-02 08:24:08'),
	(29, 'JEFE DE UNIDAD DE ADMINISTRACIÓN DE PERSONAL', 2, 6, '2024-01-02 08:25:33', '2024-01-02 08:25:33'),
	(30, 'ANALISTA DE RECURSOS HUMANOS', 3, 6, '2024-01-02 08:25:57', '2024-01-02 08:25:57'),
	(31, 'ASISTENTE ADMINISTRATIVO(A) DE PERSONAL', 5, 6, '2024-01-02 08:26:37', '2024-01-02 08:26:37'),
	(32, 'TÉCNICO DE PERSONAL', 4, 6, '2024-01-02 08:26:59', '2024-01-02 08:26:59'),
	(33, 'JEFE DE UNIDAD DE CONTABILIDAD Y FINANZAS', 2, 6, '2024-01-02 08:27:29', '2024-01-02 08:27:29'),
	(34, 'ANALISTA CONTABLE DE CUENTAS POR PAGAR', 3, 6, '2024-01-02 08:27:49', '2024-01-02 08:27:49'),
	(35, 'ANALISTA DE ACTIVOS FIJOS Y CONTABILIDAD', 3, 6, '2024-01-02 08:28:21', '2024-01-02 08:28:21'),
	(36, 'TÉCNICO DE CONTABILIDAD Y FINANZAS', 4, 6, '2024-01-02 08:28:41', '2024-01-02 08:28:41'),
	(37, 'TECNICO DE APOYO CONTABLE', 4, 6, '2024-01-02 08:28:58', '2024-01-02 08:28:58'),
	(38, 'TÉCNICO DE CONTABILIDAD', 4, 6, '2024-01-02 08:29:19', '2024-01-02 08:29:19'),
	(39, 'TÉCNICO DE CONTABILIDAD Y PAGOS', 4, 6, '2024-01-02 08:29:43', '2024-01-02 08:29:43'),
	(40, 'ENCARGADO(A) DE  SERVICIOS ADMINISTRATIVOS ESTUDIANTILES', 2, 6, '2024-01-02 08:30:11', '2024-01-02 08:30:11'),
	(41, 'TÉCNICO DE SERVICIOS ADMINISTRATIVOS ESTUDIANTILES', 4, 6, '2024-01-02 08:30:29', '2024-01-02 08:30:29'),
	(42, 'CAJERO(A)', 4, 6, '2024-01-02 08:30:47', '2024-01-02 08:30:47'),
	(43, 'JEFE DE UNIDAD DE ADQUISICIONES Y CONTRATACIONES', 2, 6, '2024-01-02 08:31:10', '2024-01-02 08:31:10'),
	(44, 'TÉCNICO DE ADQUISICIONES Y CONTRATACIONES', 4, 6, '2024-01-02 08:31:30', '2024-01-02 08:31:30'),
	(45, 'ASISTENTE ADMINISTRATIVO(A) DE ALMACENES', 5, 6, '2024-01-02 08:31:51', '2024-01-02 08:31:51'),
	(46, 'JEFE DE UNIDAD DE CONTROL DE GESTIÓN', 2, 6, '2024-01-02 08:32:10', '2024-01-02 08:32:10'),
	(47, 'ANALISTA FINANCIERO(A)', 3, 6, '2024-01-02 08:32:34', '2024-01-03 09:05:39'),
	(48, 'ANALISTA ADMINISTRATIVO FINANCIERO DE POSTGRADO', 3, 6, '2024-01-02 08:33:15', '2024-01-02 08:33:15'),
	(49, 'JEFE DE UNIDAD DE INFRAESTRUCTURA', 2, 6, '2024-01-02 08:33:34', '2024-01-02 08:33:34'),
	(50, 'ENCARGADO(A) DE MANTENIMIENTO', 2, 6, '2024-01-02 08:33:51', '2024-01-02 08:33:51'),
	(51, 'AUXILIAR DE SERVICIOS DE MANTENIMIENTO', 6, 6, '2024-01-02 08:34:15', '2024-01-02 08:34:15'),
	(52, 'JEFE DE UNIDAD DEPORTES', 2, 6, '2024-01-02 08:34:51', '2024-01-02 08:34:51'),
	(53, 'ASISTENTE DE DEPORTES', 5, 6, '2024-01-02 08:35:14', '2024-01-02 08:35:14'),
	(54, 'ENCARGADO(A) DEL CONSULTORIO MÉDICO', 2, 6, '2024-01-02 08:35:40', '2024-01-02 08:35:40'),
	(55, 'DIRECTOR(A) ACADÉMICO DE SEDE', 1, 7, '2024-01-02 08:36:07', '2024-01-02 08:36:07'),
	(56, 'ENCARGADO(A) DE GESTIÓN ACADÉMICA DE POSTGRADO', 2, 7, '2024-01-02 08:36:30', '2024-01-02 08:36:30'),
	(57, 'TÉCNICO DE POSTGRADO', 4, 12, '2024-01-02 08:36:56', '2024-01-02 08:36:56'),
	(58, 'ANALISTA DE POSTGRADO', 3, 13, '2024-01-02 08:38:08', '2024-01-02 08:38:08'),
	(59, 'ANALISTA DE MARKETING PARA POSTGRADO', 3, 15, '2024-01-02 08:38:32', '2024-01-02 08:38:32'),
	(60, 'COORDINADOR (A) DE  INVESTIGACIÓN DE SEDE', 2, 8, '2024-01-02 08:38:57', '2024-01-02 08:38:57'),
	(61, 'JEFE DE UNIDAD DE REGISTRO ACADÉMICO', 2, 7, '2024-01-02 08:39:19', '2024-01-02 08:39:19'),
	(62, 'TÉCNICO DE REGISTRO ACADÉMICO (REVISOR)', 4, 7, '2024-01-02 08:39:41', '2024-01-02 08:39:41'),
	(63, 'TÉCNICO DE REGISTRO ACADÉMICO (EMISIÓN DE CERTIFICADOS DE DIPLOMADO)', 4, 7, '2024-01-02 08:39:57', '2024-01-02 08:39:57'),
	(64, 'TÉCNICO DE REGISTRO ACADÉMICO (EMISIÓN DE  TITULOS PROFESIONALES)', 4, 7, '2024-01-02 08:40:18', '2024-01-02 08:40:18'),
	(65, 'TÉCNICO DE REGISTRO ACADÉMICO (EMISIÓN DE DIPLOMAS ACADÉMICOS)', 4, 7, '2024-01-02 08:40:34', '2024-01-02 08:40:34'),
	(66, 'TÉCNICO DE REGISTRO ACADÉMICO (EMISIÓN DE CERTIFICADOS)', 4, 7, '2024-01-02 08:40:58', '2024-01-02 08:40:58'),
	(67, 'ASISTENTE ADMINISTRATIVO(A) DE REGISTRO', 5, 7, '2024-01-02 08:42:17', '2024-01-02 08:42:17'),
	(68, 'COORDINADOR(A) ACADÉMICO(A) DE DESARROLLO CURRICULAR', 2, 7, '2024-01-02 08:42:50', '2024-01-02 08:42:50'),
	(69, 'ESPECIALISTA DE DESARROLLO CURRICULAR', 3, 7, '2024-01-02 08:43:19', '2024-01-02 08:43:19'),
	(70, 'JEFE DE UNIDAD DE ADMISIÓN Y ORIENTACIÓN', 2, 7, '2024-01-02 08:43:38', '2024-01-02 08:43:38'),
	(71, 'ANALISTA  DE ADMISIÓN Y ORIENTACIÓN-A', 3, 7, '2024-01-02 08:44:03', '2024-01-02 08:44:03'),
	(72, 'ANALISTA  DE ADMISIÓN Y ORIENTACIÓN-B', 3, 7, '2024-01-02 08:44:23', '2024-01-02 08:44:23'),
	(73, 'ENCARGADO(A) DE GESTIÓN DE CALIDAD ACADÉMICA', 2, 7, '2024-01-02 08:44:42', '2024-01-02 08:44:42'),
	(74, 'ANALISTA DE GESTIÓN DE CALIDAD ACADÉMICA', 3, 7, '2024-01-02 08:45:03', '2024-01-02 08:45:03'),
	(75, 'ENCARGADO(A) DE SERVICIOS ESTUDIANTILES INTEGRALES', 2, 7, '2024-01-02 08:45:29', '2024-01-02 08:45:29'),
	(76, 'ANALISTA ACADÉMICO DE SEDE', 3, 7, '2024-01-02 08:45:50', '2024-01-02 08:45:50'),
	(77, 'ENCARGADO(A)  TÉCNICO DE ARCHIVO ACADÉMICO', 2, 7, '2024-01-02 08:46:06', '2024-01-02 08:46:06'),
	(78, 'MENSAJERO ARCHIVISTA', 6, 7, '2024-01-02 08:46:28', '2024-01-02 08:46:28'),
	(79, 'ASISTENTE ADMINISTRATIVO(A)', 5, 7, '2024-01-02 08:46:49', '2024-01-02 08:46:49'),
	(80, 'DIRECTOR(A) DEPARTAMENTO DE EDUCACIÓN', 1, 10, '2024-01-02 08:47:59', '2024-01-02 08:47:59'),
	(81, 'ESPECIALISTA DE ENLACES EDUCATIVOS', 3, 10, '2024-01-02 08:48:27', '2024-01-02 08:48:27'),
	(82, 'ENCARGADO(A) DEL CENTRO DE IDIOMAS', 2, 10, '2024-01-02 08:49:21', '2024-01-02 08:49:21'),
	(83, 'ASISTENTE ADMINISTRATIVO(A)', 5, 10, '2024-01-02 08:49:45', '2024-01-02 08:49:45'),
	(84, 'ANALISTA DE POSTGRADO', 3, 10, '2024-01-02 08:50:07', '2024-01-02 08:50:07'),
	(86, 'TÉCNICO DE INGENIERIA COMERCIAL', 4, 7, '2024-01-02 08:51:16', '2024-01-02 08:51:16'),
	(87, 'COORDINADOR(A)  ACADÉMICO DEL INSTITUTO PARA LA DEMOCRACIA', 2, 13, '2024-01-02 08:51:43', '2024-01-02 08:51:43'),
	(88, 'COORDINADOR(A) ACADÉMICO DEL INSTITUTO DE INVESTIGACIÓN EN CIENCIAS DEL COMPORTAMIENTO (IICC)', 2, 10, '2024-01-02 08:52:10', '2024-01-02 08:52:10'),
	(89, 'INVESTIGADOR SENIOR', 3, 10, '2024-01-02 08:52:36', '2024-01-02 08:52:36'),
	(90, 'INVESTIGADOR JUNIOR', 4, 10, '2024-01-02 08:53:03', '2024-01-02 08:53:03'),
	(91, 'DIRECTOR(A) DEL INSTITUTO DE INVESTIGACIONES SOCIOECONÓMICAS -IISEC', 1, 11, '2024-01-02 08:53:22', '2024-01-02 08:53:22'),
	(92, 'INVESTIGADOR SENIOR', 3, 11, '2024-01-02 08:54:13', '2024-01-02 08:54:13'),
	(93, 'INVESTIGADOR', 3, 11, '2024-01-02 08:55:27', '2024-01-02 08:55:27'),
	(94, 'ENCARGADO(A) DE LABORATORIO DE INGENIERIA CIVIL', 2, 12, '2024-01-02 08:55:44', '2024-01-02 08:55:44'),
	(95, 'TÉCNICO DE LABORATORIO DE INGENIERIA CIVIL', 4, 12, '2024-01-02 08:56:02', '2024-01-02 08:56:02'),
	(96, 'JEFE DE UNIDAD DE MARKETING Y COMUNICACIÓN', 2, 8, '2024-01-02 08:56:23', '2024-01-02 08:56:23'),
	(97, 'ESPECIALISTA DE MARKETING DIGITAL', 3, 8, '2024-01-02 08:56:41', '2024-01-02 08:56:41'),
	(98, 'ESPECIALISTA DE MARKETING Y COMUNICACIÓN', 3, 8, '2024-01-02 08:57:00', '2024-01-02 08:57:00'),
	(99, 'TÉCNICO DE MARKETING Y COMUNICACIÓN', 4, 8, '2024-01-02 08:57:21', '2024-01-02 08:57:21'),
	(100, 'DIRECTOR DE PASTORAL UNIVERSITARIA', 1, 9, '2024-01-02 08:57:44', '2024-01-02 08:57:44'),
	(101, 'ESPECIALISTA DE FORMACIÓN ACADÉMICA Y PEDAGÓGICA', 3, 9, '2024-01-02 08:58:03', '2024-01-02 08:58:03'),
	(102, 'TÉCNICO DE INTERACCIÓN SOCIAL Y BIENESTAR COMUNITARIO', 4, 9, '2024-01-02 08:58:20', '2024-01-02 08:58:20'),
	(103, 'ESPECIALISTA DEL PROGRAMA NACIONAL DEL ADULTO MAYOR (UPTE)', 3, 9, '2024-01-02 08:58:42', '2024-01-02 08:58:42'),
	(104, 'TÉCNICO DE ESPIRITUALIDAD CRISTIANA Y TRANSVERSALIDAD PASTORAL', 4, 9, '2024-01-02 08:59:03', '2024-01-02 08:59:03'),
	(105, 'MEDIADOR(A) UNIVERSITARIO(A) DE SEDE', 3, 9, '2024-01-02 08:59:33', '2024-01-02 08:59:33'),
	(106, 'SECRETARIA DE DIRECCIÓN / DEPARTAMENTO/ UNIDAD ADMINISTRATIVA', 5, 9, '2024-01-02 09:00:05', '2024-01-02 09:00:05'),
	(107, 'JEFE DE UNIDAD DE RELACIONES PÚBLICAS E INFORMACIONES', 2, 8, '2024-01-02 09:00:28', '2024-01-02 09:00:28'),
	(108, 'TÉCNICO DE RELACIONES PÚBLICAS', 4, 8, '2024-01-02 09:00:53', '2024-01-02 09:00:53'),
	(109, 'GESTOR DE INFORMACIONES', 3, 8, '2024-01-02 09:01:13', '2024-01-02 09:01:13'),
	(110, 'ASISTENTE DE INFORMACIONES', 5, 8, '2024-01-02 09:01:37', '2024-01-02 09:01:37'),
	(111, 'ASISTENTE DE RELACIONES PUBLICAS', 5, 8, '2024-01-02 09:01:55', '2024-01-02 09:01:55'),
	(112, 'TELEFONISTA', 5, 8, '2024-01-02 09:02:19', '2024-01-02 09:02:19'),
	(113, 'RECTOR(A) DE SEDE', 1, 8, '2024-01-02 09:05:53', '2024-01-14 19:27:40'),
	(114, 'ESPECIALISTA DE PLANIFICACIÓN ESTRATÉGICA INSTITUCIONAL DE SEDE', 3, 8, '2024-01-02 09:06:46', '2024-01-02 09:06:46'),
	(115, 'ANALISTA ADMINISTRATIVO(A) DE BECAS', 3, 8, '2024-01-02 09:07:07', '2024-01-02 09:07:07'),
	(116, 'ANALISTA ADMINISTRATIVO(A) DE RECTORADO', 3, 8, '2024-01-02 09:07:26', '2024-01-02 09:07:26'),
	(117, 'TÉCNICO DE RECTORADO', 4, 8, '2024-01-02 09:07:47', '2024-01-02 09:07:47'),
	(118, 'MENSAJERO-CHOFER', 6, 6, '2024-01-02 09:08:14', '2024-01-02 09:08:14'),
	(119, 'JEFE DE DEPARTAMENTO DEL SECRAD', 2, 10, '2024-01-02 09:08:37', '2024-01-02 09:08:37'),
	(120, 'ESPECIALISTA DE AUDIO', 3, 10, '2024-01-02 09:08:57', '2024-01-02 09:08:57'),
	(121, 'TÉCNICO DE PRODUCCIÓN AUDIOVISUAL', 4, 10, '2024-01-02 09:10:03', '2024-01-02 09:10:03'),
	(122, 'ESPECIALISTA DE INCLUSIÓN, EQUIDAD Y DISCAPACIDAD', 3, 10, '2024-01-02 09:10:26', '2024-01-02 09:10:26'),
	(123, 'ANALISTA TÉCNICO DEL SECRAD', 3, 10, '2024-01-02 09:10:57', '2024-01-02 09:10:57'),
	(124, 'COORDINADOR(A) ACADÉMICO DE LA UNIDAD EL ALTO', 2, 16, '2024-01-02 09:13:05', '2024-01-02 09:13:05'),
	(125, 'ASISTENTE ADMINISTRATIVO(A)', 5, 16, '2024-01-02 09:13:40', '2024-01-02 09:13:40'),
	(126, 'ASISTENTE ADMINISTRATIVO(A)', 5, 7, '2024-01-02 09:14:10', '2024-01-02 09:14:10'),
	(127, 'ASISTENTE ADMINISTRATIVO(A)', 5, 3, '2024-01-02 09:14:30', '2024-01-02 09:14:30'),
	(128, 'SECRETARIA DE DIRECCIÓN / DEPARTAMENTO/ UNIDAD ACADÉMICA', 5, 12, '2024-01-02 09:14:53', '2024-01-02 09:14:53'),
	(129, 'SECRETARIA DE DIRECCIÓN / DEPARTAMENTO/ UNIDAD ACADÉMICA', 5, 10, '2024-01-02 09:15:25', '2024-01-02 09:15:25'),
	(130, 'SECRETARIA DE DIRECCIÓN / DEPARTAMENTO/ UNIDAD ADMINISTRATIVA', 5, 11, '2024-01-02 09:15:47', '2024-01-02 09:15:47'),
	(131, 'SECRETARIA DE DIRECCIÓN / DEPARTAMENTO/ UNIDAD ADMINISTRATIVA', 5, 13, '2024-01-02 09:16:13', '2024-01-02 09:16:13'),
	(132, 'SECRETARIA DE DIRECCIÓN / DEPARTAMENTO/ UNIDAD ACADÉMICA', 5, 11, '2024-01-02 09:16:33', '2024-01-02 09:16:33'),
	(133, 'SECRETARIA DE DIRECCIÓN / DEPARTAMENTO/ UNIDAD ACADÉMICA', 5, 13, '2024-01-02 09:17:17', '2024-01-02 09:17:17'),
	(135, 'SECRETARIA DE DIRECCIÓN / DEPARTAMENTO/ UNIDAD ACADÉMICA', 5, 7, '2024-01-02 09:20:49', '2024-01-02 09:20:49'),
	(136, 'DIRECTOR(A) DEPARTAMENTO DE CIENCIAS BÁSICAS', 1, 12, '2024-01-03 08:46:50', '2024-01-03 08:48:44'),
	(137, 'ANALISTA DE SISTEMAS PROGRAMADOR', 3, 6, '2024-01-03 08:57:39', '2024-01-03 08:57:39'),
	(138, 'ANALISTA DE SISTEMAS', 3, 6, '2024-01-03 08:59:43', '2024-01-03 08:59:43'),
	(139, 'TÉCNICO PROGRAMADOR', 4, 6, '2024-01-03 09:00:04', '2024-01-03 09:00:04'),
	(140, 'TÉCNICO DE ARCHIVO ACADÉMICO', 4, 7, '2024-01-03 09:12:36', '2024-01-03 09:12:36'),
	(141, 'DECANO(A) DE LA FACULTAD DE CIENCIAS SOCIALES Y HUMANAS', 1, 10, '2024-01-04 03:07:52', '2024-01-04 03:07:52'),
	(142, 'DECANO(A) DE LA FACULTAD DE CIENCIAS ECONÓMICAS Y FINANCIERAS', 1, 11, '2024-01-04 03:09:33', '2024-01-04 03:09:33'),
	(143, 'DECANO(A) DE LA FACULTAD DE INGENIERIA', 1, 12, '2024-01-04 03:09:56', '2024-01-04 03:09:56'),
	(144, 'DECANO(A) DE LA FACULTAD DE DERECHO Y CIENCIAS POLÍTICAS', 1, 13, '2024-01-04 03:10:21', '2024-01-04 03:10:21'),
	(145, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE PSICOLOGÍA', 1, 10, '2024-01-04 03:13:57', '2024-01-04 03:13:57'),
	(146, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE COMUNICACIÓN SOCIAL', 1, 10, '2024-01-04 03:15:33', '2024-01-04 03:15:33'),
	(147, 'ESPECIALISTA DE PRODUCCIÓN AUDIOVISUAL', 3, 10, '2024-01-04 03:21:46', '2024-01-04 03:21:46'),
	(148, 'SECRETARIA DEL DEPARTAMENTO ACADÉMICO DE COMUNICACIÓN SOCIAL', 5, 10, '2024-01-04 03:34:13', '2024-01-04 03:34:13'),
	(149, 'ANALISTA DE POSTGRADO', 3, 11, '2024-01-04 03:37:25', '2024-01-04 03:37:25'),
	(150, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE ECONOMÍA', 1, 11, '2024-01-04 03:39:03', '2024-01-04 03:39:03'),
	(151, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE ADMINISTRACIÓN DE EMPRESAS', 1, 11, '2024-01-04 03:40:29', '2024-01-04 03:40:29'),
	(152, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE CONTADURÍA PÚBLICA', 1, 11, '2024-01-04 03:41:32', '2024-01-04 03:41:32'),
	(153, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERÍA COMERCIAL', 1, 11, '2024-01-04 03:41:45', '2024-01-04 03:41:45'),
	(154, 'JEFE DEL PROGRAMA ACADÉMICO DE ADMINISTRACIÓN TURÍSTICA', 2, 11, '2024-01-04 03:44:43', '2024-01-04 03:44:43'),
	(155, 'SECRETARIA DE DEPARTAMENTO ACADÉMICO', 5, 11, '2024-01-04 03:51:59', '2024-01-04 03:51:59'),
	(156, 'SECRETARIA DE DEPARTAMENTO', 5, 11, '2024-01-04 03:52:23', '2024-01-04 03:52:23'),
	(157, 'SECRETARIA DE PROGRAMA ACADÉMICO', 5, 11, '2024-01-04 03:52:42', '2024-01-04 03:52:42'),
	(158, 'SECRETARIA DE FACULTAD DE INGENIERÍA', 5, 12, '2024-01-04 03:56:42', '2024-01-04 03:56:42'),
	(159, 'ANALISTA DE POSTGRADO', 3, 12, '2024-01-04 03:57:42', '2024-01-04 03:57:42'),
	(160, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA INDUSTRIAL', 1, 12, '2024-01-04 03:59:08', '2024-01-04 03:59:08'),
	(161, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA DE SISTEMAS', 1, 12, '2024-01-04 03:59:21', '2024-01-04 03:59:21'),
	(162, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA DE AMBIENTAL', 1, 12, '2024-01-04 03:59:35', '2024-01-04 03:59:35'),
	(163, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA CIVIL', 1, 12, '2024-01-04 03:59:47', '2024-01-04 03:59:47'),
	(164, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA DE MECATRÓNICA', 1, 12, '2024-01-04 04:00:07', '2024-01-04 04:00:07'),
	(165, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA QUÍMICA', 1, 12, '2024-01-04 04:00:20', '2024-01-04 04:00:20'),
	(166, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA BIOQUÍMICA Y DE BIOPROCESOS', 1, 12, '2024-01-04 04:00:35', '2024-01-04 04:00:35'),
	(167, 'JEFE DE ESTUDIOS DEL PROGRAMA ACADÉMICO DE INGENIERÍA EN TELECOMUNICACIONES', 2, 12, '2024-01-04 04:01:22', '2024-01-04 04:01:22'),
	(168, 'JEFE DE ESTUDIOS DEL PROGRAMA ACADÉMICO DE INGENIERÍA BIOMÉDICA', 2, 12, '2024-01-04 04:01:33', '2024-01-04 04:01:33'),
	(169, 'DIRECTOR(A) DEL DEPARTAMENTO DE CIENCIAS POLÍTICAS Y RELACIONES INTERNACIONALES', 1, 13, '2024-01-04 04:12:05', '2024-01-04 04:12:05'),
	(170, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE DERECHO', 1, 13, '2024-01-04 04:13:43', '2024-01-04 04:13:43'),
	(171, 'SECRETARIA DE DEPARTAMENTO ACADÉMICO', 5, 13, '2024-01-04 04:15:33', '2024-01-04 04:15:33'),
	(172, 'ASISTENTE ADMINISTRATIVO(A)', 5, 13, '2024-01-04 04:17:43', '2024-01-04 04:17:43'),
	(173, 'SECRETARIA DEL DEPARTAMENTO ACADEMICO DE CONTADURIA PUBLICA', 5, 11, '2024-01-15 06:31:07', '2024-01-15 06:31:07');

-- Volcando estructura para tabla ucb.cauxiliarforms
CREATE TABLE IF NOT EXISTS `cauxiliarforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `conformmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cauxiliarforms_conformmodel_id_foreign` (`conformmodel_id`),
  CONSTRAINT `cauxiliarforms_conformmodel_id_foreign` FOREIGN KEY (`conformmodel_id`) REFERENCES `conformmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.cauxiliarforms: ~3 rows (aproximadamente)
INSERT INTO `cauxiliarforms` (`id`, `conformmodel_id`, `factor`, `descripcion`, `ponderacion`, `created_at`, `updated_at`) VALUES
	(1, 5, 'Conocimiento de puesto', 'Conoce los temas relativos al ejercicio del puesto, los procedimientos de trabajo y la vinculación del puesto con otros funcionarios.', 50.00, '2024-01-22 02:29:36', '2024-01-22 02:29:36'),
	(2, 5, 'Calidad de Trabajo', 'Presenta orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 30.00, '2024-01-22 02:29:36', '2024-01-22 02:29:36'),
	(3, 5, 'Oportunidad', 'Cumple las tareas asignadas en el plazo y condiciones que se le han fijado.', 20.00, '2024-01-22 02:29:36', '2024-01-22 02:29:36');

-- Volcando estructura para tabla ucb.cejecutivoforms
CREATE TABLE IF NOT EXISTS `cejecutivoforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `conformmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cejecutivoforms_conformmodel_id_foreign` (`conformmodel_id`),
  CONSTRAINT `cejecutivoforms_conformmodel_id_foreign` FOREIGN KEY (`conformmodel_id`) REFERENCES `conformmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.cejecutivoforms: ~8 rows (aproximadamente)
INSERT INTO `cejecutivoforms` (`id`, `conformmodel_id`, `factor`, `descripcion`, `ponderacion`, `created_at`, `updated_at`) VALUES
	(1, 5, 'Conocimiento de puesto', 'Conoce los temas relativos al ejercicio del puesto, los procedimientos de trabajo y la vinculación del puesto con otros funcionarios.', 10.00, '2024-01-22 02:29:28', '2024-01-22 02:29:28'),
	(2, 5, 'Calidad de Trabajo', 'Presenta orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 10.00, '2024-01-22 02:29:29', '2024-01-22 02:29:29'),
	(3, 5, 'Oportunidad', 'Cumple las tareas asignadas en el plazo y condiciones que se le han fijado.', 10.00, '2024-01-22 02:29:29', '2024-01-22 02:29:29'),
	(4, 5, 'Autonomía', 'Cumple con las funciones inherentes al puesto y las tareas encomendadas, sin necesidad de supervisión permanente.', 10.00, '2024-01-22 02:29:30', '2024-01-22 02:29:30'),
	(5, 5, 'Vocación de servicio', 'Muestra interés en cooperar a sus superiores y al personal en general.', 10.00, '2024-01-22 02:29:30', '2024-01-22 02:29:30'),
	(6, 5, 'Calidad de las relaciones humanas', 'Establece y mantiene relaciones de trabajo armónicas con sus superiores y compañero(a)s de trabajo.', 10.00, '2024-01-22 02:29:31', '2024-01-22 02:29:31'),
	(7, 5, 'Calidad de las relaciones con terceros', 'Establece y mantiene relaciones armónicas con el personas externas a la institución y el público en general.', 10.00, '2024-01-22 02:29:31', '2024-01-22 02:29:31'),
	(8, 5, 'Disciplina', 'Cumple las normas, disposiciones y reglamentos que regulan el trabajo.', 30.00, '2024-01-22 02:29:31', '2024-01-22 02:29:31');

-- Volcando estructura para tabla ucb.cmediosforms
CREATE TABLE IF NOT EXISTS `cmediosforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `conformmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cmediosforms_conformmodel_id_foreign` (`conformmodel_id`),
  CONSTRAINT `cmediosforms_conformmodel_id_foreign` FOREIGN KEY (`conformmodel_id`) REFERENCES `conformmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.cmediosforms: ~7 rows (aproximadamente)
INSERT INTO `cmediosforms` (`id`, `conformmodel_id`, `factor`, `descripcion`, `ponderacion`, `created_at`, `updated_at`) VALUES
	(1, 5, 'Conocimiento de puesto', 'Conoce los temas relativos al ejercicio del puesto, los procedimientos de trabajo y la vinculación del puesto con otros funcionarios.', 20.00, '2024-01-22 02:29:31', '2024-01-22 02:29:31'),
	(2, 5, 'Calidad de Trabajo', 'Presenta orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 10.00, '2024-01-22 02:29:31', '2024-01-22 02:29:31'),
	(3, 5, 'Oportunidad', 'Cumple las tareas asignadas en el plazo y condiciones que se le han fijado.', 10.00, '2024-01-22 02:29:32', '2024-01-22 02:29:32'),
	(4, 5, 'Autonomía', 'Cumple con las funciones inherentes al puesto y las tareas encomendadas, sin necesidad de supervisión permanente.', 10.00, '2024-01-22 02:29:32', '2024-01-22 02:29:32'),
	(5, 5, 'Vocación de servicio', 'Muestra interés en cooperar a sus superiores y al personal en general.', 10.00, '2024-01-22 02:29:32', '2024-01-22 02:29:32'),
	(6, 5, 'Calidad de las relaciones humanas', 'Establece y mantiene relaciones de trabajo armónicas con sus superiores y compañero(a)s de trabajo.', 20.00, '2024-01-22 02:29:32', '2024-01-22 02:29:32'),
	(7, 5, 'Calidad de las relaciones con terceros', 'Establece y mantiene relaciones armónicas con el personas externas a la institución y el público en general.', 20.00, '2024-01-22 02:29:32', '2024-01-22 02:29:32');

-- Volcando estructura para tabla ucb.competencias
CREATE TABLE IF NOT EXISTS `competencias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `competencias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.competencias: ~3 rows (aproximadamente)
INSERT INTO `competencias` (`id`, `competencias`, `created_at`, `updated_at`) VALUES
	(3, 'COMPETENCIAS TÉCNICAS', '2023-11-13 02:49:01', '2023-12-18 00:00:39'),
	(4, 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', '2023-11-14 00:53:05', '2023-11-14 04:24:45'),
	(6, 'COMPETENCIAS PERSONALES / GESTIÓN', '2023-12-18 00:04:35', '2023-12-18 00:04:35'),
	(7, 'COMPETENCIAS PARA CONFIRMACIÓN', '2023-12-18 02:14:52', '2023-12-18 02:14:52'),
	(8, 'COMPETENCIAS DE PRUEBA', '2024-02-01 18:29:55', '2024-02-01 18:29:55');

-- Volcando estructura para tabla ucb.confirmdetailsresults
CREATE TABLE IF NOT EXISTS `confirmdetailsresults` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `confproces_id` bigint unsigned NOT NULL,
  `factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` int NOT NULL,
  `nota` double(8,2) NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `confirmdetailsresults_confproces_id_foreign` (`confproces_id`),
  CONSTRAINT `confirmdetailsresults_confproces_id_foreign` FOREIGN KEY (`confproces_id`) REFERENCES `confproces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.confirmdetailsresults: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ucb.confirmforms
CREATE TABLE IF NOT EXISTS `confirmforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `conformmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `confirmforms_conformmodel_id_foreign` (`conformmodel_id`),
  CONSTRAINT `confirmforms_conformmodel_id_foreign` FOREIGN KEY (`conformmodel_id`) REFERENCES `conformmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.confirmforms: ~8 rows (aproximadamente)

-- Volcando estructura para tabla ucb.confirmresults
CREATE TABLE IF NOT EXISTS `confirmresults` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `confirmprocess_id` bigint unsigned NOT NULL,
  `evaluado_id` bigint unsigned NOT NULL,
  `evaluado_nivel_id` bigint unsigned NOT NULL,
  `evaluador_id` bigint unsigned NOT NULL,
  `fortalezas` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debilidades` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentarios_evaluador` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propuestas` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota_final` double(8,2) NOT NULL DEFAULT '0.00',
  `recomendado` tinyint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `confirmresults_confirmprocess_id_foreign` (`confirmprocess_id`),
  KEY `confirmresults_evaluado_id_foreign` (`evaluado_id`),
  KEY `confirmresults_evaluado_nivel_id_foreign` (`evaluado_nivel_id`),
  KEY `confirmresults_evaluador_id_foreign` (`evaluador_id`),
  CONSTRAINT `confirmresults_confirmprocess_id_foreign` FOREIGN KEY (`confirmprocess_id`) REFERENCES `confirmproces` (`id`) ON DELETE CASCADE,
  CONSTRAINT `confirmresults_evaluado_id_foreign` FOREIGN KEY (`evaluado_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `confirmresults_evaluado_nivel_id_foreign` FOREIGN KEY (`evaluado_nivel_id`) REFERENCES `niveles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `confirmresults_evaluador_id_foreign` FOREIGN KEY (`evaluador_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.confirmresults: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ucb.conformmodels
CREATE TABLE IF NOT EXISTS `conformmodels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `creador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.conformmodels: ~2 rows (aproximadamente)
INSERT INTO `conformmodels` (`id`, `creador`, `descripcion`, `created_at`, `updated_at`) VALUES
	(5, 'Miguel Angel Lara Nisttahuz', 'Versión para la gestión 2024.', '2024-01-22 02:29:28', '2024-01-22 02:29:28');

-- Volcando estructura para tabla ucb.confproces
CREATE TABLE IF NOT EXISTS `confproces` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `form_version_id` bigint unsigned NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_conclusion` date NOT NULL,
  `evaluador_id` bigint unsigned NOT NULL,
  `evaluado_id` bigint unsigned NOT NULL,
  `fortalezas` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debilidades` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentarios_evaluador` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `propuestas` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota_final` double NOT NULL DEFAULT '0',
  `recomendado` tinyint(1) NOT NULL DEFAULT '0',
  `finalizacion` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `confproces_form_version_id_foreign` (`form_version_id`),
  KEY `confproces_evaluador_id_foreign` (`evaluador_id`),
  KEY `confproces_evaluado_id_foreign` (`evaluado_id`),
  CONSTRAINT `confproces_evaluado_id_foreign` FOREIGN KEY (`evaluado_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `confproces_evaluador_id_foreign` FOREIGN KEY (`evaluador_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `confproces_form_version_id_foreign` FOREIGN KEY (`form_version_id`) REFERENCES `conformmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.confproces: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ucb.contratos
CREATE TABLE IF NOT EXISTS `contratos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo_contrato` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.contratos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ucb.cprofesionalforms
CREATE TABLE IF NOT EXISTS `cprofesionalforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `conformmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cprofesionalforms_conformmodel_id_foreign` (`conformmodel_id`),
  CONSTRAINT `cprofesionalforms_conformmodel_id_foreign` FOREIGN KEY (`conformmodel_id`) REFERENCES `conformmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.cprofesionalforms: ~6 rows (aproximadamente)
INSERT INTO `cprofesionalforms` (`id`, `conformmodel_id`, `factor`, `descripcion`, `ponderacion`, `created_at`, `updated_at`) VALUES
	(1, 5, 'Conocimiento de puesto', 'Conoce los temas relativos al ejercicio del puesto, los procedimientos de trabajo y la vinculación del puesto con otros funcionarios.', 20.00, '2024-01-22 02:29:33', '2024-01-22 02:29:33'),
	(2, 5, 'Calidad de Trabajo', 'Presenta orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 10.00, '2024-01-22 02:29:33', '2024-01-22 02:29:33'),
	(3, 5, 'Oportunidad', 'Cumple las tareas asignadas en el plazo y condiciones que se le han fijado.', 10.00, '2024-01-22 02:29:33', '2024-01-22 02:29:33'),
	(4, 5, 'Autonomía', 'Cumple con las funciones inherentes al puesto y las tareas encomendadas, sin necesidad de supervisión permanente.', 20.00, '2024-01-22 02:29:33', '2024-01-22 02:29:33'),
	(5, 5, 'Vocación de servicio', 'Muestra interés en cooperar a sus superiores y al personal en general.', 20.00, '2024-01-22 02:29:34', '2024-01-22 02:29:34'),
	(6, 5, 'Calidad de las relaciones humanas', 'Establece y mantiene relaciones de trabajo armónicas con sus superiores y compañero(a)s de trabajo.', 20.00, '2024-01-22 02:29:34', '2024-01-22 02:29:34');

-- Volcando estructura para tabla ucb.ctecnicoforms
CREATE TABLE IF NOT EXISTS `ctecnicoforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `conformmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ctecnicoforms_conformmodel_id_foreign` (`conformmodel_id`),
  CONSTRAINT `ctecnicoforms_conformmodel_id_foreign` FOREIGN KEY (`conformmodel_id`) REFERENCES `conformmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.ctecnicoforms: ~5 rows (aproximadamente)
INSERT INTO `ctecnicoforms` (`id`, `conformmodel_id`, `factor`, `descripcion`, `ponderacion`, `created_at`, `updated_at`) VALUES
	(1, 5, 'Conocimiento de puesto', 'Conoce los temas relativos al ejercicio del puesto, los procedimientos de trabajo y la vinculación del puesto con otros funcionarios.', 20.00, '2024-01-22 02:29:34', '2024-01-22 02:29:34'),
	(2, 5, 'Calidad de Trabajo', 'Presenta orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 20.00, '2024-01-22 02:29:34', '2024-01-22 02:29:34'),
	(3, 5, 'Oportunidad', 'Cumple las tareas asignadas en el plazo y condiciones que se le han fijado.', 20.00, '2024-01-22 02:29:34', '2024-01-22 02:29:34'),
	(4, 5, 'Autonomía', 'Cumple con las funciones inherentes al puesto y las tareas encomendadas, sin necesidad de supervisión permanente.', 20.00, '2024-01-22 02:29:34', '2024-01-22 02:29:34'),
	(5, 5, 'Vocación de servicio', 'Muestra interés en cooperar a sus superiores y al personal en general.', 20.00, '2024-01-22 02:29:35', '2024-01-22 02:29:35');

-- Volcando estructura para tabla ucb.departamentos
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `departamento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.departamentos: ~0 rows (aproximadamente)
INSERT INTO `departamentos` (`id`, `departamento`, `created_at`, `updated_at`) VALUES
	(1, 'Recursos Humanos', '2023-11-18 22:59:40', '2023-11-18 22:59:40');

-- Volcando estructura para tabla ucb.deptos
CREATE TABLE IF NOT EXISTS `deptos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `departamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deptos_area_id_foreign` (`area_id`),
  CONSTRAINT `deptos_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.deptos: ~38 rows (aproximadamente)
INSERT INTO `deptos` (`id`, `departamento`, `area_id`, `created_at`, `updated_at`) VALUES
	(1, 'ASESORÍA LEGAL', 8, '2023-12-16 09:16:05', '2023-12-16 09:16:05'),
	(2, 'DEPARTAMENTO ACADEMICO DE ADMINISTRACION DE EMPRESAS', 11, '2023-12-16 09:16:20', '2023-12-16 09:16:20'),
	(3, 'DEPARTAMENTO DE CULTURA Y ARTE', 10, '2023-12-16 09:16:32', '2023-12-16 09:16:32'),
	(4, 'DEPARTAMENTO DE CIENCIAS BASICAS', 12, '2023-12-16 09:16:50', '2023-12-16 09:16:50'),
	(5, 'TECNOLOGIA Y SISTEMAS', 6, '2023-12-16 09:17:08', '2023-12-16 09:17:08'),
	(6, 'RECURSOS HUMANOS', 8, '2023-12-16 09:17:36', '2023-12-16 09:17:36'),
	(7, 'DEPARTAMENTO ACADÉMICO DE DERECHO', 13, '2023-12-16 09:18:02', '2023-12-16 09:18:02'),
	(8, 'DEPARTAMENTO  ACADÉMICO DE DISEÑO GRAFICO', 7, '2023-12-16 09:18:16', '2023-12-16 09:18:16'),
	(9, 'DEPARTAMENTO DE EDUCACIÓN', 10, '2023-12-16 09:18:35', '2023-12-16 09:18:35'),
	(10, 'DEPARTAMENTO ACADEMICO DE INGENIERIA COMERCIAL', 7, '2023-12-16 09:18:54', '2023-12-16 09:18:54'),
	(11, 'INSTITUTO PARA LA DEMOCRACIA', 13, '2023-12-16 09:19:11', '2023-12-16 09:19:11'),
	(12, 'INSTITUTO DE INVESTIGACION EN CIENCIAS DEL COMPORTAMIENTO (IICC)', 10, '2023-12-16 09:19:26', '2023-12-16 09:19:26'),
	(13, 'INSTITUTO DE INVESTIGACIONES SOCIOECONOMICAS (IISEC)', 11, '2023-12-16 09:19:44', '2023-12-16 09:19:44'),
	(14, 'DEPARTAMENTO ACADEMICO DE INGENIERIA CIVIL', 12, '2023-12-16 09:20:00', '2023-12-16 09:20:00'),
	(15, 'SERVICIO DE CAPACITACIÓN EN RADIO Y TELEVISIÓN PARA EL DESARROLLO (SECRAD)', 10, '2023-12-16 09:20:20', '2023-12-16 09:20:20'),
	(16, 'UNIDAD ACADEMICA EL ALTO', 7, '2023-12-16 09:20:44', '2023-12-16 09:20:44'),
	(17, 'DEPARTAMENTO ACADÉMICO DE COMUNICACIÓN SOCIAL', 10, '2023-12-16 09:21:03', '2023-12-16 09:21:03'),
	(18, 'INSTITUTO DE INVESTIGACIONES SOCIOECONOMICAS', 8, '2023-12-16 09:21:21', '2023-12-16 09:21:21'),
	(19, 'DEPARTAMENTO ACADÉMICO DE DERECHO', 7, '2023-12-16 09:21:36', '2023-12-16 09:21:36'),
	(20, 'PROGRAMA ACADEMICO DE ADMINISTRACION TURISTICA', 7, '2023-12-16 09:21:52', '2023-12-16 09:21:52'),
	(21, 'DEPARTAMENTO ACADÉMICO DE CIENCIAS POLITICAS Y RELACIONES INTERNACIONALES', 7, '2023-12-16 09:22:16', '2023-12-16 09:22:16'),
	(22, 'DEPARTAMENTO ACADEMICO DE CONTADURIA PUBLICA', 7, '2023-12-16 09:22:27', '2023-12-16 09:22:27'),
	(23, 'DEPARTAMENTO ACADEMICO DE DERECHO', 7, '2023-12-16 09:22:44', '2023-12-16 09:22:44'),
	(24, 'DEPARTAMENTO ACADEMICO DE ARQUITECTURA', 7, '2023-12-16 09:22:54', '2023-12-16 09:22:54'),
	(25, 'DEPARTAMENTO ACADEMICO DE ECONOMIA', 7, '2023-12-16 09:23:05', '2023-12-16 09:23:05'),
	(26, 'DEPARTAMENTO ACADEMICO DE PSICOLOGIA', 7, '2023-12-16 09:23:15', '2023-12-16 09:23:15'),
	(27, 'RECURSOS HUMANOS', 6, '2023-12-16 20:57:11', '2023-12-16 20:57:11'),
	(28, 'DEPARTAMENTO DE EDUCACIÓN', 7, '2024-01-05 22:20:16', '2024-01-05 22:20:16'),
	(29, 'UNIDAD ACADEMICA EL ALTO', 16, '2024-01-06 02:08:49', '2024-01-06 02:08:49'),
	(30, 'PROGRAMA ACADEMICO DE ADMINISTRACION TURISTICA', 11, '2024-01-06 02:21:11', '2024-01-06 02:21:11'),
	(31, 'DEPARTAMENTO ACADÉMICO DE CIENCIAS POLITICAS Y RELACIONES INTERNACIONALES', 13, '2024-01-06 02:25:21', '2024-01-06 02:25:21'),
	(32, 'DEPARTAMENTO ACADEMICO DE CONTADURIA PUBLICA', 11, '2024-01-06 02:31:01', '2024-01-06 02:31:01'),
	(33, 'DEPARTAMENTO ACADEMICO DE ECONOMIA', 11, '2024-01-06 02:45:57', '2024-01-06 02:45:57'),
	(34, 'DEPARTAMENTO DE INGENIERÍA QUÍMICA', 12, '2024-01-15 06:54:17', '2024-01-15 06:54:17'),
	(35, 'DEPARTAMENTO ACADÉMICO DE INGENIERÍA AMBIENTAL', 12, '2024-01-15 06:57:55', '2024-01-15 06:57:55'),
	(36, 'DEPARTAMENTO ACADÉMICO  DE INGENIERÍA DE SISTEMAS', 12, '2024-01-15 06:59:07', '2024-01-15 06:59:07'),
	(37, 'DEPARTAMENTO ACADÉMICO DE INGENIERIA MECATRONICA', 12, '2024-01-15 06:59:17', '2024-01-15 06:59:17'),
	(38, 'PROGRAMA ACADÉMICO DE INGENIERÍA BIOMÉDICA', 12, '2024-01-15 06:59:28', '2024-01-15 06:59:28'),
	(39, 'PROGRAMA ACADÉMICO DE INGENIERIA EN TELECOMUNICACIONES', 12, '2024-01-15 06:59:37', '2024-01-15 06:59:37');

-- Volcando estructura para tabla ucb.ejecutivoforms
CREATE TABLE IF NOT EXISTS `ejecutivoforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `formmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `competencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ejecutivoforms_formmodel_id_foreign` (`formmodel_id`),
  CONSTRAINT `ejecutivoforms_formmodel_id_foreign` FOREIGN KEY (`formmodel_id`) REFERENCES `formmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.ejecutivoforms: ~16 rows (aproximadamente)
INSERT INTO `ejecutivoforms` (`id`, `formmodel_id`, `factor`, `descripcion`, `competencia`, `ponderacion`, `created_at`, `updated_at`) VALUES
	(15, 47, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:26', '2023-12-17 23:46:26'),
	(16, 47, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:26', '2023-12-17 23:46:26'),
	(17, 47, 'Gestión en el puesto', 'Capacidad de planificar, organizar, ejecutar y controlar cada una de las etapas de desarrollo de sus funciones en el puesto.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:26', '2023-12-17 23:46:26'),
	(18, 47, 'Dominio funcional', 'Capacidad de aplicar destrezas, habilidades y conocimientos que son necesarios para ser efectivo en el contenido funcional específico del puesto.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:26', '2023-12-17 23:46:26'),
	(19, 47, 'Propuesta', 'Capacidad de proponer iniciativas, proyectos, que permitan potenciar el desarrollo de las actividades de su área de trabajo.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:27', '2023-12-17 23:46:27'),
	(20, 47, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 40, '2023-12-17 23:46:27', '2023-12-17 23:46:27'),
	(21, 47, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, '2023-12-17 23:46:27', '2023-12-17 23:46:27'),
	(22, 47, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, '2023-12-17 23:46:27', '2023-12-17 23:46:27'),
	(23, 47, 'Liderazgo', 'Capacidad de ejercer influencia eficaz sobre las actividades de los miembros del equipo para lograr resultados.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:27', '2023-12-17 23:46:27'),
	(24, 47, 'Orientación a  resultados', 'Capacidad de desafiarse y desafiar a la organización  para sobresalir y lograr resultados.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:27', '2023-12-17 23:46:27'),
	(25, 47, 'Dirección de equipos', 'Capacidad de trabajar y colaborar de manera efectiva con otros, generando sinergias,  para lograr una meta común', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:27', '2023-12-17 23:46:27'),
	(26, 47, 'Capacidad de negociación', 'Capacidad de identificar las necesidades y motivaciones de las partes en conflicto, para lograr compromisos mutuamente benéficos', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:28', '2023-12-17 23:46:28'),
	(27, 47, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:28', '2023-12-17 23:46:28'),
	(28, 47, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:28', '2023-12-17 23:46:28'),
	(29, 47, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:28', '2023-12-17 23:46:28'),
	(30, 47, 'Toma de decisiones', 'Capacidad de reunir los elementos necesarios y efectuar un análisis cuidadoso para la mejor toma de decisiones.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:28', '2023-12-17 23:46:28');

-- Volcando estructura para tabla ucb.evaldetailsresults
CREATE TABLE IF NOT EXISTS `evaldetailsresults` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `evalresult_id` bigint unsigned NOT NULL,
  `factor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `competencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` int NOT NULL,
  `nota` double(8,2) NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaldetailsresults_evalresult_id_foreign` (`evalresult_id`),
  CONSTRAINT `evaldetailsresults_evalresult_id_foreign` FOREIGN KEY (`evalresult_id`) REFERENCES `evalresults` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.evaldetailsresults: ~98 rows (aproximadamente)
INSERT INTO `evaldetailsresults` (`id`, `evalresult_id`, `factor`, `descripcion`, `competencia`, `ponderacion`, `nota`, `comentario`, `created_at`, `updated_at`) VALUES
	(65, 6, 'Destreza laboral', 'Capacidad de aplicar destrezas, habilidades y conocimientos que sean necesarios para ser efectivo en el contenido funcional específico del puesto', 'COMPETENCIAS TÉCNICAS', 40, 40.00, NULL, '2024-04-08 03:21:31', '2024-04-08 03:21:31'),
	(66, 6, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 30, 30.00, NULL, '2024-04-08 03:21:31', '2024-04-08 03:21:31'),
	(67, 6, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 30, 30.00, NULL, '2024-04-08 03:21:31', '2024-04-08 03:21:31'),
	(68, 6, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 40, 20.00, NULL, '2024-04-08 03:21:32', '2024-04-08 03:21:32'),
	(69, 6, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 22.50, NULL, '2024-04-08 03:21:32', '2024-04-08 03:21:32'),
	(70, 6, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 30.00, NULL, '2024-04-08 03:21:32', '2024-04-08 03:21:32'),
	(71, 6, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 15.00, NULL, '2024-04-08 03:21:32', '2024-04-08 03:21:32'),
	(72, 6, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 15.00, NULL, '2024-04-08 03:21:32', '2024-04-08 03:21:32'),
	(73, 6, 'Trabajo en equipo', 'Capacidad de interactuar de manera efectiva con el equipo de trabajo, generando sinergias,  para lograr una meta común.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 15.00, NULL, '2024-04-08 03:21:32', '2024-04-08 03:21:32'),
	(74, 6, 'Responsabilidad', 'Capacidad de cumplir con compromisos laborales asumidos con dedicación y esfuerzo.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 10.00, NULL, '2024-04-08 03:21:32', '2024-04-08 03:21:32'),
	(75, 6, 'Iniciativa', 'Capacidad de emprender acciones, solucionar problemas rutinarios y mejorar resultados de acuerdo a la situación laboral que se presente.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 20.00, NULL, '2024-04-08 03:21:33', '2024-04-08 03:21:33'),
	(76, 7, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 20, 15.00, NULL, '2024-04-08 03:22:16', '2024-04-08 03:22:16'),
	(77, 7, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 20, 10.00, NULL, '2024-04-08 03:22:16', '2024-04-08 03:22:16'),
	(78, 7, 'Gestión en el puesto', 'Capacidad de planificar, organizar, ejecutar y controlar cada una de las etapas de desarrollo de sus funciones en el puesto.', 'COMPETENCIAS TÉCNICAS', 20, 15.00, NULL, '2024-04-08 03:22:16', '2024-04-08 03:22:16'),
	(79, 7, 'Dominio funcional', 'Capacidad de aplicar destrezas, habilidades y conocimientos que son necesarios para ser efectivo en el contenido funcional específico del puesto.', 'COMPETENCIAS TÉCNICAS', 20, 20.00, NULL, '2024-04-08 03:22:17', '2024-04-08 03:22:17'),
	(80, 7, 'Propuesta', 'Capacidad de proponer iniciativas, proyectos, que permitan potenciar el desarrollo de las actividades de su área de trabajo.', 'COMPETENCIAS TÉCNICAS', 20, 10.00, NULL, '2024-04-08 03:22:17', '2024-04-08 03:22:17'),
	(81, 7, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 40, 40.00, NULL, '2024-04-08 03:22:17', '2024-04-08 03:22:17'),
	(82, 7, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 22.50, NULL, '2024-04-08 03:22:17', '2024-04-08 03:22:17'),
	(83, 7, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 30.00, NULL, '2024-04-08 03:22:18', '2024-04-08 03:22:18'),
	(84, 7, 'Liderazgo', 'Capacidad de ejercer influencia eficaz sobre las actividades de los miembros del equipo para lograr resultados.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 2.50, NULL, '2024-04-08 03:22:18', '2024-04-08 03:22:18'),
	(85, 7, 'Orientación a  resultados', 'Capacidad de desafiarse y desafiar a la organización  para sobresalir y lograr resultados.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 7.50, NULL, '2024-04-08 03:22:18', '2024-04-08 03:22:18'),
	(86, 7, 'Dirección de equipos', 'Capacidad de trabajar y colaborar de manera efectiva con otros, generando sinergias,  para lograr una meta común', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 7.50, NULL, '2024-04-08 03:22:18', '2024-04-08 03:22:18'),
	(87, 7, 'Capacidad de negociación', 'Capacidad de identificar las necesidades y motivaciones de las partes en conflicto, para lograr compromisos mutuamente benéficos', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 7.50, NULL, '2024-04-08 03:22:18', '2024-04-08 03:22:18'),
	(88, 7, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 7.50, NULL, '2024-04-08 03:22:18', '2024-04-08 03:22:18'),
	(89, 7, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 5.00, NULL, '2024-04-08 03:22:18', '2024-04-08 03:22:18'),
	(90, 7, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 15.00, NULL, '2024-04-08 03:22:18', '2024-04-08 03:22:18'),
	(91, 7, 'Toma de decisiones', 'Capacidad de reunir los elementos necesarios y efectuar un análisis cuidadoso para la mejor toma de decisiones.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 15.00, NULL, '2024-04-08 03:22:19', '2024-04-08 03:22:19'),
	(92, 8, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 20, 15.00, NULL, '2024-04-08 03:23:26', '2024-04-08 03:23:26'),
	(93, 8, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 20, 20.00, NULL, '2024-04-08 03:23:26', '2024-04-08 03:23:26'),
	(94, 8, 'Gestión en el puesto', 'Capacidad de planificar, organizar, ejecutar y controlar cada una de las etapas de desarrollo de sus funciones en el puesto.', 'COMPETENCIAS TÉCNICAS', 20, 20.00, NULL, '2024-04-08 03:23:26', '2024-04-08 03:23:26'),
	(95, 8, 'Dominio funcional', 'Capacidad de aplicar destrezas, habilidades y conocimientos que son necesarios para ser efectivo en el contenido funcional específico del puesto.', 'COMPETENCIAS TÉCNICAS', 20, 20.00, NULL, '2024-04-08 03:23:26', '2024-04-08 03:23:26'),
	(96, 8, 'Propuesta', 'Capacidad de proponer iniciativas, proyectos, que permitan potenciar el desarrollo de las actividades de su área de trabajo.', 'COMPETENCIAS TÉCNICAS', 20, 20.00, NULL, '2024-04-08 03:23:27', '2024-04-08 03:23:27'),
	(97, 8, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 40, 20.00, NULL, '2024-04-08 03:23:27', '2024-04-08 03:23:27'),
	(98, 8, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 30.00, NULL, '2024-04-08 03:23:28', '2024-04-08 03:23:28'),
	(99, 8, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 15.00, NULL, '2024-04-08 03:23:28', '2024-04-08 03:23:28'),
	(100, 8, 'Liderazgo', 'Capacidad de ejercer influencia eficaz sobre las actividades de los miembros del equipo para lograr resultados.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 7.50, NULL, '2024-04-08 03:23:28', '2024-04-08 03:23:28'),
	(101, 8, 'Orientación a  resultados', 'Capacidad de desafiarse y desafiar a la organización  para sobresalir y lograr resultados.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 10.00, NULL, '2024-04-08 03:23:28', '2024-04-08 03:23:28'),
	(102, 8, 'Dirección de equipos', 'Capacidad de trabajar y colaborar de manera efectiva con otros, generando sinergias,  para lograr una meta común', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 7.50, NULL, '2024-04-08 03:23:28', '2024-04-08 03:23:28'),
	(103, 8, 'Capacidad de negociación', 'Capacidad de identificar las necesidades y motivaciones de las partes en conflicto, para lograr compromisos mutuamente benéficos', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 10.00, NULL, '2024-04-08 03:23:28', '2024-04-08 03:23:28'),
	(104, 8, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 5.00, NULL, '2024-04-08 03:23:29', '2024-04-08 03:23:29'),
	(105, 8, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 10.00, NULL, '2024-04-08 03:23:29', '2024-04-08 03:23:29'),
	(106, 8, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 15.00, NULL, '2024-04-08 03:23:29', '2024-04-08 03:23:29'),
	(107, 8, 'Toma de decisiones', 'Capacidad de reunir los elementos necesarios y efectuar un análisis cuidadoso para la mejor toma de decisiones.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 15.00, NULL, '2024-04-08 03:23:29', '2024-04-08 03:23:29'),
	(108, 9, 'Destreza laboral', 'Capacidad de aplicar destrezas, habilidades y conocimientos que sean necesarios para ser efectivo en el contenido funcional específico del puesto', 'COMPETENCIAS TÉCNICAS', 40, 40.00, NULL, '2024-04-08 03:24:00', '2024-04-08 03:24:00'),
	(109, 9, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 30, 30.00, NULL, '2024-04-08 03:24:00', '2024-04-08 03:24:00'),
	(110, 9, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 30, 30.00, NULL, '2024-04-08 03:24:01', '2024-04-08 03:24:01'),
	(111, 9, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 50, 12.50, NULL, '2024-04-08 03:24:01', '2024-04-08 03:24:01'),
	(112, 9, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 50, 12.50, NULL, '2024-04-08 03:24:01', '2024-04-08 03:24:01'),
	(113, 9, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 20.00, NULL, '2024-04-08 03:24:01', '2024-04-08 03:24:01'),
	(114, 9, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 20.00, NULL, '2024-04-08 03:24:01', '2024-04-08 03:24:01'),
	(115, 9, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 20.00, NULL, '2024-04-08 03:24:01', '2024-04-08 03:24:01'),
	(116, 9, 'Trabajo en equipo', 'Capacidad de interactuar de manera efectiva con el equipo de trabajo, generando sinergias,  para lograr una meta común.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 20.00, NULL, '2024-04-08 03:24:02', '2024-04-08 03:24:02'),
	(117, 9, 'Responsabilidad', 'Capacidad de cumplir con compromisos laborales asumidos con dedicación y esfuerzo.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 20.00, NULL, '2024-04-08 03:24:02', '2024-04-08 03:24:02'),
	(118, 10, 'Destreza laboral', 'Capacidad de aplicar destrezas, habilidades y conocimientos que sean necesarios para ser efectivo en el contenido funcional específico del puesto', 'COMPETENCIAS TÉCNICAS', 40, 30.00, NULL, '2024-04-09 19:37:08', '2024-04-09 19:37:08'),
	(119, 10, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 30, 22.50, NULL, '2024-04-09 19:37:08', '2024-04-09 19:37:08'),
	(120, 10, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 30, 30.00, NULL, '2024-04-09 19:37:08', '2024-04-09 19:37:08'),
	(121, 10, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 40, 20.00, NULL, '2024-04-09 19:37:09', '2024-04-09 19:37:09'),
	(122, 10, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 15.00, NULL, '2024-04-09 19:37:09', '2024-04-09 19:37:09'),
	(123, 10, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 30.00, NULL, '2024-04-09 19:37:09', '2024-04-09 19:37:09'),
	(124, 10, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 7.50, NULL, '2024-04-09 19:37:10', '2024-04-09 19:37:10'),
	(125, 10, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 10.00, NULL, '2024-04-09 19:37:11', '2024-04-09 19:37:11'),
	(126, 10, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 15.00, NULL, '2024-04-09 19:37:11', '2024-04-09 19:37:11'),
	(127, 10, 'Trabajo en equipo', 'Capacidad de interactuar de manera efectiva con el equipo de trabajo, generando sinergias,  para lograr una meta común.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 20.00, NULL, '2024-04-09 19:37:11', '2024-04-09 19:37:11'),
	(128, 10, 'Responsabilidad', 'Capacidad de cumplir con compromisos laborales asumidos con dedicación y esfuerzo.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 20.00, NULL, '2024-04-09 19:37:12', '2024-04-09 19:37:12'),
	(129, 10, 'Atención al detalle', 'Capacidad de prestar atención a las particularidades de un tema, para obtener un resultado lógico y preciso.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 7.50, NULL, '2024-04-09 19:37:12', '2024-04-09 19:37:12'),
	(130, 11, 'Destreza laboral', 'Capacidad de aplicar destrezas, habilidades y conocimientos que sean necesarios para ser efectivo en el contenido funcional específico del puesto', 'COMPETENCIAS TÉCNICAS', 40, 30.00, NULL, '2024-04-09 19:37:43', '2024-04-09 19:37:43'),
	(131, 11, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 30, 30.00, NULL, '2024-04-09 19:37:43', '2024-04-09 19:37:43'),
	(132, 11, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 30, 30.00, NULL, '2024-04-09 19:37:43', '2024-04-09 19:37:43'),
	(133, 11, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 40, 30.00, NULL, '2024-04-09 19:37:43', '2024-04-09 19:37:43'),
	(134, 11, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 22.50, NULL, '2024-04-09 19:37:44', '2024-04-09 19:37:44'),
	(135, 11, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 22.50, NULL, '2024-04-09 19:37:44', '2024-04-09 19:37:44'),
	(136, 11, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 5.00, NULL, '2024-04-09 19:37:44', '2024-04-09 19:37:44'),
	(137, 11, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 10.00, NULL, '2024-04-09 19:37:45', '2024-04-09 19:37:45'),
	(138, 11, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 10.00, NULL, '2024-04-09 19:37:45', '2024-04-09 19:37:45'),
	(139, 11, 'Trabajo en equipo', 'Capacidad de interactuar de manera efectiva con el equipo de trabajo, generando sinergias,  para lograr una meta común.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 10.00, NULL, '2024-04-09 19:37:45', '2024-04-09 19:37:45'),
	(140, 11, 'Responsabilidad', 'Capacidad de cumplir con compromisos laborales asumidos con dedicación y esfuerzo.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 10.00, NULL, '2024-04-09 19:37:45', '2024-04-09 19:37:45'),
	(141, 11, 'Atención al detalle', 'Capacidad de prestar atención a las particularidades de un tema, para obtener un resultado lógico y preciso.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 5.00, NULL, '2024-04-09 19:37:46', '2024-04-09 19:37:46'),
	(142, 12, 'Destreza laboral', 'Capacidad de aplicar destrezas, habilidades y conocimientos que sean necesarios para ser efectivo en el contenido funcional específico del puesto', 'COMPETENCIAS TÉCNICAS', 40, 40.00, NULL, '2024-04-09 19:38:21', '2024-04-09 19:38:21'),
	(143, 12, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 30, 30.00, NULL, '2024-04-09 19:38:21', '2024-04-09 19:38:21'),
	(144, 12, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 30, 30.00, NULL, '2024-04-09 19:38:21', '2024-04-09 19:38:21'),
	(145, 12, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 40, 30.00, NULL, '2024-04-09 19:38:22', '2024-04-09 19:38:22'),
	(146, 12, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 22.50, NULL, '2024-04-09 19:38:22', '2024-04-09 19:38:22'),
	(147, 12, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 30.00, NULL, '2024-04-09 19:38:22', '2024-04-09 19:38:22'),
	(148, 12, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 10.00, NULL, '2024-04-09 19:38:22', '2024-04-09 19:38:22'),
	(149, 12, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 20.00, NULL, '2024-04-09 19:38:22', '2024-04-09 19:38:22'),
	(150, 12, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 15.00, NULL, '2024-04-09 19:38:23', '2024-04-09 19:38:23'),
	(151, 12, 'Trabajo en equipo', 'Capacidad de interactuar de manera efectiva con el equipo de trabajo, generando sinergias,  para lograr una meta común.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 20.00, NULL, '2024-04-09 19:38:23', '2024-04-09 19:38:23'),
	(152, 12, 'Responsabilidad', 'Capacidad de cumplir con compromisos laborales asumidos con dedicación y esfuerzo.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 20.00, NULL, '2024-04-09 19:38:23', '2024-04-09 19:38:23'),
	(153, 12, 'Atención al detalle', 'Capacidad de prestar atención a las particularidades de un tema, para obtener un resultado lógico y preciso.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 10.00, NULL, '2024-04-09 19:38:23', '2024-04-09 19:38:23'),
	(154, 13, 'Destreza laboral', 'Capacidad de aplicar destrezas, habilidades y conocimientos que sean necesarios para ser efectivo en el contenido funcional específico del puesto', 'COMPETENCIAS TÉCNICAS', 40, 20.00, NULL, '2024-04-09 19:38:55', '2024-04-09 19:38:55'),
	(155, 13, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 30, 15.00, NULL, '2024-04-09 19:38:55', '2024-04-09 19:38:55'),
	(156, 13, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 30, 7.50, NULL, '2024-04-09 19:38:55', '2024-04-09 19:38:55'),
	(157, 13, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 40, 30.00, NULL, '2024-04-09 19:38:55', '2024-04-09 19:38:55'),
	(158, 13, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 22.50, NULL, '2024-04-09 19:38:55', '2024-04-09 19:38:55'),
	(159, 13, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, 15.00, NULL, '2024-04-09 19:38:55', '2024-04-09 19:38:55'),
	(160, 13, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 2.50, NULL, '2024-04-09 19:38:56', '2024-04-09 19:38:56'),
	(161, 13, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 5.00, NULL, '2024-04-09 19:38:56', '2024-04-09 19:38:56'),
	(162, 13, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 5.00, NULL, '2024-04-09 19:38:57', '2024-04-09 19:38:57'),
	(163, 13, 'Trabajo en equipo', 'Capacidad de interactuar de manera efectiva con el equipo de trabajo, generando sinergias,  para lograr una meta común.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 15.00, NULL, '2024-04-09 19:38:57', '2024-04-09 19:38:57'),
	(164, 13, 'Responsabilidad', 'Capacidad de cumplir con compromisos laborales asumidos con dedicación y esfuerzo.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, 15.00, NULL, '2024-04-09 19:38:57', '2024-04-09 19:38:57'),
	(165, 13, 'Atención al detalle', 'Capacidad de prestar atención a las particularidades de un tema, para obtener un resultado lógico y preciso.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, 5.00, NULL, '2024-04-09 19:38:57', '2024-04-09 19:38:57');

-- Volcando estructura para tabla ucb.evalproces
CREATE TABLE IF NOT EXISTS `evalproces` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `form_version_id` bigint unsigned DEFAULT NULL,
  `texto_encabezado` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_conclusion` date NOT NULL,
  `texto_instruccion` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finalizacion` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evalproces_form_version_id_foreign` (`form_version_id`),
  CONSTRAINT `evalplocess_formmodels_id_foreign` FOREIGN KEY (`form_version_id`) REFERENCES `formmodels` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.evalproces: ~0 rows (aproximadamente)
INSERT INTO `evalproces` (`id`, `form_version_id`, `texto_encabezado`, `fecha_inicio`, `fecha_conclusion`, `texto_instruccion`, `finalizacion`, `created_at`, `updated_at`) VALUES
	(1, 47, 'A través del presente formulario, se evaluará el desempeño mediante el análisis de la aplicación de competencias en el desarrollo de las funciones de cada colaborador(a), durante  el periodo 2024', '2024-04-01', '2025-01-06', 'Marque en la columna que mejor expresa su opinión sobre la forma cómo el funcionario actuó con relación a cada factor, en el periodo de evaluación 2024', 0, '2024-04-08 02:43:32', '2024-04-08 03:02:43');

-- Volcando estructura para tabla ucb.evalresults
CREATE TABLE IF NOT EXISTS `evalresults` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `evalprocess_id` bigint unsigned NOT NULL,
  `evaluado_id` bigint unsigned NOT NULL,
  `evaluado_nivel_id` bigint unsigned NOT NULL,
  `evaluador_id` bigint unsigned NOT NULL,
  `fortalezas` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debilidades` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentarios_evaluador` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propuestas` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota_final` double(8,2) NOT NULL DEFAULT '0.00',
  `comentarios_evaluado` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evalresults_evalprocess_id_foreign` (`evalprocess_id`),
  KEY `evalresults_evaluado_id_foreign` (`evaluado_id`),
  KEY `evalresults_evaluado_nivel_id_foreign` (`evaluado_nivel_id`),
  KEY `evalresults_evaluador_id_foreign` (`evaluador_id`),
  CONSTRAINT `evalresults_evalprocess_id_foreign` FOREIGN KEY (`evalprocess_id`) REFERENCES `evalproces` (`id`) ON DELETE CASCADE,
  CONSTRAINT `evalresults_evaluado_id_foreign` FOREIGN KEY (`evaluado_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `evalresults_evaluado_nivel_id_foreign` FOREIGN KEY (`evaluado_nivel_id`) REFERENCES `niveles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `evalresults_evaluador_id_foreign` FOREIGN KEY (`evaluador_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.evalresults: ~8 rows (aproximadamente)
INSERT INTO `evalresults` (`id`, `evalprocess_id`, `evaluado_id`, `evaluado_nivel_id`, `evaluador_id`, `fortalezas`, `debilidades`, `comentarios_evaluador`, `propuestas`, `nota_final`, `comentarios_evaluado`, `created_at`, `updated_at`) VALUES
	(6, 1, 131, 6, 94, '.', '.', '.', '.', 82.50, '.', '2024-04-08 03:21:31', '2024-04-08 03:26:38'),
	(7, 1, 121, 2, 94, '.', '.', '.', '.', 76.67, '.', '2024-04-08 03:22:16', '2024-04-08 03:27:41'),
	(8, 1, 123, 2, 94, '.', '.', '.', '.', 80.00, '.', '2024-04-08 03:23:26', '2024-04-08 03:28:28'),
	(9, 1, 132, 5, 94, '.', '.', '.', '.', 75.00, '.', '2024-04-08 03:24:00', '2024-04-08 03:29:20'),
	(10, 1, 17, 4, 16, '.', '.', '.', '.', 75.83, '.', '2024-04-09 19:37:08', '2024-04-09 19:40:04'),
	(11, 1, 18, 4, 16, '.', '.', '.', '.', 71.67, '.', '2024-04-09 19:37:43', '2024-04-09 19:45:07'),
	(12, 1, 19, 4, 16, '.', '.', '.', '.', 92.50, '.', '2024-04-09 19:38:21', '2024-04-09 19:46:03'),
	(13, 1, 27, 4, 16, '.', '.', '.', '.', 52.50, '.', '2024-04-09 19:38:54', '2024-04-09 19:46:53');

-- Volcando estructura para tabla ucb.evalxcomps
CREATE TABLE IF NOT EXISTS `evalxcomps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `evalresult_id` bigint unsigned NOT NULL,
  `competencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evalxcomps_evalresult_id_foreign` (`evalresult_id`),
  CONSTRAINT `evalxcomps_evalresult_id_foreign` FOREIGN KEY (`evalresult_id`) REFERENCES `evalresults` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.evalxcomps: ~22 rows (aproximadamente)
INSERT INTO `evalxcomps` (`id`, `evalresult_id`, `competencia`, `nota`, `created_at`, `updated_at`) VALUES
	(16, 6, 'COMPETENCIAS TÉCNICAS', 100.00, '2024-04-08 03:21:33', '2024-04-08 03:21:33'),
	(17, 6, 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 72.50, '2024-04-08 03:21:33', '2024-04-08 03:21:33'),
	(18, 6, 'COMPETENCIAS PERSONALES / GESTIÓN', 75.00, '2024-04-08 03:21:33', '2024-04-08 03:21:33'),
	(19, 7, 'COMPETENCIAS TÉCNICAS', 70.00, '2024-04-08 03:22:19', '2024-04-08 03:22:19'),
	(20, 7, 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 92.50, '2024-04-08 03:22:19', '2024-04-08 03:22:19'),
	(21, 7, 'COMPETENCIAS PERSONALES / GESTIÓN', 67.50, '2024-04-08 03:22:19', '2024-04-08 03:22:19'),
	(22, 8, 'COMPETENCIAS TÉCNICAS', 95.00, '2024-04-08 03:23:29', '2024-04-08 03:23:29'),
	(23, 8, 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 65.00, '2024-04-08 03:23:29', '2024-04-08 03:23:29'),
	(24, 8, 'COMPETENCIAS PERSONALES / GESTIÓN', 80.00, '2024-04-08 03:23:29', '2024-04-08 03:23:29'),
	(25, 9, 'COMPETENCIAS TÉCNICAS', 100.00, '2024-04-08 03:24:02', '2024-04-08 03:24:02'),
	(26, 9, 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 25.00, '2024-04-08 03:24:02', '2024-04-08 03:24:02'),
	(27, 9, 'COMPETENCIAS PERSONALES / GESTIÓN', 100.00, '2024-04-08 03:24:02', '2024-04-08 03:24:02'),
	(28, 10, 'COMPETENCIAS TÉCNICAS', 82.50, '2024-04-09 19:37:12', '2024-04-09 19:37:12'),
	(29, 10, 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 65.00, '2024-04-09 19:37:12', '2024-04-09 19:37:12'),
	(30, 10, 'COMPETENCIAS PERSONALES / GESTIÓN', 80.00, '2024-04-09 19:37:12', '2024-04-09 19:37:12'),
	(31, 11, 'COMPETENCIAS TÉCNICAS', 90.00, '2024-04-09 19:37:46', '2024-04-09 19:37:46'),
	(32, 11, 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 75.00, '2024-04-09 19:37:46', '2024-04-09 19:37:46'),
	(33, 11, 'COMPETENCIAS PERSONALES / GESTIÓN', 50.00, '2024-04-09 19:37:46', '2024-04-09 19:37:46'),
	(34, 12, 'COMPETENCIAS TÉCNICAS', 100.00, '2024-04-09 19:38:23', '2024-04-09 19:38:23'),
	(35, 12, 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 82.50, '2024-04-09 19:38:23', '2024-04-09 19:38:23'),
	(36, 12, 'COMPETENCIAS PERSONALES / GESTIÓN', 95.00, '2024-04-09 19:38:23', '2024-04-09 19:38:23'),
	(37, 13, 'COMPETENCIAS TÉCNICAS', 42.50, '2024-04-09 19:38:57', '2024-04-09 19:38:57'),
	(38, 13, 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 67.50, '2024-04-09 19:38:57', '2024-04-09 19:38:57'),
	(39, 13, 'COMPETENCIAS PERSONALES / GESTIÓN', 47.50, '2024-04-09 19:38:57', '2024-04-09 19:38:57');

-- Volcando estructura para tabla ucb.factors
CREATE TABLE IF NOT EXISTS `factors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `factor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competencia_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `factors_competencia_id_foreign` (`competencia_id`),
  CONSTRAINT `factors_competencia_id_foreign` FOREIGN KEY (`competencia_id`) REFERENCES `competencias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.factors: ~29 rows (aproximadamente)
INSERT INTO `factors` (`id`, `factor`, `descripcion`, `competencia_id`, `created_at`, `updated_at`) VALUES
	(2, 'Destreza laboral', 'Capacidad de aplicar destrezas, habilidades y conocimientos que sean necesarios para ser efectivo en el contenido funcional específico del puesto', 3, '2023-11-13 02:49:23', '2023-11-13 02:49:23'),
	(3, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 3, '2023-11-13 02:49:45', '2023-11-13 02:49:45'),
	(4, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 3, '2023-11-13 04:51:52', '2023-11-13 04:51:52'),
	(8, 'Gestión en el puesto', 'Capacidad de planificar, organizar, ejecutar y controlar cada una de las etapas de desarrollo de sus funciones en el puesto.', 3, '2023-12-18 01:32:57', '2023-12-18 01:32:57'),
	(9, 'Dominio funcional', 'Capacidad de aplicar destrezas, habilidades y conocimientos que son necesarios para ser efectivo en el contenido funcional específico del puesto.', 3, '2023-12-18 01:34:16', '2023-12-18 01:34:16'),
	(10, 'Propuesta', 'Capacidad de proponer iniciativas, proyectos, que permitan potenciar el desarrollo de las actividades de su área de trabajo.', 3, '2023-12-18 01:35:06', '2023-12-18 01:35:06'),
	(11, 'Liderazgo', 'Capacidad de ejercer influencia eficaz sobre las actividades de los miembros del equipo para lograr resultados.', 6, '2023-12-18 01:38:53', '2023-12-18 01:38:53'),
	(12, 'Orientación a  resultados', 'Capacidad de desafiarse y desafiar a la organización  para sobresalir y lograr resultados.', 6, '2023-12-18 01:39:08', '2023-12-18 01:39:08'),
	(13, 'Dirección de equipos', 'Capacidad de trabajar y colaborar de manera efectiva con otros, generando sinergias,  para lograr una meta común', 6, '2023-12-18 01:39:25', '2023-12-18 01:39:25'),
	(14, 'Capacidad de negociación', 'Capacidad de identificar las necesidades y motivaciones de las partes en conflicto, para lograr compromisos mutuamente benéficos', 6, '2023-12-18 01:39:42', '2023-12-18 01:39:42'),
	(15, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 6, '2023-12-18 01:39:57', '2023-12-18 01:39:57'),
	(16, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 6, '2023-12-18 01:40:14', '2023-12-18 01:40:14'),
	(17, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 6, '2023-12-18 01:40:26', '2023-12-18 01:40:26'),
	(18, 'Toma de decisiones', 'Capacidad de reunir los elementos necesarios y efectuar un análisis cuidadoso para la mejor toma de decisiones.', 6, '2023-12-18 01:40:42', '2023-12-18 01:40:42'),
	(19, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 4, '2023-12-18 01:43:45', '2023-12-18 02:26:07'),
	(20, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 4, '2023-12-18 01:44:18', '2023-12-18 02:26:26'),
	(21, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 4, '2023-12-18 01:44:31', '2023-12-18 02:26:44'),
	(22, 'Trabajo en equipo', 'Capacidad de interactuar de manera efectiva con el equipo de trabajo, generando sinergias,  para lograr una meta común.', 6, '2023-12-18 01:51:38', '2023-12-18 01:51:38'),
	(24, 'Responsabilidad', 'Capacidad de cumplir con compromisos laborales asumidos con dedicación y esfuerzo.', 6, '2023-12-18 01:53:51', '2023-12-18 01:53:51'),
	(25, 'Atención al detalle', 'Capacidad de prestar atención a las particularidades de un tema, para obtener un resultado lógico y preciso.', 6, '2023-12-18 01:56:25', '2023-12-18 01:56:25'),
	(26, 'Iniciativa', 'Capacidad de emprender acciones, solucionar problemas rutinarios y mejorar resultados de acuerdo a la situación laboral que se presente.', 6, '2023-12-18 02:01:45', '2023-12-18 02:01:45'),
	(27, 'Conocimiento de puesto', 'Conoce los temas relativos al ejercicio del puesto, los procedimientos de trabajo y la vinculación del puesto con otros funcionarios.', 7, '2023-12-18 02:15:28', '2023-12-18 02:15:28'),
	(28, 'Calidad de Trabajo', 'Presenta orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 7, '2023-12-18 02:15:43', '2023-12-18 02:15:43'),
	(29, 'Oportunidad', 'Cumple las tareas asignadas en el plazo y condiciones que se le han fijado.', 7, '2023-12-18 02:15:56', '2023-12-18 02:15:56'),
	(30, 'Autonomía', 'Cumple con las funciones inherentes al puesto y las tareas encomendadas, sin necesidad de supervisión permanente.', 7, '2023-12-18 02:16:12', '2023-12-18 02:16:12'),
	(31, 'Vocación de servicio', 'Muestra interés en cooperar a sus superiores y al personal en general.', 7, '2023-12-18 02:16:28', '2023-12-18 02:16:28'),
	(32, 'Calidad de las relaciones humanas', 'Establece y mantiene relaciones de trabajo armónicas con sus superiores y compañero(a)s de trabajo.', 7, '2023-12-18 02:16:43', '2023-12-18 02:16:43'),
	(33, 'Calidad de las relaciones con terceros', 'Establece y mantiene relaciones armónicas con el personas externas a la institución y el público en general.', 7, '2023-12-18 02:16:58', '2023-12-18 02:16:58'),
	(34, 'Disciplina', 'Cumple las normas, disposiciones y reglamentos que regulan el trabajo.', 7, '2023-12-18 02:17:19', '2023-12-18 02:17:19');

-- Volcando estructura para tabla ucb.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ucb.formmodels
CREATE TABLE IF NOT EXISTS `formmodels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `creador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.formmodels: ~0 rows (aproximadamente)
INSERT INTO `formmodels` (`id`, `creador`, `descripcion`, `created_at`, `updated_at`) VALUES
	(47, 'Miguel Angel Lara Nisttahuz', 'Esta versión será utilizada en todos los procesos de evaluación hasta nuevo aviso.', '2023-12-17 23:46:25', '2023-12-17 23:46:25');

-- Volcando estructura para tabla ucb.formularios
CREATE TABLE IF NOT EXISTS `formularios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `factores` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `puntuacion` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.formularios: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ucb.generadors
CREATE TABLE IF NOT EXISTS `generadors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `creador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrato` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `evaluado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `puesto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `evaluador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `evaluador_puesto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_evaluacion` date NOT NULL,
  `fecha_cumplimiento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.generadors: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ucb.headresults
CREATE TABLE IF NOT EXISTS `headresults` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `nombre_evaluado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo_evaluado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel_evaluado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_evaluador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo_evaluador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel_evaluador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `version_form` bigint unsigned NOT NULL,
  `periodo_inicio` date NOT NULL,
  `periodo_final` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `headresults_user_id_foreign` (`user_id`),
  KEY `headresults_version_form_foreign` (`version_form`),
  CONSTRAINT `headresults_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `headresults_version_form_foreign` FOREIGN KEY (`version_form`) REFERENCES `formmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.headresults: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ucb.jcargos
CREATE TABLE IF NOT EXISTS `jcargos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel_id` bigint unsigned NOT NULL,
  `area_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jcargos_nivel_id_foreign` (`nivel_id`),
  KEY `jcargos_area_id_foreign` (`area_id`),
  CONSTRAINT `jcargos_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `jcargos_nivel_id_foreign` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.jcargos: ~42 rows (aproximadamente)
INSERT INTO `jcargos` (`id`, `cargo`, `nivel_id`, `area_id`, `created_at`, `updated_at`) VALUES
	(1, 'ASESOR(A) LEGAL DE SEDE', 2, 8, '2023-12-01 06:34:33', '2023-12-16 19:35:01'),
	(3, 'DIRECTOR(A) DE BIBLIOTECA', 1, 3, '2023-12-01 07:45:28', '2023-12-01 07:45:28'),
	(4, 'ENCARGADO(A) DE INFORMÁTICA DE  BIBLIOTECA', 2, 3, '2023-12-01 07:46:05', '2023-12-01 07:46:05'),
	(5, 'ENCARGADO(A) DE SERVICIOS DE BIBLIOTECA', 2, 3, '2023-12-01 07:46:32', '2023-12-01 07:46:32'),
	(6, 'DIRECTOR(A) DEL DEPARTAMENTO DE CULTURA Y ARTE', 1, 10, '2023-12-01 07:47:15', '2023-12-16 19:36:05'),
	(7, 'DIRECTOR(A) DEL DEPARTAMENTO DE CIENCIAS BÁSICAS', 1, 12, '2023-12-01 07:47:52', '2023-12-16 19:41:22'),
	(8, 'DIRECTOR(A) ADMINISTRATIVO Y FINANCIERO DE SEDE', 1, 6, '2023-12-01 07:48:29', '2023-12-01 07:48:29'),
	(9, 'JEFE DEL DEPARTAMENTO DE TECNOLOGÍA Y SISTEMAS', 2, 6, '2023-12-01 07:49:12', '2023-12-01 07:49:12'),
	(10, 'JEFE DEL DEPARTAMENTO DE RECURSOS HUMANOS', 2, 6, '2023-12-01 07:50:00', '2023-12-01 07:50:00'),
	(11, 'JEFE DE LA UNIDAD DE CONTABILIDAD Y FINANZAS', 2, 6, '2023-12-01 20:38:12', '2023-12-01 20:38:12'),
	(12, 'JEFE DE LA UNIDAD DE ADQUISICIONES Y CONTRATACIONES', 2, 6, '2023-12-01 20:38:39', '2023-12-01 20:38:39'),
	(13, 'JEFE DE LA UNIDAD DE CONTROL DE GESTIÓN', 2, 6, '2023-12-01 20:38:59', '2023-12-01 20:38:59'),
	(14, 'JEFE DE LA UNIDAD DE INFRAESTRUCTURA', 2, 6, '2023-12-01 20:39:25', '2023-12-01 20:39:25'),
	(15, 'ENCARGADO(A) DE MANTENIMIENTO', 2, 6, '2023-12-01 20:39:46', '2023-12-01 20:39:46'),
	(16, 'JEFE DE LA UNIDAD DEPORTES', 2, 6, '2023-12-01 20:40:02', '2023-12-01 20:40:02'),
	(17, 'DIRECTOR(A) ACADÉMICO(A) DE SEDE', 1, 7, '2023-12-01 20:40:47', '2023-12-01 20:40:47'),
	(18, 'COORDINADOR(A) ACADÉMICO DE LA UNIDAD EL ALTO', 2, 7, '2023-12-01 20:41:14', '2023-12-01 20:41:14'),
	(19, 'JEFE DE UNIDAD DE REGISTRO ACADÉMICO', 2, 7, '2023-12-01 20:41:49', '2023-12-01 20:41:49'),
	(20, 'COORDINADOR(A) ACADÉMICO(A) DE DESARROLLO CURRICULAR', 2, 7, '2023-12-01 20:42:14', '2023-12-01 20:42:14'),
	(21, 'JEFE DE UNIDAD DE ADMISIÓN Y ORIENTACIÓN', 2, 7, '2023-12-01 20:42:40', '2023-12-01 20:42:40'),
	(22, 'ENCARGADO(A) DE GESTIÓN DE CALIDAD ACADÉMICA', 2, 7, '2023-12-01 20:43:09', '2023-12-01 20:43:09'),
	(23, 'RECTOR(A) DE SEDE', 1, 8, '2023-12-01 20:44:23', '2023-12-01 20:44:23'),
	(24, 'JEFE DE UNIDAD DE MARKETING Y COMUNICACIÓN', 2, 8, '2023-12-01 20:44:39', '2023-12-01 20:44:39'),
	(25, 'JEFE DE UNIDAD DE RELACIONES PÚBLICAS E INFORMACIONES', 2, 8, '2023-12-01 20:45:01', '2023-12-01 20:45:01'),
	(26, 'DIRECTOR DE PASTORAL UNIVERSITARIA', 1, 9, '2023-12-01 20:45:33', '2023-12-01 20:45:33'),
	(27, 'DECANA DE LA FACULTAD DE CIENCIAS SOCIALES Y HUMANAS', 1, 10, '2023-12-16 07:07:27', '2023-12-16 07:07:27'),
	(28, 'COORDINADOR(A) ACADÉMICO DEL INSTITUTO DE INVESTIGACIÓN EN CIENCIAS DEL COMPORTAMIENTO (IICC)', 2, 10, '2023-12-16 07:07:58', '2023-12-16 07:07:58'),
	(29, 'DIRECTOR(A)  DEL DEPARTAMENTO ACADÉMICO DE COMUNICACIÓN SOCIAL', 1, 10, '2023-12-16 07:08:19', '2023-12-16 07:08:19'),
	(31, 'DIRECTOR(A) DEL  DEPARTAMENTO DE EDUCACIÓN', 1, 10, '2023-12-16 07:08:59', '2023-12-16 07:08:59'),
	(32, 'ENCARGADO(A) DEL CENTRO DE IDIOMAS', 2, 10, '2023-12-16 07:09:19', '2023-12-16 07:09:19'),
	(33, 'DECANO(A) DE LA FACULTAD DE CIENCIAS ECONÓMICAS Y FINANCIERAS', 1, 11, '2023-12-16 07:09:45', '2023-12-16 07:09:45'),
	(34, 'DIRECTOR(A) DEL INSTITUTO DE INVESTIGACIONES SOCIOECONÓMICAS -IISEC', 1, 11, '2023-12-16 07:10:04', '2023-12-16 07:10:04'),
	(35, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE ECONOMÍA', 1, 11, '2023-12-16 07:10:20', '2023-12-16 07:10:20'),
	(36, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE ADMINISTRACIÓN DE EMPRESAS', 1, 11, '2023-12-16 07:10:39', '2023-12-16 07:10:39'),
	(37, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE CONTADURÍA PÚBLICA', 1, 11, '2023-12-16 07:10:57', '2023-12-16 07:10:57'),
	(38, 'JEFE DEL PROGRAMA ACADÉMICO DE ADMINISTRACIÓN TURÍSTICA', 2, 11, '2023-12-16 07:11:18', '2023-12-16 07:11:18'),
	(39, 'DECANO(A) DE LA FACULTAD DE INGENIERIA', 1, 12, '2023-12-16 07:11:56', '2023-12-16 07:11:56'),
	(40, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE INGENIERIA CIVIL', 1, 12, '2023-12-16 07:12:22', '2023-12-16 07:12:22'),
	(41, 'DIRECTOR(A) DEL DEPARTAMENTO DE CIENCIAS BÁSICAS', 1, 12, '2023-12-16 07:12:45', '2023-12-16 07:12:45'),
	(42, 'DECANO(A) DE LA FACULTAD DE DERECHO Y CIENCIAS POLÍTICAS', 1, 13, '2023-12-16 07:13:13', '2023-12-16 07:13:13'),
	(43, 'DIRECTOR(A) DEL  DEPARTAMENTO DE CIENCIAS POLÍTICAS Y RELACIONES INTERNACIONALES', 1, 13, '2023-12-16 07:13:31', '2023-12-16 07:13:31'),
	(44, 'DIRECTOR(A) DEL DEPARTAMENTO ACADÉMICO DE DERECHO', 1, 13, '2023-12-16 07:13:55', '2023-12-16 07:13:55');

-- Volcando estructura para tabla ucb.jerarquias
CREATE TABLE IF NOT EXISTS `jerarquias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cargo_jefe` bigint unsigned NOT NULL,
  `cargo_dependiente` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jerarquias_cargo_jefe_foreign` (`cargo_jefe`),
  KEY `jerarquias_cargo_dependiente_foreign` (`cargo_dependiente`),
  CONSTRAINT `jerarquias_cargo_dependiente_foreign` FOREIGN KEY (`cargo_dependiente`) REFERENCES `cargos` (`id`),
  CONSTRAINT `jerarquias_cargo_jefe_foreign` FOREIGN KEY (`cargo_jefe`) REFERENCES `cargos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.jerarquias: ~139 rows (aproximadamente)
INSERT INTO `jerarquias` (`id`, `cargo_jefe`, `cargo_dependiente`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, '2024-01-02 05:55:20', '2024-01-03 08:21:09'),
	(2, 5, 6, '2024-01-03 08:32:20', '2024-01-03 08:32:20'),
	(3, 5, 7, '2024-01-03 08:33:07', '2024-01-03 08:33:07'),
	(4, 5, 8, '2024-01-03 08:33:28', '2024-01-03 08:33:28'),
	(5, 5, 127, '2024-01-03 08:33:59', '2024-01-03 08:33:59'),
	(6, 8, 9, '2024-01-03 08:34:51', '2024-01-03 08:34:51'),
	(7, 7, 10, '2024-01-03 08:35:24', '2024-01-03 08:35:24'),
	(8, 8, 11, '2024-01-03 08:36:03', '2024-01-03 08:36:03'),
	(9, 12, 13, '2024-01-03 08:36:44', '2024-01-03 08:36:44'),
	(10, 12, 14, '2024-01-03 08:38:47', '2024-01-03 08:38:47'),
	(11, 12, 15, '2024-01-03 08:41:26', '2024-01-03 08:41:26'),
	(12, 12, 16, '2024-01-03 08:41:54', '2024-01-03 08:41:54'),
	(13, 12, 17, '2024-01-03 08:42:20', '2024-01-03 08:42:20'),
	(15, 12, 18, '2024-01-03 08:44:45', '2024-01-03 08:44:45'),
	(17, 23, 24, '2024-01-03 08:51:36', '2024-01-03 08:51:36'),
	(18, 23, 25, '2024-01-03 08:52:06', '2024-01-03 08:52:06'),
	(19, 23, 28, '2024-01-03 08:52:31', '2024-01-03 08:52:31'),
	(20, 23, 33, '2024-01-03 08:53:00', '2024-01-03 08:53:00'),
	(21, 23, 43, '2024-01-03 08:53:24', '2024-01-03 08:53:24'),
	(22, 23, 46, '2024-01-03 08:53:47', '2024-01-03 08:53:47'),
	(23, 23, 49, '2024-01-03 08:54:12', '2024-01-03 08:54:12'),
	(24, 23, 52, '2024-01-03 08:54:32', '2024-01-03 08:54:32'),
	(25, 23, 40, '2024-01-03 08:54:50', '2024-01-03 08:54:50'),
	(26, 23, 54, '2024-01-03 08:55:10', '2024-01-03 08:55:10'),
	(27, 25, 26, '2024-01-03 08:55:31', '2024-01-03 08:55:31'),
	(28, 25, 27, '2024-01-03 08:55:52', '2024-01-03 08:55:52'),
	(29, 25, 137, '2024-01-03 08:58:05', '2024-01-03 08:58:05'),
	(30, 25, 138, '2024-01-03 09:00:29', '2024-01-03 09:00:29'),
	(31, 25, 139, '2024-01-03 09:00:47', '2024-01-03 09:00:47'),
	(32, 28, 30, '2024-01-03 09:01:13', '2024-01-03 09:01:13'),
	(33, 33, 34, '2024-01-03 09:02:12', '2024-01-03 09:02:12'),
	(34, 33, 35, '2024-01-03 09:02:37', '2024-01-03 09:02:37'),
	(35, 33, 36, '2024-01-03 09:03:05', '2024-01-03 09:03:05'),
	(36, 33, 37, '2024-01-03 09:03:33', '2024-01-03 09:03:33'),
	(37, 33, 38, '2024-01-03 09:03:56', '2024-01-03 09:03:56'),
	(38, 33, 39, '2024-01-03 09:04:15', '2024-01-03 09:04:15'),
	(39, 43, 44, '2024-01-03 09:04:39', '2024-01-03 09:04:39'),
	(40, 46, 47, '2024-01-03 09:05:08', '2024-01-03 09:05:08'),
	(41, 46, 48, '2024-01-03 09:06:55', '2024-01-03 09:06:55'),
	(42, 49, 50, '2024-01-03 09:07:15', '2024-01-03 09:07:15'),
	(43, 50, 51, '2024-01-03 09:07:41', '2024-01-03 09:07:41'),
	(44, 52, 53, '2024-01-03 09:08:11', '2024-01-03 09:08:11'),
	(45, 23, 118, '2024-01-03 09:08:29', '2024-01-03 09:08:29'),
	(46, 55, 56, '2024-01-03 09:08:52', '2024-01-03 09:08:52'),
	(47, 55, 79, '2024-01-03 09:09:12', '2024-01-03 09:09:12'),
	(48, 55, 60, '2024-01-03 09:09:45', '2024-01-03 09:09:45'),
	(49, 55, 61, '2024-01-03 09:10:08', '2024-01-03 09:10:08'),
	(50, 55, 68, '2024-01-03 09:10:29', '2024-01-03 09:10:29'),
	(51, 55, 70, '2024-01-03 09:10:48', '2024-01-03 09:10:48'),
	(52, 55, 73, '2024-01-03 09:11:04', '2024-01-03 09:11:04'),
	(53, 55, 75, '2024-01-03 09:11:25', '2024-01-03 09:11:25'),
	(54, 55, 76, '2024-01-03 09:11:41', '2024-01-03 09:11:41'),
	(55, 55, 140, '2024-01-03 09:12:50', '2024-01-03 09:12:50'),
	(56, 55, 78, '2024-01-03 09:13:03', '2024-01-03 09:13:03'),
	(57, 124, 125, '2024-01-03 09:13:53', '2024-01-03 09:13:53'),
	(58, 61, 62, '2024-01-03 09:14:29', '2024-01-03 09:14:29'),
	(59, 61, 63, '2024-01-03 09:15:13', '2024-01-03 09:15:13'),
	(60, 61, 64, '2024-01-03 09:15:40', '2024-01-03 09:15:40'),
	(61, 61, 65, '2024-01-03 09:16:04', '2024-01-03 09:16:04'),
	(62, 61, 66, '2024-01-03 09:16:31', '2024-01-03 09:16:31'),
	(63, 61, 67, '2024-01-03 09:17:01', '2024-01-03 09:17:01'),
	(64, 68, 69, '2024-01-03 09:17:57', '2024-01-03 09:17:57'),
	(65, 70, 71, '2024-01-03 09:18:17', '2024-01-03 09:18:17'),
	(66, 70, 72, '2024-01-03 09:18:36', '2024-01-03 09:18:36'),
	(67, 73, 74, '2024-01-03 09:18:59', '2024-01-03 09:18:59'),
	(68, 113, 114, '2024-01-03 09:19:56', '2024-01-03 09:19:56'),
	(69, 113, 115, '2024-01-03 09:20:20', '2024-01-03 09:20:20'),
	(70, 113, 116, '2024-01-03 09:20:37', '2024-01-03 09:20:37'),
	(71, 113, 117, '2024-01-03 09:21:02', '2024-01-03 09:21:02'),
	(72, 113, 107, '2024-01-03 09:21:17', '2024-01-03 09:21:17'),
	(73, 113, 96, '2024-01-03 09:21:34', '2024-01-03 09:21:34'),
	(74, 96, 97, '2024-01-03 09:21:59', '2024-01-03 09:21:59'),
	(75, 96, 98, '2024-01-03 09:22:22', '2024-01-03 09:22:22'),
	(76, 96, 59, '2024-01-03 09:22:43', '2024-01-03 09:22:43'),
	(77, 96, 99, '2024-01-03 09:23:04', '2024-01-03 09:23:04'),
	(78, 107, 108, '2024-01-03 09:23:35', '2024-01-03 09:23:35'),
	(79, 107, 109, '2024-01-03 09:23:56', '2024-01-03 09:23:56'),
	(80, 107, 110, '2024-01-03 09:24:24', '2024-01-03 09:24:24'),
	(81, 107, 111, '2024-01-03 09:24:52', '2024-01-03 09:24:52'),
	(82, 107, 112, '2024-01-03 09:25:26', '2024-01-03 09:25:26'),
	(83, 100, 101, '2024-01-03 09:26:17', '2024-01-03 09:26:17'),
	(84, 100, 102, '2024-01-03 09:26:57', '2024-01-03 09:26:57'),
	(85, 100, 103, '2024-01-03 09:27:33', '2024-01-03 09:27:33'),
	(86, 100, 104, '2024-01-03 09:27:48', '2024-01-03 09:27:48'),
	(87, 100, 105, '2024-01-03 09:28:06', '2024-01-03 09:28:06'),
	(88, 100, 106, '2024-01-03 09:28:30', '2024-01-03 09:28:30'),
	(89, 141, 84, '2024-01-04 03:11:44', '2024-01-04 03:11:44'),
	(91, 141, 146, '2024-01-04 03:16:11', '2024-01-04 03:16:11'),
	(92, 141, 12, '2024-01-04 03:16:38', '2024-01-04 03:16:38'),
	(93, 141, 80, '2024-01-04 03:17:11', '2024-01-04 03:17:11'),
	(94, 141, 88, '2024-01-04 03:18:15', '2024-01-04 03:18:15'),
	(95, 88, 89, '2024-01-04 03:18:53', '2024-01-04 03:18:53'),
	(96, 146, 119, '2024-01-04 03:19:46', '2024-01-04 03:19:46'),
	(97, 146, 120, '2024-01-04 03:20:16', '2024-01-04 03:20:16'),
	(98, 146, 147, '2024-01-04 03:22:27', '2024-01-04 03:22:27'),
	(99, 146, 122, '2024-01-04 03:23:01', '2024-01-04 03:23:01'),
	(100, 146, 123, '2024-01-04 03:23:41', '2024-01-04 03:23:41'),
	(101, 146, 148, '2024-01-04 03:24:31', '2024-01-04 03:35:01'),
	(102, 80, 81, '2024-01-04 03:30:24', '2024-01-04 03:30:24'),
	(103, 80, 82, '2024-01-04 03:30:54', '2024-01-04 03:30:54'),
	(104, 80, 129, '2024-01-04 03:35:55', '2024-01-04 03:35:55'),
	(105, 82, 83, '2024-01-04 03:36:28', '2024-01-04 03:36:28'),
	(106, 142, 149, '2024-01-04 03:38:08', '2024-01-04 03:38:08'),
	(107, 142, 150, '2024-01-04 03:39:40', '2024-01-04 03:39:40'),
	(108, 142, 151, '2024-01-04 03:42:20', '2024-01-04 03:42:20'),
	(109, 142, 152, '2024-01-04 03:43:00', '2024-01-04 03:43:00'),
	(110, 142, 153, '2024-01-04 03:43:35', '2024-01-04 03:43:35'),
	(111, 142, 154, '2024-01-04 03:45:28', '2024-01-04 03:45:28'),
	(112, 142, 91, '2024-01-04 03:46:02', '2024-01-04 03:46:02'),
	(113, 91, 92, '2024-01-04 03:46:30', '2024-01-04 03:46:30'),
	(114, 91, 93, '2024-01-04 03:47:01', '2024-01-04 03:47:01'),
	(115, 91, 155, '2024-01-04 03:48:51', '2024-01-04 03:53:25'),
	(116, 150, 156, '2024-01-04 03:53:52', '2024-01-04 03:53:52'),
	(117, 151, 4, '2024-01-04 03:54:41', '2024-01-04 03:54:41'),
	(118, 152, 86, '2024-01-04 03:55:26', '2024-01-04 03:55:26'),
	(119, 154, 157, '2024-01-04 03:55:57', '2024-01-04 03:55:57'),
	(120, 143, 158, '2024-01-04 03:57:05', '2024-01-04 03:57:05'),
	(121, 143, 159, '2024-01-04 03:58:05', '2024-01-04 03:58:05'),
	(122, 143, 57, '2024-01-04 03:58:30', '2024-01-04 03:58:30'),
	(123, 143, 160, '2024-01-04 04:02:14', '2024-01-04 04:02:14'),
	(124, 143, 161, '2024-01-04 04:02:43', '2024-01-04 04:02:43'),
	(125, 143, 162, '2024-01-04 04:03:07', '2024-01-04 04:03:07'),
	(126, 143, 163, '2024-01-04 04:03:32', '2024-01-04 04:03:32'),
	(127, 143, 164, '2024-01-04 04:03:51', '2024-01-04 04:03:51'),
	(128, 143, 165, '2024-01-04 04:04:19', '2024-01-04 04:04:19'),
	(129, 143, 166, '2024-01-04 04:04:49', '2024-01-04 04:04:49'),
	(130, 143, 136, '2024-01-04 04:05:32', '2024-01-04 04:05:32'),
	(131, 143, 167, '2024-01-04 04:06:00', '2024-01-04 04:06:00'),
	(132, 143, 168, '2024-01-04 04:06:31', '2024-01-04 04:06:31'),
	(134, 163, 94, '2024-01-04 04:07:02', '2024-01-04 04:07:02'),
	(135, 163, 95, '2024-01-04 04:07:33', '2024-01-04 04:07:33'),
	(136, 136, 20, '2024-01-04 04:09:02', '2024-01-04 04:09:02'),
	(137, 136, 22, '2024-01-04 04:09:22', '2024-01-04 04:09:22'),
	(138, 136, 19, '2024-01-04 04:09:48', '2024-01-04 04:09:48'),
	(139, 136, 21, '2024-01-04 04:10:32', '2024-01-04 04:10:32'),
	(140, 144, 58, '2024-01-04 04:10:56', '2024-01-04 04:10:56'),
	(141, 144, 169, '2024-01-04 04:12:50', '2024-01-04 04:12:50'),
	(142, 144, 170, '2024-01-04 04:14:18', '2024-01-04 04:14:18'),
	(143, 144, 87, '2024-01-04 04:14:51', '2024-01-04 04:14:51'),
	(144, 169, 171, '2024-01-04 04:16:41', '2024-01-04 04:16:41'),
	(145, 170, 172, '2024-01-04 04:18:43', '2024-01-04 04:18:43'),
	(146, 113, 23, '2024-01-04 04:19:03', '2024-01-04 04:19:03'),
	(147, 113, 55, '2024-01-04 04:19:19', '2024-01-04 04:19:19'),
	(148, 113, 100, '2024-01-04 04:19:46', '2024-01-04 04:19:46'),
	(149, 113, 5, '2024-01-04 04:20:12', '2024-01-04 04:20:12'),
	(150, 55, 141, '2024-01-04 04:20:42', '2024-01-04 04:20:42'),
	(151, 55, 142, '2024-01-04 04:21:01', '2024-01-04 04:21:01'),
	(152, 55, 143, '2024-01-04 04:21:18', '2024-01-04 04:21:18'),
	(153, 1, 3, '2024-01-14 19:59:48', '2024-01-14 19:59:48'),
	(154, 23, 29, '2024-01-14 20:18:14', '2024-01-14 20:18:14'),
	(155, 28, 31, '2024-01-14 21:02:01', '2024-01-14 21:02:01'),
	(156, 28, 32, '2024-01-14 21:03:35', '2024-01-14 21:03:35'),
	(157, 23, 41, '2024-01-14 22:18:17', '2024-01-14 22:18:17'),
	(158, 23, 42, '2024-01-14 22:19:18', '2024-01-14 22:19:18'),
	(159, 43, 45, '2024-01-14 22:21:29', '2024-01-14 22:21:29'),
	(160, 55, 77, '2024-01-14 22:23:13', '2024-01-14 22:23:13'),
	(161, 80, 135, '2024-01-14 23:43:12', '2024-01-14 23:43:12'),
	(162, 88, 90, '2024-01-14 23:46:42', '2024-01-14 23:46:42'),
	(163, 146, 121, '2024-01-15 00:41:21', '2024-01-15 00:41:21'),
	(164, 152, 173, '2024-01-15 06:31:50', '2024-01-15 06:31:50');

-- Volcando estructura para tabla ucb.mediosforms
CREATE TABLE IF NOT EXISTS `mediosforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `formmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `competencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mediosforms_formmodel_id_foreign` (`formmodel_id`),
  CONSTRAINT `mediosforms_formmodel_id_foreign` FOREIGN KEY (`formmodel_id`) REFERENCES `formmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.mediosforms: ~16 rows (aproximadamente)
INSERT INTO `mediosforms` (`id`, `formmodel_id`, `factor`, `descripcion`, `competencia`, `ponderacion`, `created_at`, `updated_at`) VALUES
	(15, 47, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:28', '2023-12-17 23:46:28'),
	(16, 47, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:29', '2023-12-17 23:46:29'),
	(17, 47, 'Gestión en el puesto', 'Capacidad de planificar, organizar, ejecutar y controlar cada una de las etapas de desarrollo de sus funciones en el puesto.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:29', '2023-12-17 23:46:29'),
	(18, 47, 'Dominio funcional', 'Capacidad de aplicar destrezas, habilidades y conocimientos que son necesarios para ser efectivo en el contenido funcional específico del puesto.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:29', '2023-12-17 23:46:29'),
	(19, 47, 'Propuesta', 'Capacidad de proponer iniciativas, proyectos, que permitan potenciar el desarrollo de las actividades de su área de trabajo.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:29', '2023-12-17 23:46:29'),
	(20, 47, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 40, '2023-12-17 23:46:29', '2023-12-17 23:46:29'),
	(21, 47, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, '2023-12-17 23:46:29', '2023-12-17 23:46:29'),
	(22, 47, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, '2023-12-17 23:46:29', '2023-12-17 23:46:29'),
	(23, 47, 'Liderazgo', 'Capacidad de ejercer influencia eficaz sobre las actividades de los miembros del equipo para lograr resultados.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:29', '2023-12-17 23:46:29'),
	(24, 47, 'Orientación a  resultados', 'Capacidad de desafiarse y desafiar a la organización  para sobresalir y lograr resultados.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:29', '2023-12-17 23:46:29'),
	(25, 47, 'Dirección de equipos', 'Capacidad de trabajar y colaborar de manera efectiva con otros, generando sinergias,  para lograr una meta común', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:30', '2023-12-17 23:46:30'),
	(26, 47, 'Capacidad de negociación', 'Capacidad de identificar las necesidades y motivaciones de las partes en conflicto, para lograr compromisos mutuamente benéficos', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:30', '2023-12-17 23:46:30'),
	(27, 47, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:30', '2023-12-17 23:46:30'),
	(28, 47, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:30', '2023-12-17 23:46:30'),
	(29, 47, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:30', '2023-12-17 23:46:30'),
	(30, 47, 'Toma de decisiones', 'Capacidad de reunir los elementos necesarios y efectuar un análisis cuidadoso para la mejor toma de decisiones.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:30', '2023-12-17 23:46:30');

-- Volcando estructura para tabla ucb.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.migrations: ~61 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2014_10_12_100000_create_password_resets_table', 2),
	(6, '2023_11_10_021849_create_contratos_table', 2),
	(7, '2023_11_10_021941_create_niveles_table', 2),
	(8, '2023_11_10_022136_create_generadors_table', 2),
	(9, '2023_11_10_024851_create_generadors_table', 3),
	(10, '2023_11_10_024942_create_generadors_table', 4),
	(11, '2023_11_10_031314_create_formularios_table', 5),
	(12, '2023_11_10_034814_create_factores_table', 6),
	(13, '2023_11_12_001228_create_tipos_table', 7),
	(14, '2023_11_12_001356_create_formmodels_table', 7),
	(15, '2023_11_12_001513_create_competencias_table', 7),
	(16, '2023_11_12_001548_create_factors_table', 7),
	(17, '2023_11_12_002644_create_formcontents_table', 8),
	(18, '2023_11_12_002645_create_formcontents_table', 9),
	(19, '2023_11_12_002646_create_formcontents_table', 10),
	(20, '2023_11_12_002647_create_formcontents_table', 11),
	(21, '2023_11_12_002648_create_formcontents_table', 12),
	(22, '2023_11_13_005501_create_selects_table', 13),
	(23, '2023_11_13_010802_create_selectids_table', 14),
	(24, '2023_11_15_223947_create_ejecutivoforms_table', 15),
	(25, '2023_11_15_224000_create_mediosforms_table', 15),
	(26, '2023_11_15_224013_create_profesionalforms_table', 15),
	(27, '2023_11_15_224026_create_tecnicoforms_table', 15),
	(28, '2023_11_15_224045_create_administrativoforms_table', 15),
	(29, '2023_11_15_224058_create_auxiliarforms_table', 15),
	(30, '2023_11_15_224001_create_mediosforms_table', 16),
	(31, '2023_11_15_224014_create_profesionalforms_table', 16),
	(32, '2023_11_15_224027_create_tecnicoforms_table', 16),
	(33, '2023_11_15_224046_create_administrativoforms_table', 16),
	(34, '2023_11_15_224059_create_auxiliarforms_table', 16),
	(35, '2023_11_18_163716_create_cargos_table', 17),
	(36, '2023_11_18_175435_create_departamentos_table', 17),
	(37, '2023_11_18_175437_create_areas_table', 17),
	(38, '2023_11_18_175438_create_unidads_table', 17),
	(39, '2023_11_18_175439_create_seccions_table', 17),
	(40, '2023_11_18_175444_create_personals_table', 18),
	(41, '2023_11_18_163717_create_cargos_table', 19),
	(42, '2023_11_18_175440_create_seccions_table', 19),
	(43, '2023_11_29_213147_create_cargojefes_table', 20),
	(44, '2023_11_29_213200_create_arbolcargos_table', 21),
	(45, '2023_11_29_213148_create_cargojefes_table', 22),
	(46, '2023_11_29_213201_create_arbolcargos_table', 22),
	(47, '2023_11_29_213149_create_cjefes_table', 23),
	(48, '2023_11_29_213202_create_arbolcargos_table', 23),
	(49, '2023_11_29_213150_create_jcargos_table', 24),
	(50, '2023_11_29_213251_create_arbolcargos_table', 24),
	(51, '2023_11_29_213151_create_jcargos_table', 25),
	(52, '2023_11_29_213252_create_arbolcargos_table', 26),
	(53, '2023_12_03_030856_create_headresults_table', 27),
	(54, '2023_12_03_030908_create_bodyresults_table', 27),
	(55, '2023_12_06_011739_create_evalprocess_table', 28),
	(56, '2023_12_06_012446_create_assignments_table', 29),
	(57, '2023_12_06_011739_create_evalproces_table', 30),
	(58, '2023_12_06_012447_create_assignments_table', 30),
	(68, '2023_12_10_144012_create_confirmproces_table', 31),
	(69, '2023_12_10_161624_create_confirmassignments_table', 31),
	(70, '2023_12_10_211358_create_evalresults_table', 31),
	(71, '2023_12_10_211409_create_evaldetailsresults_table', 32),
	(72, '2023_12_10_211451_create_confirmresults_table', 32),
	(73, '2023_12_10_211459_create_confirmdetailsresults_table', 32),
	(74, '2023_12_14_215520_create_secciones_table', 32),
	(75, '2023_12_14_215747_create_unidades_table', 32),
	(76, '2023_12_14_215759_create_deptos_table', 32),
	(77, '2023_12_15_312447_create_assignments_table', 33),
	(78, '2023_12_18_012140_create_conformmodels_table', 34),
	(79, '2023_12_18_012329_create_confirmforms_table', 34),
	(80, '2023_12_19_012450_create_evalxcomp_table', 35),
	(81, '2023_12_19_015420_create_evalxcomps_table', 36),
	(82, '2023_12_19_065549_create_confprocess_table', 37),
	(83, '2023_12_19_124517_create_confproces_table', 38),
	(84, '2023_12_20_163717_create_cargos_table', 39),
	(85, '2024_01_01_171044_create_jerarquias_table', 40),
	(86, '2024_01_01_171048_create_jerarquias_table', 41),
	(88, '2024_01_21_204630_create_cejecutivoforms_table', 42),
	(89, '2024_01_21_204648_create_cmediosforms_table', 42),
	(90, '2024_01_21_204704_create_cprofesionalforms_table', 42),
	(91, '2024_01_21_204721_create_ctecnicoforms_table', 42),
	(92, '2024_01_21_204737_create_cadministrativoforms_table', 42),
	(93, '2024_01_21_204747_create_cauxiliarforms_table', 42);

-- Volcando estructura para tabla ucb.niveles
CREATE TABLE IF NOT EXISTS `niveles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nivel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.niveles: ~6 rows (aproximadamente)
INSERT INTO `niveles` (`id`, `nivel`, `created_at`, `updated_at`) VALUES
	(1, 'NIVEL EJECUTIVO', '2023-11-10 06:32:54', '2023-12-01 06:38:21'),
	(2, 'NIVEL MANDOS MEDIOS', '2023-11-10 06:33:09', '2023-12-01 06:38:39'),
	(3, 'NIVEL OPERATIVOS - PROFESIONAL', '2023-11-14 02:56:09', '2023-12-01 06:40:54'),
	(4, 'NIVEL OPERATIVO - TECNICO', '2023-11-14 02:56:58', '2023-12-01 06:40:44'),
	(5, 'NIVEL OPERATIVO - ADMINISTRATIVO', '2023-11-14 02:57:21', '2023-12-01 06:40:35'),
	(6, 'NIVEL OPERATIVO - AUXILIAR', '2023-11-14 02:57:54', '2023-12-01 06:41:15');

-- Volcando estructura para tabla ucb.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.password_resets: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ucb.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.password_reset_tokens: ~0 rows (aproximadamente)
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
	('starmiguelara@gmail.com', '$2y$12$wNUXQibQsqauOabmHwErRuMQch04cTvzROjaTrGIyJvYgyKvtgpYq', '2023-12-21 05:25:11');

-- Volcando estructura para tabla ucb.personals
CREATE TABLE IF NOT EXISTS `personals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `apellidos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel_id` bigint unsigned NOT NULL,
  `cargo_id` bigint unsigned NOT NULL,
  `area_id` bigint unsigned NOT NULL,
  `depto_id` bigint unsigned NOT NULL,
  `unidad_id` bigint unsigned NOT NULL,
  `seccion_id` bigint unsigned NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `doc_identidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expedido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipocontrato_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personals_nivel_id_foreign` (`nivel_id`),
  KEY `personals_cargo_id_foreign` (`cargo_id`),
  KEY `personals_area_id_foreign` (`area_id`),
  KEY `personals_depto_id_foreign` (`depto_id`),
  KEY `personals_unidad_id_foreign` (`unidad_id`),
  KEY `personals_seccion_id_foreign` (`seccion_id`),
  KEY `personals_tipocontrato_id_foreign` (`tipocontrato_id`),
  CONSTRAINT `personals_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `personals_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `personals_depto_id_foreign` FOREIGN KEY (`depto_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `personals_nivel_id_foreign` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `personals_seccion_id_foreign` FOREIGN KEY (`seccion_id`) REFERENCES `seccions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `personals_tipocontrato_id_foreign` FOREIGN KEY (`tipocontrato_id`) REFERENCES `contratos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `personals_unidad_id_foreign` FOREIGN KEY (`unidad_id`) REFERENCES `unidads` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.personals: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ucb.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ucb.profesionalforms
CREATE TABLE IF NOT EXISTS `profesionalforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `formmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `competencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profesionalforms_formmodel_id_foreign` (`formmodel_id`),
  CONSTRAINT `profesionalforms_formmodel_id_foreign` FOREIGN KEY (`formmodel_id`) REFERENCES `formmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.profesionalforms: ~14 rows (aproximadamente)
INSERT INTO `profesionalforms` (`id`, `formmodel_id`, `factor`, `descripcion`, `competencia`, `ponderacion`, `created_at`, `updated_at`) VALUES
	(14, 47, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:30', '2023-12-17 23:46:30'),
	(15, 47, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:31', '2023-12-17 23:46:31'),
	(16, 47, 'Gestión en el puesto', 'Capacidad de planificar, organizar, ejecutar y controlar cada una de las etapas de desarrollo de sus funciones en el puesto.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:31', '2023-12-17 23:46:31'),
	(17, 47, 'Dominio funcional', 'Capacidad de aplicar destrezas, habilidades y conocimientos que son necesarios para ser efectivo en el contenido funcional específico del puesto.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:31', '2023-12-17 23:46:31'),
	(18, 47, 'Propuesta', 'Capacidad de proponer iniciativas, proyectos, que permitan potenciar el desarrollo de las actividades de su área de trabajo.', 'COMPETENCIAS TÉCNICAS', 20, '2023-12-17 23:46:31', '2023-12-17 23:46:31'),
	(19, 47, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 40, '2023-12-17 23:46:31', '2023-12-17 23:46:31'),
	(20, 47, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, '2023-12-17 23:46:31', '2023-12-17 23:46:31'),
	(21, 47, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, '2023-12-17 23:46:31', '2023-12-17 23:46:31'),
	(22, 47, 'Orientación a  resultados', 'Capacidad de desafiarse y desafiar a la organización  para sobresalir y lograr resultados.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:31', '2023-12-17 23:46:31'),
	(23, 47, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:32', '2023-12-17 23:46:32'),
	(24, 47, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:32', '2023-12-17 23:46:32'),
	(25, 47, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:32', '2023-12-17 23:46:32'),
	(26, 47, 'Trabajo en equipo', 'Capacidad de interactuar de manera efectiva con el equipo de trabajo, generando sinergias,  para lograr una meta común.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:32', '2023-12-17 23:46:32'),
	(27, 47, 'Responsabilidad', 'Capacidad de cumplir con compromisos laborales asumidos con dedicación y esfuerzo.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:32', '2023-12-17 23:46:32');

-- Volcando estructura para tabla ucb.secciones
CREATE TABLE IF NOT EXISTS `secciones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `secciones_area_id_foreign` (`area_id`),
  CONSTRAINT `secciones_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.secciones: ~39 rows (aproximadamente)
INSERT INTO `secciones` (`id`, `seccion`, `area_id`, `created_at`, `updated_at`) VALUES
	(1, 'PROCESOS TÉCNICOS DE BIBLIOTECA', 3, '2023-12-15 02:50:52', '2023-12-15 02:50:52'),
	(2, 'SERVICIOS BIBLIOTECA', 3, '2023-12-15 02:51:16', '2023-12-15 02:51:16'),
	(3, 'INFORMÁTICA BIBLIOTECA', 3, '2023-12-15 02:51:27', '2023-12-15 02:51:27'),
	(4, 'EXTENSIÓN CULTURAL', 10, '2023-12-15 02:51:51', '2023-12-15 02:51:51'),
	(5, 'LABORATORIO DE QUÍMICA', 12, '2023-12-15 02:52:03', '2023-12-15 02:52:03'),
	(6, 'LABORATORIO DE FÍSICA', 12, '2023-12-15 02:53:17', '2023-12-15 02:53:17'),
	(7, 'SERVICIOS ADMINISTRATIVOS ESTUDIANTILES', 6, '2023-12-15 02:55:18', '2023-12-15 02:55:18'),
	(8, 'SERVICIOS ADMINISTRATIVOS ESTUDIANTILES/ CAJA', 6, '2023-12-15 02:55:43', '2023-12-15 02:55:43'),
	(9, 'MANTENIMIENTO', 6, '2023-12-15 02:55:57', '2023-12-15 02:55:57'),
	(10, 'CONSULTORIO MÉDICO', 8, '2023-12-15 02:59:14', '2023-12-15 02:59:14'),
	(11, 'CONSULTORIO MÉDICO', 6, '2023-12-15 02:59:25', '2023-12-15 02:59:25'),
	(12, 'POSTGRADO', 6, '2023-12-15 02:59:40', '2023-12-15 02:59:40'),
	(13, 'POSTGRADO', 12, '2023-12-15 02:59:54', '2023-12-15 02:59:54'),
	(14, 'POSTGRADO', 13, '2023-12-15 03:00:04', '2023-12-15 03:00:04'),
	(15, 'POSTGRADO', 10, '2023-12-15 03:00:16', '2023-12-15 03:00:16'),
	(16, 'POSTGRADO', 11, '2023-12-15 03:00:25', '2023-12-15 03:00:25'),
	(17, 'POSTGRADO', 15, '2023-12-15 03:00:31', '2023-12-15 03:00:31'),
	(18, 'INVESTIGACIÓN', 8, '2023-12-15 03:00:40', '2023-12-15 03:00:40'),
	(19, 'GESTIÓN DE CALIDAD ACADÉMICA', 7, '2023-12-15 03:00:55', '2023-12-15 03:00:55'),
	(20, 'SERVICIOS ESTUDIANTILES INTEGRALES', 7, '2023-12-15 03:01:04', '2023-12-15 03:01:04'),
	(21, 'ARCHIVO ACADÉMICO', 7, '2023-12-15 03:01:15', '2023-12-15 03:01:15'),
	(22, 'ENLACES EDUCATIVOS', 10, '2023-12-15 03:01:47', '2023-12-15 03:01:47'),
	(23, 'CENTRO DE IDIOMAS', 10, '2023-12-15 03:01:56', '2023-12-15 03:01:56'),
	(24, 'LABORATORIO DE INGENIERIA CIVIL', 12, '2023-12-15 03:02:24', '2023-12-15 03:02:24'),
	(25, 'MARKETING DIGITAL', 8, '2023-12-15 03:02:33', '2023-12-15 03:02:33'),
	(26, 'FORMACIÓN ACADÉMICA Y PEDAGÓGICA', 9, '2023-12-15 03:02:46', '2023-12-15 03:02:46'),
	(27, 'INTERACCIÓN SOCIAL Y BIENESTAR COMUNITARIO', 9, '2023-12-15 03:02:58', '2023-12-15 03:02:58'),
	(28, 'PROGRAMA NACIONAL DEL ADULTO MAYOR (UPTE)', 9, '2023-12-15 03:03:06', '2023-12-15 03:03:06'),
	(29, 'ESPIRITUALIDAD CRISTIANA Y TRANSVERSALIDAD PASTORAL', 9, '2023-12-15 03:03:14', '2023-12-15 03:03:14'),
	(30, 'MEDIACIÓN UNIVERSITARIA', 9, '2023-12-15 03:03:21', '2023-12-15 03:03:21'),
	(31, 'INFORMACIONES', 8, '2023-12-15 03:03:31', '2023-12-15 03:03:31'),
	(32, 'RELACIONES PUBLICAS E INFORMACIONES', 8, '2023-12-15 03:03:43', '2023-12-15 03:03:43'),
	(33, 'PLANIFICACIÓN ESTRATÉGICA INSTITUCIONAL DE SEDE', 8, '2023-12-15 03:03:59', '2023-12-15 03:03:59'),
	(34, 'ADMINISTRACIÓN Y CONTROL', 8, '2023-12-15 03:04:09', '2023-12-15 03:04:09'),
	(35, 'AUDIO', 10, '2023-12-15 03:04:22', '2023-12-15 03:04:22'),
	(36, 'PRODUCCIÓN AUDIOVISUAL', 10, '2023-12-15 03:04:30', '2023-12-15 03:04:30'),
	(37, 'INCLUSIÓN, EQUIDAD Y DISCAPACIDAD', 10, '2023-12-15 03:04:41', '2023-12-15 03:04:41'),
	(38, 'CLINICA JURIDICA', 7, '2023-12-15 03:04:56', '2023-12-15 03:04:56'),
	(39, 'CLINICA JURIDICA', 13, '2023-12-15 03:05:10', '2023-12-15 03:05:10'),
	(40, 'POSTGRADO', 7, '2023-12-16 23:46:56', '2023-12-16 23:46:56');

-- Volcando estructura para tabla ucb.seccions
CREATE TABLE IF NOT EXISTS `seccions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.seccions: ~0 rows (aproximadamente)
INSERT INTO `seccions` (`id`, `seccion`, `created_at`, `updated_at`) VALUES
	(1, 'Principal', '2023-11-18 23:00:39', '2023-11-18 23:00:39');

-- Volcando estructura para tabla ucb.selects
CREATE TABLE IF NOT EXISTS `selects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `factor_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `selects_factor_id_foreign` (`factor_id`),
  CONSTRAINT `selects_factor_id_foreign` FOREIGN KEY (`factor_id`) REFERENCES `factors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.selects: ~1 rows (aproximadamente)

-- Volcando estructura para tabla ucb.tecnicoforms
CREATE TABLE IF NOT EXISTS `tecnicoforms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `formmodel_id` bigint unsigned NOT NULL,
  `factor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `competencia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ponderacion` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tecnicoforms_formmodel_id_foreign` (`formmodel_id`),
  CONSTRAINT `tecnicoforms_formmodel_id_foreign` FOREIGN KEY (`formmodel_id`) REFERENCES `formmodels` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.tecnicoforms: ~12 rows (aproximadamente)
INSERT INTO `tecnicoforms` (`id`, `formmodel_id`, `factor`, `descripcion`, `competencia`, `ponderacion`, `created_at`, `updated_at`) VALUES
	(13, 47, 'Destreza laboral', 'Capacidad de aplicar destrezas, habilidades y conocimientos que sean necesarios para ser efectivo en el contenido funcional específico del puesto', 'COMPETENCIAS TÉCNICAS', 40, '2023-12-17 23:46:32', '2023-12-17 23:46:32'),
	(14, 47, 'Calidad de Trabajo', 'Capacidad de presentar los trabajos, proyectos o servicios con orden, prolijidad y precisión en los productos y resultados de su trabajo, conforme a las exigencias del puesto.', 'COMPETENCIAS TÉCNICAS', 30, '2023-12-17 23:46:33', '2023-12-17 23:46:33'),
	(15, 47, 'Adaptabilidad', 'Capacidad de adaptarse a diferentes contextos, situaciones, medios, personas y tecnologías de forma oportuna y efectiva.', 'COMPETENCIAS TÉCNICAS', 30, '2023-12-17 23:46:33', '2023-12-17 23:46:33'),
	(16, 47, 'Principios éticos y de respeto', 'Su conducta, comportamiento y acciones se enmarcan en los principios éticos y de respeto que promueve la Universidad', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 40, '2023-12-17 23:46:33', '2023-12-17 23:46:33'),
	(17, 47, 'Servicio y el bien común', 'Su conducta, comportamiento y acciones se enmarcan en el servicio y el bien común, en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, '2023-12-17 23:46:33', '2023-12-17 23:46:33'),
	(18, 47, 'Justicia social, verdad y honestidad', 'Su conducta y comportamiento se enmarcan en la justicia social, verdad y honestidad en el marco de valores y principios que promueve la Universidad.', 'ALINEACION ESTRATEGICA CON LOS VALORES DE LA UNIVERSIDAD', 30, '2023-12-17 23:46:33', '2023-12-17 23:46:33'),
	(19, 47, 'Comunicación', 'Capacidad de comunicarse de manera clara y efectiva con las personas dentro y fuera de la Organización', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:33', '2023-12-17 23:46:33'),
	(20, 47, 'Colaboración', 'Capacidad de dar respuesta y apoyo al personal de la Organización que lo requiera a través de las instancias pertinentes.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:33', '2023-12-17 23:46:33'),
	(21, 47, 'Resolución de problemas', 'Capacidad de resolver problemas mediante una evaluación cuidadosa y sistemática de la información, de posibles alternativas y contecuencias.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:34', '2023-12-17 23:46:34'),
	(22, 47, 'Trabajo en equipo', 'Capacidad de interactuar de manera efectiva con el equipo de trabajo, generando sinergias,  para lograr una meta común.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:34', '2023-12-17 23:46:34'),
	(23, 47, 'Responsabilidad', 'Capacidad de cumplir con compromisos laborales asumidos con dedicación y esfuerzo.', 'COMPETENCIAS PERSONALES / GESTIÓN', 20, '2023-12-17 23:46:34', '2023-12-17 23:46:34'),
	(24, 47, 'Atención al detalle', 'Capacidad de prestar atención a las particularidades de un tema, para obtener un resultado lógico y preciso.', 'COMPETENCIAS PERSONALES / GESTIÓN', 10, '2023-12-17 23:46:34', '2023-12-17 23:46:34');

-- Volcando estructura para tabla ucb.tipos
CREATE TABLE IF NOT EXISTS `tipos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo_formulario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.tipos: ~2 rows (aproximadamente)
INSERT INTO `tipos` (`id`, `tipo_formulario`, `created_at`, `updated_at`) VALUES
	(1, 'Evaluación', '2023-11-12 05:24:38', '2023-11-12 05:24:38'),
	(2, 'Confirmación', '2023-11-12 05:24:53', '2023-11-12 05:24:53');

-- Volcando estructura para tabla ucb.unidades
CREATE TABLE IF NOT EXISTS `unidades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `unidades_area_id_foreign` (`area_id`),
  CONSTRAINT `unidades_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.unidades: ~17 rows (aproximadamente)
INSERT INTO `unidades` (`id`, `unidad`, `area_id`, `created_at`, `updated_at`) VALUES
	(1, 'ADMINISTRACIÓN DE PERSONAL', 8, '2023-12-15 03:05:35', '2023-12-15 03:05:35'),
	(2, 'ADMINISTRACIÓN DE PERSONAL', 6, '2023-12-15 03:05:47', '2023-12-15 03:05:47'),
	(3, 'CONTABILIDAD Y FINANZAS', 6, '2023-12-15 03:06:00', '2023-12-15 03:06:00'),
	(4, 'ADQUISICIONES Y CONTRATACIONES', 6, '2023-12-15 03:06:16', '2023-12-15 03:06:16'),
	(5, 'ADQUISICIONES Y CONTRATACIONES/ ALMACENES', 6, '2023-12-15 03:06:34', '2023-12-15 03:06:34'),
	(6, 'CONTROL DE GESTION', 6, '2023-12-15 03:06:48', '2023-12-15 03:06:48'),
	(7, 'INFRAESTRUCTURA', 6, '2023-12-15 03:06:59', '2023-12-15 03:06:59'),
	(8, 'DEPORTES', 6, '2023-12-15 03:07:24', '2023-12-15 03:07:24'),
	(9, 'REGISTRO ACADÉMICO', 7, '2023-12-15 03:07:37', '2023-12-15 03:07:37'),
	(10, 'REGISTRO ACADÉMICO (REVISOR)', 7, '2023-12-15 03:07:47', '2023-12-15 03:07:47'),
	(11, 'REGISTRO ACADÉMICO (CERTIFICADOS DE DIPLOMADO)', 7, '2023-12-15 03:07:54', '2023-12-15 03:07:54'),
	(12, 'REGISTRO ACADÉMICO (TITULOS PROFESIONALES)', 7, '2023-12-15 03:08:01', '2023-12-15 03:08:01'),
	(13, 'REGISTRO ACADÉMICO (EMISIÓN DIPLOMAS ACADÉMICOS)', 7, '2023-12-15 03:08:09', '2023-12-15 03:08:09'),
	(14, 'REGISTRO ACADÉMICO (EMISIÓN DE CERTIFICADOS)', 7, '2023-12-15 03:08:18', '2023-12-15 03:08:18'),
	(15, 'DESARROLLO CURRICULAR', 7, '2023-12-15 03:08:39', '2023-12-15 03:08:39'),
	(16, 'ADMISIÓN Y ORIENTACIÓN', 7, '2023-12-15 03:08:49', '2023-12-15 03:08:49'),
	(17, 'MARKETING Y COMUNICACION', 8, '2023-12-15 03:09:05', '2023-12-15 03:09:05'),
	(18, 'RELACIONES PUBLICAS E INFORMACIONES', 8, '2023-12-15 03:09:16', '2023-12-15 03:09:16');

-- Volcando estructura para tabla ucb.unidads
CREATE TABLE IF NOT EXISTS `unidads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `unidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.unidads: ~0 rows (aproximadamente)
INSERT INTO `unidads` (`id`, `unidad`, `created_at`, `updated_at`) VALUES
	(1, 'Reclutamiento', '2023-11-18 23:00:26', '2023-11-18 23:00:26');

-- Volcando estructura para tabla ucb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `cargo_id` bigint unsigned DEFAULT NULL,
  `id_cargo` bigint unsigned DEFAULT NULL,
  `depto_id` bigint unsigned DEFAULT NULL,
  `area_id` bigint unsigned DEFAULT NULL,
  `unidad_id` bigint unsigned DEFAULT NULL,
  `seccion_id` bigint unsigned DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `doc_identidad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipocontrato_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_arbolcargos_id_foreign` (`cargo_id`),
  KEY `users_tipocontrato_id_foreign` (`tipocontrato_id`),
  KEY `users_cargos_id_foreign` (`id_cargo`),
  KEY `users_areas_id_foreign` (`area_id`),
  KEY `users_deptos_id_foreign` (`depto_id`),
  KEY `users_secciones_id_foreign` (`seccion_id`),
  KEY `users_unidades_id_foreign` (`unidad_id`),
  CONSTRAINT `users_arbolcargos_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `arbolcargos` (`id`) ON DELETE SET NULL,
  CONSTRAINT `users_areas_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE SET NULL,
  CONSTRAINT `users_cargos_id_foreign` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE SET NULL,
  CONSTRAINT `users_contratos_id_foreign` FOREIGN KEY (`tipocontrato_id`) REFERENCES `contratos` (`id`) ON DELETE SET NULL,
  CONSTRAINT `users_deptos_id_foreign` FOREIGN KEY (`depto_id`) REFERENCES `deptos` (`id`) ON DELETE SET NULL,
  CONSTRAINT `users_secciones_id_foreign` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`) ON DELETE SET NULL,
  CONSTRAINT `users_unidades_id_foreign` FOREIGN KEY (`unidad_id`) REFERENCES `unidades` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ucb.users: ~192 rows (aproximadamente)
INSERT INTO `users` (`id`, `codigo`, `name`, `apellido`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `cargo_id`, `id_cargo`, `depto_id`, `area_id`, `unidad_id`, `seccion_id`, `fecha_ingreso`, `fecha_nacimiento`, `doc_identidad`, `tipocontrato_id`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'MIGUEL ANGEL', 'LARA NISTTAHUZ', 'starmiguelara@gmail.com', NULL, '$2y$12$ETsHvgkrDFI6Y9EvNIeGe.oK0Ogs7qfT3yZTWP8Z5AwbIMWFgGM5e', NULL, 'admin', 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-10 05:59:41', '2023-11-10 05:59:41'),
	(11, 'ALR-02', 'MARIO PORFIRIO', 'QUISPE JIMENEZ', 'mquispe@ucb.edu.bo', NULL, '$2y$12$tiSaaW1HOBDrY9GHyIgqNubRfop1nOeyLIlwYG9QaSiwkSGIu/rw6', NULL, 'user', 1, 2, 1, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 08:09:12', '2024-01-04 07:21:46'),
	(12, 'ALR-03', 'JAIME LUIS', 'CARVAJAL JALDIN', 'jcarvajal@ucb.edu.bo', NULL, '$2y$12$p8lYZ5dLc/tOrr7MG/8SWOW11.PBdieV8p2dhrzWlRhSb1XG0TiQm', NULL, 'user', 166, 3, 1, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 08:16:10', '2024-01-04 07:22:37'),
	(13, 'BC-01', 'ANDREA', 'BALLIVIAN BLANCO', 'aballivian@ucb.edu.bo', NULL, '$2y$12$2Xbzb07nG1o3Njc204G8b.3FFPPck1LEZmNPfGZbRPdOkBxauIa.i', NULL, 'user', 159, 5, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 08:17:57', '2024-01-04 07:23:59'),
	(14, 'BC-03', 'MIRIAM MARLENI', 'TANCARA MAMANI', 'mtancara@ucb.edu.bo', NULL, '$2y$12$cxHxyrPF5GyKNarisy8DgOy/V/WuN030K85U6AnNCzZSoCoQUSueC', NULL, 'user', 4, 7, NULL, 3, NULL, 2, NULL, NULL, NULL, NULL, '2023-12-16 08:19:26', '2024-01-04 07:25:09'),
	(16, 'BC-04', 'CRISSEL YBANKA', 'GUTIERREZ TICONA', 'cgutierrez@ucb.edu.bo', NULL, '$2y$12$2mtWqfB4wpJQeT56s2LnFe7WXMV8XA5Shu9dCXVGN0m.Zkj7IEDL2', NULL, 'user', 5, 8, NULL, 3, NULL, 3, NULL, NULL, NULL, NULL, '2023-12-16 08:24:33', '2024-01-04 07:25:38'),
	(17, 'BC-05', 'CELIA', 'CONDORI SIÑANI', 'ccondori@ucb.edu.bo', NULL, '$2y$12$Gfml7RvG2V7ojXVxoUdMTu7O4aumXwmW0oDNNYRzg25BmGPCptqQi', NULL, 'user', 7, 9, NULL, 3, NULL, 1, NULL, NULL, NULL, NULL, '2023-12-16 08:25:38', '2024-01-04 07:26:08'),
	(18, 'BC-05', 'JAIME', 'ESPINAR GONZALES', 'jespinar@ucb.edu.bo', NULL, '$2y$12$17xIA4c2lrgoxL6bfLLZku0HPwRCjx.ASBDrxCY9Sirr1uvZVwYLG', NULL, 'user', 7, 9, NULL, 3, NULL, 1, NULL, NULL, NULL, NULL, '2023-12-16 08:27:55', '2024-01-04 07:26:50'),
	(19, 'BC-05', 'GUIDO ADALBERTO', 'VILLENA VALLE', 'gvillena@ucb.edu.bo', NULL, '$2y$12$bD/ftV2grzt.wqTgW9ytZOb36RFdShm1ahuzKOXvK.iwbiFYGLNr6', NULL, 'user', 7, 9, NULL, 3, NULL, 1, NULL, NULL, NULL, NULL, '2023-12-16 08:29:15', '2024-01-04 07:27:23'),
	(20, 'BC-06', 'JORGE', 'DAZA MENDOZA', 'jdaza@ucb.edu.bo', NULL, '$2y$12$v7ongr3pSfkFvbKy.BCzSOXcpOPZMCJPAfMNsZTMCpC1l5bfVtUXG', NULL, 'user', 8, 10, NULL, 3, NULL, 2, NULL, NULL, NULL, NULL, '2023-12-16 08:30:28', '2024-01-04 07:28:17'),
	(21, 'BC-06', 'AGAR ROSARIO', 'FERNANDEZ MENDOZA', 'afernandez@ucb.edu.bo', NULL, '$2y$12$88vKgVHnOWZH9Ls.xwcLxueiXyxP0tJQD9cKSKmYXnl5ZsJ4onEZ6', NULL, 'user', 8, 10, NULL, 3, NULL, 2, NULL, NULL, NULL, NULL, '2023-12-16 08:31:50', '2024-01-04 07:28:54'),
	(22, 'BC-06', 'JAVIER GERMAN', 'GUZMAN MOLINA', 'jguzman@ucb.edu.bo', NULL, '$2y$12$l1hO4Sdc6mnE2otCq2Qvhe8/3Iv.lpVEhwOX/nHr76wA9I2vybGbO', NULL, 'user', 8, 10, NULL, 3, NULL, 2, NULL, NULL, NULL, NULL, '2023-12-16 08:33:00', '2024-01-04 07:29:23'),
	(23, 'BC-06', 'ATILIO GAUDIO', 'INCH MIRANDA', 'ainch@ucb.edu.bo', NULL, '$2y$12$l7iqK/SPKQcGLs8zUKf3c.Eihsj75vr2hq5/.oxVogm.ngqnevFu.', NULL, 'user', 8, 10, NULL, 3, NULL, 2, NULL, NULL, NULL, NULL, '2023-12-16 08:34:10', '2024-01-04 07:29:57'),
	(24, 'BC-06', 'JUAN JAIME', 'LOPEZ ARRAYA', 'jlopez@ucb.edu.bo', NULL, '$2y$12$VbmocLSDJR7UC8UzCcsUgunRXcV3UMmxiqer.T4qVuGaEUU/A5QPi', NULL, 'user', 8, 10, NULL, 3, NULL, 2, NULL, NULL, NULL, NULL, '2023-12-16 08:35:17', '2024-01-04 07:30:35'),
	(25, 'BC-06', 'NORMA GABRIELA', 'VASQUEZ CRUZ', 'nvasquez@ucb.edu.bo', NULL, '$2y$12$vxKB7ly6hHGgLYKf2D2.AOjeqAgZLdJgmzTLWhhTRbEXlqPwE8TKW', NULL, 'user', 8, 10, NULL, 3, NULL, 2, NULL, NULL, NULL, NULL, '2023-12-16 08:36:19', '2024-01-04 07:31:01'),
	(26, 'BC-06', 'JOSÉ MANUEL', 'VELÁSQUEZ CESPEDES', 'jvelasquez@ucb.edu.bo', NULL, '$2y$12$Ffmie4sGhidXbRzg4taedeXkN31wS5M9qWLS6FjUbREr2bJdZY68e', NULL, 'user', 8, 10, NULL, 3, NULL, 2, NULL, NULL, NULL, NULL, '2023-12-16 08:37:34', '2024-01-04 07:31:29'),
	(27, 'BC-07', 'ROGELIO VICTOR', 'CALLIZAYA NINA', 'rcallizaya@ucb.edu.bo', NULL, '$2y$12$HNTPc/qCJFIi/5GcsfDZ9OrrOtJ61QzBDIyzqmQe/nHeI022JNaH2', NULL, 'user', 9, 11, NULL, 3, NULL, 3, NULL, NULL, NULL, NULL, '2023-12-16 08:38:48', '2024-01-04 07:32:23'),
	(28, 'CA-01', 'ALEJANDRA MARIA', 'ECHAZU CONITZER', 'aechazu@ucb.edu.bo', NULL, '$2y$12$/Oy9VTZSc.fOv1Q7hMtwBOy1u.nLY7pCImUKtP4zOg94EKEQ7Gh6C', NULL, 'user', 97, 12, 3, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 08:40:19', '2024-01-04 07:33:04'),
	(29, 'ALR-01', 'MARIA ERIKA', 'HELGUERO MEJIA', 'mhelguero@ucb.edu.bo', NULL, '$2y$12$yHeY4RM6FcGAjcTrno9CK.82Zyk0KadnxCOlJQkWyqVu9Ry1SU8nG', NULL, 'user', 165, 1, 1, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 19:44:07', '2024-01-04 07:20:47'),
	(30, 'CA-04', 'FABRICIO OSCAR', 'FERRUFINO DURAN', 'fferrufino@ucb.edu.bo', NULL, '$2y$12$vGQ42Kj72fyMnqkaqXyw0.hhAJ07GDGVeh7N.qE6LpRFbp27Zk80K', NULL, 'user', 11, 14, 3, 10, NULL, 4, NULL, NULL, NULL, NULL, '2023-12-16 19:52:46', '2024-01-04 07:33:51'),
	(31, 'CA-06', 'NORAH BEATRIZ', 'VALVERDE TAPIA', 'nvalverde@ucb.edu.bo', NULL, '$2y$12$gOJRC7xTSceBEZXMJ7UO.eFWcn2Y.h8v3ptC.E4uEb./Oza1zVCoe', NULL, 'user', 12, 15, 3, 10, NULL, 4, NULL, NULL, NULL, NULL, '2023-12-16 19:54:29', '2024-01-04 07:34:29'),
	(32, 'CA-07', 'RAMIRO FERNANDO', 'SORIANO ARCE', 'rsoriano@ucb.edu.bo', NULL, '$2y$12$t75ZPxlj4UmHZbH95ITJ4u80P33xjfofSiQn1GxLnR9VL7Br/R2S2', NULL, 'user', 13, 16, 3, 10, NULL, 4, NULL, NULL, NULL, NULL, '2023-12-16 19:56:03', '2024-01-04 07:35:02'),
	(33, 'CA-08', 'JUAN CARLOS DAVID', 'MONDACCA ARAUZ', 'jmondacca@ucb.edu.bo', NULL, '$2y$12$BclsGpNbyF0Dijy9DFNDWeGID0lv2VzKOyuqP14SEVAvElXi4dCgy', NULL, 'user', 14, 17, 3, 10, NULL, 4, NULL, NULL, NULL, NULL, '2023-12-16 20:17:40', '2024-01-04 07:35:30'),
	(34, 'CA-09', 'FRANZ', 'BALLESTEROS SARAVIA', 'fballesteros@ucb.edu.bo', NULL, '$2y$12$dVTa8BsgNmVw.TEyqg/dv.I0DAOzbZzwp0o.te6yxNj6J4sH0NyUK', NULL, 'user', 16, 18, 3, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 20:18:55', '2024-01-04 07:35:57'),
	(35, 'CSB- 01', 'LENNY ALEJANDRA', 'CABRERA AGUILAR', 'lcabrera@ucb.edu.bo', NULL, '$2y$12$6HSLQZHON1.f3vAKD5qObOmZoXyO8cE/VLngJokY89C1RzPmXN5lG', NULL, 'user', 149, 19, 4, 12, NULL, 5, NULL, NULL, NULL, NULL, '2023-12-16 20:27:46', '2024-01-04 07:36:27'),
	(36, 'CSB- 01', 'TANIA', 'BALDERRAMA CANEDO', 'tbalderrama@ucb.edu.bo', NULL, '$2y$12$lhgm2Cz3avFjSCsAcf40d.2phdKpvqIA8/97J5K2rcKXHWyODRaT2', NULL, 'user', 17, 20, 4, 12, NULL, 5, NULL, NULL, NULL, NULL, '2023-12-16 20:29:03', '2024-01-04 07:37:01'),
	(37, 'CSB- 03', 'RAMIRO EDWIN', 'MANZANEDA VEIZAGA', 'rmanzaneda@ucb.edu.bo', NULL, '$2y$12$qshZQMN2Y.4/CH.2hN61ouQRnvCZi2xjcncDjpwLbFTCD3RcffqOW', NULL, 'user', 148, 22, 4, 12, NULL, 6, NULL, NULL, NULL, NULL, '2023-12-16 20:30:44', '2024-01-04 07:37:39'),
	(38, 'SECR-03', 'NICOLE KARMEM', 'ULLOA ARTEAGA', 'nulloa@ucb.edu.bo', NULL, '$2y$12$cM0OjRmX0colOBAAiZikj.7ALwO44naIY1yJBdUzbyqn8LQ6dK70S', NULL, 'user', 18, 24, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 20:41:33', '2024-01-06 01:58:37'),
	(39, 'DAF-02-TS-04', 'LUIS FELIPE', 'SALINAS CONTRERAS', 'lsalinas@ucb.edu.bo', NULL, '$2y$12$gboS5Xe/MkkDJsnOwQ9zgea3FSfxHJMWWFvrdt2mhIICfzkUGQIOe', NULL, 'user', 29, 26, 5, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 20:45:24', '2024-01-04 07:39:55'),
	(40, 'DAF-02-TS-05', 'EDGAR', 'CALLISAYA QUISPE', 'ecallisaya@ucb.edu.bo', NULL, '$2y$12$ta9YkhfvTIAl7eR8Pp0lU.DIT9wFh8fig7KWCcbsk.2qhfIo0Q1ee', NULL, 'user', 30, 27, 5, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 20:47:34', '2024-01-04 07:40:31'),
	(41, 'DAF-03-RH-01', 'ERIKA NATIVIDAD', 'RAKELA SCHWENNINGER', 'erakela@ucb.edu.bo', NULL, '$2y$12$V4z9.bThYXF2qQQpCQZNe.HLQKl7WhB6UxYiZ58vjwlJk.PA4U/VK', NULL, 'user', 21, 28, 27, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 20:58:12', '2024-01-04 07:41:31'),
	(42, 'DAF-03-RH-02', 'LIZ JUDITH', 'VEGA CRUZ', 'lvega@ucb.edu.bo', NULL, '$2y$12$ZQyCnzIvmBchpJ/vmNrvZOb18nMMhPTkr2Pkf8pKvhNdcEFhcmfhi', NULL, 'user', 167, 29, 27, 6, 2, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:05:22', '2024-01-04 07:42:10'),
	(43, 'DAF-03-RH-03', 'MARTHA LOURDES', 'SALAS LANDEAU', 'msalas@ucb.edu.bo', NULL, '$2y$12$ZY0D7qijSSnxYCOIhUqwSe8e80V5CJ2VB/kGQR4rHVFV2xUjrLs/S', NULL, 'admin', 34, 30, 27, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:06:42', '2024-01-04 07:43:51'),
	(44, 'DAF-03-RH-04', 'VALERIA GLORIA', 'RABAZA VALVERDE', 'vrabaza@ucb.edu.bo', NULL, '$2y$12$69sv7VAS6V5NOuj1x2ge..F.JRzyO4pclbAtvCp4mSf8zI18oOHB.', NULL, 'user', 34, 30, 27, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:07:58', '2024-01-04 07:44:26'),
	(45, 'DAF-03-RH-05', 'MARIA EUGENIA', 'ROCHA DE GUTIERREZ', 'mrocha@ucb.edu.bo', NULL, '$2y$12$7NvNtofUTgs3nSltuu4UH.EjT4H0oYQrTReGTeaOTMd.yJ9F6LYQK', NULL, 'user', 18, 31, 27, 6, 2, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:09:46', '2024-01-04 07:45:27'),
	(46, 'DAF-03-RH-06', 'JUAN CARLOS', 'ROMERO GONZALES', 'jromero@ucb.edu.bo', NULL, '$2y$12$X7Mq6Fzb/iOr1rqIjl2Kpef1I0zqVNEE9Jy9uX2NlmYitD4z9PoSO', NULL, 'user', 168, 32, 27, 6, 2, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:13:38', '2024-01-04 07:46:08'),
	(47, 'DAF-04-CF-01', 'NANCY JAEL', 'ALDUNATE MORALES', 'naldunate@ucb.edu.bo', NULL, '$2y$12$WiEbqaHe8SrRUEjxfKXUKO9/YamixNCGk4jgIT8Fp2zwLXn8lgfQ2', NULL, 'user', 22, 33, NULL, 6, 3, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:15:23', '2024-01-04 07:46:50'),
	(48, 'DAF-04-CF-02', 'DANIEL DAVID', 'CUTILE ARUQUIPA', 'dcutile@ucb.edu.bo', NULL, '$2y$12$nHuHf68LEleCuwjjJguNf.B4doLHy6P585ihapoNKQEaMCVeJ5ufa', NULL, 'user', 35, 34, NULL, 6, 3, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:16:30', '2024-01-04 07:47:31'),
	(49, 'DAF-04-CF-03', 'CARLOS ALBERTO', 'BERTOFT PEREZ', 'cbertoft@ucb.edu.bo', NULL, '$2y$12$WmFLTPn7tbFxcE7rLFj85elUS6WLcZVNM1IcCycKAV/4RYMOCFRNK', NULL, 'user', 36, 35, NULL, 6, 3, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:17:47', '2024-01-04 07:48:06'),
	(50, 'DAF-04-CF-04', 'CARMEN ROSA', 'ARCE LAGOS', 'carce@ucb.edu.bo', NULL, '$2y$12$QORWjuHFRJ/VIHzuSJsWr.pTc/M9gZQG7qJAOJOHx5GieTmXhXXX2', NULL, 'user', 37, 36, NULL, 6, 3, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:19:04', '2024-01-04 07:48:47'),
	(51, 'DAF-04-CF-05', 'PILAR DELIA', 'MACHACA MAMANI', 'pmachaca@ucb.edu.bo', NULL, '$2y$12$IgrFLypxykiwWVhcYw7qVOla.fHwKbftkvdM9vjy/0qYNAAEnER3.', NULL, 'user', 38, 37, NULL, 6, 3, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:20:47', '2024-01-04 07:49:19'),
	(52, 'DAF-04-CF-06', 'MARGA MONICA', 'CANAZA CASTRO', 'mcanaza@ucb.edu.bo', NULL, '$2y$12$5W4WDHpG/sFIJpnGaZnILuTe9cgYxfJAcX9Dg1Au9Z9PVI7FcfMyu', NULL, 'user', 39, 38, NULL, 6, 3, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:22:01', '2024-01-04 07:49:52'),
	(53, 'DAF-04-CF-07', 'ERIKA HERMINIA', 'LOZA RIO', 'eloza@ucb.edu.bo', NULL, '$2y$12$vmJnudRQZ.dF2FGVKMZl.uKMdOWBIlIXXf/7OAVyyXi5aU0Nay3A6', NULL, 'user', 40, 39, NULL, 6, 3, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:23:25', '2024-01-04 07:50:28'),
	(54, 'DAF-05-SAE-01', 'MARÍA INÉS', 'CAMACHO FERNANDEZ', 'mcamacho@ucb.edu.bo', NULL, '$2y$12$mG.97YMNUIFcF1erNmA5EuWSebVdwsY3W.zTbXaeWn1o4c/5c6Xiq', NULL, 'user', 27, 40, NULL, 6, NULL, 7, NULL, NULL, NULL, NULL, '2023-12-16 21:24:57', '2024-01-04 07:51:06'),
	(55, 'DAF-05-SAE-03', 'TATIANA', 'ANGELO ARROYO', 'tangelo@ucb.edu.bo', NULL, '$2y$12$hDKmU/dYpZqmcJDAC.HGbOPBDtoZrPTsr./b2HkpOyXPHuh3oi.ju', NULL, 'user', 169, 41, NULL, 6, NULL, 7, NULL, NULL, NULL, NULL, '2023-12-16 21:32:09', '2024-01-04 07:51:58'),
	(56, 'DAF-06-CJ-01', 'DAVID', 'GUZMAN TORDOYA', 'dguzman@ucb.edu.bo', NULL, '$2y$12$E/ubC.cfJnicnWpEul/NReTL5ruvwEyvMMUpeahbSF4g6vzcDHzP6', NULL, 'user', 170, 42, NULL, 6, NULL, 8, NULL, NULL, NULL, NULL, '2023-12-16 21:35:01', '2024-01-04 07:52:38'),
	(57, 'DAF-07-AC-01', 'ANA MARIA', 'GALINDO URQUIDI', 'agalindo@ucb.edu.bo', NULL, '$2y$12$qcPlXRkYYfGYnZhxLO9lMOitKlNl6fxCVOq7glimysT.XUHJ1mEyu', NULL, 'user', 23, 43, NULL, 6, 4, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:36:19', '2024-01-04 07:53:14'),
	(58, 'DAF-07-AC-02', 'SUSAN PATRICIA', 'LARREA VERA', 'slarrea@ucb.edu.bo', NULL, '$2y$12$U1kBEF.KnY/ix6uQZugDW.Ubjcn6ZPSeKhbmZ8ziJyZ1ZeUKcalWS', NULL, 'user', 41, 44, NULL, 6, 4, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:37:33', '2024-01-04 07:53:52'),
	(59, 'DAF-07-AC-02', 'ALVARO LIZANDRO', 'GARCIA LOPEZ', 'agarcia@ucb.edu.bo', NULL, '$2y$12$bUB7t3/n6MRG3ybtAan6gusQt5Q016YJu2R9cWcatwn9UKEmbnK6i', NULL, 'user', 41, 44, NULL, 6, 4, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:38:36', '2024-01-04 07:54:22'),
	(60, 'DAF-07-AC-02', 'MIGUEL MARIO', 'RUEDA GARCIA', 'mrueda@ucb.edu.bo', NULL, '$2y$12$qFUAFa9Gf8I5sI/DjU9YMOz7hd.F9K1/M4k6P79nBrjepYzgbMVfC', NULL, 'user', 41, 44, NULL, 6, 4, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:39:53', '2024-01-04 07:54:50'),
	(61, 'DAF-07-AC-03', 'ROGELIA', 'CONDORI', 'rcondori@ucb.edu.bo', NULL, '$2y$12$gl4W9v4F2chYlgH1xBWroe3VvAx8odPU/nSEXVhVNixW5MZ5IBH1.', NULL, 'user', 18, 45, NULL, 6, 5, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:41:57', '2024-01-04 07:55:43'),
	(62, 'DAF-08-CG-01', 'MARCIA LILIANA', 'LEVY LOZA', 'mlevy@ucb.edu.bo', NULL, '$2y$12$gGMcpewpzqE76OCslewunOvb3pjjIK4ZZnzo9hMNlPosUNqxXCLYG', NULL, 'user', 24, 46, NULL, 6, 6, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:43:14', '2024-01-04 07:56:18'),
	(63, 'DAF-08-CG-02', 'RAISA ROXANA', 'CUSI ALVAREZ', 'rcusi@ucb.edu.bo', NULL, '$2y$12$/gB.ua9TV.Q4cXITf3xNS.TBG9yxlqQOacgjQSKuQ0DQzl1hWCYBu', NULL, 'user', 42, 47, NULL, 6, 6, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:44:53', '2024-01-04 07:56:54'),
	(64, 'DAF-08-CG-02', 'IRIS RAYZA', 'ZUÑIGA MOLINA', 'izuñiga@ucb.edu.bo', NULL, '$2y$12$bDJR3uGT0EqNzsxxk4kh8etJVKBs1bZlaOL/A5kcOH33A.OXojCIG', NULL, 'user', 42, 47, NULL, 6, 6, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:54:45', '2024-01-04 07:57:32'),
	(65, 'DAF-08-CG-03', 'JORGE DANIEL', 'PORTUGAL HUACOTA', 'jportugal@ucb.edu.bo', NULL, '$2y$12$Ue/uboyHfZjfH.askPNX9uer1JLHLpCoTLOT1Tx6mqUB4iWrr0CUG', NULL, 'user', 43, 48, NULL, 6, 6, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:56:06', '2024-01-04 07:58:26'),
	(66, 'DAF-09-INF-01', 'IVAN MARIO', 'BOLIVAR PARRAGA', 'ibolivar@ucb.edu.bo', NULL, '$2y$12$zp9cKVcz7yINjMvNT6PZ8.e/lgQp1pG6A44XTV0lJhdCsCCy5Uyo2', NULL, 'user', 25, 49, NULL, 6, 7, NULL, NULL, NULL, NULL, NULL, '2023-12-16 21:57:27', '2024-01-04 07:59:01'),
	(67, 'DAF-09-INF-02', 'NICOLAS MIGUEL', 'VERASTEGUI', 'nverastegui@ucb.edu.bo', NULL, '$2y$12$wCPKOPdX/E/0kc48Q2a8PejNlIaohLD1IEX5GpNOmm7QNHCpb8O6m', NULL, 'user', 44, 50, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 21:59:13', '2024-01-04 07:59:33'),
	(68, 'DAF-09-INF-03', 'ALVARO ERICK', 'UREY BUTRON', 'aurey@ucb.edu.bo', NULL, '$2y$12$4eMAbx8kXqNhNPxeptuzguC1.DN2BcYIDVEZo8bO5wXGGGxkHknq2', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 22:00:38', '2024-01-04 08:00:06'),
	(69, 'DAF-09-INF-04', 'ALVARO', 'LUNA MAMANI', 'aluna@ucb.edu.bo', NULL, '$2y$12$PFSTdXqbI0Y4142M.O3b8ezDyFkJvQOFPr.N3avC7VYK3ij3six.G', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 22:02:30', '2024-01-04 08:00:34'),
	(70, 'DAF-09-INF-04', 'CARLOS', 'CAYZA CANAZA', 'ccayza@ucb.edu.bo', NULL, '$2y$12$eeVS0giHvwuXYfrNVbtENe26gfGFLV5SQew1wtAaoMPmvwf6Ulmf2', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 22:03:31', '2024-01-04 08:01:02'),
	(71, 'DAF-09-INF-04', 'BENITO', 'APAZA CONDORI', 'bapaza@ucb.edu.bo', NULL, '$2y$12$CViExP3OWNJXeWZratIhkulSWIRGaFZNrfN8Z6ds80DDWyk.AE6ni', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 22:04:50', '2024-01-04 08:01:32'),
	(72, 'DAF-09-INF-04', 'FELIX', 'APAZA TARQUI', 'fapaza@ucb.edu.bo', NULL, '$2y$12$kyOP3USXjFbuQVXaKdegAejYHW/Gtv2jXW7VbZbSWhgRk45ZOBb0i', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 22:06:08', '2024-01-04 08:01:59'),
	(73, 'DAF-09-INF-04', 'CIRILO', 'CALLE ARUQUIPA', 'ccalle@ucb.edu.bo', NULL, '$2y$12$.Fp6PtR4osPY0MJtXwazyu6qNmzJuz4ydfoasqCdmduss53EzFo/W', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 22:07:13', '2024-01-04 08:02:30'),
	(74, 'DAF-09-INF-04', 'CALIXTO', 'CHOQUE QUISPE', 'cchoque@ucb.edu.bo', NULL, '$2y$12$nBzcbO9xe4sVRorBDofVEusBHwCsPEm6NE8KJ0WYAqhzfquEldXXe', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 22:08:19', '2024-01-04 08:02:54'),
	(75, 'DAF-09-INF-04', 'LUIS ALBERTO', 'CONDORI QUISPE', 'lcondori@ucb.edu.bo', NULL, '$2y$12$W/WPDt3MuRogxmhybYzqB.qkJ9sUXnXDjhoY8H3AmjQKD05zLwbKa', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 22:09:25', '2024-01-04 08:03:20'),
	(76, 'DAF-09-INF-04', 'FLORENCIO VICENTE', 'GAMPASI QUINTANA', 'fgampasi@ucb.edu.bo', NULL, '$2y$12$kQdd.8jom4cRaFmeMqvQZeKZy9RWRkcIwSHIqlz.JDsr4BAolx.0G', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:10:06', '2024-01-04 08:03:43'),
	(77, 'DAF-09-INF-04', 'RENE LEONARDO', 'HUANCA MAMANI', 'rhuanca@ucb.edu.bo', NULL, '$2y$12$peugmVyl2asOEE25v1DVmOpif/5q3MgGGXjDUOywHNAQ0ekZrrAlK', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:12:09', '2024-01-04 08:04:13'),
	(78, 'DAF-09-INF-04', 'JUAN TEOFILO', 'LAURA QUISPE', 'jlaura@ucb.edu.bo', NULL, '$2y$12$X5rgde.DuJXSYIXKtgDHg.PCsuekFK1m8kuTCbi5uFoDM.f4JGuWu', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:14:04', '2024-01-04 08:04:42'),
	(79, 'DAF-09-INF-04', 'MARIO', 'LUCANA CRUZ', 'mlucana@ucb.edu.bo', NULL, '$2y$12$Xhc7Tsi4fdCgGjkSlTsR5enrZU6/ne/BkZwuEdl7fU/E4j6/jWHLO', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:15:37', '2024-01-04 08:05:11'),
	(80, 'DAF-09-INF-04', 'MARIO', 'MAMANI JIMENEZ', 'mmamani@ucb.edu.bo', NULL, '$2y$12$uxx1IdQRi4ZBXgkgX1WC8.c/wjyxGbgaQrEckaIGRWyYDNs8ptwPS', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:16:56', '2024-01-04 08:05:36'),
	(81, 'DAF-09-INF-04', 'MARTIRIAN', 'PINTO COLQUE', 'mpinto@ucb.edu.bo', NULL, '$2y$12$tosCSQUaG7MFC6WHT.0vK.ZrveZsliS.289QkyTatJlsoGLkxh4la', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:18:24', '2024-01-04 08:06:04'),
	(82, 'DAF-09-INF-04', 'DANIEL', 'QUISPE LIMACHI', 'dquispe@ucb.edu.bo', NULL, '$2y$12$MkMGd46l9g5ySkyBzzZvz.xcxYXBq..CdclcQvTx4GFPiy2xS2Pya', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:19:26', '2024-01-04 08:06:30'),
	(83, 'DAF-09-INF-04', 'JESUS EFRAIN', 'QUISPE MONASTERIOS', 'jquispe@ucb.edu.bo', NULL, '$2y$12$/dMPcbwFlXrz4RZyrT8g8.j/eR5gwc5whkabs5jGHUhgt3DSuJUIi', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:20:41', '2024-01-04 08:06:58'),
	(84, 'DAF-09-INF-04', 'MARCELO', 'QUISPE CANAZA', 'maquispe@ucb.edu.bo', NULL, '$2y$12$zDPbG4dU65sCkOMXqQCL0ODPAcNQBf9FJANBc0k87e5gDGjK.Ci/G', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:23:37', '2024-01-04 08:07:24'),
	(85, 'DAF-09-INF-04', 'FERNANDO ARIEL', 'QUISBERT CUBA', 'fquisbert@ucb.edu.bo', NULL, '$2y$12$9R0DdzfmEUokUMSvaXegaeFy708RSbGCn0kHRqCJKdjLxL2l6bV/a', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:24:52', '2024-01-04 08:07:51'),
	(86, 'DAF-09-INF-04', 'FIDEL', 'TORDOYA VELASQUEZ', 'ftordoya@ucb.edu.bo', NULL, '$2y$12$sF6XkgUnP1FIjDNcYX/hsewZFlmBkcaz8hTu.7gYbZZWHy5MWIUDK', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:26:35', '2024-01-04 08:08:16'),
	(87, 'DAF-09-INF-04', 'GABRIEL', 'VELASQUEZ MAMANI', 'gvelasquez@ucb.edu.bo', NULL, '$2y$12$AVnthV9M7hdzeL8dtr9o2OP8nYHVSgd8A3qi9oka7LFN6KFsCg0Vi', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:28:13', '2024-01-04 08:08:46'),
	(88, 'DAF-09-INF-04', 'GERARDO', 'VILLA PATTY', 'gvilla@ucb.edu.bo', NULL, '$2y$12$RDTsen8z6n/DyEi1i7L44.a8nzMzM.M9b3KVHWksQjHFKP/J37JdC', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:29:41', '2024-01-04 08:09:10'),
	(89, 'DAF-09-INF-04', 'DAVID', 'YUJRA PAUCARA', 'dyujra@ucb.edu.bo', NULL, '$2y$12$uDFVSIuqOJ9y0evUhMcwn.rvc62yumKo40Fu1idduvodEXSV6Hy6e', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:37:13', '2024-01-04 08:09:36'),
	(90, 'DAF-09-INF-04', 'SERGIO CRISTIAN', 'RAMOS QUISPE', 'sramos@ucb.edu.bo', NULL, '$2y$12$n3DkTiP/E5JFtOdQceW8ouG3xC9hBRm7Sca4rkTCvELNvcwHNrCCm', NULL, 'user', 45, 51, NULL, 6, 7, 9, NULL, NULL, NULL, NULL, '2023-12-16 23:38:10', '2024-01-04 08:10:03'),
	(91, 'DAF-10-DEP-01', 'JOSE FERNANDO', 'SEJAS PRADO', 'jsejas@ucb.edu.bo', NULL, '$2y$12$iLBcq/DUUT2vbpNBLCOyNObZKlIvIsFGrSODuOuIzyNM.cIv3lt2q', NULL, 'user', 26, 52, NULL, 6, 8, NULL, NULL, NULL, NULL, NULL, '2023-12-16 23:39:22', '2024-01-04 08:10:43'),
	(92, 'DAF-10-DEP-02', 'VICTOR HUGO', 'NINA FLORES', 'vnina@ucb.edu.bo', NULL, '$2y$12$Ci0KHMoQSeFqmGgc43dcW.gmkRXgahgJz3jOMjTjAJJPrsnhVKJSG', NULL, 'user', 46, 53, NULL, 6, 8, NULL, NULL, NULL, NULL, NULL, '2023-12-16 23:40:48', '2024-01-04 08:11:19'),
	(93, 'DAF-11-CM-01', 'LUIS ALBERTO', 'CASTRILLO BAREA', 'lcastrillo@ucb.edu.bo', NULL, '$2y$12$H0kgDGBmqMfc10n3Rwqaxe3EklQyJ.wgRQCChFm26OwGOXaCKw5mO', NULL, 'user', 28, 54, NULL, 6, NULL, 11, NULL, NULL, NULL, NULL, '2023-12-16 23:42:20', '2024-01-04 08:11:51'),
	(94, 'DAS-01', 'YOLANDA SUSANA', 'FERREIRA ARZA', 'yferreira@ucb.edu.bo', NULL, '$2y$12$s2jxASXBeknjjaQrFgsqMOOel3OEvwLgroQQm2aJ8QWXCtgdMTchW', NULL, 'user', 157, 55, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-16 23:43:42', '2024-01-04 08:12:24'),
	(95, 'DAS-02- PG-02', 'CRISTINA CANDELARIA', 'COLQUE MUÑOZ', 'ccolque@ucb.edu.bo', NULL, '$2y$12$iGmB/JrBAhg42V7mRUq9he5ijXFTW8u/5qtU7hEssOKpldED1cAai', NULL, 'user', 49, 56, NULL, 7, NULL, 40, NULL, NULL, NULL, NULL, '2023-12-16 23:46:03', '2024-01-04 08:12:59'),
	(96, 'PG-01', 'MARCELA SOPHIA', 'AGRAMONT PARADA', 'magramont@ucb.edu.bo', NULL, '$2y$12$NqsooP0XlLcRZEeD2c/PZOV83WoOzf/jlqr96TceyL6NnZQzdE5U6', NULL, 'user', 134, 57, NULL, 12, NULL, 13, NULL, NULL, NULL, NULL, '2023-12-17 00:15:05', '2024-01-05 20:58:46'),
	(106, 'PG-01', 'MELANY FRANCIS', 'CESPEDES MAGARIÑOS', 'mcespedes@ucb.edu.bo', NULL, '$2y$12$1mY5wYjGUZF4ZR0rWvGe1uOiyIwYfn9js3MQWuaUQAsoQjfsonp0q', NULL, 'user', 151, 58, NULL, 13, NULL, 14, NULL, NULL, NULL, NULL, '2023-12-17 01:39:04', '2024-01-05 20:59:27'),
	(107, 'PG-01', 'LORNA NORMA', 'ARAUZ RODRIGUEZ', 'larauz@ucb.edu.bo', NULL, '$2y$12$MrEOYJTyyKHJQFReQmjZM.97N6CeuW09sAz4TWoarAFonXJtNfdvq', NULL, 'user', 133, 159, NULL, 12, NULL, 13, NULL, NULL, NULL, NULL, '2023-12-17 01:40:47', '2024-01-05 20:59:56'),
	(108, 'PG-01', 'CLAUDIA ALEJANDRA', 'PEREIRA VELASQUEZ', 'cpereira@ucb.edu.bo', NULL, '$2y$12$HwGfO73ehbq0W98.7k/8VOWp1bfBiIJPPmtKhXE8LfguNY.rHm/dS', NULL, 'user', 93, 84, NULL, 10, NULL, 15, NULL, NULL, NULL, NULL, '2023-12-17 01:42:10', '2024-01-05 21:00:31'),
	(109, 'PG-01', 'GABRIELA BELEN', 'VELASQUEZ VELASQUEZ', 'gavelasquez@ucb.edu.bo', NULL, '$2y$12$orTxaYCRVWyLPnLjI1XP0eHxf3Dr7YPzT4qsbVR5VjkRzxrTsQII6', NULL, 'user', 118, 149, NULL, 11, NULL, 16, NULL, NULL, NULL, NULL, '2023-12-17 05:14:41', '2024-01-05 21:01:01'),
	(110, 'MC-04', 'KAREN NIEVES ILSEN', 'CORONEL BOZO', 'kcoronel@ucb.edu.bo', NULL, '$2y$12$m.mR92CuAUzuIcyph2DJjOpwjUwOgcaDKcjjW38Pjh6Krb8hB0Mcu', NULL, 'user', 80, 59, NULL, 15, NULL, 17, NULL, NULL, NULL, NULL, '2023-12-17 05:21:47', '2024-01-05 20:57:09'),
	(111, 'DAS-03', 'GEORGINA AURELIA', 'CHAVEZ LIZARRAGA', 'gchavez@ucb.edu.bo', NULL, '$2y$12$QZgyrGNQ/exN0xWB6pOs9.BRCsWFLhjCGuZ4W62eVQeY9ka/yz5oy', NULL, 'user', 51, 60, NULL, 8, NULL, 18, NULL, NULL, NULL, NULL, '2023-12-17 05:23:18', '2024-01-04 08:14:10'),
	(112, 'DAS-04-RG-01', 'PRISCILA RAQUEL', 'TORO REYES', 'ptoro@ucb.edu.bo', NULL, '$2y$12$T9ufFfIuXc4sgRhVPzUOOejmxgqKaBWKINix2slmS94/JZqonMOhC', NULL, 'user', 52, 61, NULL, 7, 9, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:25:06', '2024-01-04 08:15:12'),
	(113, 'DAS-04-RG-02-A', 'AURELIA', 'TORREZ GUTIERREZ', 'atorrez@ucb.edu.bo', NULL, '$2y$12$/OcDuluPrFkyHpmmGAwPG.CO8DaLb8HUZiG9kZo8KzqfdxcZlEhvi', NULL, 'user', 61, 62, NULL, 7, 9, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:26:20', '2024-01-04 08:15:51'),
	(114, 'DAS-04-RG-02-B', 'CINTHYA MARLENE', 'LOBO OZUNA', 'clobo@ucb.edu.bo', NULL, '$2y$12$FV8vgo5VMkwCTF4tATyV9OKrSDRSOFOFeh.xNZYi3yoV2TPysjb1i', NULL, 'user', 62, 63, NULL, 7, 9, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:27:46', '2024-01-04 08:16:37'),
	(115, 'DAS-04-RG-02-C', 'ERICK MOISES', 'MORALES TORREZ', 'emorales@ucb.edu.bo', NULL, '$2y$12$2sPfD78lO3vlhBgX56EspOiusZqAWIRNqk9BMeWjge19XqcKUUoca', NULL, 'user', 63, 64, NULL, 7, 9, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:28:56', '2024-01-04 08:17:19'),
	(116, 'DAS-04-RG-02-D', 'CINTYA CARMEN', 'TORREZ TORREZ', 'ctorrez@ucb.edu.bo', NULL, '$2y$12$FY/LC5X3ISP8nwHSFwk0BudPOBxhy2l3zXIMw9YU6utPAE7vGnWOW', NULL, 'user', 64, 65, NULL, 7, 9, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:30:20', '2024-01-04 19:40:06'),
	(117, 'DAS-04-RG-02-E', 'MARIBEL', 'ESPINOZA VERASTEGUI', 'mespinoza@ucb.edu.bo', NULL, '$2y$12$U6mef7HfgWHJZhAt0/ENfe0Coi4/oCyTYrDn99bb03ilzi1k5V/A6', NULL, 'user', 65, 66, NULL, 7, 9, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:31:33', '2024-01-04 19:41:01'),
	(118, 'DAS-04-RG-03', 'CLEMENTE', 'CHOQUE QUISPE', 'clchoque@ucb.edu.bo', NULL, '$2y$12$bKCBSgLnT3F3TMQwBOQyzOehUvaHmm0SlXTJG3WpZGE3I0YPOzFV2', NULL, 'user', 66, 67, NULL, 7, 9, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:34:17', '2024-01-04 19:41:52'),
	(119, 'DAS-04-RG-03', 'DILIAM HEMILZE', 'LARREA CHAVEZ', 'dlarrea@ucb.edu.bo', NULL, '$2y$12$g9tjcLxlf5bovl1RumDkhuA6.95D8RCaxkchDKzbQ8w29Yf.smu/O', NULL, 'user', 66, 67, NULL, 7, 9, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:35:37', '2024-01-04 19:43:00'),
	(120, 'DAS-04-RG-03', 'JOSE GONZALO', 'MEALLA GUTIERREZ', 'jmealla@ucb.edu.bo', NULL, '$2y$12$N1sqkvNOrMPitRtamC.tOeDlG/BMbjM3bJtAohDA.Joe04jI8BbOS', NULL, 'user', 66, 67, NULL, 7, 9, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:36:31', '2024-01-04 19:44:20'),
	(121, 'DAS-05-DC-01', 'GEOVANA', 'CERRUTO ALVAREZ', 'gcerruto@ucb.edu.bo', NULL, '$2y$12$3VoTUW40ugugBagc4qxbNee3vt4vNUR5oHUQubH/m1B1uKe8uak/2', NULL, 'user', 53, 68, NULL, 7, 15, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:37:42', '2024-01-04 19:45:15'),
	(122, 'DAS-05-DC-02', 'ANA GABRIELA', 'ALIAGA JIMENEZ', 'aaliaga@ucb.edu.bo', NULL, '$2y$12$8Z0yK9RMoOqQCSyoS.4qKuescfQigTLSDmldfztKPipNNYiYHtX8i', NULL, 'user', 67, 69, NULL, 7, 15, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:38:53', '2024-01-04 19:46:06'),
	(123, 'DAS-06-AO-01', 'MADEL IVONNE', 'CEVALLOS BALLESTEROS', 'mcevallos@ucb.edu.bo', NULL, '$2y$12$Sgez52x5R1is0v.OrsVCsu/kZEcrYlG3w4Ad4NikyrsZyuG0ry7y6', NULL, 'user', 54, 70, NULL, 7, 16, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:40:17', '2024-01-04 19:47:09'),
	(124, 'DAS-06-AO-02', 'REYNALDO RICHARD', 'RIOS MENA', 'rrios@ucb.edu.bo', NULL, '$2y$12$8KClcYo14Nz9fhds6LlBDuvm6QxdT8JiFRP1pp99USIqw.mRuKfH6', NULL, 'user', 68, 71, NULL, 7, 16, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:41:34', '2024-01-04 19:47:49'),
	(125, 'DAS-06-AO-03', 'MARIA AGUEDA SILVIA', 'UGARTE DE STEVERLYNCK', 'mugarte@ucb.edu.bo', NULL, '$2y$12$t.TOmz0VCXxIOEKsywQif.wBrnnXDTDgbS99VETHBuw5aU37zR9Pq', NULL, 'user', 69, 72, NULL, 7, 16, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:43:02', '2024-01-04 19:48:54'),
	(126, 'DAS-07-CA-01', 'MARCIO ALEJANDRO', 'PAREDES RIVERA', 'mparedes@ucb.edu.bo', NULL, '$2y$12$Ou0X/TT2VHKdmIcrKmrhxOy7/OpfduG4uOMps4.lW3VfMYYNJz3d6', NULL, 'user', 55, 73, NULL, 7, NULL, 19, NULL, NULL, NULL, NULL, '2023-12-17 05:44:10', '2024-01-04 19:49:46'),
	(127, 'DAS-07-CA-02', 'DIEGO ADAMS', 'ARTEAGA SANJINÉS', 'darteaga@ucb.edu.bo', NULL, '$2y$12$mPCFYNbq1/8yvhzCj97I8eHlw4tHXJ0lTFPF8H4CC4.WbEHfCziIe', NULL, 'user', 70, 74, NULL, 7, NULL, 19, NULL, NULL, NULL, NULL, '2023-12-17 05:45:35', '2024-01-04 19:50:44'),
	(128, 'DAS-08-SEI-01', 'PAOLA CONSUELO', 'ZAPANA CASTILLO', 'pzapana@ucb.edu.bo', NULL, '$2y$12$yuJbPSl.dTvaToUQfDXTreNX1.eZTVdmPcr7b3c5unVdiTzJ2POui', NULL, 'user', 56, 75, NULL, 7, NULL, 20, NULL, NULL, NULL, NULL, '2023-12-17 05:46:50', '2024-01-04 19:51:53'),
	(129, 'DAS-09', 'ADRIANA NICOOL', 'SANJINES DEL VILLAR', 'asanjines@ucb.edu.bo', NULL, '$2y$12$QN672GnNbh.0nGhsOVDKruWy5INU0fYyZt67dtF7MhbrTxBsxx366', NULL, 'user', 57, 76, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:48:01', '2024-01-04 19:52:36'),
	(130, 'DAS-10', 'MARCELO EDGAR', 'TARQUINO PORTILLO', 'mtarquino@ucb.edu.bo', NULL, '$2y$12$T5HQIYi3UsMYApLMuL6k/ueyCdf.WJxiwMTGyABrms8O4vAd8QWEq', NULL, 'user', 58, 77, NULL, 7, NULL, 21, NULL, NULL, NULL, NULL, '2023-12-17 05:49:57', '2024-01-04 19:53:11'),
	(131, 'DAS-11', 'MICHEL ANGELO', 'AGUILAR TINCO', 'maguilar@ucb.edu.bo', NULL, '$2y$12$NjelbVsGJcIZPfu06J4kMOgcYbIxy9OYgjvjm2S0ZbWkESE4HuRQa', NULL, 'user', 59, 78, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:51:37', '2024-01-04 19:53:46'),
	(132, 'DGR-03', 'FEDRA JASMIN', 'DURAN TARIFA', 'fduran@ucb.edu.bo', NULL, '$2y$12$uhH6PLOjD3jkPKnEFtmGiu3j.f3qswF/527OKUydPlVDJc..sIJQ6', NULL, 'user', 50, 79, 8, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:53:06', '2024-01-04 20:45:31'),
	(133, 'EDU-01', 'MARIA ALEJANDRA', 'MARTINEZ BARRIENTOS', 'mmartinez@ucb.edu.bo', NULL, '$2y$12$hwGFgATKNTlEoMAKAoqZDuuq9s727nm/HIBrWbCn9/bSayPkoJWz2', NULL, 'user', 98, 80, 9, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 05:56:27', '2024-01-04 20:52:15'),
	(134, 'EDU-02', 'MARIO RAUL', 'BAPTISTA GONZALES', 'mbaptista@ucb.edu.bo', NULL, '$2y$12$l5.XshV3Qwltt9hLDAMCCuv86nkWqAcnE9nI4.HLs.vuJ3GPSscfu', NULL, 'user', 114, 81, 9, 10, NULL, 22, NULL, NULL, NULL, NULL, '2023-12-17 05:57:44', '2024-01-04 20:52:51'),
	(135, 'EDU-03', 'MONICA MIRIAM', 'FLORES ROJAS', 'mflores@ucb.edu.bo', NULL, '$2y$12$5o.szmpKI9DTH6pjUgxZ2.dr1/pCrX1SCBIHiJgHlkprHYJn09k2C', NULL, 'user', 115, 82, 9, 10, NULL, 23, NULL, NULL, NULL, NULL, '2023-12-17 05:59:09', '2024-01-04 20:53:24'),
	(136, 'EDU-04', 'MELFA', 'CESPEDES HERNANI', 'mecespedes@ucb.edu.bo', NULL, '$2y$12$UpjTAow8AGcAC8xDSgpqKuuSpUpNa7oa6fqk9PtS24VARlrOvAhcy', NULL, 'user', 117, 83, 9, 10, NULL, 23, NULL, NULL, NULL, NULL, '2023-12-17 06:02:02', '2024-01-05 20:39:07'),
	(137, 'PG-01', 'LEONOR ALANA', 'VALDIVIA DZGOEVA', 'lvaldivia@ucb.edu.bo', NULL, '$2y$12$.SQImCoqQ53oitB4DZvv1e1huQwMnmVQ7VYF1qh3lkk4QBZ3ySHKC', NULL, 'user', 93, 84, 9, 10, NULL, 15, NULL, NULL, NULL, NULL, '2023-12-17 06:03:56', '2024-01-05 21:02:21'),
	(138, 'SECR-01', 'MARIA CANDELARIA', 'PERALES SANCHEZ', 'mperales@ucb.edu.bo', NULL, '$2y$12$olIkrT0v0TUT4SGB6XjjR.NpdZQuz.zmoJFKjgw3vKWjvBBzIyjKe', NULL, 'user', 116, 135, 28, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 06:31:44', '2024-01-05 22:21:14'),
	(139, 'ICO-02', 'YOSELINNE LETICIA', 'VERA ASTURIZAGA', 'yvera@ucb.edu.bo', NULL, '$2y$12$hXcbPUIA2sBJwtDHFPK9oOhTwYrZMkzsnGoiI6Ovgtt/7p53i2yQG', NULL, 'user', 130, 86, 10, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 06:35:53', '2024-01-05 20:43:07'),
	(140, 'ID-01', 'GERMAN RAMIRO', 'MOLINA BARRIOS', 'gmolina@ucb.edu.bo', NULL, '$2y$12$LeksrfvN8jcTjWyaBlDLf.2/bogrXU2PzjlA1BdqCi1wOal6J/lhW', NULL, 'user', 154, 87, 11, 13, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 06:37:12', '2024-01-05 20:43:54'),
	(141, 'IICC-01', 'EDITH MARCELA', 'LOSANTOS VELASCO', 'elosantos@ucb.edu.bo', NULL, '$2y$12$XosBkonvG/ZAhBewA4E28OG0.MINfqZpEOgZbu8BFvVwHHSodpRcW', NULL, 'user', 99, 88, 12, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 06:38:47', '2024-01-05 20:44:53'),
	(142, 'IICC-02', 'NATALIE', 'GUILLEN AGUIRRE', 'nguillen@ucb.edu.bo', NULL, '$2y$12$sL.Qrgfc534L2h5O4OlvD.fNHmjkfGjCvftmrQP0/yf55/AOFluUq', NULL, 'user', 100, 89, 12, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 06:40:45', '2024-01-05 20:45:41'),
	(143, 'IICC-02', 'ANA MARIA FERNANDA', 'ARIAS URIONA', 'aarias@ucb.edu.bo', NULL, '$2y$12$h/0IbbjGFWtq7mtdkY0XduiS4pdphr.P.30V.UzR81elrAL4SQEgG', NULL, 'user', 100, 89, 12, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 06:41:52', '2024-01-05 20:47:19'),
	(144, 'IICC-03', 'CLAUDIA JAZMÍN', 'MAZÓ TORRICO', 'cmazo@ucb.edu.bo', NULL, '$2y$12$wIsq4Qx9c67iYq9zhqCu3.stRRskIMBwOtI2mWgdm./1RDGv8PHX6', NULL, 'user', 101, 90, 12, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 06:43:02', '2024-01-05 20:48:01'),
	(145, 'IISEC-01', 'FERNANDA', 'WANDERLEY DE CHAVEZ', 'fwanderley@ucb.edu.bo', NULL, '$2y$12$nqIDd2BZGN7nzPJEbQVliO/S1t.a/pGraAG.wCIgddffQAsmDB8Zi', NULL, 'user', 124, 91, 13, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 06:44:32', '2024-01-05 20:49:15'),
	(146, 'IISEC-02', 'JEAN PAUL', 'BENAVIDES LOPEZ', 'jbenavides@ucb.edu.bo', NULL, '$2y$12$VYgNH0gBfc1qcKV3aP12U.OkSHaWRKlPL0C6g02QBE6bg2kcT0CW2', NULL, 'user', 125, 92, 13, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 06:45:46', '2024-01-05 20:50:25'),
	(147, 'IISEC-03', 'CARLOS EDUARDO', 'QUEZADA LAMBERTIN', 'cquezada@ucb.edu.bo', NULL, '$2y$12$pVjL5UN7hkeDZbheay5dSen0ldtKk2noO1RcZk.B9JELXENvPVDLy', NULL, 'user', 126, 93, 13, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 06:47:03', '2024-01-05 20:50:56'),
	(148, 'ING-CIV-02', 'ALVARO', 'QUISBERT HUAYLLANI', 'aquisbert@ucb.edu.bo', NULL, '$2y$12$DdnM2mxyQihIco98PdNBNOwh6TASaCEDxdin3.CnvBfHqcujJS1L6', NULL, 'user', 145, 94, 14, 12, NULL, 24, NULL, NULL, NULL, NULL, '2023-12-17 07:05:29', '2024-01-05 20:51:41'),
	(149, 'ING-CIV-03', 'EDWIN FERNANDO', 'QUISPE MAMANI', 'equispe@ucb.edu.bo', NULL, '$2y$12$SsjNXB6SdfzWUa6.l1d.huXMd4ugt25B3Z2qWo0XdTd2WOj9VCO9y', NULL, 'user', 146, 95, 14, 12, NULL, 24, NULL, NULL, NULL, NULL, '2023-12-17 07:06:42', '2024-01-05 20:52:15'),
	(150, 'MC-01', 'MARIEL', 'ÁLVAREZ ZAMORA', 'malvarez@ucb.edu.bo', NULL, '$2y$12$TxLHwrK09DKJrqaxs0GNF.a0VN2FZt1NG1NSPEXO3p8E/5dx8Yy46', NULL, 'user', 77, 96, NULL, 8, 17, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:08:03', '2024-01-05 20:53:00'),
	(151, 'MC-02', 'YOLANDA MARTHA', 'BARRIENTOS CORTEZ', 'ybarrientos@ucb.edu.bo', NULL, '$2y$12$qvP8c986TpFHoO8zj/VBW.rK5wV6ZAbm/MtEaisv0L6odTmeN9MwK', NULL, 'user', 78, 97, NULL, 8, 17, 25, NULL, NULL, NULL, NULL, '2023-12-17 07:09:36', '2024-01-05 20:53:51'),
	(152, 'MC-03', 'FABIOLA', 'BELMONTE RODRIGUEZ', 'fbelmonte@ucb.edu.bo', NULL, '$2y$12$wUBJDYssxFt0Ui7F/dk2kOYZynor1LtLvIn/NTiOr09jHrjc0f.Je', NULL, 'user', 79, 98, NULL, 8, 17, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:11:00', '2024-01-05 20:54:25'),
	(153, 'MC-04', 'SABINA', 'ZURITA LUCIA', 'szurita@ucb.edu.bo', NULL, '$2y$12$XDUzCyJcw/L5JebmZbU3lOCNWpOQ2qfATFhWslXWjyD4E7Y/VHkaG', NULL, 'user', 81, 99, NULL, 8, 17, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:12:13', '2024-01-05 20:57:58'),
	(154, 'PUR-01', 'ARMANDO ROBERTO', 'SEJAS ESCALERA', 'asejas@ucb.edu.bo', NULL, '$2y$12$6OJOpXb8R3qn8XUiIqV1kOTtjlmrOn4s2qRklNBqcOk0xdzNuho9a', NULL, 'user', 158, 100, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:13:33', '2024-01-05 21:03:09'),
	(155, 'PUR-02', 'FERNANDO', 'BUSTILLOS LOAYZA', 'fbustillos@ucb.edu.bo', NULL, '$2y$12$vo7Tp1DuRuaZ7JpmA6yCEeOKdpN2jYBWSFmYavq2whDN7X368upza', NULL, 'user', 87, 101, NULL, 9, NULL, 26, NULL, NULL, NULL, NULL, '2023-12-17 07:14:47', '2024-01-05 21:03:41'),
	(156, 'PUR-03', 'ANDREA MARIANA', 'MOSCOSO RIVEROS', 'amoscoso@ucb.edu.bo', NULL, '$2y$12$PuHIXHDfdJvd1r1SFb6cWOwYjC9KK/QhuA/6o.gGv.NEj5z.tVp2C', NULL, 'user', 88, 102, NULL, 9, NULL, 27, NULL, NULL, NULL, NULL, '2023-12-17 07:15:50', '2024-01-05 21:04:11'),
	(157, 'PUR-04', 'DOLLY', 'ALURRALDE SANDOVAL', 'dlurralde@ucb.edu.bo', NULL, '$2y$12$iG.W41/JBsd7JDJ1dSMow.a/oZ9skrRzuH2jUHmZKSGNOuKSQId4a', NULL, 'user', 89, 103, NULL, 9, NULL, 28, NULL, NULL, NULL, NULL, '2023-12-17 07:17:24', '2024-01-05 21:04:52'),
	(158, 'PUR-05', 'LUIS FERNANDO', 'ARTEAGA', 'larteaga@ucb.edu.bo', NULL, '$2y$12$xYbI9XAU1nYs8.DE49LVV.jk3hNid9il42x.Vau8UIqZ14G35LO3u', NULL, 'user', 90, 104, NULL, 9, NULL, 29, NULL, NULL, NULL, NULL, '2023-12-17 07:18:59', '2024-01-05 21:05:34'),
	(159, 'PUR-06', 'MARIA ANDREA', 'RUIZ ASTURIZAGA', 'mruiz@ucb.edu.bo', NULL, '$2y$12$0LR7v3qG10Dw3KF7MGu44.A1AwlajGqCyygTVsMLPZYU1EKzhG8nW', NULL, 'user', 91, 105, NULL, 9, NULL, 30, NULL, NULL, NULL, NULL, '2023-12-17 07:20:12', '2024-01-05 21:06:02'),
	(160, 'RPI-01', 'CLAUDETTE SYLVIA', 'GALINDO SUAREZ', 'cgalindo@ucb.edu.bo', NULL, '$2y$12$rcpPUDb4OM4nojZd3q3UM..l4f6vNDZ2Aqj001RCvGlj.sUKQME0G', NULL, 'user', 76, 107, NULL, 8, 18, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:22:56', '2024-01-05 21:07:21'),
	(161, 'RPI-02', 'CARLA ANDREA', 'OROZCO CARVAJAL', 'corozco@ucb.edu.bo', NULL, '$2y$12$ZxrFltAOBgqrtAPYHh8nD.CUzWNZN.2iRFzNPqO5kkGhrohliaQt.', NULL, 'user', 82, 108, NULL, 8, 18, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:24:27', '2024-01-05 22:01:06'),
	(162, 'RPI-03', 'INGRID ARACELY', 'FLORES MORALES DE ALCOCER', 'iflores@ucb.edu.bo', NULL, '$2y$12$wS0cIN56U/zMcWQ/Xs9b7ezrtvb3Zg9ioQjPEn4ccHdb4hZH4mi9q', NULL, 'user', 83, 109, NULL, 8, 18, 31, NULL, NULL, NULL, NULL, '2023-12-17 07:25:42', '2024-01-05 22:01:45'),
	(163, 'RPI-04', 'EDWIN', 'VARGAS MACHICADO', 'evargas@ucb.edu.bo', NULL, '$2y$12$mJXudPN0izLit/X5hoDeOelaBmgbdFTs2D.RvodbmkUSNyemfsue6', NULL, 'user', 84, 110, NULL, 8, NULL, 31, NULL, NULL, NULL, NULL, '2023-12-17 07:26:46', '2024-01-05 22:03:32'),
	(164, 'RPI-05', 'SELMA IVONE', 'REINTSCH CASTELLON', 'sreintsch@ucb.edu.bo', NULL, '$2y$12$c92wihtQIk5Gp9KhYDp7YegQ6G/8fsJooXGxeEAoBk2ASaxs/Qtfm', NULL, 'user', 86, 112, NULL, 8, NULL, 32, NULL, NULL, NULL, NULL, '2023-12-17 07:28:53', '2024-01-05 22:04:16'),
	(165, 'RR-01', 'XIMENA MACLOVIA', 'PERES ARENAS', 'xperes@ucb.edu.bo', NULL, '$2y$12$u22Fg0tXwxHBiJY08wh2LOIGLYYpBv94kaTLvRsYILnMHIvDsYWnW', NULL, 'user', 71, 113, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:30:02', '2024-01-05 22:04:44'),
	(166, 'RR-02', 'IVANA MARUJA', 'TARIFA CABO', 'itarifa@ucb.edu.bo', NULL, '$2y$12$6w0fbE439dQnN.0rL1N0u.TCpeeyVNvh9kzeYQ.jE0wECm5QmdC6G', NULL, 'user', 72, 114, NULL, 8, NULL, 33, NULL, NULL, NULL, NULL, '2023-12-17 07:31:50', '2024-01-05 22:06:58'),
	(167, 'RR-03', 'MARIA ESTHER', 'GOMEZ LLANO', 'mgomez@ucb.edu.bo', NULL, '$2y$12$ajOYAltqqpLZOlYofdmkmeFKdJca0zSgpU4apWSEtkXpSam8543Jm', NULL, 'user', 73, 115, NULL, 8, NULL, 34, NULL, NULL, NULL, NULL, '2023-12-17 07:33:08', '2024-01-05 22:07:38'),
	(168, 'RR-04', 'FAVIOLA PAOLA', 'ZEBALLOS CADENA', 'fzeballos@ucb.edu.bo', NULL, '$2y$12$IUyGwDs.phAo8Nne.e/d9.R6h9WdxpkeCiHXRabNXXAirDmnsmqf.', NULL, 'user', 74, 116, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:34:34', '2024-01-05 22:08:07'),
	(169, 'RR-05', 'NICOLE DANIELA', 'STOHMANN MERCADO', 'nstohmann@ucb.edu.bo', NULL, '$2y$12$K6VPsPeyjVLhTJxyac6sSuH0Exa/cvb9bd2BmKIdW2he4Alst2GZG', NULL, 'user', 75, 117, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:35:38', '2024-01-05 22:08:53'),
	(170, 'RR-05', 'FRANCISCO JAVIER', 'CONDORI ZAPANA', 'fcondori@ucb.edu.bo', NULL, '$2y$12$lJ8z6h7UwB6owyY7QgmPyORDMncgW0m8pUW5k5qiGOQiH2GetyIkC', NULL, 'user', 47, 118, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:37:17', '2024-01-05 22:09:25'),
	(171, 'SEC-01', 'JOSE LUIS', 'AGUIRRE ALVIS', 'jaguirre@ucb.edu.bo', NULL, '$2y$12$n.No3FEEvhr0NvE6peHotuIsW6WjTgKf5P2gAxXtXryefz1CbJlf6', NULL, 'user', 102, 119, 15, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:39:11', '2024-01-05 22:10:06'),
	(172, 'SEC-02', 'JÜRGEN MARCELO', 'BUSTILLOS APARICIO', 'jbustillos@ucb.edu.bo', NULL, '$2y$12$E6HmWjdEeRpIqB1tbzf0get.bDkP0it24bTiazi6pcm/4LJU6yw9y', NULL, 'user', 103, 120, 15, 10, NULL, 35, NULL, NULL, NULL, NULL, '2023-12-17 07:40:39', '2024-01-05 22:14:03'),
	(173, 'SEC-04', 'ROXANA ROSS MERY', 'ROCA TERAN', 'rroca@ucb.edu.bo', NULL, '$2y$12$irH1Lat7uUgMzBjHtFUSuuhmZk3rZM8E06W3GlyU/6aJeqqBCvkx6', NULL, 'user', 105, 122, 15, 10, NULL, 37, NULL, NULL, NULL, NULL, '2023-12-17 07:43:34', '2024-01-05 22:15:30'),
	(174, 'SEC-05', 'KARLA YUMEI', 'LIJERON DEL CARPIO', 'klijeron@ucb.edu.bo', NULL, '$2y$12$QuZgNe9ZWcvn4XWydXTyNuxFVfBzZkFl1b1VHlh8XYFkH84Y1fatO', NULL, 'user', 106, 123, 15, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:45:28', '2024-01-05 22:16:10'),
	(175, 'SECR-03', 'JOSE DANIEL', 'PEREZ STRELLI', 'jperez@ucb.edu.bo', NULL, '$2y$12$ob3.OvPh99V/wd5lheNmPuRR7wJ7QitB5smgxDxf3xjnVhlpoyTVq', NULL, 'user', 50, 125, NULL, 16, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:48:52', '2024-01-06 02:02:42'),
	(176, 'SECR-03', 'SHIRLEY GINA', 'VEGA CAMACHO', 'svega@ucb.edu.bo', NULL, '$2y$12$2XzfjpDWjOHd5sYZuQFyJOqHfP3PVKet8nNDN65xPtnaDvFaRPgY.', NULL, 'user', 50, 79, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:49:57', '2024-01-06 02:03:32'),
	(177, 'SECR-03', 'MAYARI VERONICA', 'NOYA BERAMENDI', 'mnoya@ucb.edu.bo', NULL, '$2y$12$3SNLs/KIw6fciSRXM8j.qOKwtXKTZoi4cA4qYraHlylXlXgEYYF5.', NULL, 'user', 6, 127, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:50:59', '2024-01-06 02:04:05'),
	(178, 'SECR-01', 'ROSARIO', 'BARRERA BELLIDO', 'rbarrera@ucb.edu.bo', NULL, '$2y$12$tA8Hftd19j8l21EPz/QaXeYdtLB2I.WLBJ.lFrFqn2Jdu/HamiGEG', NULL, 'user', 116, 148, 17, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 07:55:59', '2024-01-06 01:56:44'),
	(179, 'DAF-01', 'RAÚL', 'BOADA OPORTO', 'rboada@ucb.edu.bo', NULL, '$2y$12$iH8D8iC8wXJL/e4sKNlyD.4IozYE27toLrRqD4JHOyo.W/bSVShgG', NULL, 'user', 48, 23, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-17 21:22:08', '2024-01-04 07:38:17'),
	(180, 'SEC-03', 'LUIS CESAR', 'LLANOS LLANOS', 'lllanos@ucb.edu.bo', NULL, '$2y$12$DddplKaisyqY4/4Zx5bsR.gzSU35T39IUaFcnNjdnk1PZ1K118ilS', NULL, 'user', 121, 121, 15, 10, NULL, 36, NULL, NULL, NULL, NULL, '2024-01-04 07:01:07', '2024-01-04 07:13:45'),
	(181, 'SECR-02', 'ROXANA', 'IRIGOYEN TABABARY', 'ririgoyen@ucb.edu.bo', NULL, '$2y$12$3iq1tHBgRfRSTbn08./lKOe2b.ASY78M6J0hC1Bpqjt.y0qagq1ju', NULL, 'user', NULL, 106, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 02:06:07', '2024-01-06 02:06:07'),
	(182, 'UEA-01', 'FRANCO DANIEL', 'SANABRIA ABASTO', 'fsanabria@ucb.edu.bo', NULL, '$2y$12$CcH332J2JkJVSUI9RiY.LepapJGvE.IgzR7HuoMxrlAPFuXe1g6S.', NULL, 'user', NULL, 124, 29, 16, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 02:07:41', '2024-01-06 02:10:47'),
	(183, 'SECR-01', 'ANA ELIZABETH', 'ALCAZAR DE BARRIENTOS', 'aalcazar@ucb.edu.bo', NULL, '$2y$12$PvuBuMcQjOv.Y85WPQOejeTzlnHhSQXMhtMx3r6gNtbrcks/45.f2', NULL, 'user', NULL, 158, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 02:12:21', '2024-01-06 02:12:21'),
	(184, 'SECR-02', 'FLORA CARMEN', 'BUEZO CAMACHO', 'fbuezo@ucb.edu.bo', NULL, '$2y$12$3byYLEWCrJHDnOlbW4kqsOs.sn3PxPfixURaX6QiS4WbexMzWFMTy', NULL, 'user', NULL, 155, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 02:15:46', '2024-01-06 02:15:46'),
	(185, 'SECR-02', 'CECILIA CRISTINA', 'CAREAGA ARIAS', 'ccareaga@ucb.edu.bo', NULL, '$2y$12$PKYBqBZjPLUxElZ3wK8ADOsuKpE/k4tiMntpDP3zDpmGDhjUK9wqe', NULL, 'user', NULL, 171, NULL, 13, NULL, 39, NULL, NULL, NULL, NULL, '2024-01-06 02:18:04', '2024-01-06 02:18:04'),
	(186, 'SECR-01', 'SANDRA LILIANA', 'CORTEZ ROJAS', 'scortez@ucb.edu.bo', NULL, '$2y$12$1fHZwqfSYT7IHv6EwEhzMO5UPlyZ8NrtNry53Ps0iAGk.W9wv9DPi', NULL, 'user', NULL, 157, 30, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 02:20:13', '2024-01-06 02:21:58'),
	(187, 'SECR-01', 'CARMEN GLADYS DIMPNA', 'MANZANO CAZAS', 'cmanzano@ucb.edu.bo', NULL, '$2y$12$7WPCxx58nWn4PWYCAEr/VupO0M7rwUHem9I0k7RvreyIQA6KuvTRm', NULL, 'user', NULL, 171, 31, 13, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 02:24:21', '2024-01-06 02:25:52'),
	(188, 'SECR-01', 'GIONDALINA', 'RUA VALDEZ', 'grua@ucb.edu.bo', NULL, '$2y$12$yeAfhrK/d8ASKD6Wj6UsEe7HGBuI/aW6u1f1ven.pjNWRz1pLatDi', NULL, 'user', NULL, 173, 32, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 02:30:22', '2024-01-15 06:32:57'),
	(189, 'SECR-01', 'AMPARO', 'SALVATIERRA DE PAZ', 'asalvatierra@ucb.edu.bo', NULL, '$2y$12$5v1EPRWlT1nKSn6vv4yHW.6mmv/2SDpdYKi/MkXS/Kj.iVQZSAKU2', NULL, 'user', NULL, 158, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 02:32:57', '2024-01-06 02:32:57'),
	(190, 'SECR-03', 'CARLA DIANA', 'ANDRADE NAVARRO', 'candrade@ucb.edu.bo', NULL, '$2y$12$9zjJCiT8mRTzKxvMmYijDudvl5L.PMRpkhCdCSRJcS2PL8cMjuqFq', NULL, 'user', NULL, 171, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 02:34:46', '2024-01-06 02:34:46'),
	(191, 'SECR-01', 'DOMINGA', 'TORREZ CALLIZAYA', 'dtorrez@ucb.edu.bo', NULL, '$2y$12$R.3.kEJe2NDRpqnUZyxIsOdfImn1frmL6/PLpuDEnvCNsRA12ve/m', NULL, 'user', NULL, 135, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 02:41:28', '2024-01-06 02:41:28'),
	(192, 'SECR-01', 'JAHEL', 'VALENCIA APARICIO', 'jvalencia@ucb.edu.bo', NULL, '$2y$12$hw67OfA6TmGwvzkQ3cxZwe2NBbcmqvuRp65HiMA9.oQ.A/bWE7y0y', NULL, 'user', NULL, 158, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 02:42:49', '2024-01-06 02:42:49'),
	(193, 'SECR-01', 'MARIA DEL CARMEN', 'VELASCO MONRROY', 'mvelasco@ucb.edu.bo', NULL, '$2y$12$mdRDtTueVnC2BZWtroLF3uuUQN8DN./la75BME9iYCD7IH79WT0IS', NULL, 'user', NULL, 156, 33, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-06 02:45:17', '2024-01-15 06:20:34'),
	(194, 'ACAD-01', 'JAVIER MARCELO', 'GUTIERREZ BALLIVIAN', 'jgutierrez@ucb.edu.bo', NULL, '$2y$12$i9zrg52zYkAP3K10LeZm.ukZar/QMvPh12JkTh5fxNvkO6bw.r29y', NULL, 'user', NULL, 142, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 05:28:12', '2024-01-15 05:28:12'),
	(195, 'ACAD-01', 'RENAN ALBERTO', 'LAGUNA VARGAS', 'rlaguna@ucb.edu.bo', NULL, '$2y$12$ySjN9oWEMM8C2gx3VyC5heo5Mhz7eRBud4lDe521UvCtBcet4tuAK', NULL, 'user', NULL, 143, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 05:30:42', '2024-01-15 05:30:42'),
	(196, 'ACAD-01', 'CARLOS HUGO', 'CORDERO CARRAFA', 'ccordero@ucb.edu.bo', NULL, '$2y$12$6I4iNNhC11.OlyW/ZDTrg.ejN5nnrsAMhDISQssm7LFVY3kuxAluG', NULL, 'user', NULL, 144, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 05:46:11', '2024-01-15 05:46:11'),
	(197, 'ACAD-01', 'MARIA ELENA', 'LORA FUENTES', 'mlora@ucb.edu.bo', NULL, '$2y$12$Dmm/hqNJ25F0M1nKXij3Vu57mXn/fA7SDRd.fUe6UbLG2yIC5SvjG', NULL, 'user', NULL, 141, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 05:53:05', '2024-01-15 05:53:05'),
	(198, 'ACAD-02', 'JESSICA DORIS', 'LANZA BUTRON', 'jlanza@ucb.edu.bo', NULL, '$2y$12$xQxRkf6Ti6D8S3SoEsZiXOlYlsyrnyG2hmSejT6/nZ18zGotnMd9q', NULL, 'user', NULL, 151, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 05:56:19', '2024-01-15 05:56:19'),
	(199, 'ACAD-03', 'MARCO ANTONIO', 'ABASTOFLOR PORTUGAL', 'mabastoflor@ucb.edu.bo', NULL, '$2y$12$0YAgG5T9dSTeJ0cThAMWbOcN0iihQ0HGjiKPtxrrdzjMgHZEUgns2', NULL, 'user', NULL, 154, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 05:58:51', '2024-01-15 05:58:51'),
	(200, 'ACAD-02', 'CARLOS GUSTAVO', 'MACHICADO SALAS', 'cmachicado@ucb.edu.bo', NULL, '$2y$12$Zkt0HCxlbj0svxgw1K.QKOY8OWnBoielX8CBXGYBzAwF68369KvbG', NULL, 'user', NULL, 150, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 06:03:00', '2024-01-15 06:03:00'),
	(201, 'ACAD-02', 'JAVIER ANGEL', 'MENDOZA ELIAS', 'jmendoza@ucb.edu.bo', NULL, '$2y$12$mHV5j9EUv..5zYPj7PtACuF2bWu.dIv9aQmLs6EVtaNZlzmK/d.rC', NULL, 'user', NULL, 152, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 06:24:30', '2024-01-15 06:24:30'),
	(202, 'ACAD-02', 'IVETTE BRENDA', 'MIRANDA PARRA', 'imiranda@ucb.edu.bo', NULL, '$2y$12$W0SXAeGVYO.6cwRgFHuIPOEMfHL9oA3HOudhkb8mTLJ3PLhZVJnxW', NULL, 'user', NULL, 170, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 06:40:40', '2024-01-15 06:40:40'),
	(203, 'ACAD-02', 'JUAN CARLOS', 'SALAZAR DEL BARRIO', 'jsalazar@ucb.edu.bo', NULL, '$2y$12$xdryVy6OE.E0.d/pd/lmSeirDleXH9rkjq9HwKnXklgOYu1zwzP7W', NULL, 'user', NULL, 146, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 06:42:59', '2024-01-15 06:42:59'),
	(204, NULL, 'PAOLA ALEJANDRA', 'CARRANZA BRAVO', 'pcarranza@ucb.edu.bo', NULL, '$2y$12$G6fUc05qkEJkiSky7.giDeQ4Vh9pXMip8oaix50KI9BGBzigtJkIi', NULL, 'user', NULL, 136, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 06:45:06', '2024-01-15 06:45:06'),
	(205, 'ACAD-02', 'ANDREA GABRIELA', 'ESPINAR SAAVEDRA', 'aespinar@ucb.edu.bo', NULL, '$2y$12$kLV496H2nxm/9Nei7aBWmO5SoOYZczrr7SkCUgPdOoILI1ZH92Y9i', NULL, 'user', NULL, 165, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 07:01:21', '2024-01-15 07:01:21'),
	(206, 'ACAD-02', 'OMAR ROBERTO', 'SALINAS VILLAFAÑE', 'osalinas@ucb.edu.bo', NULL, '$2y$12$VlzPMaf4a2DVL330Lxrj5uEBe7b1s..St7xayUDOXKDQzh1GL2OP.', NULL, 'user', NULL, 162, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 07:02:15', '2024-01-15 07:02:15'),
	(207, 'ACAD-02', 'BORIS VLADIMIR', 'HERRERA CESPEDES', 'bherrera@ucb.edu.bo', NULL, '$2y$12$YWAjqNF6zjOOe5J.UcqheuBdFUuc0Werj6moHKHS6MgPsdoI/MGSq', NULL, 'user', NULL, 163, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 07:03:13', '2024-01-15 07:03:13'),
	(208, 'ACAD-02', 'ORLANDO', 'RIVERA JURADO', 'orivera@ucb.edu.bo', NULL, '$2y$12$v4w2B15c/E.rLXdy32zgIe9WmMh3YtMr3pskkEsgkvBOUXigqQtjC', NULL, 'user', NULL, 161, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 07:04:25', '2024-01-15 07:04:25'),
	(209, 'ACAD-02', 'FABIO RICHARD', 'DIAZ PALACIOS', 'fdiaz@ucb.edu.bo', NULL, '$2y$12$R3Rk.n2/Qj7eYn29m14By.7EkU4.AoLGORuJNUIT/VQH.xQvu23cC', NULL, 'user', NULL, 164, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 07:05:21', '2024-01-15 07:05:21'),
	(210, 'ACAD-03', 'RUDY ARIEL', 'GUARAZ VILLEGAS', 'rguaraz@ucb.edu.bo', NULL, '$2y$12$.Vp2UWq90u7wszwbNEmWCunwVtkQKyvma7Tkp9c2i5pB4pUxQG5gO', NULL, 'user', NULL, 168, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 07:06:36', '2024-01-15 07:06:36'),
	(211, 'ACAD-03', 'ELIAS RUBEN', 'CALIZAYA MAMANI', 'ecalizaya@ucb.edu.bo', NULL, '$2y$12$MUakPjjE5J5CD8.YVof6leHK3eKC2xfS5sOufALykRSgs2tHb5lRi', NULL, 'user', NULL, 167, NULL, 12, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15 07:07:34', '2024-01-15 07:07:34');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
