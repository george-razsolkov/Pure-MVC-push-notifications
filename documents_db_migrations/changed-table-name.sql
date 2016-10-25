#changes from 4.10.16
#change table name 'users' to 'admins'
RENAME TABLE `users` TO `admins`;

#change field id_user to id_admin
ALTER TABLE admins CHANGE id_user id_admin INT UNSIGNED NOT NULL AUTO_INCREMENT;

#change constraint
ALTER TABLE posts
DROP FOREIGN KEY `id_user_fk`,
ADD CONSTRAINT `id_admin_fk` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`);

#from DECIMAL(2,2) to DECIMAL(19,2)
ALTER TABLE posts
MODIFY COLUMN price INT not null;

/*SELECT title_post, year_of_manufacture, price, description_post 
FROM posts WHERE title_post LIKE 'ford';*/

#alter table devices 
ALTER TABLE devices ADD `device` varchar(255) not null;
ALTER TABLE devices ADD `token` varchar(255) not null;

#delete token colm form devices
ALTER TABLE devices DROP COLUMN token;

#device colm must be unique too
ALTER TABLE devices
MODIFY COLUMN `device` varchar(255) not null unique;

#added name and email of a user
ALTER TABLE devices ADD `email` varchar(255);
ALTER TABLE devices ADD `name` varchar(255);

SELECT title_post, year_of_manufacture, price, description_post FROM posts;

#insert test subject into device
insert into devices (device, email, name) values ('5234SD123', 'krasi@krasi.com', 'Krasimir Stoev');


select url_pic from pictures where id_post = 1;

SELECT id_post, brand, model, hp, year_of_manufacture AS year, km, color, price, description_post AS description 
				FROM posts ORDER BY id_post desc;
                
SELECT brand, model, color, km, hp, year_of_manufacture, price FROM posts WHERE (year_of_manufacture BETWEEN '1990' AND '2005');


CREATE TABLE `reserves` (
  `id_reserve` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `telepfone` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `data` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_reserve`),
  
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE reserves ADD id_post INT UNSIGNED NOT NULL;

ALTER TABLE reserves ADD CONSTRAINT `id_post_fkey` FOREIGN KEY (id_post) REFERENCES posts (id_post);

ALTER TABLE reserves ADD msg varchar(255) not null;

select * from posts;

ALTER TABLE posts ADD reserved bool default false not null;

#create table 'users'
CREATE TABLE `prevozvach`.`users` (
  `id_user` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) ,  
  `email` VARCHAR(255) ,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE devices ADD id_user INT UNSIGNED NOT NULL;
ALTER TABLE devices MODIFY COLUMN `id_user` INT UNSIGNED NOT NULL;

ALTER TABLE devices ADD CONSTRAINT `id_user_k` FOREIGN KEY (id_user) REFERENCES users (id_user);

select * from users;
select * from devices;
show create table devices;

#insert into users (email, name) values ( 'Maria Markova', 'maria.ivanova.markova@gmail.com');

#SELECT id_user, email FROM users where email LIKE 'maria.ivanova.markova@gmail.com';