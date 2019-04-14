CREATE TABLE `php_blog.db`.`users` (
`id` INT NOT NULL PRIMARY KEY,
`login` VARCHAR(255) NOT NULL,
`password` VARCHAR(255) NOT NULL,
`first_name` VARCHAR(255) NOT NULL,
`last_name` VARCHAR(255) NOT NULL);

INSERT INTO `users` (
`id`, 
`login`, 
`password`, 
`first_name`, 
`last_name`)
VALUES (1, 'admin', '1111', 'John', 'Doe');

CREATE TABLE `php_blog.db`.`blogs` (
`id` INT NOT NULL PRIMARY KEY,
`user_id` INT NOT NULL,
`name` VARCHAR(255) NOT NULL,
`description` VARCHAR(255) NOT NULL);

CREATE TABLE `php_blog.db`.`posts` (
`id` INT NOT NULL PRIMARY KEY,
`blog_id` INT NOT NULL,
`title` VARCHAR(255) NOT NULL,
`created` DATE NOT NULL,
`body` TEXT NOT NULL);