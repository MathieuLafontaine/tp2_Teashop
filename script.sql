CREATE SCHEMA IF NOT EXISTS `teashop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;

USE `teashop` ;

-- -----------------------------------------------------
-- Table `teashop`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teashop`.`client` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(25) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));

-- -----------------------------------------------------
-- Table `teashop`.`paymentmethod`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teashop`.`paymentmethod` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `teashop`.`tea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teashop`.`tea` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  `brand` VARCHAR(20) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `teashop`.`transaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teashop`.`transaction` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `client_id` INT NOT NULL,
  `date` DATETIME NOT NULL,
  `totalPrice` DECIMAL(10,2) NOT NULL,
  `paymentmethod_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `client_id` (`client_id` ASC) VISIBLE,
  INDEX `paymentmethod_id` (`paymentmethod_id` ASC) VISIBLE,
  CONSTRAINT `transaction_ibfk_1`
    FOREIGN KEY (`client_id`)
    REFERENCES `teashop`.`client` (`id`),
  CONSTRAINT `transaction_ibfk_3`
    FOREIGN KEY (`paymentmethod_id`)
    REFERENCES `teashop`.`paymentmethod` (`id`));


-- -----------------------------------------------------
-- Table `teashop`.`Articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `teashop`.`Article` (
  `tea_id` INT NOT NULL,
  `transaction_id` INT NOT NULL,
`quantity` INT NOT NULL,
`price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`tea_id`, `transaction_id`),
  INDEX `fk_tea_has_transaction_transaction1_idx` (`transaction_id` ASC) VISIBLE,
  INDEX `fk_tea_has_transaction_tea1_idx` (`tea_id` ASC) VISIBLE,
  CONSTRAINT `fk_tea_has_transaction_tea1`
    FOREIGN KEY (`tea_id`)
    REFERENCES `teashop`.`tea` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tea_has_transaction_transaction1`
    FOREIGN KEY (`transaction_id`)
    REFERENCES `teashop`.`transaction` (`id`));
  
  INSERT INTO Tea (type, brand, description, price) VALUES
('Green Tea', 'Mountain Mist', 'A delicate green tea with floral notes, harvested from high-altitude gardens', 8.99),
('Black Tea', 'Royal Leaves', 'Full-bodied Assam black tea with malty flavor, perfect for breakfast', 7.50),
('Herbal Tea', 'Dreamy Blossoms', 'Caffeine-free blend of chamomile, lavender, and peppermint for relaxation', 6.75),
('Oolong Tea', 'Imperial Dragon', 'Semi-oxidized tea with complex fruity and woody flavors from Taiwan', 12.25),
('White Tea', 'Silver Needle', 'Rare white tea made from young tea buds with a light, sweet flavor', 15.99);

INSERT INTO client (name, username, password, email) VALUES
('Emma Johnson', 'emmaJ', 'TeaLover123', 'emma.johnson@yahoo.com'),
('Liam Chen', 'liamTeaMaster', 'OolongFan!45', 'liam.chen@gmail.com'),
('Sophia Rodriguez', 'sophiaR', 'ChaiLatte$2023', 's.rodriguez@hotmail.com'),
('Noah Wilson', 'wilsonTeaTaster', 'GreenTea789', 'noah.wilson@aol.com');


INSERT INTO TeaShop.Transaction
(client_id, date, totalPrice, paymentmethod_id) VALUES
(1, '2023-11-15 09:30:00', 17.98, 1),
(2, '2023-11-15 11:15:00', 12.25, 1),
(3, '2023-11-16 14:20:00', 13.50, 2),
(4, '2023-11-17 10:45:00', 6.75, 3),
(1, '2023-11-18 16:30:00', 15.99, 1),
(3, '2023-11-19 13:10:00', 24.50, 2);


INSERT INTO `paymentmethod` (`name`, `active`) VALUES
('Credit Card', 1),
('Debit Card', 1),
('Cash', 1);

INSERT INTO `Article` (`tea_id`, `transaction_id`, `quantity`, `price`) VALUES
(1, 1, 2, 8.99),
(4, 2, 1, 12.25), 
(2, 3, 2, 6.75),
(3, 4, 1, 6.75), 
(5, 5, 1, 15.99),  
(4, 6, 2, 12.25);  

select * from article;
drop table transaction;
drop table article;