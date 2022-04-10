CREATE TABLE pedido (
  id int(11) NOT NULL auto_increment,
  nombre varchar(100) NOT NULL,
  correo varchar(100) NOT NULL,
  telefono varchar(100) NOT NULL,
  comida varchar(100) NOT NULL,
  direccion varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;