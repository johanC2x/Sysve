/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : ysumma

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-03-27 09:48:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ospos_app_config
-- ----------------------------
DROP TABLE IF EXISTS `ospos_app_config`;
CREATE TABLE `ospos_app_config` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_app_config
-- ----------------------------
INSERT INTO `ospos_app_config` VALUES ('address', 'Lima - Perú');
INSERT INTO `ospos_app_config` VALUES ('company', 'Sistema de Ventas');
INSERT INTO `ospos_app_config` VALUES ('currency_side', '0');
INSERT INTO `ospos_app_config` VALUES ('currency_symbol', 'S/.');
INSERT INTO `ospos_app_config` VALUES ('custom10_name', '');
INSERT INTO `ospos_app_config` VALUES ('custom1_name', '');
INSERT INTO `ospos_app_config` VALUES ('custom2_name', '');
INSERT INTO `ospos_app_config` VALUES ('custom3_name', '');
INSERT INTO `ospos_app_config` VALUES ('custom4_name', '');
INSERT INTO `ospos_app_config` VALUES ('custom5_name', '');
INSERT INTO `ospos_app_config` VALUES ('custom6_name', '');
INSERT INTO `ospos_app_config` VALUES ('custom7_name', '');
INSERT INTO `ospos_app_config` VALUES ('custom8_name', '');
INSERT INTO `ospos_app_config` VALUES ('custom9_name', '');
INSERT INTO `ospos_app_config` VALUES ('default_tax_1_name', 'Impuesto de Ventas 1');
INSERT INTO `ospos_app_config` VALUES ('default_tax_1_rate', '');
INSERT INTO `ospos_app_config` VALUES ('default_tax_2_name', 'Impuesto de Ventas 2');
INSERT INTO `ospos_app_config` VALUES ('default_tax_2_rate', '');
INSERT INTO `ospos_app_config` VALUES ('default_tax_rate', '8');
INSERT INTO `ospos_app_config` VALUES ('email', 'admin@pappastech.com');
INSERT INTO `ospos_app_config` VALUES ('fax', '123');
INSERT INTO `ospos_app_config` VALUES ('language', 'es');
INSERT INTO `ospos_app_config` VALUES ('phone', '555-555-5555');
INSERT INTO `ospos_app_config` VALUES ('print_after_sale', '0');
INSERT INTO `ospos_app_config` VALUES ('return_policy', 'Test');
INSERT INTO `ospos_app_config` VALUES ('timezone', 'America/Bogota');
INSERT INTO `ospos_app_config` VALUES ('website', '');

-- ----------------------------
-- Table structure for ospos_code
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ospos_code
-- ----------------------------
INSERT INTO `ospos_code` VALUES ('1', 'File Head BCP', 'file-head-bcp', 'file_export', '{\"file_head_bcp\": {\"type\": \"head\", \"content\": [{\"name\": \"Tipo de Registro\", \"align\": \"center\", \"length\": 1, \"default\": 1, \"position\": 1, \"description\": \"Para identificar el registro de cabecera se deberá utilizar valor fijo 1\", \"format_date\": \"\"}, {\"name\": \"Cantidad de abonos de la planilla\", \"align\": \"rigth\", \"length\": 6, \"default\": \"000006\", \"position\": 2, \"description\": \"Alinear a la derecha y completar con ceros hasta 6 posiciones\", \"format_date\": \"\"}, {\"name\": \"Fecha de proceso\", \"align\": \"center\", \"length\": 8, \"position\": 8, \"description\": \"El formato debe ser aaaammdd. Si se ingresa en blanco el BCP colocará la fecha actual.\", \"format_date\": \"aaaammdd\"}, {\"name\": \"Subtipo de planilla de haberes\", \"align\": \"center\", \"length\": 1, \"default\": \"G\", \"position\": 16, \"description\": \"Subtipo de planilla de haberes\", \"format_date\": \"\"}, {\"name\": \"Tipo de la cuenta de cargo\", \"align\": \"center\", \"length\": 1, \"default\": \"C\", \"position\": 17, \"description\": \" Considerar los siguientes tipos C => Cuenta Corriente,M => Cuenta Maestra\", \"format_date\": \"\"}, {\"name\": \"Moneda de la cuenta de cargo\", \"align\": \"center\", \"length\": 4, \"default\": \"0001\", \"position\": 18, \"description\": \"Valores posibles 0001 => Nuevos Soles,1001 => Dólares\", \"format_date\": \"\"}, {\"name\": \"Número de la cuenta de cargo\", \"align\": \"left\", \"length\": 20, \"default\": \"1910695055056\", \"position\": 22, \"description\": \"Valores posibles 0001 => Nuevos Soles,1001 => Dólares\", \"format_date\": \"\"}, {\"name\": \"Monto total de la planilla\", \"align\": \"rigth\", \"length\": 17, \"default\": \"00000000001200.00\", \"position\": 42, \"description\": \"Es la suma del importe de todos los abonos\", \"format_date\": \"\", \"format_currency\": \".00\"}, {\"name\": \"Referencia de la planilla\", \"align\": \"rigth\", \"length\": 40, \"default\": \"\", \"position\": 59, \"description\": \"Es la suma del importe de todos los abonos\", \"format_date\": \"\", \"format_currency\": \"\"}, {\"name\": \"Total de control (checksum)\", \"align\": \"rigth\", \"length\": 15, \"default\": \"000001100000000\", \"position\": 101, \"description\": \"Es la suma del importe de todos los abonos\", \"format_date\": \"\", \"format_currency\": \"\"}]}}', '2017-12-02 14:12:49', null);
INSERT INTO `ospos_code` VALUES ('2', 'File Detail BCP', 'file-detail-bcp', 'file_export', '{\"file_detail_bcp\": {\"type\": \"detail\", \"content\": [{\"name\": \"Tipo de Registro\", \"align\": \"center\", \"length\": 1, \"default\": 2, \"position\": 1, \"description\": \"Para identificar el registro de detalle se deberá utilizar valor fijo 2\", \"format_date\": \"\"}, {\"name\": \"Número de cuenta de abono\", \"align\": \"left\", \"length\": 20, \"default\": \"1910695055056\", \"position\": 2, \"description\": \"Formato: SSSCCCCCCCCMDD\", \"format_date\": \"\"}, {\"name\": \"Tipo de documento del empleado\", \"align\": \"center\", \"length\": 1, \"position\": 22, \"description\": \"Tipo de documento\", \"format_date\": \"\"}, {\"name\": \"Número de documento del empleado\", \"align\": \"left\", \"length\": 12, \"position\": 23, \"description\": \"Número de documento del empleado\", \"format_date\": \"\"}, {\"name\": \"Correlativo de documento\", \"align\": \"left\", \"length\": 3, \"position\": 35, \"description\": \"\", \"format_date\": \"\"}, {\"name\": \"Nombre del trabajador\", \"align\": \"rigth\", \"length\": 75, \"position\": 38, \"description\": \"\", \"format_date\": \"\"}, {\"name\": \"Referencia para el beneficiario\", \"align\": \"center\", \"length\": 40, \"position\": 113, \"description\": \"\", \"format_date\": \"\"}, {\"name\": \"Referencia para la empresa\", \"align\": \"left\", \"length\": 20, \"position\": 153, \"description\": \"\", \"format_date\": \"\"}, {\"name\": \"Moneda del importe a abonar\", \"align\": \"rigth\", \"length\": 4, \"default\": \"0001\", \"position\": 173, \"description\": \"Moneda del importe a abonar\", \"format_date\": \"\"}, {\"name\": \"Importe a abonar\", \"align\": \"left\", \"length\": 17, \"position\": 177, \"description\": \"\", \"format_date\": \"\", \"format_currency\": \".00\"}]}}', '2017-11-22 22:16:00', null);
INSERT INTO `ospos_code` VALUES ('3', 'DNI', 'dni', 'document_type', '{\"number_length\": 8}', '2017-12-02 15:30:30', null);
INSERT INTO `ospos_code` VALUES ('4', 'CARNET DE EXTRANJERIA', 'carnet-de-extranjeria', 'document_type', '{\"number_length\": 10}', '2017-12-02 15:30:43', null);
INSERT INTO `ospos_code` VALUES ('5', 'PASAPORTE', 'pasaporte', 'document_type', '{\"number_length\": 10}', '2017-12-02 15:30:49', null);
INSERT INTO `ospos_code` VALUES ('6', 'pagado', 'pagado', 'state_payment', '{}', '2017-12-02 16:14:09', null);
INSERT INTO `ospos_code` VALUES ('7', 'provisionado', 'provisionado', 'state_payment', '{}', '2017-12-02 16:14:29', null);
INSERT INTO `ospos_code` VALUES ('8', 'soles', 'soles', 'money_type', '{}', '2017-12-04 21:53:09', null);
INSERT INTO `ospos_code` VALUES ('9', 'dólares', 'dólares', 'money_type', '{}', '2017-12-04 21:53:45', null);
INSERT INTO `ospos_code` VALUES ('10', 'pendiente', 'pendiente', 'order_state_type', '{}', '2018-01-06 16:00:12', null);
INSERT INTO `ospos_code` VALUES ('11', 'comprado', 'comprado', 'order_state_type', '{}', '2018-01-06 16:00:12', null);
INSERT INTO `ospos_code` VALUES ('12', 'anulado', 'anulado', 'order_state_type', '{}', '2018-01-06 16:00:12', null);
INSERT INTO `ospos_code` VALUES ('13', 'Registrado', 'registrado', 'document_state_type', '{}', '2018-01-10 22:45:56', null);
INSERT INTO `ospos_code` VALUES ('14', 'Anulado', 'anulado', 'document_state_type', '{}', '2018-01-10 22:46:19', null);
INSERT INTO `ospos_code` VALUES ('15', 'DESTINOS MUNDIALES', 'DESTINOS_MUNDIALES', 'travel_operator', '', '2018-03-16 16:15:53', null);
INSERT INTO `ospos_code` VALUES ('16', 'CIC', 'CIC', 'travel_operator', '', '2018-03-16 16:16:25', null);
INSERT INTO `ospos_code` VALUES ('17', 'BEDS ONLINE', 'BEDS_ONLINE', 'travel_operator', '', '2018-03-16 16:16:55', null);
INSERT INTO `ospos_code` VALUES ('18', 'AG CORP', 'AG_CORP', 'travel_operator', '', '2018-03-16 16:17:47', null);
INSERT INTO `ospos_code` VALUES ('19', 'AG CORP', 'AG_CORP', 'travel_operator', '', '2018-03-16 16:24:19', null);
INSERT INTO `ospos_code` VALUES ('20', 'INTERAGENCIAS', 'INTERAGENCIAS', 'travel_operator', '', '2018-03-16 16:24:53', null);
INSERT INTO `ospos_code` VALUES ('21', 'millaje', 'millaje', 'payment_dscto_type', '', '2018-03-24 21:58:40', null);
INSERT INTO `ospos_code` VALUES ('22', 'efectivo', 'efectivo', 'payment_type', '', '2018-03-24 22:05:16', null);
INSERT INTO `ospos_code` VALUES ('23', 'tarjeta', 'tarjeta', 'payment_type', '', '2018-03-24 22:05:44', null);
INSERT INTO `ospos_code` VALUES ('24', 'cuotas', 'cuotas', 'payment_type', '', '2018-03-24 22:06:53', null);

-- ----------------------------
-- Table structure for ospos_customers
-- ----------------------------
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

-- ----------------------------
-- Records of ospos_customers
-- ----------------------------
INSERT INTO `ospos_customers` VALUES ('2', null, '1', '1', null, null);
INSERT INTO `ospos_customers` VALUES ('12345678', null, '1', '1', null, null);
INSERT INTO `ospos_customers` VALUES ('87654321', null, '1', '0', null, null);
INSERT INTO `ospos_customers` VALUES ('43215678', null, '1', '1', null, null);
INSERT INTO `ospos_customers` VALUES ('87654346', null, '0', '1', null, null);
INSERT INTO `ospos_customers` VALUES ('48227010', null, '1', '0', null, null);
INSERT INTO `ospos_customers` VALUES ('48227019', null, '1', '0', null, '{\"travel_detail\":{\"window_travel_detail\":\"bbbbbbb\",\"pas_travel_detail\":\"dssdssdq\",\"mill_travel_detail\":\"sdssdds\",\"visa_travel_detail\":\"ssdsdsd\",\"vacuna_travel_detail\":\"sdsdssdsd\"}}');
INSERT INTO `ospos_customers` VALUES ('48227020', null, '1', '0', null, null);
INSERT INTO `ospos_customers` VALUES ('2147483647', null, '1', '0', '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"12123343444\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"2019-12-01\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"travel_detail\":{\"window_travel_detail\":\"asasas\",\"pas_travel_detail\":\"asasasa\",\"mill_travel_detail\":\"saasassa\",\"visa_travel_detail\":\"saassa\",\"vacuna_travel_detail\":\"saassaas\"}}');
INSERT INTO `ospos_customers` VALUES ('23242526', null, '0', '0', '0', null);
INSERT INTO `ospos_customers` VALUES ('33343536', null, '0', '0', '0', null);
INSERT INTO `ospos_customers` VALUES ('44454647', null, '0', '0', '0', null);
INSERT INTO `ospos_customers` VALUES ('54555657', null, '0', '0', '0', '{\"customer_info\":{\"passport\":\"12231323113\",\"date_expire\":\"2020-12-12\"}}');
INSERT INTO `ospos_customers` VALUES ('12323', null, '1', '0', '[{\"idObj\":\"text_6\",\"id\":\"text_6\",\"value\":\"\",\"name\":\"Pasaporte\",\"type\":\"text\",\"parent\":\"text_6\"},{\"idObj\":\"date_5\",\"id\":\"date_5\",\"value\":\"\",\"name\":\"Fecha Expiración\",\"type\":\"date\",\"parent\":\"date_5\"}]', '{\"customer_info\":null}');

-- ----------------------------
-- Table structure for ospos_customer_travel
-- ----------------------------
DROP TABLE IF EXISTS `ospos_customer_travel`;
CREATE TABLE `ospos_customer_travel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `travel_id` int(11) NOT NULL,
  `data` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type_state_travel_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CUSTOMER` (`customer_id`),
  KEY `FK_TRAVEL` (`travel_id`),
  CONSTRAINT `FK_CUSTOMER` FOREIGN KEY (`customer_id`) REFERENCES `ospos_customers` (`person_id`),
  CONSTRAINT `FK_TRAVEL` FOREIGN KEY (`travel_id`) REFERENCES `ospos_travel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ospos_customer_travel
-- ----------------------------
INSERT INTO `ospos_customer_travel` VALUES ('1', '48227019', '11', '{\"key\":\"BEDS_ONLINE\",\"name\":\"BEDS ONLINE\",\"ammount\":\"22\"}', '2018-03-16 22:40:39', null);
INSERT INTO `ospos_customer_travel` VALUES ('2', '48227019', '13', '{\"key\":\"BEDS_ONLINE\",\"name\":\"BEDS ONLINE\",\"ammount\":\"22\"}', '2018-03-16 22:43:47', null);
INSERT INTO `ospos_customer_travel` VALUES ('3', '48227019', '13', '{\"key\":\"AG_CORP\",\"name\":\"AG CORP\",\"ammount\":\"11\"}', '2018-03-16 22:43:47', null);
INSERT INTO `ospos_customer_travel` VALUES ('4', '48227019', '14', '{\"key\":\"BEDS_ONLINE\",\"name\":\"BEDS ONLINE\",\"ammount\":\"22\"}', '2018-03-16 22:46:08', null);
INSERT INTO `ospos_customer_travel` VALUES ('5', '48227019', '14', '{\"key\":\"AG_CORP\",\"name\":\"AG CORP\",\"ammount\":\"11\"}', '2018-03-16 22:46:08', null);
INSERT INTO `ospos_customer_travel` VALUES ('6', '48227019', '15', '{\"key\":\"CIC\",\"name\":\"CIC\",\"ammount\":\"11\"}', '2018-03-16 23:00:56', null);
INSERT INTO `ospos_customer_travel` VALUES ('7', '48227019', '15', '{\"key\":\"AG_CORP\",\"name\":\"AG CORP\",\"ammount\":\"11\"}', '2018-03-16 23:00:56', null);
INSERT INTO `ospos_customer_travel` VALUES ('8', '48227019', '15', '{\"key\":\"CIC\",\"name\":\"CIC\",\"ammount\":\"22\"}', '2018-03-16 23:00:57', null);
INSERT INTO `ospos_customer_travel` VALUES ('9', '48227019', '16', '{\"key\":\"BEDS_ONLINE\",\"name\":\"BEDS ONLINE\",\"ammount\":\"33\"}', '2018-03-16 23:18:46', null);
INSERT INTO `ospos_customer_travel` VALUES ('10', '48227019', '16', '{\"key\":\"INTERAGENCIAS\",\"name\":\"INTERAGENCIAS\",\"ammount\":\"22\"}', '2018-03-16 23:18:46', null);
INSERT INTO `ospos_customer_travel` VALUES ('11', '48227019', '17', '{\"key\":\"BEDS_ONLINE\",\"name\":\"BEDS ONLINE\",\"ammount\":\"33\"}', '2018-03-16 23:21:42', null);
INSERT INTO `ospos_customer_travel` VALUES ('12', '48227019', '17', '{\"key\":\"DESTINOS_MUNDIALES\",\"name\":\"DESTINOS MUNDIALES\",\"ammount\":\"44\"}', '2018-03-16 23:21:42', null);
INSERT INTO `ospos_customer_travel` VALUES ('13', '48227019', '18', '{\"key\":\"AG_CORP\",\"name\":\"AG CORP\",\"ammount\":\"22\"}', '2018-03-16 23:22:49', null);
INSERT INTO `ospos_customer_travel` VALUES ('14', '48227019', '18', '{\"key\":\"INTERAGENCIAS\",\"name\":\"INTERAGENCIAS\",\"ammount\":\"33\"}', '2018-03-16 23:22:49', '2');
INSERT INTO `ospos_customer_travel` VALUES ('15', '48227019', '19', '{\"comisiones\":[{\"key\":\"hotel\",\"name\":\"Hotel\",\"ammount\":\"12\"}]}', '2018-03-23 20:48:04', '2');
INSERT INTO `ospos_customer_travel` VALUES ('16', '48227019', '20', '{\"comisiones\":[{\"key\":\"auto\",\"name\":\"Auto\",\"ammount\":\"2222\",\"comision_code\":\"dsada\",\"monto_detalle\":\"77777\",\"fee_servicio\":\"232\",\"nombre_ruc\":\"123\",\"dni_ruc\":\"132\",\"direccion_fiscal\":\"123\",\"tipo_doc\":\"BOLETA \",\"comision_fee\":\"comision\",\"comision_percentage\":\"12313\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"AMERICAN EXPRESS\",\"nro_tarjeta_milla\":\"qweqw\",\"comision_type_operator\":\"17\",\"comision_incentive_turifax\":\"123\",\"comision_incentive_otros\":\"123\"}]}', '2018-03-26 22:29:11', '2');
INSERT INTO `ospos_customer_travel` VALUES ('17', '48227019', '21', '{\"comisiones\":[{\"key\":\"trenes\",\"name\":\"Trenes\",\"ammount\":\"2222\",\"comision_code\":\"asdasd\",\"monto_detalle\":\"100000\",\"fee_servicio\":\"2222\",\"nombre_ruc\":\"asd\",\"dni_ruc\":\"asd\",\"direccion_fiscal\":\"asd\",\"tipo_doc\":\"BOLETA \",\"comision_fee\":\"comision\",\"comision_percentage\":\"222\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"DINNERS\",\"nro_tarjeta_milla\":\"2233\",\"comision_type_operator\":\"17\",\"comision_incentive_turifax\":\"222\",\"comision_incentive_otros\":\"222\"}]}', '2018-03-26 22:46:03', '2');
INSERT INTO `ospos_customer_travel` VALUES ('18', '48227019', '22', '{\"comisiones\":[{\"key\":\"seguro\",\"name\":\"Seguro\",\"ammount\":\"5600\",\"comision_code\":\"asd\",\"monto_detalle\":\"70000\",\"fee_servicio\":\"222\",\"nombre_ruc\":\"asd\",\"dni_ruc\":\"asd\",\"direccion_fiscal\":\"asd\",\"tipo_doc\":\"TICKET\",\"comision_fee\":\"comision\",\"comision_percentage\":\"213\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"DINNERS\",\"nro_tarjeta_milla\":\"2233\",\"comision_type_operator\":\"17\",\"comision_incentive_turifax\":\"22\",\"comision_incentive_otros\":\"222\"}]}', '2018-03-26 22:48:16', '2');
INSERT INTO `ospos_customer_travel` VALUES ('21', '48227019', '25', '{\"comisiones\":[{\"key\":\"entradas\",\"name\":\"Entradas\",\"ammount\":\"5555\",\"comision_code\":\"asdasd\",\"monto_detalle\":\"5555\",\"fee_servicio\":\"2222\",\"nombre_ruc\":\"asd\",\"dni_ruc\":\"asd\",\"direccion_fiscal\":\"asd\",\"tipo_doc\":\"BOLETA \",\"comision_fee\":\"comision\",\"comision_percentage\":\"22232\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"AMERICAN EXPRESS\",\"nro_tarjeta_milla\":\"123123\",\"comision_type_operator\":\"16\",\"comision_incentive_turifax\":\"12\",\"comision_incentive_otros\":\"22\"}]}', '2018-03-26 22:56:58', '2');
INSERT INTO `ospos_customer_travel` VALUES ('22', '48227019', '26', '{\"comisiones\":[{\"key\":\"auto\",\"name\":\"Auto\",\"ammount\":\"444\",\"comision_code\":\"asdasd\",\"monto_detalle\":\"45678\",\"fee_servicio\":\"22\",\"nombre_ruc\":\"asd\",\"dni_ruc\":\"asd\",\"direccion_fiscal\":\"asd\",\"tipo_doc\":\"TICKET\",\"comision_fee\":\"comision\",\"comision_percentage\":\"222\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"MASTERCARD\",\"nro_tarjeta_milla\":\"2222\",\"comision_type_operator\":\"18\",\"comision_incentive_turifax\":\"222\",\"comision_incentive_otros\":\"222\"}]}', '2018-03-26 22:59:01', '2');
INSERT INTO `ospos_customer_travel` VALUES ('23', '48227019', '27', '{\"comisiones\":[{\"key\":\"crucero\",\"name\":\"Crucero\",\"ammount\":\"22222\",\"comision_code\":\"12313\",\"monto_detalle\":\"3333\",\"fee_servicio\":\"22\",\"nombre_ruc\":\"asd\",\"dni_ruc\":\"ad\",\"direccion_fiscal\":\"ads\",\"tipo_doc\":\"FACTURA\",\"comision_fee\":\"comision\",\"comision_percentage\":\"12312\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"DINNERS\",\"nro_tarjeta_milla\":\"123123\",\"comision_type_operator\":\"16\",\"comision_incentive_turifax\":\"123\",\"comision_incentive_otros\":\"23\"}]}', '2018-03-26 23:17:08', '2');
INSERT INTO `ospos_customer_travel` VALUES ('24', '48227019', '28', '{\"comisiones\":[{\"key\":\"crucero\",\"name\":\"Crucero\",\"ammount\":\"5555\",\"comision_code\":\"12323\",\"monto_detalle\":\"45633\",\"fee_servicio\":\"22\",\"nombre_ruc\":\"2\",\"dni_ruc\":\"123123\",\"direccion_fiscal\":\"123\",\"tipo_doc\":\"TICKET\",\"comision_fee\":\"comision\",\"comision_percentage\":\"123123\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"MASTERCARD\",\"nro_tarjeta_milla\":\"123\",\"comision_type_operator\":\"19\",\"comision_incentive_turifax\":\"22\",\"comision_incentive_otros\":\"22\"}]}', '2018-03-26 23:18:46', '2');
INSERT INTO `ospos_customer_travel` VALUES ('25', '48227019', '29', '{\"comisiones\":[{\"key\":\"tours\",\"name\":\"Tours\",\"ammount\":\"121212\",\"comision_code\":\"12313\",\"monto_detalle\":\"7777\",\"fee_servicio\":\"23\",\"nombre_ruc\":\"123\",\"dni_ruc\":\"132\",\"direccion_fiscal\":\"123\",\"tipo_doc\":\"BOLETA \",\"comision_fee\":\"comision\",\"comision_percentage\":\"123123\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"AMERICAN EXPRESS\",\"nro_tarjeta_milla\":\"123132\",\"comision_type_operator\":\"17\",\"comision_incentive_turifax\":\"22\",\"comision_incentive_otros\":\"22\"}]}', '2018-03-26 23:20:32', '2');
INSERT INTO `ospos_customer_travel` VALUES ('26', '48227019', '30', '{\"comisiones\":[{\"key\":\"entradas\",\"name\":\"Entradas\",\"ammount\":\"444\",\"comision_code\":\"123\",\"monto_detalle\":\"2222\",\"fee_servicio\":\"22\",\"nombre_ruc\":\"2\",\"dni_ruc\":\"213\",\"direccion_fiscal\":\"123\",\"tipo_doc\":\"TICKET\",\"comision_fee\":\"comision\",\"comision_percentage\":\"123\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"DINNERS\",\"nro_tarjeta_milla\":\"123123\",\"comision_type_operator\":\"17\",\"comision_incentive_turifax\":\"12313\",\"comision_incentive_otros\":\"2323\"}]}', '2018-03-26 23:32:01', '2');
INSERT INTO `ospos_customer_travel` VALUES ('27', '48227019', '31', '{\"comisiones\":[{\"key\":\"auto\",\"name\":\"Auto\",\"ammount\":\"34444\",\"comision_code\":\"asdasd\",\"monto_detalle\":\"234322\",\"fee_servicio\":\"2112\",\"nombre_ruc\":\"12\",\"dni_ruc\":\"12\",\"direccion_fiscal\":\"12\",\"tipo_doc\":\"TICKET\",\"comision_fee\":\"comision\",\"comision_percentage\":\"3333\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"AMERICAN EXPRESS\",\"nro_tarjeta_milla\":\"22222\",\"comision_type_operator\":\"17\",\"comision_incentive_turifax\":\"222\",\"comision_incentive_otros\":\"222\"}]}', '2018-03-26 23:55:27', '2');
INSERT INTO `ospos_customer_travel` VALUES ('28', '48227019', '32', '{\"comisiones\":[{\"key\":\"seguro\",\"name\":\"Seguro\",\"ammount\":\"66666\",\"comision_code\":\"reserva1\",\"monto_detalle\":\"1579876\",\"fee_servicio\":\"5555\",\"nombre_ruc\":\"razon social\",\"dni_ruc\":\"718373838\",\"direccion_fiscal\":\"direccion pe\",\"tipo_doc\":\"TICKET\",\"comision_fee\":\"comision\",\"comision_percentage\":\"345654\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"MASTERCARD\",\"nro_tarjeta_milla\":\"23456765\",\"comision_type_operator\":\"17\",\"comision_incentive_turifax\":\"2222\",\"comision_incentive_otros\":\"3333\"}]}', '2018-03-27 00:13:29', '2');
INSERT INTO `ospos_customer_travel` VALUES ('29', '48227019', '33', '{\"comisiones\":[{\"key\":\"seguro\",\"name\":\"Seguro\",\"ammount\":\"66700\",\"comision_code\":\"asdasd\",\"monto_detalle\":\"570000\",\"fee_servicio\":\"222\",\"nombre_ruc\":\"qwd\",\"dni_ruc\":\"asd\",\"direccion_fiscal\":\"asdasd\",\"tipo_doc\":\"TICKET\",\"comision_fee\":\"comision\",\"comision_percentage\":\"2123\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"DINNERS\",\"nro_tarjeta_milla\":\"2123\",\"comision_type_operator\":\"17\",\"comision_incentive_turifax\":\"222\",\"comision_incentive_otros\":\"2222\"}]}', '2018-03-27 00:18:06', '2');
INSERT INTO `ospos_customer_travel` VALUES ('30', '48227019', '34', '{\"comisiones\":[{\"key\":\"auto\",\"name\":\"Auto\",\"ammount\":\"22222\",\"comision_code\":\"12313\",\"monto_detalle\":\"56666\",\"fee_servicio\":\"233\",\"nombre_ruc\":\"asd\",\"dni_ruc\":\"asd\",\"direccion_fiscal\":\"asd\",\"tipo_doc\":\"BOLETA \",\"comision_fee\":\"comision\",\"comision_percentage\":\"12313\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"AMERICAN EXPRESS\",\"nro_tarjeta_milla\":\"sadd\",\"comision_type_operator\":\"17\",\"comision_incentive_turifax\":\"222\",\"comision_incentive_otros\":\"2222\"}]}', '2018-03-27 00:21:01', '2');
INSERT INTO `ospos_customer_travel` VALUES ('31', '48227019', '35', '{\"comisiones\":[{\"key\":\"trenes\",\"name\":\"Trenes\",\"ammount\":\"444444\",\"comision_code\":\"asd123\",\"monto_detalle\":\"666666\",\"fee_servicio\":\"32222\",\"nombre_ruc\":\"asdasd\",\"dni_ruc\":\"23123\",\"direccion_fiscal\":\"asdasda\",\"tipo_doc\":\"BOLETA \",\"comision_fee\":\"comision\",\"comision_percentage\":\"123\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"DINNERS\",\"nro_tarjeta_milla\":\"12313\",\"comision_type_operator\":\"17\",\"comision_incentive_turifax\":\"122\",\"comision_incentive_otros\":\"2323\"}]}', '2018-03-27 00:27:41', '2');
INSERT INTO `ospos_customer_travel` VALUES ('32', '48227019', '36', '{\"comisiones\":[{\"key\":\"auto\",\"name\":\"Auto\",\"ammount\":\"222\",\"comision_code\":\"3123\",\"monto_detalle\":\"221212\",\"fee_servicio\":\"1222\",\"nombre_ruc\":\"123123\",\"dni_ruc\":\"asd\",\"direccion_fiscal\":\"123\",\"tipo_doc\":\"TICKET\",\"comision_fee\":\"comision\",\"comision_percentage\":\"2222\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"MASTERCARD\",\"nro_tarjeta_milla\":\"222\",\"comision_type_operator\":\"17\",\"comision_incentive_turifax\":\"21\",\"comision_incentive_otros\":\"212\"}]}', '2018-03-27 00:29:18', '2');
INSERT INTO `ospos_customer_travel` VALUES ('33', '48227019', '37', '{\"comisiones\":[{\"key\":\"crucero\",\"name\":\"Crucero\",\"ammount\":\"2222\",\"comision_code\":\"123\",\"monto_detalle\":\"2222\",\"fee_servicio\":\"333\",\"nombre_ruc\":\"asd\",\"dni_ruc\":\"123123\",\"direccion_fiscal\":\"123\",\"tipo_doc\":\"TICKET\",\"comision_fee\":\"comision\",\"comision_percentage\":\"123123\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"DINNERS\",\"nro_tarjeta_milla\":\"23123123\",\"comision_type_operator\":\"17\",\"comision_incentive_turifax\":\"2232\",\"comision_incentive_otros\":\"2323\"}]}', '2018-03-27 00:41:15', '2');
INSERT INTO `ospos_customer_travel` VALUES ('34', '48227019', '38', '{\"comisiones\":[{\"key\":\"crucero\",\"name\":\"Crucero\",\"ammount\":\"2222\",\"comision_code\":\"123123\",\"monto_detalle\":\"1233\",\"fee_servicio\":\"122\",\"nombre_ruc\":\"123\",\"dni_ruc\":\"1\",\"direccion_fiscal\":\"123\",\"tipo_doc\":\"TICKET\",\"comision_fee\":\"comision\",\"comision_percentage\":\"123123\",\"acumula_millas\":\"\",\"tipo_tarjeta_milla\":\"AMERICAN EXPRESS\",\"nro_tarjeta_milla\":\"123\",\"comision_type_operator\":\"16\",\"comision_incentive_turifax\":\"22\",\"comision_incentive_otros\":\"22\"}]}', '2018-03-27 00:44:04', '2');

-- ----------------------------
-- Table structure for ospos_design
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ospos_design
-- ----------------------------
INSERT INTO `ospos_design` VALUES ('1', 'prueba', 'prueba', '223.50', '1', '2017-06-18', '20');

-- ----------------------------
-- Table structure for ospos_employees
-- ----------------------------
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

-- ----------------------------
-- Records of ospos_employees
-- ----------------------------
INSERT INTO `ospos_employees` VALUES ('admin', '81dc9bdb52d04dc20036dbd8313ed055', '1', '0');
INSERT INTO `ospos_employees` VALUES ('johanC', 'e10adc3949ba59abbe56e057f20f883e', '87654324', '0');

-- ----------------------------
-- Table structure for ospos_gallery
-- ----------------------------
DROP TABLE IF EXISTS `ospos_gallery`;
CREATE TABLE `ospos_gallery` (
  `gallery_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ospos_gallery';

-- ----------------------------
-- Records of ospos_gallery
-- ----------------------------
INSERT INTO `ospos_gallery` VALUES (null, null, '', '1');
INSERT INTO `ospos_gallery` VALUES (null, null, '', '1');
INSERT INTO `ospos_gallery` VALUES (null, null, '', '1');
INSERT INTO `ospos_gallery` VALUES (null, null, '', '1');
INSERT INTO `ospos_gallery` VALUES (null, null, '', '1');
INSERT INTO `ospos_gallery` VALUES (null, null, '', '1');
INSERT INTO `ospos_gallery` VALUES (null, null, '', '1');

-- ----------------------------
-- Table structure for ospos_giftcards
-- ----------------------------
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

-- ----------------------------
-- Records of ospos_giftcards
-- ----------------------------

-- ----------------------------
-- Table structure for ospos_inventory
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_inventory
-- ----------------------------
INSERT INTO `ospos_inventory` VALUES ('1', '1', '1', '2014-08-14 19:45:13', 'Edición Manual de Cantidad', '10');
INSERT INTO `ospos_inventory` VALUES ('2', '1', '1', '2014-08-14 19:46:08', 'POS 1', '-1');
INSERT INTO `ospos_inventory` VALUES ('3', '2', '1', '2014-08-15 09:50:24', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('4', '3', '1', '2014-08-15 09:50:24', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('5', '4', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('6', '5', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('7', '6', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('8', '7', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('9', '8', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('10', '9', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('11', '10', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('12', '11', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('13', '12', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('14', '13', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('15', '14', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('16', '15', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('17', '16', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('18', '17', '1', '2014-08-15 09:50:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('19', '18', '1', '2014-08-15 09:50:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('20', '19', '1', '2014-08-15 09:50:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('21', '20', '1', '2014-08-15 09:50:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('22', '21', '1', '2014-08-15 09:50:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('23', '22', '1', '2014-08-15 09:50:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('24', '23', '1', '2014-08-15 09:50:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('25', '24', '1', '2014-08-15 09:50:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('26', '3', '1', '2014-08-15 09:52:34', 'POS 2', '-5');
INSERT INTO `ospos_inventory` VALUES ('27', '7', '1', '2014-08-15 09:52:34', 'POS 2', '-1');
INSERT INTO `ospos_inventory` VALUES ('28', '1', '1', '2014-08-18 09:08:16', 'Edición Manual de Cantidad', '-7');
INSERT INTO `ospos_inventory` VALUES ('29', '1', '1', '2014-08-18 09:08:44', 'Edición Manual de Cantidad', '8');
INSERT INTO `ospos_inventory` VALUES ('30', '1', '1', '2014-08-18 09:09:08', 'Edición Manual de Cantidad', '-5');
INSERT INTO `ospos_inventory` VALUES ('31', '25', '1', '2014-08-18 09:13:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('32', '26', '1', '2014-08-18 09:13:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('33', '27', '1', '2014-08-18 09:13:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('34', '28', '1', '2014-08-18 09:13:25', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('35', '29', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('36', '30', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('37', '31', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('38', '32', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('39', '33', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('40', '34', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('41', '35', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('42', '36', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('43', '37', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('44', '38', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('45', '39', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('46', '40', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('47', '41', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('48', '42', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('49', '43', '1', '2014-08-18 09:13:26', 'Qty CSV Imported', '10');
INSERT INTO `ospos_inventory` VALUES ('50', '25', '1', '2014-08-18 09:14:53', 'Edición Manual de Cantidad', '0');
INSERT INTO `ospos_inventory` VALUES ('51', '25', '1', '2014-08-18 09:15:14', 'Edición Manual de Cantidad', '-9');
INSERT INTO `ospos_inventory` VALUES ('52', '3', '1', '2014-08-18 09:22:57', 'POS 3', '-5');
INSERT INTO `ospos_inventory` VALUES ('53', '8', '1', '2014-08-18 09:22:57', 'POS 3', '-2');
INSERT INTO `ospos_inventory` VALUES ('54', '29', '1', '2014-08-18 09:23:40', 'POS 4', '-1');
INSERT INTO `ospos_inventory` VALUES ('55', '33', '1', '2014-08-18 09:24:31', 'POS 5', '-1');
INSERT INTO `ospos_inventory` VALUES ('56', '26', '1', '2014-08-18 09:27:46', 'POS 6', '-1');
INSERT INTO `ospos_inventory` VALUES ('57', '32', '1', '2014-08-18 09:27:46', 'POS 6', '-2');
INSERT INTO `ospos_inventory` VALUES ('58', '30', '1', '2014-08-18 09:33:14', 'POS 7', '-1');
INSERT INTO `ospos_inventory` VALUES ('59', '28', '1', '2014-12-04 08:45:07', 'POS 8', '-1');
INSERT INTO `ospos_inventory` VALUES ('60', '25', '1', '2016-07-29 12:29:14', 'Edición Manual de Cantidad', '0');
INSERT INTO `ospos_inventory` VALUES ('61', '26', '1', '2016-07-29 12:36:20', 'Edición Manual de Cantidad', '0');
INSERT INTO `ospos_inventory` VALUES ('62', '25', '1', '2016-07-29 14:42:01', 'Edición Manual de Cantidad', '0');
INSERT INTO `ospos_inventory` VALUES ('63', '44', '1', '2016-07-29 14:43:48', 'Edición Manual de Cantidad', '10');
INSERT INTO `ospos_inventory` VALUES ('64', '45', '1', '2016-07-29 14:44:28', 'Edición Manual de Cantidad', '20');
INSERT INTO `ospos_inventory` VALUES ('65', '44', '1', '2016-07-29 14:55:11', 'RECV 1', '20');
INSERT INTO `ospos_inventory` VALUES ('66', '44', '1', '2016-07-29 14:56:52', 'POS 9', '-3');
INSERT INTO `ospos_inventory` VALUES ('67', '44', '87654324', '2017-01-08 15:49:35', 'Error de inventario', '20');
INSERT INTO `ospos_inventory` VALUES ('68', '44', '87654324', '2017-01-08 15:49:39', 'Error de inventario', '20');
INSERT INTO `ospos_inventory` VALUES ('69', '44', '87654324', '2017-01-08 15:49:58', 'Error', '-20');
INSERT INTO `ospos_inventory` VALUES ('70', '44', '87654324', '2017-01-08 15:50:14', 'Error', '-20');
INSERT INTO `ospos_inventory` VALUES ('71', '44', '87654324', '2017-01-08 16:04:14', 'Error', '1');
INSERT INTO `ospos_inventory` VALUES ('72', '44', '87654324', '2017-01-08 16:04:22', 'Edición Manual de Cantidad', '0');
INSERT INTO `ospos_inventory` VALUES ('73', '46', '1', '2017-01-17 22:21:38', 'Edición Manual de Cantidad', '50');
INSERT INTO `ospos_inventory` VALUES ('74', '46', '1', '2017-01-17 22:23:08', 'Edición Manual de Cantidad', '0');
INSERT INTO `ospos_inventory` VALUES ('75', '27', '1', '2017-02-02 10:12:50', 'POS 10', '-1');
INSERT INTO `ospos_inventory` VALUES ('76', '47', '1', '2017-04-13 16:19:34', 'Edición Manual de Cantidad', '12');
INSERT INTO `ospos_inventory` VALUES ('77', '48', '1', '2017-04-13 17:04:36', 'Edición Manual de Cantidad', '12');
INSERT INTO `ospos_inventory` VALUES ('78', '49', '1', '2017-04-13 17:12:16', 'Edición Manual de Cantidad', '23');
INSERT INTO `ospos_inventory` VALUES ('79', '50', '1', '2017-04-13 17:22:40', 'Edición Manual de Cantidad', '23');
INSERT INTO `ospos_inventory` VALUES ('80', '50', '1', '2017-04-13 17:28:30', 'POS 11', '-2');
INSERT INTO `ospos_inventory` VALUES ('81', '49', '1', '2017-04-13 17:30:35', 'POS 12', '-1');
INSERT INTO `ospos_inventory` VALUES ('82', '46', '1', '2017-04-14 17:18:33', '', '0');
INSERT INTO `ospos_inventory` VALUES ('83', '29', '1', '2017-04-14 17:18:42', '', '0');
INSERT INTO `ospos_inventory` VALUES ('84', '27', '1', '2017-04-14 17:22:18', 'ASSSSSSSSSSSSSSS', '23');
INSERT INTO `ospos_inventory` VALUES ('85', '47', '1', '2017-04-14 17:23:47', 'ssssssssssssss', '343');
INSERT INTO `ospos_inventory` VALUES ('86', '27', '1', '2017-04-14 17:24:46', 'SAAAAAAAAA', '23');
INSERT INTO `ospos_inventory` VALUES ('87', '46', '1', '2017-04-14 17:25:06', 'ASSSSSS', '20');
INSERT INTO `ospos_inventory` VALUES ('88', '46', '1', '2017-04-14 17:26:27', '2', '2');
INSERT INTO `ospos_inventory` VALUES ('89', '46', '1', '2017-04-14 17:28:56', '2', '2');
INSERT INTO `ospos_inventory` VALUES ('90', '46', '1', '2017-04-14 17:29:25', '2', '2');
INSERT INTO `ospos_inventory` VALUES ('91', '51', '1', '2017-04-14 17:40:26', 'Edición Manual de Cantidad', '23');
INSERT INTO `ospos_inventory` VALUES ('92', '52', '1', '2017-04-14 17:42:09', 'Edición Manual de Cantidad', '23');
INSERT INTO `ospos_inventory` VALUES ('93', '46', '1', '2017-04-14 17:46:54', 'Edición Manual de Cantidad', '0');
INSERT INTO `ospos_inventory` VALUES ('94', '28', '1', '2017-04-14 17:48:19', 'Edición Manual de Cantidad', '0');
INSERT INTO `ospos_inventory` VALUES ('95', '54', '1', '2017-08-19 13:39:34', 'Edición Manual de Cantidad', '12');
INSERT INTO `ospos_inventory` VALUES ('96', '57', '1', '2017-08-19 13:43:17', 'Edición Manual de Cantidad', '12');
INSERT INTO `ospos_inventory` VALUES ('97', '60', '1', '2017-08-19 13:51:29', 'Edición Manual de Cantidad', '23');
INSERT INTO `ospos_inventory` VALUES ('98', '48', '1', '2017-08-19 13:56:33', 'RECV 2', '12');
INSERT INTO `ospos_inventory` VALUES ('99', '51', '87654324', '2017-08-19 16:58:55', 'Edición Manual de Cantidad', '0');
INSERT INTO `ospos_inventory` VALUES ('100', '61', '1', '2018-01-24 23:31:24', 'Edición Manual de Cantidad', '12');
INSERT INTO `ospos_inventory` VALUES ('101', '61', '1', '2018-01-24 23:51:00', 'Edición Manual de Cantidad', '0');
INSERT INTO `ospos_inventory` VALUES ('102', '62', '1', '2018-02-11 20:16:47', 'Edición Manual de Cantidad', '12');

-- ----------------------------
-- Table structure for ospos_items
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_items
-- ----------------------------
INSERT INTO `ospos_items` VALUES ('Articulo 01', 'Golosinas', null, null, '', '20.00', '20.00', '5.00', '2.00', '', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('Producto 01', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '2', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 02', 'Golosinas', null, null, '', '10.00', '12.00', '0.00', '0.00', '', '3', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 03', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '4', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 04', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '5', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 05', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '6', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 06', 'Golosinas', null, null, '', '10.00', '12.00', '9.00', '0.00', '', '7', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 07', 'Golosinas', null, null, '', '10.00', '12.00', '8.00', '0.00', '', '8', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 08', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '9', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 09', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '10', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 10', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '11', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 11', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '12', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 12', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '13', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 13', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '14', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 14', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '15', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 15', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '16', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 16', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '17', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 17', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '18', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 18', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '19', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 19', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '20', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 20', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '21', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 21', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '22', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 22', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '23', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 23', 'Golosinas', null, null, '', '10.00', '12.00', '10.00', '0.00', '', '24', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto_01', 'Golosinas', null, 'Producto_01', 'Producto_01', '10.00', '12.00', '1.00', '2.00', '2', '25', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('Producto_02', 'Golosinas', null, 'Producto_02', 'Producto_02', '10.00', '12.00', '9.00', '2.00', 'Producto_02', '26', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('Producto 03', 'Golosinas', null, 'p-003', '', '10.00', '12.00', '55.00', '2.00', '', '27', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 04', 'Golosinas', '87654323', 'p-004', 'ASSSSSSSSSSS', '10.00', '12.00', '9.00', '2.00', '3', '28', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('Producto 05', 'Golosinas', null, 'p-005', '', '10.00', '12.00', '9.00', '2.00', '', '29', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 06', 'Golosinas', null, 'p-006', '', '10.00', '12.00', '9.00', '2.00', '', '30', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 07', 'Golosinas', null, 'p-007', '', '10.00', '12.00', '10.00', '2.00', '', '31', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 08', 'Golosinas', null, 'p-008', '', '10.00', '12.00', '8.00', '2.00', '', '32', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 09', 'Golosinas', null, 'p-009', '', '10.00', '12.00', '9.00', '2.00', '', '33', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 10', 'Golosinas', null, 'p-010', '', '10.00', '12.00', '10.00', '2.00', '', '34', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 11', 'Golosinas', null, 'p-011', '', '10.00', '12.00', '10.00', '2.00', '', '35', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 12', 'Golosinas', null, 'p-012', '', '10.00', '12.00', '10.00', '2.00', '', '36', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 13', 'Golosinas', null, 'p-013', '', '10.00', '12.00', '10.00', '2.00', '', '37', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 14', 'Golosinas', null, 'p-014', '', '10.00', '12.00', '10.00', '2.00', '', '38', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 15', 'Golosinas', null, 'p-015', '', '10.00', '12.00', '10.00', '2.00', '', '39', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 16', 'Golosinas', null, 'p-016', '', '10.00', '12.00', '10.00', '2.00', '', '40', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 17', 'Golosinas', null, 'p-017', '', '10.00', '12.00', '10.00', '2.00', '', '41', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 18', 'Golosinas', null, 'p-018', '', '10.00', '12.00', '10.00', '2.00', '', '42', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('Producto 19', 'Golosinas', null, 'p-019', '', '10.00', '12.00', '10.00', '2.00', '', '43', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', null);
INSERT INTO `ospos_items` VALUES ('CARTELES', 'CARTELES', null, 'CARTELES', 'CARTELES', '200.00', '250.00', '28.00', '2.00', '3', '44', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('PRUEBA', 'PRUEBA', null, 'PRUEBA', 'PRUEBA', '10.00', '15.00', '20.00', '2.00', '1', '45', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('PAPELES LA ROSA', 'CARTELES', '87654323', '23', 'Papeles la Rosa', '23.00', '0.50', '76.00', '10.00', '3', '46', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('ASASA', 'ZAPATILLAS', '87654322', 'QWQW', 'ZAPATILLAS JANOSKI', '12.00', '12.00', '355.00', '23.00', '3', '47', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('ZAPATILLAS NIKE', 'ZAPATILLAS', '87654322', 'ZAP-NIKE', 'asaas', '23.00', '250.00', '24.00', '121.00', 'asasa', '48', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('DC WES KREMER', 'ZAPATILLAS', '87654322', 'ZAP-DC', 'aaaaaaaaaaa', '200.00', '250.00', '22.00', '2.00', '3', '49', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('CONVERSE', 'ZAPATILLAS', '87654322', 'ZAP-CONVERSE', 'qqqqqqqqqqqq', '200.00', '250.00', '21.00', '2.00', '2', '50', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('AAAAAAAAAAAA', 'ZAPATILLAS', '87654322', 'p-0001221', 'ASSSSSSS', '200.00', '250.00', '23.00', '2.00', '3', '51', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('AQUI NOMAS', 'ZAPATILLAS', '87654322', 'P-002323332', 'AQUI NOMAS', '200.00', '250.00', '23.00', '2.00', '3', '52', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('Carteras', 'accesorios', '87654322', '123456789', 'CARTERA DE MESA', '200.00', '250.00', '12.00', '2.00', '3', '54', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('Carteras', 'accesorios', '87654322', '1234567891234567', 'CARTERA DE MESA', '200.00', '250.00', '12.00', '2.00', '3', '57', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('DC WES KREMER', 'ZAPATILLAS', '87654323', null, '1111111111111111111111111111', '200.00', '250.00', '23.00', '2.00', '3', '60', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null);
INSERT INTO `ospos_items` VALUES ('LAPICES', 'LAPICES', null, '123455555', 'LAPICES', '23.00', '25.00', '12.00', '10.00', 'LAPICES', '61', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '[{\"idObj\":\"cbo_property_1\",\"id\":\"3\",\"name\":\"pijama 2\",\"type\":\"select\",\"parent\":1}]');
INSERT INTO `ospos_items` VALUES ('TEST_ITEM', 'CARTELES', null, '12345678', 'TEST_ITEM', '12.00', '12.00', '12.00', '12.00', 'TEST_ITEM', '62', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '[{\"idObj\":\"cbo_property_1\",\"id\":\"2\",\"name\":\"Talla S\",\"type\":\"select\",\"parent\":1}]');

-- ----------------------------
-- Table structure for ospos_items_gallery
-- ----------------------------
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

-- ----------------------------
-- Records of ospos_items_gallery
-- ----------------------------

-- ----------------------------
-- Table structure for ospos_items_taxes
-- ----------------------------
DROP TABLE IF EXISTS `ospos_items_taxes`;
CREATE TABLE `ospos_items_taxes` (
  `item_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percent` decimal(15,2) NOT NULL,
  PRIMARY KEY (`item_id`,`name`,`percent`),
  CONSTRAINT `ospos_items_taxes_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ospos_items` (`item_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_items_taxes
-- ----------------------------
INSERT INTO `ospos_items_taxes` VALUES ('25', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('25', 'Impuesto de Ventas 2', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('26', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('26', 'Impuesto de Ventas 2', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('28', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('28', 'Impuesto de Ventas 2', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('44', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('44', 'Impuesto de Ventas 2', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('45', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('45', 'Impuesto de Ventas 2', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('46', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('46', 'Impuesto de Ventas 2', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('47', 'Impuesto de Ventas 1', '1.00');
INSERT INTO `ospos_items_taxes` VALUES ('47', 'Impuesto de Ventas 2', '2.00');
INSERT INTO `ospos_items_taxes` VALUES ('48', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('48', 'Impuesto de Ventas 2', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('49', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('49', 'Impuesto de Ventas 2', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('50', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('50', 'Impuesto de Ventas 2', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('52', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('52', 'Impuesto de Ventas 2', '0.00');
INSERT INTO `ospos_items_taxes` VALUES ('62', 'Impuesto de Ventas 1', '12.00');
INSERT INTO `ospos_items_taxes` VALUES ('62', 'Impuesto de Ventas 2', '0.00');

-- ----------------------------
-- Table structure for ospos_item_kits
-- ----------------------------
DROP TABLE IF EXISTS `ospos_item_kits`;
CREATE TABLE `ospos_item_kits` (
  `item_kit_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`item_kit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_item_kits
-- ----------------------------
INSERT INTO `ospos_item_kits` VALUES ('1', 'ZAPATILLAs', 'PROMOCIÓN DE ZAPATILLAS');
INSERT INTO `ospos_item_kits` VALUES ('2', 'CARTELES', 'CARTELES');
INSERT INTO `ospos_item_kits` VALUES ('5', 'CONVERSE', 'CONVERSE');
INSERT INTO `ospos_item_kits` VALUES ('6', 'PAPELES DE MUESTRA', 'PAPELES DE MUESTRA');
INSERT INTO `ospos_item_kits` VALUES ('7', 'CONVERSE', 'sdddddddddddd');
INSERT INTO `ospos_item_kits` VALUES ('13', 'WES KREMER', 'WES KREMER');
INSERT INTO `ospos_item_kits` VALUES ('16', 'ZAPATILLAS CONVERSE', 'ZAPATILLAS CONVERSE');
INSERT INTO `ospos_item_kits` VALUES ('17', 'DULCES DE MESA', 'DULCES DE MESA');
INSERT INTO `ospos_item_kits` VALUES ('18', 'DULCES DE MESA', 'DULCES DE MESA');
INSERT INTO `ospos_item_kits` VALUES ('29', 'ZAPATILLAS', 'PROMOCION DE ZAPATILLAS');
INSERT INTO `ospos_item_kits` VALUES ('30', 'sdasas', 'qeqqqqqe');
INSERT INTO `ospos_item_kits` VALUES ('31', 'bbb', 'bbbbbbb');

-- ----------------------------
-- Table structure for ospos_item_kit_items
-- ----------------------------
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

-- ----------------------------
-- Records of ospos_item_kit_items
-- ----------------------------
INSERT INTO `ospos_item_kit_items` VALUES ('17', '29', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('18', '29', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('16', '30', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('17', '30', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('18', '30', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('2', '44', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('6', '46', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('29', '48', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('1', '49', '25.00');
INSERT INTO `ospos_item_kit_items` VALUES ('13', '49', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('29', '49', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('1', '50', '25.00');
INSERT INTO `ospos_item_kit_items` VALUES ('5', '50', '2.00');
INSERT INTO `ospos_item_kit_items` VALUES ('7', '50', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('29', '50', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('30', '51', '1.00');
INSERT INTO `ospos_item_kit_items` VALUES ('31', '52', '1.00');

-- ----------------------------
-- Table structure for ospos_modules
-- ----------------------------
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

-- ----------------------------
-- Records of ospos_modules
-- ----------------------------
INSERT INTO `ospos_modules` VALUES ('module_config', 'module_config_desc', '100', 'config', 'Configuración', 'Cambiar la configuración de la tienda');
INSERT INTO `ospos_modules` VALUES ('module_customers', 'module_customers_desc', '10', 'customers', 'Clientes', 'Agregar, Actualizar, Borrar y Buscar clientes');
INSERT INTO `ospos_modules` VALUES ('module_design', 'module_design_desc', '110', 'designs', 'Diseño', 'Agregar, Actualizar diseños');
INSERT INTO `ospos_modules` VALUES ('module_employees', 'module_employees_desc', '80', 'employees', 'Empleados', 'Agregar, Actualizar, Borrar y Buscar empleados');
INSERT INTO `ospos_modules` VALUES ('module_giftcards', 'module_giftcards_desc', '90', 'giftcards', 'Tarjetas de Regalo', 'Agregar, Actualizar, Borrar y Buscar Tarjetas de Regalo');
INSERT INTO `ospos_modules` VALUES ('module_items', 'module_items_desc', '20', 'items', 'Artículos', 'Agregar, Actualizar, Borrar y Buscar artículos');
INSERT INTO `ospos_modules` VALUES ('module_item_kits', 'module_item_kits_desc', '30', 'item_kits', 'Kits de Artículos', 'Agregar, Actualizar, Borrar y Buscar Kits de Artículos');
INSERT INTO `ospos_modules` VALUES ('module_receivings', 'module_receivings_desc', '60', 'receivings', 'Compras', 'Procesar órdenes de compra');
INSERT INTO `ospos_modules` VALUES ('module_reports', 'module_reports_desc', '50', 'reports', 'Reportes', 'Ver y generar reportes');
INSERT INTO `ospos_modules` VALUES ('module_sales', 'module_sales_desc', '70', 'sales', 'Ventas', 'Procesar ventas y devoluciones');
INSERT INTO `ospos_modules` VALUES ('module_suppliers', 'module_suppliers_desc', '40', 'suppliers', 'Proveedores', 'Agregar, Actualizar, Borrar y Buscar proveedores');
INSERT INTO `ospos_modules` VALUES ('module_travel', 'module_travel_desc', '120', 'travel', 'Viajes', 'Generar Viajes');

-- ----------------------------
-- Table structure for ospos_payment
-- ----------------------------
DROP TABLE IF EXISTS `ospos_payment`;
CREATE TABLE `ospos_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `igv` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `dscto` decimal(10,0) NOT NULL,
  `dscto_type_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ospos_payment
-- ----------------------------

-- ----------------------------
-- Table structure for ospos_payment_detail
-- ----------------------------
DROP TABLE IF EXISTS `ospos_payment_detail`;
CREATE TABLE `ospos_payment_detail` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `travel_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ospos_payment_detail
-- ----------------------------

-- ----------------------------
-- Table structure for ospos_people
-- ----------------------------
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
  `birthplace` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `type_person_id` varchar(255) DEFAULT NULL,
  `num_passport` varchar(255) DEFAULT NULL,
  `has_passport` varchar(255) DEFAULT NULL,
  `date_passport` date DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2147483647 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_people
-- ----------------------------
INSERT INTO `ospos_people` VALUES ('Julio Cesar', 'Llavilla', '943973537', 'llavillaccama@gmail.com', 'Lima - Peru', '', '', '', '01', '', '', '1', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('', '', '', '', '', '', '', '', '', '', '', '2', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('trere', 'erer', '', 'dfsdf@aeqweqwe', '', null, null, null, null, null, '', '12323', 'qweqew', '0000-00-00', '01', '12343234', '1', null, 'asda');
INSERT INTO `ospos_people` VALUES ('JOHAN ANTONIO', 'CAÑARI HUAMANI', '5709327', 'johins2x@gmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', '', 'PERU', 'NUEVO CLIENTE', '12345678', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('ROSA', 'HUAMANI CHOQUE', '1234567', 'rosa@gmail.com', 'SC. 10 GRP. 3 MZ. J LT. 15', '0', '0', '0', '0', '0', '0', '23242526', null, '0000-00-00', null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('CARLOS', 'SALDARRIAGA', '1234567', 'carlos@gmail.com', 'VILLA MARIA DEL TRIUNFO', '0', '0', '0', '0', '0', '0', '33343536', null, '0000-00-00', null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('BORRAR', 'BORRAR', '1234567', 'BORRAR', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', '', 'PERU', 'NUEVO CLIENTE', '43215678', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('SASUKE ', 'UCHIHA UCHIHA', '1234567', 'sasuke@gmail.com', 'KONOHA              ', '0', '0', '0', '0', '0', '0', '44454647', null, '0000-00-00', null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('aadsasddas', 'sddsdads', '1234567', 'johan2x_69@hotmail.com', 'VILLA EL SALVADOR', '', '', '', '', '', '', '48227010', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('Johan Antonio', 'Cañari Huamani', '', 'johanc.cca@gmail.com', '', '', '', '', '01', '', '', '48227019', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('JUAN CARLOS', 'REYES REYES', '', 'pelotero_tz89@hotmail.com', '', '', '', '', '01', '', '', '48227020', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('asasssaas', 'asaassa', '1234567', 'pelotero_tz89@hotmail.com', '              SDSDDDDDSD', '0', '0', '0', '0', '0', '0', '54555657', null, '0000-00-00', null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('JOEL YENER', 'ESPINOZA HUAMANI', '1234567', 'canari_343@hotmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', '', '', 'PERU', 'NUEVO CLIENTE', '87654321', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('JOHAN ANTONIO', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', '', 'PERU', 'NUEVO PROVEEDORR', '87654322', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('JOEL YENER', 'ESPINOZA HUAMANI', '1234567', 'johins2x@gmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', '', 'PERU', 'NUEVO PROVEEDOR', '87654323', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('JOHAN', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', '', 'PERU', 'NUEVO EMPLEADO', '87654324', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('JOHAN', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', '', '', '', '87654325', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('JOHAN', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', 'VILLA EL SALVADOR', 'VILLA EL SALVADOR', 'LIMA', 'LIMA', 'qwq', 'PERU', 'wqed1', '87654326', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('JOHAN', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', '', '', '', '', '', '', 'asddddddddddddddddd', '87654343', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('JOHAN', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', '', '', '', '', '', '', 'weeeeeeeeeeeeeeeeee', '87654344', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('JOHAN', 'CAÑARI HUAMANI', '1234567', 'johan2x_69@hotmail.com', '', '', '', '', '', '', 'qwwwwwwwwwwwwww', '87654345', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '87654346', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('ssssss', 'sssssss', '1234567', 'johan2x_69@hotmail.com', 'VILLA EL SALVADOR', '', '', '', '', '', '', '87654347', null, null, null, null, null, null, null);
INSERT INTO `ospos_people` VALUES ('Naruto', 'Uzumaki', '1234567', 'naruto@gmail.com', '', '', '', '', '01', '', '', '2147483647', null, '0000-00-00', null, null, null, null, null);

-- ----------------------------
-- Table structure for ospos_permissions
-- ----------------------------
DROP TABLE IF EXISTS `ospos_permissions`;
CREATE TABLE `ospos_permissions` (
  `module_id` varchar(255) NOT NULL,
  `person_id` int(10) NOT NULL,
  PRIMARY KEY (`module_id`,`person_id`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `ospos_permissions_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `ospos_employees` (`person_id`),
  CONSTRAINT `ospos_permissions_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `ospos_modules` (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_permissions
-- ----------------------------
INSERT INTO `ospos_permissions` VALUES ('config', '1');
INSERT INTO `ospos_permissions` VALUES ('customers', '1');
INSERT INTO `ospos_permissions` VALUES ('employees', '1');
INSERT INTO `ospos_permissions` VALUES ('items', '1');
INSERT INTO `ospos_permissions` VALUES ('item_kits', '1');
INSERT INTO `ospos_permissions` VALUES ('receivings', '1');
INSERT INTO `ospos_permissions` VALUES ('reports', '1');
INSERT INTO `ospos_permissions` VALUES ('sales', '1');
INSERT INTO `ospos_permissions` VALUES ('suppliers', '1');
INSERT INTO `ospos_permissions` VALUES ('travel', '1');
INSERT INTO `ospos_permissions` VALUES ('config', '87654324');
INSERT INTO `ospos_permissions` VALUES ('customers', '87654324');
INSERT INTO `ospos_permissions` VALUES ('employees', '87654324');
INSERT INTO `ospos_permissions` VALUES ('items', '87654324');
INSERT INTO `ospos_permissions` VALUES ('receivings', '87654324');
INSERT INTO `ospos_permissions` VALUES ('reports', '87654324');
INSERT INTO `ospos_permissions` VALUES ('sales', '87654324');
INSERT INTO `ospos_permissions` VALUES ('suppliers', '87654324');

-- ----------------------------
-- Table structure for ospos_property
-- ----------------------------
DROP TABLE IF EXISTS `ospos_property`;
CREATE TABLE `ospos_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `key` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(200) DEFAULT NULL,
  `module_id` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ospos_property
-- ----------------------------
INSERT INTO `ospos_property` VALUES ('1', 'Tipos de Tallas', null, 'Tipos de Tallas', '2018-01-23', null, '0', 'select', 'items', '0');
INSERT INTO `ospos_property` VALUES ('2', 'Talla S', 'talla_s', 'Talla S', '2018-01-23', null, '1', 'select', 'items', '0');
INSERT INTO `ospos_property` VALUES ('3', 'Talla M', 'talla_m', 'Talla M', '2018-01-23', null, '1', 'select', 'items', '0');
INSERT INTO `ospos_property` VALUES ('4', 'Talla L', 'talla_l', 'Talla L', '2018-01-24', null, '1', 'select', 'items', '0');
INSERT INTO `ospos_property` VALUES ('5', 'Fecha Expiración', 'fecha_expiracion', 'Fecha Expiración', '2018-02-24', null, '0', 'date', 'customer', '2');
INSERT INTO `ospos_property` VALUES ('6', 'Pasaporte', 'pasaporte', 'Pasaporte', '2018-02-24', null, '0', 'text', 'customer', '1');
INSERT INTO `ospos_property` VALUES ('7', 'Ticket', 'ticket', 'Ticket', '2018-03-11', null, '0', 'text', 'travel', '0');
INSERT INTO `ospos_property` VALUES ('8', 'Hotel', 'hotel', 'Hotel', '2018-03-11', null, '0', 'text', 'travel', '0');
INSERT INTO `ospos_property` VALUES ('9', 'Auto', 'auto', 'Auto', '2018-03-11', null, '0', 'text', 'travel', '0');
INSERT INTO `ospos_property` VALUES ('10', 'Seguro', 'seguro', 'Seguro', '2018-03-11', null, '0', 'text', 'travel', '0');
INSERT INTO `ospos_property` VALUES ('11', 'Paquete', 'paquete', 'Paquete', '2018-03-11', null, '0', 'text', 'travel', '0');
INSERT INTO `ospos_property` VALUES ('12', 'Tours', 'tours', 'Tours', '2018-03-11', null, '0', 'text', 'travel', '0');
INSERT INTO `ospos_property` VALUES ('13', 'Crucero', 'crucero', 'Crucero', '2018-03-11', null, '0', 'text', 'travel', '0');
INSERT INTO `ospos_property` VALUES ('14', 'Trenes', 'trenes', 'Trenes', '2018-03-11', null, '0', 'text', 'travel', '0');
INSERT INTO `ospos_property` VALUES ('15', 'Entradas', 'entradas', 'Entradas', '2018-03-11', null, '0', 'text', 'travel', '0');
INSERT INTO `ospos_property` VALUES ('16', 'Vuelo de regreso', 'regreso', 'Vuelo de regreso', '2018-03-11', null, '0', 'text', 'travel', '0');
INSERT INTO `ospos_property` VALUES ('17', 'Otros', 'otros', 'Otros', '2018-03-11', null, '0', 'text', 'travel', '0');

-- ----------------------------
-- Table structure for ospos_receivings
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_receivings
-- ----------------------------
INSERT INTO `ospos_receivings` VALUES ('2016-07-29 14:55:11', '87654322', '1', 'COMPRA DE CARTELES', '1', 'Efectivo');
INSERT INTO `ospos_receivings` VALUES ('2017-08-19 13:56:33', '87654322', '1', 'PAGO POR ARTICULOS DE ZAPATILLAS.', '2', 'Efectivo');

-- ----------------------------
-- Table structure for ospos_receivings_items
-- ----------------------------
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

-- ----------------------------
-- Records of ospos_receivings_items
-- ----------------------------
INSERT INTO `ospos_receivings_items` VALUES ('1', '44', 'CARTELES', '0', '1', '20.00', '200.00', '200.00', '0.00');
INSERT INTO `ospos_receivings_items` VALUES ('2', '48', 'asaas', '0', '1', '12.00', '23.00', '23.00', '0.00');

-- ----------------------------
-- Table structure for ospos_sales
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_sales
-- ----------------------------
INSERT INTO `ospos_sales` VALUES ('2014-08-14 19:46:08', null, '1', '', '1', 'Efectivo: $20.00<br />');
INSERT INTO `ospos_sales` VALUES ('2014-08-15 09:52:34', null, '1', '', '2', 'Efectivo: S/.72.00<br />');
INSERT INTO `ospos_sales` VALUES ('2014-08-18 09:22:57', null, '1', '0', '3', 'Efectivo: S/.83.76<br />');
INSERT INTO `ospos_sales` VALUES ('2014-08-18 09:23:40', null, '1', '0', '4', 'Efectivo: S/.0.00<br />');
INSERT INTO `ospos_sales` VALUES ('2014-08-18 09:24:31', null, '1', '', '5', 'Efectivo: S/.0.00<br />');
INSERT INTO `ospos_sales` VALUES ('2014-08-18 09:27:46', null, '1', '0', '6', 'Efectivo: S/.36.00<br />');
INSERT INTO `ospos_sales` VALUES ('2014-08-18 09:33:13', null, '1', '0', '7', 'Efectivo: S/.12.00<br />');
INSERT INTO `ospos_sales` VALUES ('2014-12-04 08:45:07', null, '1', '0', '8', 'Efectivo: S/.62.00<br />');
INSERT INTO `ospos_sales` VALUES ('2016-07-29 14:56:52', '12345678', '1', 'COMPRA DE CARTELES', '9', 'Efectivo: S/.750.00<br />');
INSERT INTO `ospos_sales` VALUES ('2017-02-02 10:12:50', '12345678', '1', 'GRACIAS POR SU COMPRA', '10', 'Efectivo: S/.12.00<br />');
INSERT INTO `ospos_sales` VALUES ('2017-04-13 17:28:30', null, '1', '0', '11', 'Efectivo: S/.500.00<br />');
INSERT INTO `ospos_sales` VALUES ('2017-04-13 17:30:35', '87654321', '1', '0', '12', 'Efectivo: S/.100.00<br />Tarjeta de Crédito: S/.150.00<br />');

-- ----------------------------
-- Table structure for ospos_sales_items
-- ----------------------------
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

-- ----------------------------
-- Records of ospos_sales_items
-- ----------------------------
INSERT INTO `ospos_sales_items` VALUES ('1', '1', '', '', '1', '1.00', '20.00', '20.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('2', '3', '', '', '1', '5.00', '10.00', '12.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('2', '7', '', '', '2', '1.00', '10.00', '12.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('3', '3', '', '', '1', '5.00', '10.00', '12.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('3', '8', '0', '0', '3', '2.00', '10.00', '12.00', '1.00');
INSERT INTO `ospos_sales_items` VALUES ('4', '29', '', '', '1', '1.00', '0.00', '0.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('5', '33', '', '', '1', '1.00', '0.00', '0.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('6', '26', '', '', '1', '1.00', '10.00', '12.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('6', '32', '0', '0', '2', '2.00', '10.00', '12.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('7', '30', '', '', '1', '1.00', '10.00', '12.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('8', '28', '', '', '1', '1.00', '10.00', '12.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('9', '44', '0', '0', '1', '3.00', '200.00', '250.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('10', '27', '', '', '1', '1.00', '10.00', '12.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('11', '50', '0', '0', '1', '2.00', '200.00', '250.00', '0.00');
INSERT INTO `ospos_sales_items` VALUES ('12', '49', 'aaaaaaaaaaa', '', '1', '1.00', '200.00', '250.00', '0.00');

-- ----------------------------
-- Table structure for ospos_sales_items_taxes
-- ----------------------------
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

-- ----------------------------
-- Records of ospos_sales_items_taxes
-- ----------------------------
INSERT INTO `ospos_sales_items_taxes` VALUES ('9', '44', '1', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_sales_items_taxes` VALUES ('9', '44', '1', 'Impuesto de Ventas 2', '0.00');
INSERT INTO `ospos_sales_items_taxes` VALUES ('12', '49', '1', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_sales_items_taxes` VALUES ('12', '49', '1', 'Impuesto de Ventas 2', '0.00');
INSERT INTO `ospos_sales_items_taxes` VALUES ('11', '50', '1', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_sales_items_taxes` VALUES ('11', '50', '1', 'Impuesto de Ventas 2', '0.00');

-- ----------------------------
-- Table structure for ospos_sales_payments
-- ----------------------------
DROP TABLE IF EXISTS `ospos_sales_payments`;
CREATE TABLE `ospos_sales_payments` (
  `sale_id` int(10) NOT NULL,
  `payment_type` varchar(40) NOT NULL,
  `payment_amount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`sale_id`,`payment_type`),
  CONSTRAINT `ospos_sales_payments_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_sales_payments
-- ----------------------------
INSERT INTO `ospos_sales_payments` VALUES ('1', 'Efectivo', '20.00');
INSERT INTO `ospos_sales_payments` VALUES ('2', 'Efectivo', '72.00');
INSERT INTO `ospos_sales_payments` VALUES ('3', 'Efectivo', '83.76');
INSERT INTO `ospos_sales_payments` VALUES ('4', 'Efectivo', '0.00');
INSERT INTO `ospos_sales_payments` VALUES ('5', 'Efectivo', '0.00');
INSERT INTO `ospos_sales_payments` VALUES ('6', 'Efectivo', '36.00');
INSERT INTO `ospos_sales_payments` VALUES ('7', 'Efectivo', '12.00');
INSERT INTO `ospos_sales_payments` VALUES ('8', 'Efectivo', '62.00');
INSERT INTO `ospos_sales_payments` VALUES ('9', 'Efectivo', '750.00');
INSERT INTO `ospos_sales_payments` VALUES ('10', 'Efectivo', '12.00');
INSERT INTO `ospos_sales_payments` VALUES ('11', 'Efectivo', '500.00');
INSERT INTO `ospos_sales_payments` VALUES ('12', 'Efectivo', '100.00');
INSERT INTO `ospos_sales_payments` VALUES ('12', 'Tarjeta de Crédito', '150.00');

-- ----------------------------
-- Table structure for ospos_sales_suspended
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_sales_suspended
-- ----------------------------
INSERT INTO `ospos_sales_suspended` VALUES ('2017-04-13 17:27:40', '12345678', '1', '', '1', 'Efectivo: S/.1100.00<br />');

-- ----------------------------
-- Table structure for ospos_sales_suspended_items
-- ----------------------------
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

-- ----------------------------
-- Records of ospos_sales_suspended_items
-- ----------------------------
INSERT INTO `ospos_sales_suspended_items` VALUES ('1', '50', '0', '0', '1', '2.00', '200.00', '250.00', '0.00');

-- ----------------------------
-- Table structure for ospos_sales_suspended_items_taxes
-- ----------------------------
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

-- ----------------------------
-- Records of ospos_sales_suspended_items_taxes
-- ----------------------------
INSERT INTO `ospos_sales_suspended_items_taxes` VALUES ('1', '50', '1', 'Impuesto de Ventas 1', '0.00');
INSERT INTO `ospos_sales_suspended_items_taxes` VALUES ('1', '50', '1', 'Impuesto de Ventas 2', '0.00');

-- ----------------------------
-- Table structure for ospos_sales_suspended_payments
-- ----------------------------
DROP TABLE IF EXISTS `ospos_sales_suspended_payments`;
CREATE TABLE `ospos_sales_suspended_payments` (
  `sale_id` int(10) NOT NULL,
  `payment_type` varchar(40) NOT NULL,
  `payment_amount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`sale_id`,`payment_type`),
  CONSTRAINT `ospos_sales_suspended_payments_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `ospos_sales_suspended` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_sales_suspended_payments
-- ----------------------------
INSERT INTO `ospos_sales_suspended_payments` VALUES ('1', 'Efectivo', '1100.00');

-- ----------------------------
-- Table structure for ospos_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ospos_sessions`;
CREATE TABLE `ospos_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ospos_sessions
-- ----------------------------
INSERT INTO `ospos_sessions` VALUES ('0a5e4049daf7d6566e324a68a40a3388', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '1495682670', 'a:1:{s:9:\"person_id\";s:1:\"1\";}');
INSERT INTO `ospos_sessions` VALUES ('0b5b9541101a036ff23caab7a3546adf', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', '1478573480', '');
INSERT INTO `ospos_sessions` VALUES ('15ab9e1151ebbaaf2783afe9138f772c', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', '1492210626', '');
INSERT INTO `ospos_sessions` VALUES ('19ce0e45cffcfeb6b81e99c1a8eb1368', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', '1492210294', '');
INSERT INTO `ospos_sessions` VALUES ('19db4993ef983e31fb78a08a4885e81d', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '1519440294', 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}');
INSERT INTO `ospos_sessions` VALUES ('47f048adabaf69140fad485708c7879d', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '1519440207', '');
INSERT INTO `ospos_sessions` VALUES ('576270e7516e3702b6b4517ebb490a40', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', '1479002743', 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}');
INSERT INTO `ospos_sessions` VALUES ('6887a0c9112a48c388591f2732e7b83e', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '1521432302', 'a:5:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:8:\"cartRecv\";a:0:{}s:9:\"recv_mode\";s:7:\"receive\";s:8:\"supplier\";i:-1;}');
INSERT INTO `ospos_sessions` VALUES ('774f9dc5cefc710f0b9647aa8b497cbd', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0', '1462669450', '');
INSERT INTO `ospos_sessions` VALUES ('7ce5560dad82b95c3280ec1fe0398518', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/64.0.3282.140 Chrome/64.0.3282.14', '1521231891', 'a:1:{s:9:\"person_id\";s:1:\"1\";}');
INSERT INTO `ospos_sessions` VALUES ('a20e5571b2e27679492d93672b953917', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '1497825027', 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}');
INSERT INTO `ospos_sessions` VALUES ('b617719c875d994a0784478a0d31203b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36', '1479003997', '');
INSERT INTO `ospos_sessions` VALUES ('b97c0f067809cd5a8bc357001d6ad1ea', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/64.0.3282.167 Chrome/64.0.3282.16', '1521235796', 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}');
INSERT INTO `ospos_sessions` VALUES ('bb1f0cf4b14cde076fdc42bd54b14d8f', '192.168.0.131', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0', '1522161529', 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}');
INSERT INTO `ospos_sessions` VALUES ('bbb608959c6ebec75ec15c5af8cf82a6', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '1500004670', 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}');
INSERT INTO `ospos_sessions` VALUES ('c762de67a11225edd345578eed4e8403', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36', '1504672037', '');
INSERT INTO `ospos_sessions` VALUES ('c96ca8408341225cc5c43ef1452cbb52', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/64.0.3282.167 Chrome/64.0.3282.16', '1521924991', 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}');
INSERT INTO `ospos_sessions` VALUES ('cd6b2496da61571fd7ee436397fbf917', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '1519579378', '');
INSERT INTO `ospos_sessions` VALUES ('d2c31f820701e8458fcee87531001733', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '1500349611', '');
INSERT INTO `ospos_sessions` VALUES ('eb94417a96c650f61a998a7ce0ad15d4', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '1522114639', 'a:5:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:8:\"cartRecv\";a:0:{}s:9:\"recv_mode\";s:7:\"receive\";s:8:\"supplier\";i:-1;}');
INSERT INTO `ospos_sessions` VALUES ('ef9b5ce9c8b81a7e600e4d7b08943f79', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '1520818375', 'a:2:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";}');
INSERT INTO `ospos_sessions` VALUES ('f9041481a95a89ca9a611244ec84a91f', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '1521255403', 'a:5:{s:9:\"user_data\";s:0:\"\";s:9:\"person_id\";s:1:\"1\";s:8:\"cartRecv\";a:0:{}s:9:\"recv_mode\";s:7:\"receive\";s:8:\"supplier\";i:-1;}');

-- ----------------------------
-- Table structure for ospos_suppliers
-- ----------------------------
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

-- ----------------------------
-- Records of ospos_suppliers
-- ----------------------------
INSERT INTO `ospos_suppliers` VALUES ('87654322', 'OCEO S.A.C', null, '0');
INSERT INTO `ospos_suppliers` VALUES ('87654323', 'DETODO', null, '0');
INSERT INTO `ospos_suppliers` VALUES ('87654325', 'SAP TECNO', null, '1');
INSERT INTO `ospos_suppliers` VALUES ('87654326', 'SAP TECNO', '12345678', '1');
INSERT INTO `ospos_suppliers` VALUES ('87654343', 'aasasad', null, '1');
INSERT INTO `ospos_suppliers` VALUES ('87654344', 'aasasad', null, '0');
INSERT INTO `ospos_suppliers` VALUES ('87654345', 'aasasad', null, '0');
INSERT INTO `ospos_suppliers` VALUES ('87654347', 'CDDD', null, '0');

-- ----------------------------
-- Table structure for ospos_travel
-- ----------------------------
DROP TABLE IF EXISTS `ospos_travel`;
CREATE TABLE `ospos_travel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `destiny_origin` varchar(400) NOT NULL,
  `destiny_end` varchar(400) NOT NULL,
  `date_init` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `type_travel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 COMMENT='tabla para el registro de tablas';

-- ----------------------------
-- Records of ospos_travel
-- ----------------------------
INSERT INTO `ospos_travel` VALUES ('1', '1212121', 'ddsdsdsdsd', 'LIMA', 'PIURA', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-10 23:47:36', null);
INSERT INTO `ospos_travel` VALUES ('2', '1212121', 'ddsdsdsdsd', 'LIMA', 'PIURA', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-10 23:52:27', null);
INSERT INTO `ospos_travel` VALUES ('3', '1212121', 'ddsdsdsdsd', 'LIMA', 'PIURA', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-11 00:02:44', null);
INSERT INTO `ospos_travel` VALUES ('4', '1212121', 'ddsdsdsdsd', 'LIMA', 'PIURA', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-11 00:08:09', null);
INSERT INTO `ospos_travel` VALUES ('5', 'wqwqwqwq', 'qwqwqwqw', 'LIMA', 'PIURA', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-11 00:09:34', null);
INSERT INTO `ospos_travel` VALUES ('6', '0', '0', '0', '0', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 22:31:51', null);
INSERT INTO `ospos_travel` VALUES ('7', '0', '0', '0', '0', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 22:32:50', null);
INSERT INTO `ospos_travel` VALUES ('8', '0', '0', '0', '0', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 22:35:58', null);
INSERT INTO `ospos_travel` VALUES ('9', '0', '0', '0', '0', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 22:36:02', null);
INSERT INTO `ospos_travel` VALUES ('10', '0', '0', '0', '0', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 22:37:28', null);
INSERT INTO `ospos_travel` VALUES ('11', '0', '0', '0', '0', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 22:40:39', null);
INSERT INTO `ospos_travel` VALUES ('12', '0', '0', '0', '0', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 22:41:13', null);
INSERT INTO `ospos_travel` VALUES ('13', '0', '0', '0', '0', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 22:43:46', null);
INSERT INTO `ospos_travel` VALUES ('14', '0', '0', '0', '0', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 22:46:08', null);
INSERT INTO `ospos_travel` VALUES ('15', '0', '0', '0', '0', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 23:00:56', null);
INSERT INTO `ospos_travel` VALUES ('16', 'codigo11', 'asdad', 'asdad', 'asdads', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 23:18:46', '2');
INSERT INTO `ospos_travel` VALUES ('17', 'asc', 'asdad', 'asdad', '0', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 23:21:42', '2');
INSERT INTO `ospos_travel` VALUES ('18', 'codigo11', '123', 'aca', '0', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-16 23:22:49', '3');
INSERT INTO `ospos_travel` VALUES ('19', 'TRAVEL18', '12121212', 'LIMA', 'PERU', '2018-03-23 20:55:10', '2018-03-23 20:55:17', '2018-03-23 20:48:04', '1');
INSERT INTO `ospos_travel` VALUES ('20', 'TRAVEL19', 'vueloo', 'aqui', 'alla', '2018-03-15 14:02:00', '2018-03-30 14:03:00', null, '');
INSERT INTO `ospos_travel` VALUES ('21', 'TRAVEL20', 'asd', '123', 'asd', '2018-03-22 14:02:00', '0000-00-00 00:00:00', null, '');
INSERT INTO `ospos_travel` VALUES ('22', 'TRAVEL21', 'asd', '213', 'awdasd', '2018-03-14 14:22:00', '2018-03-02 14:22:00', null, '');
INSERT INTO `ospos_travel` VALUES ('23', 'TRAVEL22', 'asd', '12', '12', '2018-03-13 14:02:00', '2018-03-15 14:02:00', null, '');
INSERT INTO `ospos_travel` VALUES ('24', 'TRAVEL22', 'asd', '12', '12', '2018-03-13 14:02:00', '2018-03-15 14:02:00', null, '');
INSERT INTO `ospos_travel` VALUES ('25', 'TRAVEL24', 'asd', 'asd', 'asd', '2018-03-19 14:02:00', '2018-03-30 14:22:00', null, '');
INSERT INTO `ospos_travel` VALUES ('26', 'TRAVEL25', 'asd', 'asd', 'asd', '2018-03-06 14:22:00', '2018-03-30 14:22:00', null, '');
INSERT INTO `ospos_travel` VALUES ('27', 'TRAVEL26', 'asd', 'asd', 'ad', '2018-03-27 14:22:00', '2018-03-30 14:22:00', null, '');
INSERT INTO `ospos_travel` VALUES ('28', 'TRAVEL27', 'asd', 'asd', 'asd', '2018-03-08 14:22:00', '2018-03-31 14:22:00', null, '');
INSERT INTO `ospos_travel` VALUES ('29', 'TRAVEL28', 'asda', 'adasd', 'asda', '2018-03-21 14:22:00', '2018-03-30 14:22:00', null, '');
INSERT INTO `ospos_travel` VALUES ('30', 'TRAVEL29', 'asd', 'asd', 'asd', '2018-03-13 14:22:00', '2018-03-29 14:22:00', null, '');
INSERT INTO `ospos_travel` VALUES ('31', 'TRAVEL30', 'asd', 'asd', 'asd', '2018-03-21 14:22:00', '2018-03-30 14:22:00', null, '');
INSERT INTO `ospos_travel` VALUES ('32', 'TRAVEL31', 'vuelo', 'aqui', 'alla', '2018-03-01 14:22:00', '2018-03-09 14:22:00', null, '3');
INSERT INTO `ospos_travel` VALUES ('33', 'TRAVEL32', 'vuelo nombre', 'aqui', 'alla', '2018-03-13 14:22:00', '2018-03-14 14:22:00', null, '3');
INSERT INTO `ospos_travel` VALUES ('34', 'TRAVEL33', 'vueloooo', 'aqui', 'alla', '2018-03-19 14:22:00', '2018-03-28 15:33:00', null, '2');
INSERT INTO `ospos_travel` VALUES ('35', 'TRAVEL34', 'vuwloloooo', 'aca', 'alla', '2018-03-21 14:22:00', '2018-03-30 14:22:00', null, '2');
INSERT INTO `ospos_travel` VALUES ('36', 'TRAVEL35', 'q2123', 'aca', 'acaacccc', '2018-03-07 14:22:00', '2018-03-30 15:33:00', null, '2');
INSERT INTO `ospos_travel` VALUES ('37', 'TRAVEL36', '123123', 'assc', '3112', '2018-03-02 14:22:00', '2018-03-30 03:33:00', null, '2');
INSERT INTO `ospos_travel` VALUES ('38', 'TRAVEL37', '23231rfed', 'aca', 'alla', '2018-03-09 14:33:00', '2018-03-30 14:12:00', null, '1');
SET FOREIGN_KEY_CHECKS=1;
