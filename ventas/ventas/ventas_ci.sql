SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ventas_ci` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ventas_ci` ;

-- -----------------------------------------------------
-- Table `ventas_ci`.`categorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ventas_ci`.`categorias` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(100) NULL ,
  `estado` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ventas_ci`.`productos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ventas_ci`.`productos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(45) NULL ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(100) NULL ,
  `precio` VARCHAR(45) NULL ,
  `stock` INT NULL ,
  `categoria_id` INT NULL ,
  `estado` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) ,
  INDEX `fk_categoria_producto_idx` (`categoria_id` ASC) ,
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC) ,
  CONSTRAINT `fk_categoria_producto`
    FOREIGN KEY (`categoria_id` )
    REFERENCES `ventas_ci`.`categorias` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ventas_ci`.`tipo_cliente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ventas_ci`.`tipo_cliente` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ventas_ci`.`tipo_documento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ventas_ci`.`tipo_documento` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `cantidad` INT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ventas_ci`.`clientes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ventas_ci`.`clientes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NULL ,
  `telefono` VARCHAR(20) NULL ,
  `direccion` VARCHAR(100) NULL ,
  `tipo_cliente_id` INT NULL ,
  `tipo_documento_id` INT NULL ,
  `num_documento` VARCHAR(45) NULL ,
  `estado` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tipo_cliente_idx` (`tipo_cliente_id` ASC) ,
  INDEX `fk_tipo_documento_idx` (`tipo_documento_id` ASC) ,
  CONSTRAINT `fk_tipo_cliente`
    FOREIGN KEY (`tipo_cliente_id` )
    REFERENCES `ventas_ci`.`tipo_cliente` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo_documento`
    FOREIGN KEY (`tipo_documento_id` )
    REFERENCES `ventas_ci`.`tipo_documento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ventas_ci`.`roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ventas_ci`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `descripcion` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ventas_ci`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ventas_ci`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombres` VARCHAR(100) NULL ,
  `apellidos` VARCHAR(100) NULL ,
  `telefono` VARCHAR(20) NULL ,
  `email` VARCHAR(100) NULL ,
  `username` VARCHAR(45) NULL ,
  `password` VARCHAR(100) NULL ,
  `rol_id` INT NULL ,
  `estado` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  INDEX `fk_rol_usuarios_idx` (`rol_id` ASC) ,
  CONSTRAINT `fk_rol_usuarios`
    FOREIGN KEY (`rol_id` )
    REFERENCES `ventas_ci`.`roles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ventas_ci`.`tipo_comprobante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ventas_ci`.`tipo_comprobante` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `cantidad` INT NULL ,
  `igv` INT NULL ,
  `serie` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ventas_ci`.`ventas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ventas_ci`.`ventas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fecha` DATE NULL ,
  `subtotal` VARCHAR(45) NULL ,
  `igv` VARCHAR(45) NULL ,
  `descuento` VARCHAR(45) NULL ,
  `total` VARCHAR(45) NULL ,
  `tipo_comprobante_id` INT NULL ,
  `cliente_id` INT NULL ,
  `usuario_id` INT NULL ,
  `num_documento` VARCHAR(45) NULL ,
  `serie` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_usuario_venta_idx` (`usuario_id` ASC) ,
  INDEX `fk_cliente_venta_idx` (`cliente_id` ASC) ,
  INDEX `fk_tipo_comprobante_venta_idx` (`tipo_comprobante_id` ASC) ,
  CONSTRAINT `fk_usuario_venta`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `ventas_ci`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_venta`
    FOREIGN KEY (`cliente_id` )
    REFERENCES `ventas_ci`.`clientes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo_comprobante_venta`
    FOREIGN KEY (`tipo_comprobante_id` )
    REFERENCES `ventas_ci`.`tipo_comprobante` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ventas_ci`.`detalle_venta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ventas_ci`.`detalle_venta` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `producto_id` INT NULL ,
  `venta_id` INT NULL ,
  `precio` VARCHAR(45) NULL ,
  `cantidad` VARCHAR(45) NULL ,
  `importe` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_venta_detalle_idx` (`venta_id` ASC) ,
  INDEX `fk_producto_detalle_idx` (`producto_id` ASC) ,
  CONSTRAINT `fk_venta_detalle`
    FOREIGN KEY (`venta_id` )
    REFERENCES `ventas_ci`.`ventas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_detalle`
    FOREIGN KEY (`producto_id` )
    REFERENCES `ventas_ci`.`productos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `ventas_ci` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
