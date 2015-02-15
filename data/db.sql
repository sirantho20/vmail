SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `account_package`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `account_package` (
  `id` INT NOT NULL,
  `package_name` VARCHAR(45) NULL,
  `emails_allowed` INT NULL,
  `quota_allowed` INT NULL,
  `next_due_date` DATE NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `account` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `domain` VARCHAR(45) NULL,
  `package_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_account_account_package_idx` (`package_id` ASC),
  CONSTRAINT `fk_account_account_package`
    FOREIGN KEY (`package_id`)
    REFERENCES `account_package` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `account_domains`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `account_domains` (
  `account_id` INT NOT NULL,
  `domain` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`account_id`, `domain`),
  INDEX `fk_account_domains_domain_idx` (`domain` ASC),
  CONSTRAINT `fk_account_domains_account`
    FOREIGN KEY (`account_id`)
    REFERENCES `account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_account_domains_domain`
    FOREIGN KEY (`domain`)
    REFERENCES `domain` (`domain`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `account_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `account_users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `account_id` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_account_users_account_idx` (`account_id` ASC),
  CONSTRAINT `fk_account_users_account`
    FOREIGN KEY (`account_id`)
    REFERENCES `account` (`id`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

DELIMITER $$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `vmail`.`after_insert_used_quota`
BEFORE INSERT ON `vmail`.`used_quota`
FOR EACH ROW
BEGIN
        SET NEW.domain = SUBSTRING_INDEX(NEW.username, '@', -1);
    END$$


DELIMITER ;


DROP TABLE IF EXISTS `account_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `last_login` varchar(255) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE=InnoDB


