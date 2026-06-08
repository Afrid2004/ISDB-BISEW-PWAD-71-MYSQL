-- using cmd commands
-- go to xampp>mysql>bin then type cmd

--create user
mysql -u root -p

show databases

-- create database
create DATABASE batch71;

-- select batch71 table from cmd
use batch71


-- create table into batch71 database
create table students(
    id int primary key auto_increment,
    name varchar(255),
    email varchar(100),
    created_at datetime,
    updated_at datetime
)

-- show table data
describe students

--create another table schools in batch71 db
create table schools(
    id int primary key auto_increment,
    name varchar(150),
    email varchar(150),
    phone varchar(50),
    address text
)

-- show table data
describe schools

--insert data into table
insert into schools(name, email, phone, address) 
values
("Jashore Polytechnic Institute", "abc@gmail.com", "0000-111-22", "Jashore"),
("Dhaka Polytechnic Institute", "abcd@gmail.com", "0000-111-22", "Dhaka"),
("Chandpur Polytechnic Institute", "abcd@gmail.com", "0000-111-22", "Chandpur");
("Feni Polytechnic Institute", "abcd@gmail.com", "0000-111-22", "Feni");

-- new table employees
create table employees(
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
insert into employees (name, designation, department, basic_salary, sales_amount,commission_rate, promotion_date, joining_date) value ("Rahim Uddin", "Sales Executive", "Sales", 30000.00, 120000.00, 5.00, "2024-06-15", "2022-01-10"),
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
