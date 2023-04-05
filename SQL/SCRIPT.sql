-- -----------------------------------------------------
    -- Schema DESIS
    -- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DESIS` DEFAULT CHARACTER SET utf8; USE
    `DESIS`;
    
    -- -----------------------------------------------------
    -- DROP TABLE
    -- -----------------------------------------------------

DROP TABLE IF EXISTS
    `DESIS`.`FORM_OPCION`;
DROP TABLE IF EXISTS
    `DESIS`.`FORMULARIO`;
DROP TABLE IF EXISTS
    `DESIS`.`OPCION_ENTERAR`;
DROP TABLE IF EXISTS
    `DESIS`.`VOTANTE`;
DROP TABLE IF EXISTS
    `DESIS`.`CANDIDATO`;

DROP TABLE IF EXISTS
    `DESIS`.`COMUNA`;
DROP TABLE IF EXISTS
    `DESIS`.`REGION`;

    -- -----------------------------------------------------
    -- Table `DESIS`.`REGION`
    -- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `DESIS`.`REGION`(
    `idREGION` INT NOT NULL AUTO_INCREMENT,
    `nombreREGION` VARCHAR(250) NOT NULL,
    PRIMARY KEY(`idREGION`)
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `DESIS`.`COMUNA`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `DESIS`.`COMUNA`(
    `idCOMUNA` INT NOT NULL AUTO_INCREMENT,
    `nombreCOMUNA` VARCHAR(250) NOT NULL,
    `idREGION` INT NOT NULL,
    PRIMARY KEY(`idCOMUNA`, `idREGION`),
    INDEX `fk_REGION_idx`(`idREGION` ASC) ,
    CONSTRAINT `fk_REGION` FOREIGN KEY(`idREGION`) REFERENCES `DESIS`.`REGION`(`idREGION`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `DESIS`.`CANDIDATO`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `DESIS`.`CANDIDATO`(
    `idCANDIDATO` INT NOT NULL AUTO_INCREMENT,
    `nombreCANDIDATO` VARCHAR(250) NOT NULL,
    PRIMARY KEY(`idCANDIDATO`)
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `DESIS`.`VOTANTE`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `DESIS`.`VOTANTE`(
    `idVOTANTE` INT NOT NULL AUTO_INCREMENT,
    `nombreVOTANTE` VARCHAR(250) NOT NULL,
    `rutVOTANTE` VARCHAR(15) NOT NULL,
    `aliasVOTANTE` VARCHAR(45) NOT NULL,
    PRIMARY KEY(`idVOTANTE`)
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `DESIS`.`FORMULARIO`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `DESIS`.`FORMULARIO`(
    `idFORMULARIO` INT NOT NULL AUTO_INCREMENT,
    `idCOMUNA` INT NOT NULL,
    `idCANDIDATO` INT NOT NULL,
    `idVOTANTE` INT NOT NULL,
    PRIMARY KEY(
        `idFORMULARIO`,
        `idCOMUNA`,
        `idCANDIDATO`,
        `idVOTANTE`
    ),
    INDEX `fk_COMUNA_idx`(`idCOMUNA` ASC) ,
    INDEX `fk_CANDIDATO_idx`(`idCANDIDATO` ASC) ,
    INDEX `fk_VOTANTE_idx`(`idVOTANTE` ASC) ,
    CONSTRAINT `fk_COMUNA` FOREIGN KEY(`idCOMUNA`) REFERENCES `DESIS`.`COMUNA`(`idCOMUNA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_CANDIDATO` FOREIGN KEY(`idCANDIDATO`) REFERENCES `DESIS`.`CANDIDATO`(`idCANDIDATO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_VOTANTE` FOREIGN KEY(`idVOTANTE`) REFERENCES `DESIS`.`VOTANTE`(`idVOTANTE`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `DESIS`.`OPCION_ENTERAR`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `DESIS`.`OPCION_ENTERAR`(
    `idOPCION_ENTERAR` INT NOT NULL AUTO_INCREMENT,
    `nombreOPCION` VARCHAR(45) NOT NULL,
    PRIMARY KEY(`idOPCION_ENTERAR`)
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `DESIS`.`FORM_OPCION`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `DESIS`.`FORM_OPCION`(
    `idFORM_OPCION` INT NOT NULL AUTO_INCREMENT,
    `idFORMULARIO` INT NOT NULL,
    `idOPCION_ENTERAR` INT NOT NULL,
    PRIMARY KEY(
        `idFORM_OPCION`,
        `idFORMULARIO`,
        `idOPCION_ENTERAR`
    ),
    INDEX `fk_FORMULARIO_idx`(`idFORMULARIO` ASC) ,
    INDEX `fk_OPCION_ENTERAR_idx`(`idOPCION_ENTERAR` ASC) ,
    CONSTRAINT `fk_FORMULARIO` FOREIGN KEY(`idFORMULARIO`) REFERENCES `DESIS`.`FORMULARIO`(`idFORMULARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_OPCION_ENTERAR` FOREIGN KEY(`idOPCION_ENTERAR`) REFERENCES `DESIS`.`OPCION_ENTERAR`(`idOPCION_ENTERAR`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB; 