-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema olimpiadas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema olimpiadas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `olimpiadas` DEFAULT CHARACTER SET utf8 ;
USE `olimpiadas` ;

-- -----------------------------------------------------
-- Table `olimpiadas`.`usuarios_tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `olimpiadas`.`usuarios_tipos` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `modified` DATETIME NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

INSERT INTO usuarios_tipos VALUES (null,"Administrador","2016-03-25 10:38:00","2016-03-25 10:38:00");
INSERT INTO usuarios_tipos VALUES (null,"Cliente","2016-03-25 10:38:00","2016-03-25 10:38:00");

-- -----------------------------------------------------
-- Table `olimpiadas`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `olimpiadas`.`usuarios` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuarios_tipos_id` INT(11) UNSIGNED NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `cpf` VARCHAR(14) NULL,
  `telefone` VARCHAR(14) NULL,
  `endereco` TEXT NULL,
  `data_nascimento` DATE NULL,
  `modified` DATETIME NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuarios_usuarios_tipos_idx` (`usuarios_tipos_id` ASC),
  CONSTRAINT `fk_usuarios_usuarios_tipos`
    FOREIGN KEY (`usuarios_tipos_id`)
    REFERENCES `olimpiadas`.`usuarios_tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `olimpiadas`.`locais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `olimpiadas`.`locais` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `descricao` TEXT NOT NULL,
  `modified` DATETIME NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `olimpiadas`.`modalidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `olimpiadas`.`modalidades` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `foto_destaque` VARCHAR(100) NOT NULL,
  `foto_lista` VARCHAR(100) NOT NULL,
  `finalidade` TEXT NOT NULL,
  `provas` TEXT NOT NULL,
  `estreia` VARCHAR(255) NOT NULL,
  `regras` TEXT NOT NULL,
  `modified` DATETIME NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `olimpiadas`.`locais_modalidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `olimpiadas`.`locais_modalidades` (
  `locais_id` INT(11) UNSIGNED NOT NULL,
  `modalidades_id` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`locais_id`, `modalidades_id`),
  INDEX `fk_locais_has_modalidades_modalidades1_idx` (`modalidades_id` ASC),
  INDEX `fk_locais_has_modalidades_locais1_idx` (`locais_id` ASC),
  CONSTRAINT `fk_locais_has_modalidades_locais1`
    FOREIGN KEY (`locais_id`)
    REFERENCES `olimpiadas`.`locais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locais_has_modalidades_modalidades1`
    FOREIGN KEY (`modalidades_id`)
    REFERENCES `olimpiadas`.`modalidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `olimpiadas`.`eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `olimpiadas`.`eventos` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `locais_id` INT(11) UNSIGNED NOT NULL,
  `modalidades_id` INT(11) UNSIGNED NOT NULL,
  `data` DATETIME NOT NULL,
  `descricao` TEXT NOT NULL,
  `preco` REAL UNSIGNED NOT NULL,
  `modified` DATETIME NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_eventos_modalidades1_idx` (`modalidades_id` ASC),
  INDEX `fk_eventos_locais1_idx` (`locais_id` ASC),
  CONSTRAINT `fk_eventos_modalidades1`
    FOREIGN KEY (`modalidades_id`)
    REFERENCES `olimpiadas`.`modalidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_eventos_locais1`
    FOREIGN KEY (`locais_id`)
    REFERENCES `olimpiadas`.`locais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `olimpiadas`.`compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `olimpiadas`.`compras` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuarios_id` INT(11) UNSIGNED NOT NULL,
  `eventos_id` INT(11) UNSIGNED NOT NULL,
  `modified` DATETIME NOT NULL,
  `created` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuarios_has_eventos_eventos1_idx` (`eventos_id` ASC),
  INDEX `fk_usuarios_has_eventos_usuarios1_idx` (`usuarios_id` ASC),
  CONSTRAINT `fk_usuarios_has_eventos_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `olimpiadas`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_has_eventos_eventos1`
    FOREIGN KEY (`eventos_id`)
    REFERENCES `olimpiadas`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
