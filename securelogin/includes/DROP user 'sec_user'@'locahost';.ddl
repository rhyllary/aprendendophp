DROP user 'sec_user'@'locahost';



CREATE USER 'sec_user'@'localhost' IDENTIFIED BY 'eKcGZr59zAa2BEWU';



GRANT SELECT, INSERT, UPDATE ON `secure_login`.* TO 'sec_user'@'localhost';