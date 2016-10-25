#create schema
CREATE SCHEMA `prevozvach` DEFAULT CHARACTER SET utf8 ;

#create table 'users'
CREATE TABLE `prevozvach`.`users` (
  `id_user` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `telepfone` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

#create table 'devices'
CREATE TABLE `prevozvach`.`devices` (
  `id_device` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_device`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

#create table 'posts'
CREATE TABLE `prevozvach`.`posts` (
  `id_post` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_post`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

#create table 'pictures'
CREATE TABLE `prevozvach`.`pictures` (
  `id_picture` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_picture`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

#view all from tables
select * from admins;
select * from posts;
select * from pictures;
select * from devices;
select * from reserves;

SELECT concat(first_name, ' ', last_name) as `name`, telephone as phone FROM admins;
#do not execute this changes
/*ALTER TABLE users ADD username varchar(255) unique;
ALTER TABLE users MODIFY email varchar(255) unique;
SHOW FIELDS FROM users where Field ='id_user'; */

#insert admin
insert into users (first_name, last_name, telephone, email, password, username) 
values ('Petyr', 'Pertov', '0896722484', 'petyr.petrov@abv.bg', 'e10adc3949ba59abbe56e057f20f883e', 'pesho_provozvacha');

#alter table posts
ALTER TABLE posts ADD title_post varchar(255) not null;
ALTER TABLE posts ADD year_of_manufacture YEAR(4) not null;
ALTER TABLE posts ADD price DECIMAL(2,2) not null;
ALTER TABLE posts ADD description_post varchar(255) not null;
ALTER TABLE posts ADD id_user INT UNSIGNED NOT NULL;
ALTER TABLE posts ADD main_picture varchar(255) not null;
ALTER TABLE posts ADD brand varchar(255) not null;
ALTER TABLE posts ADD model varchar(255) not null;
ALTER TABLE posts ADD color varchar(255) not null;
ALTER TABLE posts ADD km INT not null;
ALTER TABLE posts ADD hp INT not null;

#alter table pictures
ALTER TABLE pictures ADD url_pic varchar(255) not null;
ALTER TABLE pictures ADD id_post INT UNSIGNED NOT NULL;

#add fk id_user
ALTER TABLE posts ADD CONSTRAINT `id_user_fk` FOREIGN KEY (id_user) REFERENCES users (id_user);

#add fk id_user
ALTER TABLE pictures ADD CONSTRAINT `id_post_fk` FOREIGN KEY (id_post) REFERENCES posts (id_post);

alter table pictures DROP FOREIGN KEY `id_post_fk`;

ALTER TABLE pictures
ADD CONSTRAINT id_post_fk
FOREIGN KEY (id_post)
REFERENCES posts(id_post)
 ON DELETE CASCADE;
 
alter table reserves DROP FOREIGN KEY `id_post_fkey`;

ALTER TABLE reserves
ADD CONSTRAINT id_post_fkey
FOREIGN KEY (id_post)
REFERENCES posts(id_post)
 ON DELETE CASCADE;