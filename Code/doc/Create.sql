-- MySQL Script generated by MySQL Workbench
-- Fri Jul 10 18:57:11 2015
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema rb_Application
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema rb_Application
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rb_Application` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `rb_Application` ;

-- -----------------------------------------------------
-- Table `rb_Application`.`navigation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `rb_Application`.`navigation` ;

CREATE TABLE IF NOT EXISTS `rb_Application`.`navigation` (
  `id_navigation` INT NOT NULL,
  `label` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `role` ENUM('public','candidates','admin') NULL,
  PRIMARY KEY (`id_navigation`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
