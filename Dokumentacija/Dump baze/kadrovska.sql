-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema kadrovska
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema kadrovska
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `kadrovska` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci ;
-- -----------------------------------------------------
-- Schema test
-- -----------------------------------------------------
USE `kadrovska` ;

-- -----------------------------------------------------
-- Table `kadrovska`.`TipDokumenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kadrovska`.`TipDokumenta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kadrovska`.`Dokument`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kadrovska`.`Dokument` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `TipDokumenta_id` INT NOT NULL,
  PRIMARY KEY (`id`, `TipDokumenta_id`),
  INDEX `fk_Dokument_TipDokumenta1_idx` (`TipDokumenta_id` ASC),
  CONSTRAINT `fk_Dokument_TipDokumenta1`
    FOREIGN KEY (`TipDokumenta_id`)
    REFERENCES `kadrovska`.`TipDokumenta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kadrovska`.`Pozicija`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kadrovska`.`Pozicija` (
  `id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kadrovska`.`Osoba`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kadrovska`.`Osoba` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Pozicija_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Pozicija_id`),
  INDEX `fk_Osoba_Pozicija1_idx` (`Pozicija_id` ASC),
  CONSTRAINT `fk_Osoba_Pozicija1`
    FOREIGN KEY (`Pozicija_id`)
    REFERENCES `kadrovska`.`Pozicija` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kadrovska`.`Status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kadrovska`.`Status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kadrovska`.`Privilegije`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kadrovska`.`Privilegije` (
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kadrovska`.`Dokument-status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kadrovska`.`Dokument-status` (
  `id` INT NOT NULL,
  `Status_id` INT NOT NULL,
  `Dokument_id` INT NOT NULL,
  `Dokument_TipDokumenta_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Status_id`, `Dokument_id`, `Dokument_TipDokumenta_id`),
  INDEX `fk_Dokument-status_Status1_idx` (`Status_id` ASC),
  INDEX `fk_Dokument-status_Dokument1_idx` (`Dokument_id` ASC, `Dokument_TipDokumenta_id` ASC),
  CONSTRAINT `fk_Dokument-status_Status1`
    FOREIGN KEY (`Status_id`)
    REFERENCES `kadrovska`.`Status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dokument-status_Dokument1`
    FOREIGN KEY (`Dokument_id` , `Dokument_TipDokumenta_id`)
    REFERENCES `kadrovska`.`Dokument` (`id` , `TipDokumenta_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kadrovska`.`Dokument-status-osoba-privilegija`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kadrovska`.`Dokument-status-osoba-privilegija` (
  `id` INT NOT NULL,
  `Osoba_id` INT NOT NULL,
  `Dokument-status_id` INT NOT NULL,
  `Dokument-status_Status_id` INT NOT NULL,
  `Dokument-status_Dokument_id` INT NOT NULL,
  `Dokument-status_Dokument_TipDokumenta_id` INT NOT NULL,
  `Privilegije_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Osoba_id`, `Dokument-status_id`, `Dokument-status_Status_id`, `Dokument-status_Dokument_id`, `Dokument-status_Dokument_TipDokumenta_id`, `Privilegije_id`),
  INDEX `fk_Dokument-osoba_Osoba1_idx` (`Osoba_id` ASC),
  INDEX `fk_Dokument-status-osoba-privilegija_Dokument-status1_idx` (`Dokument-status_id` ASC, `Dokument-status_Status_id` ASC, `Dokument-status_Dokument_id` ASC, `Dokument-status_Dokument_TipDokumenta_id` ASC),
  INDEX `fk_Dokument-status-osoba-privilegija_Privilegije1_idx` (`Privilegije_id` ASC),
  CONSTRAINT `fk_Dokument-osoba_Osoba1`
    FOREIGN KEY (`Osoba_id`)
    REFERENCES `kadrovska`.`Osoba` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dokument-status-osoba-privilegija_Dokument-status1`
    FOREIGN KEY (`Dokument-status_id` , `Dokument-status_Status_id` , `Dokument-status_Dokument_id` , `Dokument-status_Dokument_TipDokumenta_id`)
    REFERENCES `kadrovska`.`Dokument-status` (`id` , `Status_id` , `Dokument_id` , `Dokument_TipDokumenta_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dokument-status-osoba-privilegija_Privilegije1`
    FOREIGN KEY (`Privilegije_id`)
    REFERENCES `kadrovska`.`Privilegije` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kadrovska`.`Credentials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kadrovska`.`Credentials` (
  `id` INT NOT NULL,
  `Osoba_id` INT NOT NULL,
  PRIMARY KEY (`id`, `Osoba_id`),
  INDEX `fk_Credentials_Osoba1_idx` (`Osoba_id` ASC),
  CONSTRAINT `fk_Credentials_Osoba1`
    FOREIGN KEY (`Osoba_id`)
    REFERENCES `kadrovska`.`Osoba` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kadrovska`.`Odsjek`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kadrovska`.`Odsjek` (
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kadrovska`.`OdsjekProfesor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kadrovska`.`OdsjekProfesor` (
  `Osoba_id` INT NOT NULL,
  `Osoba_Pozicija_id` INT NOT NULL,
  `Odsjek_id` INT NOT NULL,
  PRIMARY KEY (`Osoba_id`, `Osoba_Pozicija_id`, `Odsjek_id`),
  INDEX `fk_table1_Odsjek1_idx` (`Odsjek_id` ASC),
  CONSTRAINT `fk_table1_Osoba1`
    FOREIGN KEY (`Osoba_id` , `Osoba_Pozicija_id`)
    REFERENCES `kadrovska`.`Osoba` (`id` , `Pozicija_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_Odsjek1`
    FOREIGN KEY (`Odsjek_id`)
    REFERENCES `kadrovska`.`Odsjek` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kadrovska`.`Zavrsi_radovi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kadrovska`.`Zavrsi_radovi` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `kandidat` VARCHAR(45) NULL,
  `tema` VARCHAR(45) NULL,
  `mentor` VARCHAR(45) NULL,
  `abstract` VARCHAR(250) NULL,
  `mentor_id` INT NOT NULL,
  `mentor_pozicija_id` INT NOT NULL,
  `kandidat_id` INT NOT NULL,
  `kandidat_poozicija_id` INT NOT NULL,
  PRIMARY KEY (`id`, `mentor_id`, `mentor_pozicija_id`, `kandidat_id`, `kandidat_poozicija_id`),
  INDEX `fk_Zavrsi_radovi_Osoba1_idx` (`mentor_id` ASC, `mentor_pozicija_id` ASC),
  INDEX `fk_Zavrsi_radovi_Osoba2_idx` (`kandidat_id` ASC, `kandidat_poozicija_id` ASC),
  CONSTRAINT `fk_Zavrsi_radovi_Osoba1`
    FOREIGN KEY (`mentor_id` , `mentor_pozicija_id`)
    REFERENCES `kadrovska`.`Osoba` (`id` , `Pozicija_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Zavrsi_radovi_Osoba2`
    FOREIGN KEY (`kandidat_id` , `kandidat_poozicija_id`)
    REFERENCES `kadrovska`.`Osoba` (`id` , `Pozicija_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
