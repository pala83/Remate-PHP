ALTER TABLE articulo
    DROP CONSTRAINT fk_cliente_art;
DROP TABLE articulo;
DROP TABLE cliente;

CREATE DATABASE remate;

CREATE TABLE cliente(
    id_cliente int(11) NOT NULL AUTO_INCREMENT,
    nombre varchar(20) NOT NULL,
    apellido varchar(20) NOT NULL,
    telefono int(11) NOT NULL,
    email varchar(50),
    PRIMARY KEY (id_cliente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE articulo(
    id_articulo int(11) NOT NULL AUTO_INCREMENT,
    nombre_art varchar(20) NOT NULL,
    cantidad int(5) DEFAULT 1,
    imagen mediumblob NOT NULL,
    descripcion text,
    valor_base float,
    id_cliente int (11) NOT NULL,
    PRIMARY KEY (id_articulo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE articulo
    ADD CONSTRAINT fk_art_cliente
    FOREIGN KEY (id_cliente)
    REFERENCES cliente(id_cliente) 
    ON DELETE RESTRICT ON UPDATE CASCADE;

INSERT INTO cliente(nombre, apellido, telefono) VALUES ('Fulano', 'Detal', '2494010101');
INSERT INTO cliente(nombre, apellido, telefono, email) VALUES ('Mengano', 'Detal', '2494010102', 'mengano@gmail.com');
INSERT INTO cliente(nombre, apellido, telefono, email) VALUES ('Mariano', 'Lopez', '2494010103', 'mariano@gmail.com');
INSERT INTO cliente(nombre, apellido, telefono) VALUES ('Ana', 'Perez', '2494010104');
INSERT INTO cliente(nombre, apellido, telefono) VALUES ('Maria', 'Dentel', '2494010105');
INSERT INTO cliente(nombre, apellido, telefono, email) VALUES ('Jose', 'Hernandez', '2494010106', 'jose@live.com');
INSERT INTO cliente(nombre, apellido, telefono, email) VALUES ('Jorge', 'Cafrune', '2494010107', 'cafrune@gmail.com');

INSERT INTO articulo(nombre_art, descripcion, valor_base, id_cliente) VALUES ('Mesa', 'Mesa de algarrobo para 8 sillas', '50000', '1');
INSERT INTO articulo(nombre_art, descripcion, valor_base, id_cliente) VALUES ('Reloj antiguo', 'Reloj con pendulo a cuerda, madera de roble', '150000', '1');
INSERT INTO articulo(nombre_art, descripcion, valor_base, id_cliente) VALUES ('Fiat 128', 'Esta como nuevo, eso si medio flojo de papeles', '1000000', '1');
INSERT INTO articulo(nombre_art, valor_base, id_cliente) VALUES ('', '', '1');
INSERT INTO articulo(nombre_art, valor_base, id_cliente) VALUES ('', '', '1');
INSERT INTO articulo(nombre_art, valor_base, id_cliente) VALUES ('', '', '1');
INSERT INTO articulo(nombre_art, descripcion, id_cliente) VALUES ('', '', '1');
INSERT INTO articulo(nombre_art, descripcion, id_cliente) VALUES ('', '', '1');
INSERT INTO articulo(nombre_art, descripcion, id_cliente) VALUES ('', '', '1');
INSERT INTO articulo(nombre_art, descripcion, id_cliente) VALUES ('', '', '1');
INSERT INTO articulo(nombre_art, id_cliente) VALUES ('', '1');
INSERT INTO articulo(nombre_art, id_cliente) VALUES ('', '1');
INSERT INTO articulo(nombre_art, id_cliente) VALUES ('', '1');
INSERT INTO articulo(nombre_art, id_cliente) VALUES ('', '1');
INSERT INTO articulo(nombre_art, id_cliente) VALUES ('', '1');
INSERT INTO articulo(nombre_art, id_cliente) VALUES ('', '1');

ALTER TABLE cliente
    MODIFY COLUMN telefono int(11);

ALTER TABLE articulo
    ADD cantidad int(5),
    ADD imagen mediumblob;

--2494-336028