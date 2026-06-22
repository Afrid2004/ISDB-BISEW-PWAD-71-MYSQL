-- using cmd commands
-- go to xampp>mysql>bin then type cmd

--create user
mysql -u root -p

show databases

-- create database
CREATE DATABASE batch71;

-- select batch71 Database from cmd
use batch71


-- create table into batch71 database
CREATE TABLE students(
    id int primary key auto_increment,
    name varchar(255),
    email varchar(100),
    created_at datetime,
    updated_at datetime
)

-- show table data
describe students

--create another table schools in batch71 db
CREATE TABLE schools(
    id int primary key auto_increment,
    name varchar(150),
    email varchar(150),
    phone varchar(50),
    address text
)

-- show table data
describe schools

--insert data into table
INSERT INTO schools(name, email, phone, address) 
VALUES
("Jashore Polytechnic Institute", "abc@gmail.com", "0000-111-22", "Jashore"),
("Dhaka Polytechnic Institute", "abcd@gmail.com", "0000-111-22", "Dhaka"),
("Chandpur Polytechnic Institute", "abcd@gmail.com", "0000-111-22", "Chandpur");
("Feni Polytechnic Institute", "abcd@gmail.com", "0000-111-22", "Feni");

-- new table employees
CREATE TABLE employees(
    id int primary key auto_increment,
    name varchar(100),
    designation varchar(50),
    department varchar(50),
    basic_salary decimal(10,2),
    sales_amount decimal(10,2),
    commission_rate decimal(5,2),
    promotion_date date,
    joining_date date
);

-- insert data
INSERT INTO employees (name, designation, department, basic_salary, sales_amount,commission_rate, promotion_date, joining_date) VALUES ("Rahim Uddin", "Sales Executive", "Sales", 30000.00, 120000.00, 5.00, "2024-06-15", "2022-01-10"),
("Karim Mia", "Manager", "Sales", 50000.00, 200000.00, 7.50, "2023-03-20", "2021-05-12"),
("Sadia Akter", "HR Officer", "HR", 35000.00, 0.00, 0.00, "2024-01-01", "2022-09-01"),
("Nusrat Jahan", "Sales Executive", "Sales", 28000.00, 90000.00, 4.50, "2024-07-10", "2023-02-18"),
("Abdul Karim", "Accountant", "Finance", 40000.00, 0.00, 0.00, "2023-11-25", "2020-08-05"),
("Mehedi Hasan", "Sales Executive", "Sales", 32000.00, 150000.00, 6.00, "2024-05-12", "2022-03-14");


-- backup file commands

-- exit from mariaDB[batch71] 
exit 
mysqldump -u root -p batch71 > backup.sql 

-- for import first of all create database batch71
mysql -u root -p batch71 < backup.sql 

--show all data
SELECT * FROM employees;

--alias means rename column name for only show
SELECT name, basic_salary AS salary FROM employees;
--or
SELECT name, basic_salary salary FROM employees;

--showing specific data like name designation
SELECT name, basic_salary, designation FROM employees;

--where department = sales
SELECT name, basic_salary, designation FROM employees  
WHERE department = "Sales";

--where departement = sales and salary >= 30000
SELECT name, basic_salary, designation FROM employees  
WHERE department = "Sales" AND basic_salary>=30000;

-- get total amount of all employees salary (for renaming used alais total)
SELECT sum(basic_salary) AS total FROM employees;


-- create database
CREATE DATABASE HMS;

-- to delete database
DROP DATABASE IF EXISTS HMS;

-- delete all data of vendor table un can add data 
TRUNCATE TABLE vendor;

-- rename table name
RENAME TABLE vendor TO doctor;


-- aggregate function 
SELECT count(*) FROM students WHERE age>20;

-- limit data
SELECT * FROM students LIMIT 20;

-- limit data and skip data
SELECT * FROM students LIMIT 20 OFFSET 10;

-- find data by name wher e a exist in last
SELECT * FROM students WHERE name LIKE "%a";

-- find data using condition
SELECT * FROM students WHERE class=9 OR class=12;

-- sort data 
SELECT * FROM students WHERE class=9 OR class=12 
ORDER BY class DESC;
select * from students ORDER BY age ASC LIMIT 10;

-- check where email is null
SELECT * FROM students WHERE email IS NULL;

-- subQuery 
select * from students 
WHERE class=11 AND age=(
	SELECT MIN(age) FROM students WHERE class=11
);

-- get the unique class romve the duplicate data
SELECT DISTINCT class FROM students 

-- create a group
SELECT class, count(*) as total 
FROM students 
GROUP BY class;

-- having works like where
SELECT class, count(*) as total FROM students 
group by class having count(*) > 15

-- prodedure work like function 
-- insert data
DELIMITER $$

CREATE PROCEDURE addStudent(
    IN student_name VARCHAR(100),
    IN student_class VARCHAR(20),
    IN student_marks INT
)
BEGIN
    INSERT INTO students(name, class, marks)
    VALUES(student_name, student_class, student_marks);
END $$

DELIMITER ;

-- call it 
CALL addStudent('Hasan', 'Eight', 75);

SELECT * FROM role;

DROP PROCEDURE IF EXISTS deleteRole;
DELIMITER $$
CREATE PROCEDURE deleteRole(IN role_id INT)
BEGIN
    DELETE FROM role
    WHERE id = role_id;
END $$

DELIMITER ;

-- calling function
CALL deleteRole(15);


--view works as a virtual table
SELECT * FROM role;

CREATE VIEW roles AS 
SELECT * FROM role;

SELECT * FROM roles;

-- trigger
DELIMITER $$

CREATE TRIGGER after_studentinfo_insert
AFTER INSERT ON students_info
FOR EACH ROW
BEGIN
    UPDATE students
    SET updated_at = NOW()
    WHERE id = NEW.student_id;
END $$

DELIMITER ;
