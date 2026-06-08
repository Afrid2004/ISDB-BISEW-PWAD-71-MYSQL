-- using cmd commands
-- go to xampp>mysql>bin then type cmd

--create user
-- mysql -u root -p

-- show databases

-- create database
create DATABASE batch71;

-- select batch71 table from cmd
-- use batch71


-- create table into batch71 database
create table students(
    id int primary key auto_increment,
    name varchar(255),
    email varchar(100),
    created_at datetime,
    updated_at datetime
)

-- show table
-- describe students

--create another table schools in batch71 db
create table schools(
    id int primary key auto_increment,
    name varchar(150),
    email varchar(150),
    phone varchar(50),
    address text
)

-- describe schools

--insert data into table
insert into schools(name, email, phone, address) 
values
("Jashore Polytechnic Institute", "abc@gmail.com", "0000-111-22", "Jashore"),
("Dhaka Polytechnic Institute", "abcd@gmail.com", "0000-111-22", "Dhaka"),
("Chandpur Polytechnic Institute", "abcd@gmail.com", "0000-111-22", "Chandpur");
("Feni Polytechnic Institute", "abcd@gmail.com", "0000-111-22", "Feni");