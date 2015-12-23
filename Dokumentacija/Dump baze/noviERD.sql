-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`osoba`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`osoba` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NULL,
  `prezime` VARCHAR(45) NULL,
  `titula` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`zavrsni_rad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`zavrsni_rad` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tema` VARCHAR(45) NULL,
  `abstract` VARCHAR(45) NULL,
  `kandidat` VARCHAR(45) NULL,
  `status_nivoa` INT NULL,
  `mentor_id` INT NOT NULL,
  PRIMARY KEY (`id`, `mentor_id`),
  INDEX `fk_zavrsni_rad_osoba1_idx` (`mentor_id` ASC),
  CONSTRAINT `fk_zavrsni_rad_osoba1`
    FOREIGN KEY (`mentor_id`)
    REFERENCES `mydb`.`osoba` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`status_odobren`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`status_odobren` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `vrijednost` INT NULL,
  `osoba_id` INT NOT NULL,
  `zavrsni_rad_id` INT NOT NULL,
  `zavrsni_rad_mentor_id` INT NOT NULL,
  PRIMARY KEY (`id`, `osoba_id`, `zavrsni_rad_id`, `zavrsni_rad_mentor_id`),
  INDEX `fk_status_odobren_osoba1_idx` (`osoba_id` ASC),
  INDEX `fk_status_odobren_zavrsni_rad1_idx` (`zavrsni_rad_id` ASC, `zavrsni_rad_mentor_id` ASC),
  CONSTRAINT `fk_status_odobren_osoba1`
    FOREIGN KEY (`osoba_id`)
    REFERENCES `mydb`.`osoba` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_status_odobren_zavrsni_rad1`
    FOREIGN KEY (`zavrsni_rad_id` , `zavrsni_rad_mentor_id`)
    REFERENCES `mydb`.`zavrsni_rad` (`id` , `mentor_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`credentials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`credentials` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `osoba_id` INT NOT NULL,
  PRIMARY KEY (`id`, `osoba_id`),
  INDEX `fk_credentials_osoba1_idx` (`osoba_id` ASC),
  CONSTRAINT `fk_credentials_osoba1`
    FOREIGN KEY (`osoba_id`)
    REFERENCES `mydb`.`osoba` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
