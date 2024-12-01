CREATE DATABASE IF NOT EXISTS VIVIENDAS;
USE VIVIENDAS;

DROP TABLE PROPIETARIO;
DROP TABLE PERSONA;
DROP TABLE VIVIENDA;
DROP TABLE MUNICIPIO;

CREATE TABLE MUNICIPIO
(
    ID_MUNICIPIO INT(4) UNSIGNED NOT NULL PRIMARY KEY,
    NOMBRE VARCHAR(25) NOT NULL,
    CONSTRAINT CK_ID_MUNICIPIO CHECK(LENGTH(ID_MUNICIPIO)=4)
);

CREATE TABLE VIVIENDA
(
    NUM_VIVIENDA INT UNSIGNED PRIMARY KEY AUTO_INCREMENT, 
    REF_CATASTRAL VARCHAR(25) NOT NULL UNIQUE,
    CALLE VARCHAR(25) NOT NULL,
    NUMERO INT(4) UNSIGNED,
    ID_MUNICIPIO INT(4) UNSIGNED NOT NULL,
    CONSTRAINT CK_REF_CATASTRAL CHECK(CHAR_LENGTH(REF_CATASTRAL)=25),
    CONSTRAINT FK_MUNICIPIO FOREIGN KEY(ID_MUNICIPIO) REFERENCES MUNICIPIO(ID_MUNICIPIO)
);

CREATE TABLE PERSONA
(
    NUM_HABITANTE INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    DNI VARCHAR(9) UNIQUE NOT NULL,
    NOMBRE VARCHAR(25),
    CABEZA_FAMILIA INT UNSIGNED,
    VIVIENDA_HABITADA INT UNSIGNED,
    VIVIENDA_PADRON INT UNSIGNED,
    CONSTRAINT FK_PERSONA FOREIGN KEY(CABEZA_FAMILIA) REFERENCES PERSONA(NUM_HABITANTE),
    CONSTRAINT FK_VIVIENDA_HABIT FOREIGN KEY(VIVIENDA_HABITADA) REFERENCES VIVIENDA(NUM_VIVIENDA),
    CONSTRAINT FK_VIVIENDA_PADRON FOREIGN KEY(VIVIENDA_PADRON) REFERENCES VIVIENDA(NUM_VIVIENDA),
    CONSTRAINT CK_DNI CHECK(DNI REGEXP ('^[0-9]{8}[A-Z]$'))
);

CREATE TABLE PROPIETARIO
(
    ID_PROPIETARIO INT UNSIGNED,
    ID_VIVIENDA INT UNSIGNED,
    CONSTRAINT FK1_PROPIETARIO FOREIGN KEY(ID_PROPIETARIO) REFERENCES PERSONA(NUM_HABITANTE),
    CONSTRAINT FK2_PROPIETARIO FOREIGN KEY(ID_VIVIENDA) REFERENCES VIVIENDA(NUM_VIVIENDA),
    CONSTRAINT PK_PROPIETARIO PRIMARY KEY(ID_PROPIETARIO, ID_VIVIENDA)
);