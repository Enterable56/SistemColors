SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS sistemcolors;

USE sistemcolors;

DROP TABLE IF EXISTS categorias;

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO categorias VALUES("1","ferreteria","1");
INSERT INTO categorias VALUES("2","Pintura","1");



DROP TABLE IF EXISTS clientes;

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `detalles_personalescli` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `detalles_personalescli` (`detalles_personalescli`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`detalles_personalescli`) REFERENCES `detalles_personalescli` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO clientes VALUES("1","Raul","Sanchez","1");
INSERT INTO clientes VALUES("3","pablo","gomez","3");



DROP TABLE IF EXISTS compras;

CREATE TABLE `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO compras VALUES("1","100.00","2024-03-14 11:23:57");
INSERT INTO compras VALUES("2","120.00","2024-04-03 21:44:55");
INSERT INTO compras VALUES("3","45.00","2024-04-03 21:45:35");



DROP TABLE IF EXISTS configuracion;

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO configuracion VALUES("1","1441115","sistem color\'s","0412785148","Ciudad Bolivar - Venezuela","Gracias por su preferencia");



DROP TABLE IF EXISTS detalle_compra;

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_compra` (`id_compra`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO detalle_compra VALUES("1","1","1","7","10.00","70.00");
INSERT INTO detalle_compra VALUES("2","1","2","2","15.00","30.00");
INSERT INTO detalle_compra VALUES("3","2","2","8","15.00","120.00");
INSERT INTO detalle_compra VALUES("4","3","2","3","15.00","45.00");



DROP TABLE IF EXISTS detalle_temp;

CREATE TABLE `detalle_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sub_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_producto` (`id_producto`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `detalle_temp_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE,
  CONSTRAINT `detalle_temp_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_nombre`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;




DROP TABLE IF EXISTS detalle_ventas;

CREATE TABLE `detalle_ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` decimal(10,2) NOT NULL DEFAULT 0.00,
  `precio` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_venta` (`id_venta`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE,
  CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO detalle_ventas VALUES("1","3","2","15","50.00","25.00","325.00");
INSERT INTO detalle_ventas VALUES("2","4","1","20","25.00","20.00","375.00");
INSERT INTO detalle_ventas VALUES("3","4","2","10","50.00","25.00","200.00");
INSERT INTO detalle_ventas VALUES("4","5","1","50","450.00","20.00","550.00");
INSERT INTO detalle_ventas VALUES("5","5","2","40","685.00","25.00","315.00");
INSERT INTO detalle_ventas VALUES("6","6","1","5","26.00","20.00","74.00");
INSERT INTO detalle_ventas VALUES("7","6","2","2","25.00","25.00","25.00");



DROP TABLE IF EXISTS detalles;

CREATE TABLE `detalles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_producto` (`id_producto`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `detalles_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE,
  CONSTRAINT `detalles_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_nombre`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;




DROP TABLE IF EXISTS detalles_personales;

CREATE TABLE `detalles_personales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO detalles_personales VALUES("1","15566847");
INSERT INTO detalles_personales VALUES("3","28736583");
INSERT INTO detalles_personales VALUES("4","18753951");



DROP TABLE IF EXISTS detalles_personalescli;

CREATE TABLE `detalles_personalescli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(8) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO detalles_personalescli VALUES("1","28736888","04264789656","aqui");
INSERT INTO detalles_personalescli VALUES("3","12478965","04165885308","Urb. Los proceres, Manzana #13, casa #49");



DROP TABLE IF EXISTS medidas;

CREATE TABLE `medidas` (
  `id_medidas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `nombre_corto` varchar(5) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_medidas`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO medidas VALUES("1","kilogramos","Kg","1");
INSERT INTO medidas VALUES("2","Galon","G","1");
INSERT INTO medidas VALUES("3","Litro","L","1");



DROP TABLE IF EXISTS productos;

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `id_medida` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_producto`),
  KEY `id_medida` (`id_medida`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_medida`) REFERENCES `medidas` (`id_medidas`) ON UPDATE CASCADE,
  CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO productos VALUES("1","1","1/4 massilla plastica","10.00","20.00","-132","1","1","default.png","1");
INSERT INTO productos VALUES("2","2","1/4 Pintura Gris","15.00","25.00","-140","3","2","default.png","1");



DROP TABLE IF EXISTS tb_usuarios;

CREATE TABLE `tb_usuarios` (
  `id_nombre` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `detalles_personales` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_nombre`),
  KEY `detalles_personales` (`detalles_personales`),
  CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`detalles_personales`) REFERENCES `detalles_personales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO tb_usuarios VALUES("1","Robert","Sanchez","73340ec11281af7c2c87a181d70843ec89886dff7c6a84a31691c902b17e7bd5","1","0","1");
INSERT INTO tb_usuarios VALUES("3","Raul","Sanchez","93849fe5d626cfbe05a74e7466a662d597077ce6047181ce503746de2cf479ad","3","0","1");
INSERT INTO tb_usuarios VALUES("4","Luis","Yanez","4127e092b7986e47ad06a7e14519329e66c4f423173712a9ce090d95fe7a9b79","4","0","1");



DROP TABLE IF EXISTS ventas;

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO ventas VALUES("1","1","875.00","2024-04-16 12:44:36");
INSERT INTO ventas VALUES("2","1","325.00","2024-04-16 12:56:44");
INSERT INTO ventas VALUES("3","1","325.00","2024-04-16 12:59:00");
INSERT INTO ventas VALUES("4","1","575.00","2024-04-16 12:59:54");
INSERT INTO ventas VALUES("5","1","865.00","2024-04-21 17:46:36");
INSERT INTO ventas VALUES("6","3","99.00","2024-04-21 22:45:22");



SET FOREIGN_KEY_CHECKS=1;