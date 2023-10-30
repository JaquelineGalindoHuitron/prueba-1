create database `bdesteticagalindo`;

use `bdesteticagalindo`;

CREATE TABLE `login` (
  `id` int(9) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomusuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `tel` int(10) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomnegocio` varchar(100) NOT NULL,
  `tproducto` varchar(100) NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  CONSTRAINT FK_proveedor_1
  FOREIGN KEY (login_id) REFERENCES login(id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;
