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