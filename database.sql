CREATE DATABASE IF NOT EXISTS `shop` ;

USE `shop`;

CREATE TABLE IF NOT EXISTS `products` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `image` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `price` DECIMAL(10,2) NOT NULL,
    `description` TEXT NOT NULL,
    PRIMARY KEY (`id`)
)

-- ALTER TABLE `products` ADD COLUMN `image` VARCHAR(255) NOT NULL AFTER `id`;

CREATE TABLE IF NOT EXISTS `usernames` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
)


CREATE TABLE IF NOT EXISTS `wishlist`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `image` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `price` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`id`)
)