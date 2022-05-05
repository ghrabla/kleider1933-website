create table Admins(
   id int PRIMARY KEY AUTO_INCREMENT,
   fulltname  varchar(30) NOT NULL,
   email  varchar(30) NOT NULL,
   password varchar(90) not null 
);

create table Users(
   id int PRIMARY KEY AUTO_INCREMENT,
   fulltname  varchar(30) NOT NULL,
   email  varchar(30) NOT NULL,
   password varchar(90) not null
);

create table Products(
   id int PRIMARY KEY AUTO_INCREMENT,
   name  varchar(30) NOT NULL,
   price  varchar(30) NOT NULL,
   title varchar(90) not null,
   gender varchar(90) not null,
   type varchar(90) not null,
   image varchar(90) not null
);

create table Orders(
   id int PRIMARY KEY AUTO_INCREMENT,
   name  varchar(30) NOT NULL,
   price  varchar(30) NOT NULL,
   title varchar(90) not null,
   gender varchar(90) not null,
   type varchar(90) not null,
   image varchar(90) not null,
   fullname  varchar(30) NOT NULL,
   phone  varchar(30) NOT NULL,
   email varchar(90) not null,
   city varchar(90) not null,
   adresse varchar(90) not null,
   postale varchar(90) not null
);
