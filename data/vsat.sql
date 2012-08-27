SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `tcra1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `tcra1` ;

-- -----------------------------------------------------
-- Table `tcra1`.`application_type`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tcra1`.`application_type` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `type_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcra1`.`application_vsat`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tcra1`.`application_vsat` (
  `id` BIGINT(20) NOT NULL ,
  `file_number` VARCHAR(30) NULL DEFAULT NULL ,
  `classification` VARCHAR(50) NULL DEFAULT NULL ,
  `status_1` VARCHAR(50) NULL DEFAULT NULL ,
  `status_2` VARCHAR(50) NULL DEFAULT NULL ,
  `status_3` VARCHAR(50) NULL DEFAULT NULL ,
  `status_4` VARCHAR(50) NULL DEFAULT NULL ,
  `status_date_1` DATE NULL DEFAULT NULL ,
  `status_date_2` DATE NULL DEFAULT NULL ,
  `status_date_3` DATE NULL DEFAULT NULL ,
  `status_date_4` DATE NULL DEFAULT NULL ,
  `application_type_id` BIGINT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_application_vsat_application_type1` (`application_type_id` ASC) ,
  CONSTRAINT `fk_application_vsat_application_type1`
    FOREIGN KEY (`application_type_id` )
    REFERENCES `tcra1`.`application_type` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tcra1`.`vsat_operation_address`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tcra1`.`vsat_operation_address` (
  `operation_name` VARCHAR(100) NULL ,
  `phone_no` VARCHAR(45) NULL ,
  `operator_company_name` VARCHAR(100) NULL ,
  `fax_no` VARCHAR(45) NULL ,
  `contry_of_registry` VARCHAR(45) NULL ,
  `city_address` VARCHAR(100) NULL ,
  `district` VARCHAR(45) NULL ,
  `country` VARCHAR(45) NULL ,
  `application_vsat_id` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`application_vsat_id`) ,
  CONSTRAINT `fk_vsat_operation_address_application_vsat1`
    FOREIGN KEY (`application_vsat_id` )
    REFERENCES `tcra1`.`application_vsat` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcra1`.`vsat_billing_address`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tcra1`.`vsat_billing_address` (
  `name_of_accounting` VARCHAR(100) NULL ,
  `a_phone_no` VARCHAR(45) NULL ,
  `a_fax_no` VARCHAR(45) NULL ,
  `name_of_sp` VARCHAR(45) NULL ,
  `sp_phone_no` VARCHAR(45) NULL ,
  `sp_fax_no` VARCHAR(45) NULL ,
  `application_vsat_id` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`application_vsat_id`) ,
  CONSTRAINT `fk_vsat_billing_address_application_vsat1`
    FOREIGN KEY (`application_vsat_id` )
    REFERENCES `tcra1`.`application_vsat` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcra1`.`vsat_site_data`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tcra1`.`vsat_site_data` (
  `site_number` VARCHAR(45) NULL ,
  `site_name` VARCHAR(45) NULL ,
  `location_place_name` VARCHAR(45) NULL ,
  `log_deg` VARCHAR(45) NULL ,
  `log_min` VARCHAR(45) NULL ,
  `log_secs` VARCHAR(45) NULL ,
  `lat_deg` VARCHAR(45) NULL ,
  `lat_min` VARCHAR(45) NULL ,
  `lat_secs` VARCHAR(45) NULL ,
  `region` VARCHAR(45) NULL ,
  `site_elevation` VARCHAR(45) NULL ,
  `remark` TEXT NULL ,
  `application_vsat_id` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`application_vsat_id`) ,
  CONSTRAINT `fk_vsat_site_data_application_vsat`
    FOREIGN KEY (`application_vsat_id` )
    REFERENCES `tcra1`.`application_vsat` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcra1`.`vsat_transmitter_equipment_data`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tcra1`.`vsat_transmitter_equipment_data` (
  `TCRAID` VARCHAR(45) NOT NULL ,
  `type_approval_number` VARCHAR(45) NULL ,
  `manufacture_name` VARCHAR(45) NULL ,
  `model` VARCHAR(45) NULL ,
  `serial_number` VARCHAR(45) NULL ,
  `transmitter_power` VARCHAR(45) NULL ,
  `effective_radiated_power` VARCHAR(45) NULL ,
  `equipment_manual_attached` VARCHAR(45) NULL ,
  `station_class` VARCHAR(45) NULL ,
  `remark` VARCHAR(45) NULL ,
  `application_vsat_id` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`application_vsat_id`) ,
  CONSTRAINT `fk_vsat_transmitter_equipment_data_application_vsat1`
    FOREIGN KEY (`application_vsat_id` )
    REFERENCES `tcra1`.`application_vsat` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcra1`.`vsat_antenna_data`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tcra1`.`vsat_antenna_data` (
  `TCRAID` VARCHAR(45) NOT NULL ,
  `manufacture_name` VARCHAR(45) NULL ,
  `model` VARCHAR(45) NULL ,
  `height_above_ground` VARCHAR(45) NULL ,
  `polarization` VARCHAR(45) NULL ,
  `directional` VARCHAR(45) NULL ,
  `circular` VARCHAR(45) NULL ,
  `other` VARCHAR(100) NULL ,
  `application_vsat_id` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`application_vsat_id`) ,
  CONSTRAINT `fk_vsat_antenna_data_application_vsat1`
    FOREIGN KEY (`application_vsat_id` )
    REFERENCES `tcra1`.`application_vsat` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tcra1`.`vsat_frequency_data`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tcra1`.`vsat_frequency_data` (
  `frequency_band` VARCHAR(45) NULL ,
  `date_of_issue` DATE NULL ,
  `date_of_renewal` DATE NULL ,
  `emission` VARCHAR(45) NULL ,
  `tolerance` VARCHAR(45) NULL ,
  `application_vsat_id` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`application_vsat_id`) ,
  CONSTRAINT `fk_vsat_frequency_data_application_vsat1`
    FOREIGN KEY (`application_vsat_id` )
    REFERENCES `tcra1`.`application_vsat` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
