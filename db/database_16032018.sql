-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ospos_app_config`;
CREATE TABLE `ospos_app_config` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_app_config` (`key`, `value`) VALUES
('address',	'Lima - Perú'),
('company',	'Sistema de Ventas'),
('currency_side',	'0'),
('currency_symbol',	'S/.'),
('custom10_name',	''),
('custom1_name',	''),
('custom2_name',	''),
('custom3_name',	''),
('custom4_name',	''),
('custom5_name',	''),
('custom6_name',	''),
('custom7_name',	''),
('custom8_name',	''),
('custom9_name',	''),
('default_tax_1_name',	'Impuesto de Ventas 1'),
('default_tax_1_rate',	''),
('default_tax_2_name',	'Impuesto de Ventas 2'),
('default_tax_2_rate',	''),
('default_tax_rate',	'8'),
('email',	'admin@pappastech.com'),
('fax',	'123'),
('language',	'es'),
('phone',	'555-555-5555'),
('print_after_sale',	'0'),
('return_policy',	'Test'),
('timezone',	'America/Bogota'),
('website',	'');

DROP TABLE IF EXISTS `ospos_code`;
CREATE TABLE `ospos_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `key` varchar(1000) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `data` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ospos_code` (`id`, `name`, `key`, `type`, `data`, `created_at`, `updated_at`) VALUES
(1,	'File Head BCP',	'file-head-bcp',	'file_export',	'{\"file_head_bcp\": {\"type\": \"head\", \"content\": [{\"name\": \"Tipo de Registro\", \"align\": \"center\", \"length\": 1, \"default\": 1, \"position\": 1, \"description\": \"Para identificar el registro de cabecera se deberá utilizar valor fijo 1\", \"format_date\": \"\"}, {\"name\": \"Cantidad de abonos de la planilla\", \"align\": \"rigth\", \"length\": 6, \"default\": \"000006\", \"position\": 2, \"description\": \"Alinear a la derecha y completar con ceros hasta 6 posiciones\", \"format_date\": \"\"}, {\"name\": \"Fecha de proceso\", \"align\": \"center\", \"length\": 8, \"position\": 8, \"description\": \"El formato debe ser aaaammdd. Si se ingresa en blanco el BCP colocará la fecha actual.\", \"format_date\": \"aaaammdd\"}, {\"name\": \"Subtipo de planilla de haberes\", \"align\": \"center\", \"length\": 1, \"default\": \"G\", \"position\": 16, \"description\": \"Subtipo de planilla de haberes\", \"format_date\": \"\"}, {\"name\": \"Tipo de la cuenta de cargo\", \"align\": \"center\", \"length\": 1, \"default\": \"C\", \"position\": 17, \"description\": \" Considerar los siguientes tipos C => Cuenta Corriente,M => Cuenta Maestra\", \"format_date\": \"\"}, {\"name\": \"Moneda de la cuenta de cargo\", \"align\": \"center\", \"length\": 4, \"default\": \"0001\", \"position\": 18, \"description\": \"Valores posibles 0001 => Nuevos Soles,1001 => Dólares\", \"format_date\": \"\"}, {\"name\": \"Número de la cuenta de cargo\", \"align\": \"left\", \"length\": 20, \"default\": \"1910695055056\", \"position\": 22, \"description\": \"Valores posibles 0001 => Nuevos Soles,1001 => Dólares\", \"format_date\": \"\"}, {\"name\": \"Monto total de la planilla\", \"align\": \"rigth\", \"length\": 17, \"default\": \"00000000001200.00\", \"position\": 42, \"description\": \"Es la suma del importe de todos los abonos\", \"format_date\": \"\", \"format_currency\": \".00\"}, {\"name\": \"Referencia de la planilla\", \"align\": \"rigth\", \"length\": 40, \"default\": \"\", \"position\": 59, \"description\": \"Es la suma del importe de todos los abonos\", \"format_date\": \"\", \"format_currency\": \"\"}, {\"name\": \"Total de control (checksum)\", \"align\": \"rigth\", \"length\": 15, \"default\": \"000001100000000\", \"position\": 101, \"description\": \"Es la suma del importe de todos los abonos\", \"format_date\": \"\", \"format_currency\": \"\"}]}}',	'2017-12-02 19:12:49',	NULL),
(2,	'File Detail BCP',	'file-detail-bcp',	'file_export',	'{\"file_detail_bcp\": {\"type\": \"detail\", \"content\": [{\"name\": \"Tipo de Registro\", \"align\": \"center\", \"length\": 1, \"default\": 2, \"position\": 1, \"description\": \"Para identificar el registro de detalle se deberá utilizar valor fijo 2\", \"format_date\": \"\"}, {\"name\": \"Número de cuenta de abono\", \"align\": \"left\", \"length\": 20, \"default\": \"1910695055056\", \"position\": 2, \"description\": \"Formato: SSSCCCCCCCCMDD\", \"format_date\": \"\"}, {\"name\": \"Tipo de documento del empleado\", \"align\": \"center\", \"length\": 1, \"position\": 22, \"description\": \"Tipo de documento\", \"format_date\": \"\"}, {\"name\": \"Número de documento del empleado\", \"align\": \"left\", \"length\": 12, \"position\": 23, \"description\": \"Número de documento del empleado\", \"format_date\": \"\"}, {\"name\": \"Correlativo de documento\", \"align\": \"left\", \"length\": 3, \"position\": 35, \"description\": \"\", \"format_date\": \"\"}, {\"name\": \"Nombre del trabajador\", \"align\": \"rigth\", \"length\": 75, \"position\": 38, \"description\": \"\", \"format_date\": \"\"}, {\"name\": \"Referencia para el beneficiario\", \"align\": \"center\", \"length\": 40, \"position\": 113, \"description\": \"\", \"format_date\": \"\"}, {\"name\": \"Referencia para la empresa\", \"align\": \"left\", \"length\": 20, \"position\": 153, \"description\": \"\", \"format_date\": \"\"}, {\"name\": \"Moneda del importe a abonar\", \"align\": \"rigth\", \"length\": 4, \"default\": \"0001\", \"position\": 173, \"description\": \"Moneda del importe a abonar\", \"format_date\": \"\"}, {\"name\": \"Importe a abonar\", \"align\": \"left\", \"length\": 17, \"position\": 177, \"description\": \"\", \"format_date\": \"\", \"format_currency\": \".00\"}]}}',	'2017-11-23 03:16:00',	NULL),
(3,	'DNI',	'dni',	'document_type',	'{\"number_length\": 8}',	'2017-12-02 20:30:30',	NULL),
(4,	'CARNET DE EXTRANJERIA',	'carnet-de-extranjeria',	'document_type',	'{\"number_length\": 10}',	'2017-12-02 20:30:43',	NULL),
(5,	'PASAPORTE',	'pasaporte',	'document_type',	'{\"number_length\": 10}',	'2017-12-02 20:30:49',	NULL),
(6,	'pagado',	'pagado',	'state_payment',	'{}',	'2017-12-02 21:14:09',	NULL),
(7,	'provisionado',	'provisionado',	'state_payment',	'{}',	'2017-12-02 21:14:29',	NULL),
(8,	'soles',	'soles',	'money_type',	'{}',	'2017-12-05 02:53:09',	NULL),
(9,	'dólares',	'dólares',	'money_type',	'{}',	'2017-12-05 02:53:45',	NULL),
(10,	'pendiente',	'pendiente',	'order_state_type',	'{}',	'2018-01-06 21:00:12',	NULL),
(11,	'comprado',	'comprado',	'order_state_type',	'{}',	'2018-01-06 21:00:12',	NULL),
(12,	'anulado',	'anulado',	'order_state_type',	'{}',	'2018-01-06 21:00:12',	NULL),
(13,	'Registrado',	'registrado',	'document_state_type',	'{}',	'2018-01-11 03:45:56',	NULL),
(14,	'Anulado',	'anulado',	'document_state_type',	'{}',	'2018-01-11 03:46:19',	NULL),
(15,	'DESTINOS MUNDIALES',	'DESTINOS_MUNDIALES',	'travel_operator',	'',	'2018-03-16 21:15:53',	NULL),
(16,	'CIC',	'CIC',	'travel_operator',	'',	'2018-03-16 21:16:25',	NULL),
(17,	'BEDS ONLINE',	'BEDS_ONLINE',	'travel_operator',	'',	'2018-03-16 21:16:55',	NULL),
(18,	'AG CORP',	'AG_CORP',	'travel_operator',	'',	'2018-03-16 21:17:47',	NULL),
(19,	'AG CORP',	'AG_CORP',	'travel_operator',	'',	'2018-03-16 21:24:19',	NULL),
(20,	'INTERAGENCIAS',	'INTERAGENCIAS',	'travel_operator',	'',	'2018-03-16 21:24:53',	NULL);

DROP TABLE IF EXISTS `ospos_customers`;
CREATE TABLE `ospos_customers` (
  `person_id` int(10) NOT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `taxable` int(1) NOT NULL DEFAULT '1',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `data` text,
  `data_customer` text,
  UNIQUE KEY `account_number` (`account_number`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `ospos_customers_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `ospos_people` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_customers` (`person_id`, `account_number`, `taxable`, `deleted`, `data`, `data_customer`) VALUES
(2,	NULL,	1,	1,	NULL,	NULL),
(12345678,	NULL,	1,	1,	NULL,	NULL),
(87654321,	NULL,	1,	0,	NULL,	NULL),
(43215678,	NULL,	1,	1,	NULL,	NULL),
(87654346,	NULL,	0,	1,	NULL,	NULL),
(48227010,	NULL,	1,	0,	NULL,	NULL),
(48227019,	NULL,	1,	0,	NULL,	'{\"travel_detail\":{\"window_travel_detail\":\"bbbbbbb\",\"pas_travel_detail\":\"dssdssdq\",\"mill_travel_detail\":\"sdssdds\",\"visa_travel_detail\":\"ssdsdsd\",\"vacuna_travel_detail\":\"sdsdssdsd\"}}'),
(48227020,	NULL,	1,	0,	NULL,	NULL),
(2147483647,	NULL,	1,	0,	'[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"12123343444\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"2019-12-01\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]',	'{\"travel_detail\":{\"window_travel_detail\":\"asasas\",\"pas_travel_detail\":\"asasasa\",\"mill_travel_detail\":\"saasassa\",\"visa_travel_detail\":\"saassa\",\"vacuna_travel_detail\":\"saassaas\"}}'),
(23242526,	NULL,	0,	0,	'0',	NULL),
(33343536,	NULL,	0,	0,	'0',	NULL),
(44454647,	NULL,	0,	0,	'0',	NULL),
(54555657,	NULL,	0,	0,	'0',	'{\"customer_info\":{\"passport\":\"12231323113\",\"date_expire\":\"2020-12-12\"}}');

DROP TABLE IF EXISTS `ospos_customer_travel`;
CREATE TABLE `ospos_customer_travel` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `travel_id` int(11) NOT NULL,
  `data` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_CUSTOMER` (`customer_id`),
  KEY `FK_TRAVEL` (`travel_id`),
  CONSTRAINT `FK_CUSTOMER` FOREIGN KEY (`customer_id`) REFERENCES `ospos_customers` (`person_id`),
  CONSTRAINT `FK_TRAVEL` FOREIGN KEY (`travel_id`) REFERENCES `ospos_travel` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `ospos_design`;
CREATE TABLE `ospos_design` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ospos_design` (`id`, `name`, `description`, `price`, `state`, `created_at`, `stock`) VALUES
(1,	'prueba',	'prueba',	223.50,	1,	'2017-06-18',	20);

DROP TABLE IF EXISTS `ospos_employees`;
CREATE TABLE `ospos_employees` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `person_id` int(10) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `username` (`username`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `ospos_employees_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `ospos_people` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_employees` (`username`, `password`, `person_id`, `deleted`) VALUES
('admin',	'81dc9bdb52d04dc20036dbd8313ed055',	1,	0),
('johanC',	'e10adc3949ba59abbe56e057f20f883e',	87654324,	0);

DROP TABLE IF EXISTS `ospos_gallery`;
CREATE TABLE `ospos_gallery` (
  `gallery_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ospos_gallery';

INSERT INTO `ospos_gallery` (`gallery_id`, `title`, `url`, `status`) VALUES
(NULL,	NULL,	'',	1),
(NULL,	NULL,	'',	1),
(NULL,	NULL,	'',	1),
(NULL,	NULL,	'',	1),
(NULL,	NULL,	'',	1),
(NULL,	NULL,	'',	1),
(NULL,	NULL,	'',	1);

DROP TABLE IF EXISTS `ospos_giftcards`;
CREATE TABLE `ospos_giftcards` (
  `giftcard_id` int(11) NOT NULL AUTO_INCREMENT,
  `giftcard_number` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `value` decimal(15,2) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`giftcard_id`),
  UNIQUE KEY `giftcard_number` (`giftcard_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `ospos_inventory`;
CREATE TABLE `ospos_inventory` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_items` int(11) NOT NULL DEFAULT '0',
  `trans_user` int(11) NOT NULL DEFAULT '0',
  `trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trans_comment` text NOT NULL,
  `trans_inventory` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`trans_id`),
  KEY `ospos_inventory_ibfk_1` (`trans_items`),
  KEY `ospos_inventory_ibfk_2` (`trans_user`),
  CONSTRAINT `ospos_inventory_ibfk_1` FOREIGN KEY (`trans_items`) REFERENCES `ospos_items` (`item_id`),
  CONSTRAINT `ospos_inventory_ibfk_2` FOREIGN KEY (`trans_user`) REFERENCES `ospos_employees` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_inventory` (`trans_id`, `trans_items`, `trans_user`, `trans_date`, `trans_comment`, `trans_inventory`) VALUES
(1,	1,	1,	'2014-08-15 00:45:13',	'Edición Manual de Cantidad',	10),
(2,	1,	1,	'2014-08-15 00:46:08',	'POS 1',	-1),
(3,	2,	1,	'2014-08-15 14:50:24',	'Qty CSV Imported',	10),
(4,	3,	1,	'2014-08-15 14:50:24',	'Qty CSV Imported',	10),
(5,	4,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(6,	5,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(7,	6,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(8,	7,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(9,	8,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(10,	9,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(11,	10,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(12,	11,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(13,	12,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(14,	13,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(15,	14,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(16,	15,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(17,	16,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(18,	17,	1,	'2014-08-15 14:50:25',	'Qty CSV Imported',	10),
(19,	18,	1,	'2014-08-15 14:50:26',	'Qty CSV Imported',	10),
(20,	19,	1,	'2014-08-15 14:50:26',	'Qty CSV Imported',	10),
(21,	20,	1,	'2014-08-15 14:50:26',	'Qty CSV Imported',	10),
(22,	21,	1,	'2014-08-15 14:50:26',	'Qty CSV Imported',	10),
(23,	22,	1,	'2014-08-15 14:50:26',	'Qty CSV Imported',	10),
(24,	23,	1,	'2014-08-15 14:50:26',	'Qty CSV Imported',	10),
(25,	24,	1,	'2014-08-15 14:50:26',	'Qty CSV Imported',	10),
(26,	3,	1,	'2014-08-15 14:52:34',	'POS 2',	-5),
(27,	7,	1,	'2014-08-15 14:52:34',	'POS 2',	-1),
(28,	1,	1,	'2014-08-18 14:08:16',	'Edición Manual de Cantidad',	-7),
(29,	1,	1,	'2014-08-18 14:08:44',	'Edición Manual de Cantidad',	8),
(30,	1,	1,	'2014-08-18 14:09:08',	'Edición Manual de Cantidad',	-5),
(31,	25,	1,	'2014-08-18 14:13:25',	'Qty CSV Imported',	10),
(32,	26,	1,	'2014-08-18 14:13:25',	'Qty CSV Imported',	10),
(33,	27,	1,	'2014-08-18 14:13:25',	'Qty CSV Imported',	10),
(34,	28,	1,	'2014-08-18 14:13:25',	'Qty CSV Imported',	10),
(35,	29,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(36,	30,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(37,	31,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(38,	32,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(39,	33,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(40,	34,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(41,	35,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(42,	36,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(43,	37,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(44,	38,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(45,	39,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(46,	40,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(47,	41,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(48,	42,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(49,	43,	1,	'2014-08-18 14:13:26',	'Qty CSV Imported',	10),
(50,	25,	1,	'2014-08-18 14:14:53',	'Edición Manual de Cantidad',	0),
(51,	25,	1,	'2014-08-18 14:15:14',	'Edición Manual de Cantidad',	-9),
(52,	3,	1,	'2014-08-18 14:22:57',	'POS 3',	-5),
(53,	8,	1,	'2014-08-18 14:22:57',	'POS 3',	-2),
(54,	29,	1,	'2014-08-18 14:23:40',	'POS 4',	-1),
(55,	33,	1,	'2014-08-18 14:24:31',	'POS 5',	-1),
(56,	26,	1,	'2014-08-18 14:27:46',	'POS 6',	-1),
(57,	32,	1,	'2014-08-18 14:27:46',	'POS 6',	-2),
(58,	30,	1,	'2014-08-18 14:33:14',	'POS 7',	-1),
(59,	28,	1,	'2014-12-04 13:45:07',	'POS 8',	-1),
(60,	25,	1,	'2016-07-29 17:29:14',	'Edición Manual de Cantidad',	0),
(61,	26,	1,	'2016-07-29 17:36:20',	'Edición Manual de Cantidad',	0),
(62,	25,	1,	'2016-07-29 19:42:01',	'Edición Manual de Cantidad',	0),
(63,	44,	1,	'2016-07-29 19:43:48',	'Edición Manual de Cantidad',	10),
(64,	45,	1,	'2016-07-29 19:44:28',	'Edición Manual de Cantidad',	20),
(65,	44,	1,	'2016-07-29 19:55:11',	'RECV 1',	20),
(66,	44,	1,	'2016-07-29 19:56:52',	'POS 9',	-3),
(67,	44,	87654324,	'2017-01-08 20:49:35',	'Error de inventario',	20),
(68,	44,	87654324,	'2017-01-08 20:49:39',	'Error de inventario',	20),
(69,	44,	87654324,	'2017-01-08 20:49:58',	'Error',	-20),
(70,	44,	87654324,	'2017-01-08 20:50:14',	'Error',	-20),
(71,	44,	87654324,	'2017-01-08 21:04:14',	'Error',	1),
(72,	44,	87654324,	'2017-01-08 21:04:22',	'Edición Manual de Cantidad',	0),
(73,	46,	1,	'2017-01-18 03:21:38',	'Edición Manual de Cantidad',	50),
(74,	46,	1,	'2017-01-18 03:23:08',	'Edición Manual de Cantidad',	0),
(75,	27,	1,	'2017-02-02 15:12:50',	'POS 10',	-1),
(76,	47,	1,	'2017-04-13 21:19:34',	'Edición Manual de Cantidad',	12),
(77,	48,	1,	'2017-04-13 22:04:36',	'Edición Manual de Cantidad',	12),
(78,	49,	1,	'2017-04-13 22:12:16',	'Edición Manual de Cantidad',	23),
(79,	50,	1,	'2017-04-13 22:22:40',	'Edición Manual de Cantidad',	23),
(80,	50,	1,	'2017-04-13 22:28:30',	'POS 11',	-2),
(81,	49,	1,	'2017-04-13 22:30:35',	'POS 12',	-1),
(82,	46,	1,	'2017-04-14 22:18:33',	'',	0),
(83,	29,	1,	'2017-04-14 22:18:42',	'',	0),
(84,	27,	1,	'2017-04-14 22:22:18',	'ASSSSSSSSSSSSSSS',	23),
(85,	47,	1,	'2017-04-14 22:23:47',	'ssssssssssssss',	343),
(86,	27,	1,	'2017-04-14 22:24:46',	'SAAAAAAAAA',	23),
(87,	46,	1,	'2017-04-14 22:25:06',	'ASSSSSS',	20),
(88,	46,	1,	'2017-04-14 22:26:27',	'2',	2),
(89,	46,	1,	'2017-04-14 22:28:56',	'2',	2),
(90,	46,	1,	'2017-04-14 22:29:25',	'2',	2),
(91,	51,	1,	'2017-04-14 22:40:26',	'Edición Manual de Cantidad',	23),
(92,	52,	1,	'2017-04-14 22:42:09',	'Edición Manual de Cantidad',	23),
(93,	46,	1,	'2017-04-14 22:46:54',	'Edición Manual de Cantidad',	0),
(94,	28,	1,	'2017-04-14 22:48:19',	'Edición Manual de Cantidad',	0),
(95,	54,	1,	'2017-08-19 18:39:34',	'Edición Manual de Cantidad',	12),
(96,	57,	1,	'2017-08-19 18:43:17',	'Edición Manual de Cantidad',	12),
(97,	60,	1,	'2017-08-19 18:51:29',	'Edición Manual de Cantidad',	23),
(98,	48,	1,	'2017-08-19 18:56:33',	'RECV 2',	12),
(99,	51,	87654324,	'2017-08-19 21:58:55',	'Edición Manual de Cantidad',	0),
(100,	61,	1,	'2018-01-25 04:31:24',	'Edición Manual de Cantidad',	12),
(101,	61,	1,	'2018-01-25 04:51:00',	'Edición Manual de Cantidad',	0),
(102,	62,	1,	'2018-02-12 01:16:47',	'Edición Manual de Cantidad',	12);

DROP TABLE IF EXISTS `ospos_items`;
CREATE TABLE `ospos_items` (
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `item_number` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cost_price` decimal(15,2) NOT NULL,
  `unit_price` decimal(15,2) NOT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT '0.00',
  `reorder_level` decimal(15,2) NOT NULL DEFAULT '0.00',
  `location` varchar(255) DEFAULT NULL,
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `allow_alt_description` tinyint(1) NOT NULL,
  `is_serialized` tinyint(1) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `custom1` varchar(25) NOT NULL,
  `custom2` varchar(25) NOT NULL,
  `custom3` varchar(25) NOT NULL,
  `custom4` varchar(25) NOT NULL,
  `custom5` varchar(25) NOT NULL,
  `custom6` varchar(25) NOT NULL,
  `custom7` varchar(25) NOT NULL,
  `custom8` varchar(25) NOT NULL,
  `custom9` varchar(25) NOT NULL,
  `custom10` varchar(25) NOT NULL,
  `data_items` text,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `item_number` (`item_number`),
  KEY `ospos_items_ibfk_1` (`supplier_id`),
  CONSTRAINT `ospos_items_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `ospos_suppliers` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_items` (`name`, `category`, `supplier_id`, `item_number`, `description`, `cost_price`, `unit_price`, `quantity`, `reorder_level`, `location`, `item_id`, `allow_alt_description`, `is_serialized`, `deleted`, `custom1`, `custom2`, `custom3`, `custom4`, `custom5`, `custom6`, `custom7`, `custom8`, `custom9`, `custom10`, `data_items`) VALUES
('Articulo 01',	'Golosinas',	NULL,	NULL,	'',	20.00,	20.00,	5.00,	2.00,	'',	1,	0,	0,	1,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('Producto 01',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	2,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 02',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	0.00,	0.00,	'',	3,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 03',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	4,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 04',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	5,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 05',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	6,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 06',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	9.00,	0.00,	'',	7,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 07',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	8.00,	0.00,	'',	8,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 08',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	9,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 09',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	10,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 10',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	11,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 11',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	12,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 12',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	13,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 13',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	14,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 14',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	15,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 15',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	16,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 16',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	17,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 17',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	18,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 18',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	19,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 19',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	20,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 20',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	21,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 21',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	22,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 22',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	23,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 23',	'Golosinas',	NULL,	NULL,	'',	10.00,	12.00,	10.00,	0.00,	'',	24,	0,	0,	1,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto_01',	'Golosinas',	NULL,	'Producto_01',	'Producto_01',	10.00,	12.00,	1.00,	2.00,	'2',	25,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('Producto_02',	'Golosinas',	NULL,	'Producto_02',	'Producto_02',	10.00,	12.00,	9.00,	2.00,	'Producto_02',	26,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('Producto 03',	'Golosinas',	NULL,	'p-003',	'',	10.00,	12.00,	55.00,	2.00,	'',	27,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 04',	'Golosinas',	87654323,	'p-004',	'ASSSSSSSSSSS',	10.00,	12.00,	9.00,	2.00,	'3',	28,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('Producto 05',	'Golosinas',	NULL,	'p-005',	'',	10.00,	12.00,	9.00,	2.00,	'',	29,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 06',	'Golosinas',	NULL,	'p-006',	'',	10.00,	12.00,	9.00,	2.00,	'',	30,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 07',	'Golosinas',	NULL,	'p-007',	'',	10.00,	12.00,	10.00,	2.00,	'',	31,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 08',	'Golosinas',	NULL,	'p-008',	'',	10.00,	12.00,	8.00,	2.00,	'',	32,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 09',	'Golosinas',	NULL,	'p-009',	'',	10.00,	12.00,	9.00,	2.00,	'',	33,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 10',	'Golosinas',	NULL,	'p-010',	'',	10.00,	12.00,	10.00,	2.00,	'',	34,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 11',	'Golosinas',	NULL,	'p-011',	'',	10.00,	12.00,	10.00,	2.00,	'',	35,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 12',	'Golosinas',	NULL,	'p-012',	'',	10.00,	12.00,	10.00,	2.00,	'',	36,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 13',	'Golosinas',	NULL,	'p-013',	'',	10.00,	12.00,	10.00,	2.00,	'',	37,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 14',	'Golosinas',	NULL,	'p-014',	'',	10.00,	12.00,	10.00,	2.00,	'',	38,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 15',	'Golosinas',	NULL,	'p-015',	'',	10.00,	12.00,	10.00,	2.00,	'',	39,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 16',	'Golosinas',	NULL,	'p-016',	'',	10.00,	12.00,	10.00,	2.00,	'',	40,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 17',	'Golosinas',	NULL,	'p-017',	'',	10.00,	12.00,	10.00,	2.00,	'',	41,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 18',	'Golosinas',	NULL,	'p-018',	'',	10.00,	12.00,	10.00,	2.00,	'',	42,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('Producto 19',	'Golosinas',	NULL,	'p-019',	'',	10.00,	12.00,	10.00,	2.00,	'',	43,	0,	0,	0,	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	NULL),
('CARTELES',	'CARTELES',	NULL,	'CARTELES',	'CARTELES',	200.00,	250.00,	28.00,	2.00,	'3',	44,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('PRUEBA',	'PRUEBA',	NULL,	'PRUEBA',	'PRUEBA',	10.00,	15.00,	20.00,	2.00,	'1',	45,	0,	0,	1,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('PAPELES LA ROSA',	'CARTELES',	87654323,	'23',	'Papeles la Rosa',	23.00,	0.50,	76.00,	10.00,	'3',	46,	1,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('ASASA',	'ZAPATILLAS',	87654322,	'QWQW',	'ZAPATILLAS JANOSKI',	12.00,	12.00,	355.00,	23.00,	'3',	47,	1,	1,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('ZAPATILLAS NIKE',	'ZAPATILLAS',	87654322,	'ZAP-NIKE',	'asaas',	23.00,	250.00,	24.00,	121.00,	'asasa',	48,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('DC WES KREMER',	'ZAPATILLAS',	87654322,	'ZAP-DC',	'aaaaaaaaaaa',	200.00,	250.00,	22.00,	2.00,	'3',	49,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('CONVERSE',	'ZAPATILLAS',	87654322,	'ZAP-CONVERSE',	'qqqqqqqqqqqq',	200.00,	250.00,	21.00,	2.00,	'2',	50,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('AAAAAAAAAAAA',	'ZAPATILLAS',	87654322,	'p-0001221',	'ASSSSSSS',	200.00,	250.00,	23.00,	2.00,	'3',	51,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('AQUI NOMAS',	'ZAPATILLAS',	87654322,	'P-002323332',	'AQUI NOMAS',	200.00,	250.00,	23.00,	2.00,	'3',	52,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('Carteras',	'accesorios',	87654322,	'123456789',	'CARTERA DE MESA',	200.00,	250.00,	12.00,	2.00,	'3',	54,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('Carteras',	'accesorios',	87654322,	'1234567891234567',	'CARTERA DE MESA',	200.00,	250.00,	12.00,	2.00,	'3',	57,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('DC WES KREMER',	'ZAPATILLAS',	87654323,	NULL,	'1111111111111111111111111111',	200.00,	250.00,	23.00,	2.00,	'3',	60,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	NULL),
('LAPICES',	'LAPICES',	NULL,	'123455555',	'LAPICES',	23.00,	25.00,	12.00,	10.00,	'LAPICES',	61,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'[{\"idObj\":\"cbo_property_1\",\"id\":\"3\",\"name\":\"pijama 2\",\"type\":\"select\",\"parent\":1}]'),
('TEST_ITEM',	'CARTELES',	NULL,	'12345678',	'TEST_ITEM',	12.00,	12.00,	12.00,	12.00,	'TEST_ITEM',	62,	0,	0,	0,	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'[{\"idObj\":\"cbo_property_1\",\"id\":\"2\",\"name\":\"Talla S\",\"type\":\"select\",\"parent\":1}]');

DROP TABLE IF EXISTS `ospos_items_gallery`;
CREATE TABLE `ospos_items_gallery` (
  `item_id` int(11) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `creafecha` datetime DEFAULT NULL,
  `creapor` varchar(20) DEFAULT NULL,
  `modifecha` datetime DEFAULT NULL,
  `modipor` varchar(20) DEFAULT NULL,
  KEY `FK_ITEM_ID` (`item_id`),
  CONSTRAINT `FK_ITEM_ID` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ospos_items_gallery';


DROP TABLE IF EXISTS `ospos_items_taxes`;
CREATE TABLE `ospos_items_taxes` (
  `item_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percent` decimal(15,2) NOT NULL,
  PRIMARY KEY (`item_id`,`name`,`percent`),
  CONSTRAINT `ospos_items_taxes_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_items_taxes` (`item_id`, `name`, `percent`) VALUES
(25,	'Impuesto de Ventas 1',	0.00),
(25,	'Impuesto de Ventas 2',	0.00),
(26,	'Impuesto de Ventas 1',	0.00),
(26,	'Impuesto de Ventas 2',	0.00),
(28,	'Impuesto de Ventas 1',	0.00),
(28,	'Impuesto de Ventas 2',	0.00),
(44,	'Impuesto de Ventas 1',	0.00),
(44,	'Impuesto de Ventas 2',	0.00),
(45,	'Impuesto de Ventas 1',	0.00),
(45,	'Impuesto de Ventas 2',	0.00),
(46,	'Impuesto de Ventas 1',	0.00),
(46,	'Impuesto de Ventas 2',	0.00),
(47,	'Impuesto de Ventas 1',	1.00),
(47,	'Impuesto de Ventas 2',	2.00),
(48,	'Impuesto de Ventas 1',	0.00),
(48,	'Impuesto de Ventas 2',	0.00),
(49,	'Impuesto de Ventas 1',	0.00),
(49,	'Impuesto de Ventas 2',	0.00),
(50,	'Impuesto de Ventas 1',	0.00),
(50,	'Impuesto de Ventas 2',	0.00),
(52,	'Impuesto de Ventas 1',	0.00),
(52,	'Impuesto de Ventas 2',	0.00),
(62,	'Impuesto de Ventas 1',	12.00),
(62,	'Impuesto de Ventas 2',	0.00);

DROP TABLE IF EXISTS `ospos_item_kits`;
CREATE TABLE `ospos_item_kits` (
  `item_kit_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`item_kit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_item_kits` (`item_kit_id`, `name`, `description`) VALUES
(1,	'ZAPATILLAs',	'PROMOCIÓN DE ZAPATILLAS'),
(2,	'CARTELES',	'CARTELES'),
(5,	'CONVERSE',	'CONVERSE'),
(6,	'PAPELES DE MUESTRA',	'PAPELES DE MUESTRA'),
(7,	'CONVERSE',	'sdddddddddddd'),
(13,	'WES KREMER',	'WES KREMER'),
(16,	'ZAPATILLAS CONVERSE',	'ZAPATILLAS CONVERSE'),
(17,	'DULCES DE MESA',	'DULCES DE MESA'),
(18,	'DULCES DE MESA',	'DULCES DE MESA'),
(29,	'ZAPATILLAS',	'PROMOCION DE ZAPATILLAS'),
(30,	'sdasas',	'qeqqqqqe'),
(31,	'bbb',	'bbbbbbb');

DROP TABLE IF EXISTS `ospos_item_kit_items`;
CREATE TABLE `ospos_item_kit_items` (
  `item_kit_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  PRIMARY KEY (`item_kit_id`,`item_id`,`quantity`),
  KEY `ospos_item_kit_items_ibfk_2` (`item_id`),
  CONSTRAINT `ospos_item_kit_items_ibfk_1` FOREIGN KEY (`item_kit_id`) REFERENCES `ospos_item_kits` (`item_kit_id`) ON DELETE CASCADE,
  CONSTRAINT `ospos_item_kit_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_item_kit_items` (`item_kit_id`, `item_id`, `quantity`) VALUES
(17,	29,	1.00),
(18,	29,	1.00),
(16,	30,	1.00),
(17,	30,	1.00),
(18,	30,	1.00),
(2,	44,	1.00),
(6,	46,	1.00),
(29,	48,	1.00),
(1,	49,	25.00),
(13,	49,	1.00),
(29,	49,	1.00),
(1,	50,	25.00),
(5,	50,	2.00),
(7,	50,	1.00),
(29,	50,	1.00),
(30,	51,	1.00),
(31,	52,	1.00);

DROP TABLE IF EXISTS `ospos_modules`;
CREATE TABLE `ospos_modules` (
  `name_lang_key` varchar(255) NOT NULL,
  `desc_lang_key` varchar(255) NOT NULL,
  `sort` int(10) NOT NULL,
  `module_id` varchar(255) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `decription` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`module_id`),
  UNIQUE KEY `desc_lang_key` (`desc_lang_key`),
  UNIQUE KEY `name_lang_key` (`name_lang_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_modules` (`name_lang_key`, `desc_lang_key`, `sort`, `module_id`, `name`, `decription`) VALUES
('module_config',	'module_config_desc',	100,	'config',	'Configuración',	'Cambiar la configuración de la tienda'),
('module_customers',	'module_customers_desc',	10,	'customers',	'Clientes',	'Agregar, Actualizar, Borrar y Buscar clientes'),
('module_design',	'module_design_desc',	110,	'designs',	'Diseño',	'Agregar, Actualizar diseños'),
('module_employees',	'module_employees_desc',	80,	'employees',	'Empleados',	'Agregar, Actualizar, Borrar y Buscar empleados'),
('module_giftcards',	'module_giftcards_desc',	90,	'giftcards',	'Tarjetas de Regalo',	'Agregar, Actualizar, Borrar y Buscar Tarjetas de Regalo'),
('module_items',	'module_items_desc',	20,	'items',	'Artículos',	'Agregar, Actualizar, Borrar y Buscar artículos'),
('module_item_kits',	'module_item_kits_desc',	30,	'item_kits',	'Kits de Artículos',	'Agregar, Actualizar, Borrar y Buscar Kits de Artículos'),
('module_receivings',	'module_receivings_desc',	60,	'receivings',	'Compras',	'Procesar órdenes de compra'),
('module_reports',	'module_reports_desc',	50,	'reports',	'Reportes',	'Ver y generar reportes'),
('module_sales',	'module_sales_desc',	70,	'sales',	'Ventas',	'Procesar ventas y devoluciones'),
('module_suppliers',	'module_suppliers_desc',	40,	'suppliers',	'Proveedores',	'Agregar, Actualizar, Borrar y Buscar proveedores'),
('module_travel',	'module_travel_desc',	120,	'travel',	'Viajes',	'Generar Viajes');

DROP TABLE IF EXISTS `ospos_people`;
CREATE TABLE `ospos_people` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `comments` text,
  `person_id` int(10) NOT NULL AUTO_INCREMENT,
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_people` (`first_name`, `last_name`, `phone_number`, `email`, `address_1`, `address_2`, `city`, `state`, `zip`, `country`, `comments`, `person_id`, `birthdate`) VALUES
('Julio Cesar',	'Llavilla',	'943973537',	'llavillaccama@gmail.com',	'Lima - Peru',	'',	'',	'',	'01',	'',	'',	1,	NULL),
('',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	2,	NULL),
('JOHAN ANTONIO',	'CAÑARI HUAMANI',	'5709327',	'johins2x@gmail.com',	'VILLA EL SALVADOR',	'VILLA EL SALVADOR',	'LIMA',	'LIMA',	'',	'PERU',	'NUEVO CLIENTE',	12345678,	NULL),
('ROSA',	'HUAMANI CHOQUE',	'1234567',	'rosa@gmail.com',	'SC. 10 GRP. 3 MZ. J LT. 15',	'0',	'0',	'0',	'0',	'0',	'0',	23242526,	'0000-00-00'),
('CARLOS',	'SALDARRIAGA',	'1234567',	'carlos@gmail.com',	'VILLA MARIA DEL TRIUNFO',	'0',	'0',	'0',	'0',	'0',	'0',	33343536,	'0000-00-00'),
('BORRAR',	'BORRAR',	'1234567',	'BORRAR',	'VILLA EL SALVADOR',	'VILLA EL SALVADOR',	'LIMA',	'LIMA',	'',	'PERU',	'NUEVO CLIENTE',	43215678,	NULL),
('SASUKE ',	'UCHIHA UCHIHA',	'1234567',	'sasuke@gmail.com',	'KONOHA              ',	'0',	'0',	'0',	'0',	'0',	'0',	44454647,	'0000-00-00'),
('aadsasddas',	'sddsdads',	'1234567',	'johan2x_69@hotmail.com',	'VILLA EL SALVADOR',	'',	'',	'',	'',	'',	'',	48227010,	NULL),
('Johan Antonio',	'Cañari Huamani',	'',	'johanc.cca@gmail.com',	'',	'',	'',	'',	'01',	'',	'',	48227019,	NULL),
('JUAN CARLOS',	'REYES REYES',	'',	'pelotero_tz89@hotmail.com',	'',	'',	'',	'',	'01',	'',	'',	48227020,	NULL),
('asasssaas',	'asaassa',	'1234567',	'pelotero_tz89@hotmail.com',	'              SDSDDDDDSD',	'0',	'0',	'0',	'0',	'0',	'0',	54555657,	'0000-00-00'),
('JOEL YENER',	'ESPINOZA HUAMANI',	'1234567',	'canari_343@hotmail.com',	'VILLA EL SALVADOR',	'VILLA EL SALVADOR',	'LIMA',	'',	'',	'PERU',	'NUEVO CLIENTE',	87654321,	NULL),
('JOHAN ANTONIO',	'CAÑARI HUAMANI',	'1234567',	'johan2x_69@hotmail.com',	'VILLA EL SALVADOR',	'VILLA EL SALVADOR',	'LIMA',	'LIMA',	'',	'PERU',	'NUEVO PROVEEDORR',	87654322,	NULL),
('JOEL YENER',	'ESPINOZA HUAMANI',	'1234567',	'johins2x@gmail.com',	'VILLA EL SALVADOR',	'VILLA EL SALVADOR',	'LIMA',	'LIMA',	'',	'PERU',	'NUEVO PROVEEDOR',	87654323,	NULL),
('JOHAN',	'CAÑARI HUAMANI',	'1234567',	'johan2x_69@hotmail.com',	'VILLA EL SALVADOR',	'VILLA EL SALVADOR',	'LIMA',	'LIMA',	'',	'PERU',	'NUEVO EMPLEADO',	87654324,	NULL),
('JOHAN',	'CAÑARI HUAMANI',	'1234567',	'johan2x_69@hotmail.com',	'VILLA EL SALVADOR',	'VILLA EL SALVADOR',	'LIMA',	'LIMA',	'',	'',	'',	87654325,	NULL),
('JOHAN',	'CAÑARI HUAMANI',	'1234567',	'johan2x_69@hotmail.com',	'VILLA EL SALVADOR',	'VILLA EL SALVADOR',	'LIMA',	'LIMA',	'qwq',	'PERU',	'wqed1',	87654326,	NULL),
('JOHAN',	'CAÑARI HUAMANI',	'1234567',	'johan2x_69@hotmail.com',	'',	'',	'',	'',	'',	'',	'asddddddddddddddddd',	87654343,	NULL),
('JOHAN',	'CAÑARI HUAMANI',	'1234567',	'johan2x_69@hotmail.com',	'',	'',	'',	'',	'',	'',	'weeeeeeeeeeeeeeeeee',	87654344,	NULL),
('JOHAN',	'CAÑARI HUAMANI',	'1234567',	'johan2x_69@hotmail.com',	'',	'',	'',	'',	'',	'',	'qwwwwwwwwwwwwww',	87654345,	NULL),
('0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	'0',	87654346,	NULL),
('ssssss',	'sssssss',	'1234567',	'johan2x_69@hotmail.com',	'VILLA EL SALVADOR',	'',	'',	'',	'',	'',	'',	87654347,	NULL),
('Naruto',	'Uzumaki',	'1234567',	'naruto@gmail.com',	'',	'',	'',	'',	'01',	'',	'',	2147483647,	'0000-00-00');

DROP TABLE IF EXISTS `ospos_permissions`;
CREATE TABLE `ospos_permissions` (
  `module_id` varchar(255) NOT NULL,
  `person_id` int(10) NOT NULL,
  PRIMARY KEY (`module_id`,`person_id`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `ospos_permissions_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `ospos_employees` (`person_id`),
  CONSTRAINT `ospos_permissions_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `ospos_modules` (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_permissions` (`module_id`, `person_id`) VALUES
('config',	1),
('customers',	1),
('employees',	1),
('items',	1),
('item_kits',	1),
('receivings',	1),
('reports',	1),
('sales',	1),
('suppliers',	1),
('travel',	1),
('config',	87654324),
('customers',	87654324),
('employees',	87654324),
('items',	87654324),
('receivings',	87654324),
('reports',	87654324),
('sales',	87654324),
('suppliers',	87654324);

DROP TABLE IF EXISTS `ospos_property`;
CREATE TABLE `ospos_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(200) DEFAULT NULL,
  `module_id` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ospos_property` (`id`, `name`, `description`, `created_at`, `updated_at`, `parent_id`, `type`, `module_id`, `sort`) VALUES
(1,	'Tipos de Tallas',	'Tipos de Tallas',	'2018-01-23',	NULL,	0,	'select',	'items',	0),
(2,	'Talla S',	'Talla S',	'2018-01-23',	NULL,	1,	'select',	'items',	0),
(3,	'Talla M',	'Talla M',	'2018-01-23',	NULL,	1,	'select',	'items',	0),
(4,	'Talla L',	'Talla L',	'2018-01-24',	NULL,	1,	'select',	'items',	0),
(5,	'Fecha Expiración',	'Fecha Expiración',	'2018-02-24',	NULL,	0,	'date',	'customer',	2),
(6,	'Pasaporte',	'Pasaporte',	'2018-02-24',	NULL,	0,	'text',	'customer',	1),
(7,	'Ticket',	'Ticket',	'2018-03-11',	NULL,	0,	'text',	'travel',	0),
(8,	'Hotel',	'Hotel',	'2018-03-11',	NULL,	0,	'text',	'travel',	0),
(9,	'Auto',	'Auto',	'2018-03-11',	NULL,	0,	'text',	'travel',	0),
(10,	'Seguro',	'Seguro',	'2018-03-11',	NULL,	0,	'text',	'travel',	0),
(11,	'Paquete',	'Paquete',	'2018-03-11',	NULL,	0,	'text',	'travel',	0),
(12,	'Tours',	'Tours',	'2018-03-11',	NULL,	0,	'text',	'travel',	0),
(13,	'Crucero',	'Crucero',	'2018-03-11',	NULL,	0,	'text',	'travel',	0),
(14,	'Trenes',	'Trenes',	'2018-03-11',	NULL,	0,	'text',	'travel',	0),
(15,	'Entradas',	'Entradas',	'2018-03-11',	NULL,	0,	'text',	'travel',	0),
(16,	'Vacuna',	'Vacuna',	'2018-03-11',	NULL,	0,	'text',	'travel',	0),
(17,	'Otros',	'Otros',	'2018-03-11',	NULL,	0,	'text',	'travel',	0);

DROP TABLE IF EXISTS `ospos_receivings`;
CREATE TABLE `ospos_receivings` (
  `receiving_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `supplier_id` int(10) DEFAULT NULL,
  `employee_id` int(10) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `receiving_id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`receiving_id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `ospos_receivings_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `ospos_employees` (`person_id`),
  CONSTRAINT `ospos_receivings_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `ospos_suppliers` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_receivings` (`receiving_time`, `supplier_id`, `employee_id`, `comment`, `receiving_id`, `payment_type`) VALUES
('2016-07-29 19:55:11',	87654322,	1,	'COMPRA DE CARTELES',	1,	'Efectivo'),
('2017-08-19 18:56:33',	87654322,	1,	'PAGO POR ARTICULOS DE ZAPATILLAS.',	2,	'Efectivo');

DROP TABLE IF EXISTS `ospos_receivings_items`;
CREATE TABLE `ospos_receivings_items` (
  `receiving_id` int(10) NOT NULL DEFAULT '0',
  `item_id` int(10) NOT NULL DEFAULT '0',
  `description` varchar(30) DEFAULT NULL,
  `serialnumber` varchar(30) DEFAULT NULL,
  `line` int(3) NOT NULL,
  `quantity_purchased` decimal(15,2) NOT NULL DEFAULT '0.00',
  `item_cost_price` decimal(15,2) NOT NULL,
  `item_unit_price` decimal(15,2) NOT NULL,
  `discount_percent` decimal(15,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`receiving_id`,`item_id`,`line`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `ospos_receivings_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`),
  CONSTRAINT `ospos_receivings_items_ibfk_2` FOREIGN KEY (`receiving_id`) REFERENCES `ospos_receivings` (`receiving_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_receivings_items` (`receiving_id`, `item_id`, `description`, `serialnumber`, `line`, `quantity_purchased`, `item_cost_price`, `item_unit_price`, `discount_percent`) VALUES
(1,	44,	'CARTELES',	'0',	1,	20.00,	200.00,	200.00,	0.00),
(2,	48,	'asaas',	'0',	1,	12.00,	23.00,	23.00,	0.00);

DROP TABLE IF EXISTS `ospos_sales`;
CREATE TABLE `ospos_sales` (
  `sale_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(10) DEFAULT NULL,
  `employee_id` int(10) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `sale_id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `customer_id` (`customer_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `ospos_sales_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `ospos_employees` (`person_id`),
  CONSTRAINT `ospos_sales_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `ospos_customers` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_sales` (`sale_time`, `customer_id`, `employee_id`, `comment`, `sale_id`, `payment_type`) VALUES
('2014-08-15 00:46:08',	NULL,	1,	'',	1,	'Efectivo: $20.00<br />'),
('2014-08-15 14:52:34',	NULL,	1,	'',	2,	'Efectivo: S/.72.00<br />'),
('2014-08-18 14:22:57',	NULL,	1,	'0',	3,	'Efectivo: S/.83.76<br />'),
('2014-08-18 14:23:40',	NULL,	1,	'0',	4,	'Efectivo: S/.0.00<br />'),
('2014-08-18 14:24:31',	NULL,	1,	'',	5,	'Efectivo: S/.0.00<br />'),
('2014-08-18 14:27:46',	NULL,	1,	'0',	6,	'Efectivo: S/.36.00<br />'),
('2014-08-18 14:33:13',	NULL,	1,	'0',	7,	'Efectivo: S/.12.00<br />'),
('2014-12-04 13:45:07',	NULL,	1,	'0',	8,	'Efectivo: S/.62.00<br />'),
('2016-07-29 19:56:52',	12345678,	1,	'COMPRA DE CARTELES',	9,	'Efectivo: S/.750.00<br />'),
('2017-02-02 15:12:50',	12345678,	1,	'GRACIAS POR SU COMPRA',	10,	'Efectivo: S/.12.00<br />'),
('2017-04-13 22:28:30',	NULL,	1,	'0',	11,	'Efectivo: S/.500.00<br />'),
('2017-04-13 22:30:35',	87654321,	1,	'0',	12,	'Efectivo: S/.100.00<br />Tarjeta de Crédito: S/.150.00<br />');

DROP TABLE IF EXISTS `ospos_sales_items`;
CREATE TABLE `ospos_sales_items` (
  `sale_id` int(10) NOT NULL DEFAULT '0',
  `item_id` int(10) NOT NULL DEFAULT '0',
  `description` varchar(30) DEFAULT NULL,
  `serialnumber` varchar(30) DEFAULT NULL,
  `line` int(3) NOT NULL DEFAULT '0',
  `quantity_purchased` decimal(15,2) NOT NULL DEFAULT '0.00',
  `item_cost_price` decimal(15,2) NOT NULL,
  `item_unit_price` decimal(15,2) NOT NULL,
  `discount_percent` decimal(15,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`sale_id`,`item_id`,`line`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `ospos_sales_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`),
  CONSTRAINT `ospos_sales_items_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_sales_items` (`sale_id`, `item_id`, `description`, `serialnumber`, `line`, `quantity_purchased`, `item_cost_price`, `item_unit_price`, `discount_percent`) VALUES
(1,	1,	'',	'',	1,	1.00,	20.00,	20.00,	0.00),
(2,	3,	'',	'',	1,	5.00,	10.00,	12.00,	0.00),
(2,	7,	'',	'',	2,	1.00,	10.00,	12.00,	0.00),
(3,	3,	'',	'',	1,	5.00,	10.00,	12.00,	0.00),
(3,	8,	'0',	'0',	3,	2.00,	10.00,	12.00,	1.00),
(4,	29,	'',	'',	1,	1.00,	0.00,	0.00,	0.00),
(5,	33,	'',	'',	1,	1.00,	0.00,	0.00,	0.00),
(6,	26,	'',	'',	1,	1.00,	10.00,	12.00,	0.00),
(6,	32,	'0',	'0',	2,	2.00,	10.00,	12.00,	0.00),
(7,	30,	'',	'',	1,	1.00,	10.00,	12.00,	0.00),
(8,	28,	'',	'',	1,	1.00,	10.00,	12.00,	0.00),
(9,	44,	'0',	'0',	1,	3.00,	200.00,	250.00,	0.00),
(10,	27,	'',	'',	1,	1.00,	10.00,	12.00,	0.00),
(11,	50,	'0',	'0',	1,	2.00,	200.00,	250.00,	0.00),
(12,	49,	'aaaaaaaaaaa',	'',	1,	1.00,	200.00,	250.00,	0.00);

DROP TABLE IF EXISTS `ospos_sales_items_taxes`;
CREATE TABLE `ospos_sales_items_taxes` (
  `sale_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `line` int(3) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `percent` decimal(15,2) NOT NULL,
  PRIMARY KEY (`sale_id`,`item_id`,`line`,`name`,`percent`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `ospos_sales_items_taxes_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales_items` (`sale_id`),
  CONSTRAINT `ospos_sales_items_taxes_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_sales_items_taxes` (`sale_id`, `item_id`, `line`, `name`, `percent`) VALUES
(9,	44,	1,	'Impuesto de Ventas 1',	0.00),
(9,	44,	1,	'Impuesto de Ventas 2',	0.00),
(12,	49,	1,	'Impuesto de Ventas 1',	0.00),
(12,	49,	1,	'Impuesto de Ventas 2',	0.00),
(11,	50,	1,	'Impuesto de Ventas 1',	0.00),
(11,	50,	1,	'Impuesto de Ventas 2',	0.00);

DROP TABLE IF EXISTS `ospos_sales_payments`;
CREATE TABLE `ospos_sales_payments` (
  `sale_id` int(10) NOT NULL,
  `payment_type` varchar(40) NOT NULL,
  `payment_amount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`sale_id`,`payment_type`),
  CONSTRAINT `ospos_sales_payments_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_sales_payments` (`sale_id`, `payment_type`, `payment_amount`) VALUES
(1,	'Efectivo',	20.00),
(2,	'Efectivo',	72.00),
(3,	'Efectivo',	83.76),
(4,	'Efectivo',	0.00),
(5,	'Efectivo',	0.00),
(6,	'Efectivo',	36.00),
(7,	'Efectivo',	12.00),
(8,	'Efectivo',	62.00),
(9,	'Efectivo',	750.00),
(10,	'Efectivo',	12.00),
(11,	'Efectivo',	500.00),
(12,	'Efectivo',	100.00),
(12,	'Tarjeta de Crédito',	150.00);

DROP TABLE IF EXISTS `ospos_sales_suspended`;
CREATE TABLE `ospos_sales_suspended` (
  `sale_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(10) DEFAULT NULL,
  `employee_id` int(10) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `sale_id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `customer_id` (`customer_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `ospos_sales_suspended_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `ospos_employees` (`person_id`),
  CONSTRAINT `ospos_sales_suspended_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `ospos_customers` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_sales_suspended` (`sale_time`, `customer_id`, `employee_id`, `comment`, `sale_id`, `payment_type`) VALUES
('2017-04-13 22:27:40',	12345678,	1,	'',	1,	'Efectivo: S/.1100.00<br />');

DROP TABLE IF EXISTS `ospos_sales_suspended_items`;
CREATE TABLE `ospos_sales_suspended_items` (
  `sale_id` int(10) NOT NULL DEFAULT '0',
  `item_id` int(10) NOT NULL DEFAULT '0',
  `description` varchar(30) DEFAULT NULL,
  `serialnumber` varchar(30) DEFAULT NULL,
  `line` int(3) NOT NULL DEFAULT '0',
  `quantity_purchased` decimal(15,2) NOT NULL DEFAULT '0.00',
  `item_cost_price` decimal(15,2) NOT NULL,
  `item_unit_price` decimal(15,2) NOT NULL,
  `discount_percent` decimal(15,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`sale_id`,`item_id`,`line`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `ospos_sales_suspended_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`),
  CONSTRAINT `ospos_sales_suspended_items_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales_suspended` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_sales_suspended_items` (`sale_id`, `item_id`, `description`, `serialnumber`, `line`, `quantity_purchased`, `item_cost_price`, `item_unit_price`, `discount_percent`) VALUES
(1,	50,	'0',	'0',	1,	2.00,	200.00,	250.00,	0.00);

DROP TABLE IF EXISTS `ospos_sales_suspended_items_taxes`;
CREATE TABLE `ospos_sales_suspended_items_taxes` (
  `sale_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `line` int(3) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `percent` decimal(15,2) NOT NULL,
  PRIMARY KEY (`sale_id`,`item_id`,`line`,`name`,`percent`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `ospos_sales_suspended_items_taxes_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales_suspended_items` (`sale_id`),
  CONSTRAINT `ospos_sales_suspended_items_taxes_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_sales_suspended_items_taxes` (`sale_id`, `item_id`, `line`, `name`, `percent`) VALUES
(1,	50,	1,	'Impuesto de Ventas 1',	0.00),
(1,	50,	1,	'Impuesto de Ventas 2',	0.00);

DROP TABLE IF EXISTS `ospos_sales_suspended_payments`;
CREATE TABLE `ospos_sales_suspended_payments` (
  `sale_id` int(10) NOT NULL,
  `payment_type` varchar(40) NOT NULL,
  `payment_amount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`sale_id`,`payment_type`),
  CONSTRAINT `ospos_sales_suspended_payments_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales_suspended` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_sales_suspended_payments` (`sale_id`, `payment_type`, `payment_amount`) VALUES
(1,	'Efectivo',	1100.00);

DROP TABLE IF EXISTS `ospos_sessions`;
CREATE TABLE `ospos_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0a5e4049daf7d6566e324a68a40a3388',	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',	1495682670,	'a:1:{s:9:\"person_id\";s:1:\"1\";}'),
('0b5b9541101a036ff23caab7a3546adf',	'::1',	'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36',	1478573480,	''),
('15ab9e1151ebbaaf2783afe9138f772c',	'::1',	'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',	1492210626,	''),
('19ce0e45cffcfeb6b81e99c1a8eb1368',	'::1',	'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',	1492210294,	''),
('19db4993ef983e31fb78a08a4885e81d',	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36',	1519440294,	'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('47f048adabaf69140fad485708c7879d',	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36',	1519440207,	''),
('576270e7516e3702b6b4517ebb490a40',	'::1',	'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36',	1479002743,	'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('6df7d2963bc47529836fa211e109ba80',	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36',	1520913963,	'a:5:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:8:\"cartRecv\";a:0:{}s:9:\"recv_mode\";s:7:\"receive\";s:8:\"supplier\";i:-1;}'),
('774f9dc5cefc710f0b9647aa8b497cbd',	'127.0.0.1',	'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0',	1462669450,	''),
('7ce5560dad82b95c3280ec1fe0398518',	'127.0.0.1',	'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/64.0.3282.140 Chrome/64.0.3282.14',	1521231891,	'a:1:{s:9:\"person_id\";s:1:\"1\";}'),
('a20e5571b2e27679492d93672b953917',	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',	1497825027,	'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('b617719c875d994a0784478a0d31203b',	'::1',	'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36',	1479003997,	''),
('b97c0f067809cd5a8bc357001d6ad1ea',	'127.0.0.1',	'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/64.0.3282.167 Chrome/64.0.3282.16',	1521235796,	'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('bbb608959c6ebec75ec15c5af8cf82a6',	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36',	1500004670,	'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}'),
('c762de67a11225edd345578eed4e8403',	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36',	1504672037,	''),
('cd6b2496da61571fd7ee436397fbf917',	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36',	1519579378,	''),
('d2c31f820701e8458fcee87531001733',	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36',	1500349611,	''),
('ef9b5ce9c8b81a7e600e4d7b08943f79',	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36',	1520818375,	'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}');

DROP TABLE IF EXISTS `ospos_suppliers`;
CREATE TABLE `ospos_suppliers` (
  `person_id` int(10) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `account_number` (`account_number`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `ospos_suppliers_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `ospos_people` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ospos_suppliers` (`person_id`, `company_name`, `account_number`, `deleted`) VALUES
(87654322,	'OCEO S.A.C',	NULL,	0),
(87654323,	'DETODO',	NULL,	0),
(87654325,	'SAP TECNO',	NULL,	1),
(87654326,	'SAP TECNO',	'12345678',	1),
(87654343,	'aasasad',	NULL,	1),
(87654344,	'aasasad',	NULL,	0),
(87654345,	'aasasad',	NULL,	0),
(87654347,	'CDDD',	NULL,	0);

DROP TABLE IF EXISTS `ospos_travel`;
CREATE TABLE `ospos_travel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `destiny_origin` varchar(400) NOT NULL,
  `destiny_end` varchar(400) NOT NULL,
  `date_init` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla para el registro de tablas';

INSERT INTO `ospos_travel` (`id`, `code`, `name`, `destiny_origin`, `destiny_end`, `date_init`, `date_end`, `created_at`) VALUES
(1,	'1212121',	'ddsdsdsdsd',	'LIMA',	'PIURA',	'2017-12-12 12:12:00',	'2017-12-13 12:50:00',	'2018-03-11 04:47:36'),
(2,	'1212121',	'ddsdsdsdsd',	'LIMA',	'PIURA',	'2017-12-12 12:12:00',	'2017-12-13 12:50:00',	'2018-03-11 04:52:27'),
(3,	'1212121',	'ddsdsdsdsd',	'LIMA',	'PIURA',	'2017-12-12 12:12:00',	'2017-12-13 12:50:00',	'2018-03-11 05:02:44'),
(4,	'1212121',	'ddsdsdsdsd',	'LIMA',	'PIURA',	'2017-12-12 12:12:00',	'2017-12-13 12:50:00',	'2018-03-11 05:08:09'),
(5,	'wqwqwqwq',	'qwqwqwqw',	'LIMA',	'PIURA',	'2012-12-12 12:12:00',	'2014-12-12 00:12:00',	'2018-03-11 05:09:34');

-- 2018-03-16 23:11:52
