SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema TrabalhoSemana29
-- -----------------------------------------------------

CREATE SCHEMA IF NOT EXISTS `TrabalhoSemana29` DEFAULT CHARACTER SET utf8 ;
USE `TrabalhoSemana29` ;

-- -----------------------------------------------------
-- Table `TrabalhoSemana29`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TrabalhoSemana29`.`Cliente` (
  `idUsuario` INT AUTO_INCREMENT NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `acesso` ENUM("usuario", "gerente", "administrador") NOT NULL,
  `status` INT NOT NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
