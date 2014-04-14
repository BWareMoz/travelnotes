SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `travelnotes` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `travelnotes` ;

-- -----------------------------------------------------
-- Table `travelnotes`.`ticket_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `travelnotes`.`ticket_types` ;

CREATE  TABLE IF NOT EXISTS `travelnotes`.`ticket_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(100) NOT NULL ,
  `short_description` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travelnotes`.`tax_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `travelnotes`.`tax_types` ;

CREATE  TABLE IF NOT EXISTS `travelnotes`.`tax_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(45) NOT NULL ,
  `code` VARCHAR(45) NULL ,
  `is_prefixed` TINYINT(1)  NULL ,
  `is_percentage` TINYINT(1)  NULL ,
  `value` DOUBLE NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travelnotes`.`clients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `travelnotes`.`clients` ;

CREATE  TABLE IF NOT EXISTS `travelnotes`.`clients` (
  `id` INT NOT NULL ,
  `name` VARCHAR(100) NULL ,
  `contact` VARCHAR(45) NULL ,
  `address` VARCHAR(45) NULL ,
  `client_number` VARCHAR(50) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travelnotes`.`trip_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `travelnotes`.`trip_types` ;

CREATE  TABLE IF NOT EXISTS `travelnotes`.`trip_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` VARCHAR(45) NOT NULL ,
  `short_description` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travelnotes`.`tickets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `travelnotes`.`tickets` ;

CREATE  TABLE IF NOT EXISTS `travelnotes`.`tickets` (
  `id` INT NOT NULL ,
  `ticket_number` VARCHAR(45) NULL ,
  `reservation_number` VARCHAR(45) NULL ,
  `trip_date` VARCHAR(45) NULL ,
  `client_id` INT NOT NULL ,
  `issue_date` DATE NULL ,
  `seller` VARCHAR(45) NULL ,
  `route` VARCHAR(100) NULL ,
  `trip_type_id` INT NOT NULL ,
  `ticket_type_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ticket_client_id` (`client_id` ASC) ,
  INDEX `fk_ticket_trip_type_id` (`trip_type_id` ASC) ,
  INDEX `fk_ticket_ticket_type_id` (`ticket_type_id` ASC) ,
  CONSTRAINT `fk_ticket_client_id`
    FOREIGN KEY (`client_id` )
    REFERENCES `travelnotes`.`clients` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ticket_trip_type_id`
    FOREIGN KEY (`trip_type_id` )
    REFERENCES `travelnotes`.`trip_types` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ticket_ticket_type_id`
    FOREIGN KEY (`ticket_type_id` )
    REFERENCES `travelnotes`.`ticket_types` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travelnotes`.`taxes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `travelnotes`.`taxes` ;

CREATE  TABLE IF NOT EXISTS `travelnotes`.`taxes` (
  `id` INT NOT NULL ,
  `ticket_id` INT NULL ,
  `tax_type_id` INT NULL ,
  `value` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_taxes_ticket_id` (`ticket_id` ASC) ,
  INDEX `fk_taxes_type_id` (`tax_type_id` ASC) ,
  CONSTRAINT `fk_taxes_ticket_id`
    FOREIGN KEY (`ticket_id` )
    REFERENCES `travelnotes`.`tickets` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_taxes_type_id`
    FOREIGN KEY (`tax_type_id` )
    REFERENCES `travelnotes`.`tax_types` (`id` )
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
