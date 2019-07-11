CREATE SCHEMA `yipsiavila` ;
--CREATE USER 'yipsiavila'@'127.0.0.1' IDENTIFIED BY '1234';
CREATE USER 'yipsiavila'@'127.0.0.1' IDENTIFIED WITH mysql_native_password BY '1234';
GRANT ALL ON yipsiavila.* TO 'yipsiavila'@'127.0.0.1';
