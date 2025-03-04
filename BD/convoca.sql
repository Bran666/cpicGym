CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8;
USE `mydb`;

-- -----------------------------------------------------
-- Table `Instituciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Instituciones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(100) NULL,
  `correo` VARCHAR(50) NULL,
  `tipoInstitucion` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Convocatorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Convocatorias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(500) NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NOT NULL,
  `requisitos` VARCHAR(100) NOT NULL,
  `idInstitucion` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_idInstitucion` (`idInstitucion` ASC),
  CONSTRAINT `fk_Convocatorias_Instituciones`
    FOREIGN KEY (`idInstitucion`)
    REFERENCES `Instituciones` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `AreasInteres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AreasInteres` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipoRol` TINYINT(1) NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `correo` VARCHAR(45) NOT NULL,
  `intereses` VARCHAR(45) NULL,
  `fechaCreacion` DATETIME NOT NULL,
  `fechaActualizacion` DATETIME NULL,
  `contrasenia` VARCHAR(255) NOT NULL,
  `idRol` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_idRol` (`idRol` ASC),
  CONSTRAINT `fk_Usuarios_Roles`
    FOREIGN KEY (`idRol`)
    REFERENCES `Roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `ConvocatoriaAreaInteres`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ConvocatoriaAreaInteres` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idConvocatoria` INT NULL,
  `idAreaInteres` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_idConvocatoria` (`idConvocatoria` ASC),
  INDEX `idx_idAreaInteres` (`idAreaInteres` ASC),
  CONSTRAINT `fk_ConvocatoriaAreaInteres_Convocatorias`
    FOREIGN KEY (`idConvocatoria`)
    REFERENCES `Convocatorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ConvocatoriaAreaInteres_AreasInteres`
    FOREIGN KEY (`idAreaInteres`)
    REFERENCES `AreasInteres` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `RegistroConvocatoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RegistroConvocatoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idConvocatoria` INT NULL,
  `idUsuario` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_idConvocatoria` (`idConvocatoria` ASC),
  INDEX `idx_idUsuario` (`idUsuario` ASC),
  CONSTRAINT `fk_RegistroConvocatoria_Convocatorias`
    FOREIGN KEY (`idConvocatoria`)
    REFERENCES `Convocatorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RegistroConvocatoria_Usuarios`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `Usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `AdministradorConvocatoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `AdministradorConvocatoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idConvocatoria` INT NULL,
  `idUsuario` INT NULL,
  `Cambios` VARCHAR(200) NULL,
  `fechaCambio` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_idConvocatoria` (`idConvocatoria` ASC),
  INDEX `idx_idUsuario` (`idUsuario` ASC),
  CONSTRAINT `fk_AdministradorConvocatoria_Convocatorias`
    FOREIGN KEY (`idConvocatoria`)
    REFERENCES `Convocatorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AdministradorConvocatoria_Usuarios`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `Usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;
