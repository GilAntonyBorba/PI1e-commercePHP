This site is hosted on 
Developer: https://github.com/GilAntonyBorba


Código SQL:
CREATE TABLE `jl-telhas-e-ferragens`.`cliente` (`nome` VARCHAR(50) NOT NULL , `email` VARCHAR(255) NOT NULL , `senha` TEXT NOT NULL , PRIMARY KEY (`nome`(50))) ENGINE = InnoDB;
ALTER TABLE cliente
ADD COLUMN conheciaAntes VARCHAR(10);
ALTER TABLE `cliente` CHANGE `conheciaAntes` `conheciaAntes` VARCHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;
ALTER TABLE cliente ADD COLUMN conheceu VARCHAR(255);
ALTER TABLE `cliente` ADD PRIMARY KEY(`email`);
ALTER TABLE cliente
MODIFY COLUMN conheciaAntes VARCHAR(10) NOT NULL;
ALTER TABLE cliente
MODIFY COLUMN conheceu VARCHAR(255) NOT NULL;