
#1. What's the query for creating this new database table with the fields above?
CREATE TABLE `hackerhero_practice`.`users` (
  `id` INT NOT NULL,
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `encrypted_password` VARCHAR(255) NULL,
  `create_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  PRIMARY KEY (`id`));

#2. What's the query for inserting new records into this table?  Write queries for inserting three fake users into the table (one query for each insert).
INSERT INTO users VALUES  ('1','Kai','Camson','k.cmsn@yahoo.com','12345','2006-02-14 12:34:33','2006-02-14 12:34:33');
INSERT INTO users VALUES  ('2','John','Doe','abc@yahoo.com','67890','2007-02-14 12:34:33','2006-02-14 12:34:33');
INSERT INTO users VALUES  ('3','Cait','Uy','efg@yahoo.com','24680','2008-02-14 12:34:33','2006-02-14 12:34:33');

#3. What's the query for updating one of the user records?  For example, if you wanted to update the user record for id = 1, with some fake data, what would the query be?
UPDATE users SET first_name = 'Michael', last_name = 'Choi' WHERE id = '1';

#4. What query would you run for updating all of the user records with the last_name of 'Choi'?
UPDATE users SET email = 'mchoi@gmail.com' WHERE last_name = 'Choi';

#5. What query would you run for updating all the user records where ID is 3, 5, 7, 12, or 19?
UPDATE users SET encrypted_password = 'noclue' WHERE id = '3' OR id = '5' OR id = '7' OR id = '12';


#6. What's the query for deleting a user record where id = 1?
DELETE FROM users WHERE id='1';
Select * FROM users;
#7. What's the query for deleting the entire users records in the users table?
DELETE FROM users; 

#8. What's the query for dropping the entire users table?  What's the difference between dropping the table and deleting all records?
DROP TABLE users; 

#9. What's the query for altering the email field to have it be 'email_address' instead?
ALTER TABLE users CHANGE email email_length VARCHAR(255);

#10. What's the query for altering the id so that it's a BIGINT instead?
ALTER TABLE users MODIFY COLUMN id BIGINT;

#11. What's the query for adding a new field to the users table called is_active where it's a Boolean (meaning it's either a 0 or a 1).  
#Imagine you wanted the default value of this to be 0 when a new record is created and you won't allow this field to ever be NULL.  
#With this in mind, now come up with a query.
ALTER TABLE users ADD is_active BOOLEAN;

