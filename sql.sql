SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `CRM_system` ;
CREATE SCHEMA IF NOT EXISTS `CRM_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci ;
USE `CRM_system` ;

-- -----------------------------------------------------
-- Table `CRM_system`.`user_data`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CRM_system`.`user_data` ;

CREATE  TABLE IF NOT EXISTS `CRM_system`.`user_data` (
  `iduser_data` INT NOT NULL AUTO_INCREMENT ,
  `imie` VARCHAR(45) NULL ,
  `nazwisko` VARCHAR(50) NULL ,
  `adres` VARCHAR(100) NULL ,
  `kod_pocztowy` VARCHAR(45) NULL ,
  `kraj` VARCHAR(45) NULL ,
  `nr_tel` VARCHAR(45) NULL ,
  `email` VARCHAR(60) NULL ,
  PRIMARY KEY (`iduser_data`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRM_system`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CRM_system`.`user` ;

CREATE  TABLE IF NOT EXISTS `CRM_system`.`user` (
  `iduser` INT NOT NULL ,
  `login` VARCHAR(100) NULL ,
  `pass` VARCHAR(100) NULL ,
  `iduser_data` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`iduser`) ,
  INDEX `fk_user_user_data_idx` (`iduser_data` ASC) ,
  UNIQUE INDEX `iduser_data_UNIQUE` (`iduser_data` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRM_system`.`info`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `CRM_system`.`info` ;

CREATE  TABLE IF NOT EXISTS `CRM_system`.`info` (
  `idinfo` INT NOT NULL AUTO_INCREMENT ,
  `tytul` VARCHAR(60) NULL ,
  `data` VARCHAR(45) NULL ,
  `text` TEXT NULL ,
  PRIMARY KEY (`idinfo`) )
ENGINE = InnoDB;

USE `CRM_system` ;
USE `CRM_system`;

DELIMITER $$

USE `CRM_system`$$
DROP TRIGGER IF EXISTS `CRM_system`.`user_AINS` $$
USE `CRM_system`$$


CREATE TRIGGER `user_AINS` AFTER INSERT ON user FOR EACH ROW BEGIN INSERT INTO `user_data` (`iduser_data`) SELECT new.iduser
            FROM `user`
            WHERE iduser=new.iduser;
END $$


DELIMITER ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
