drop table trans;
Drop table customer;
Drop table book;

Create table customer(
id int auto_increment,
name varchar(30) not null,
address varchar(50),
phone varchar(15),
primary key (id)
)
engine = innodb;

Create table book(
bookid int auto_increment,
title varchar(50),
price decimal(5,2),
primary key (bookid))
engine = innodb;

Create table trans(
id int ,
bookid int,
tdate date,
foreign key (id) references customer(id),
foreign key (bookid) references book(bookid))
engine = innodb;

Insert into customer(id,name,address,phone)
Values(500,'Matt','420 Baker Street','800-555-4242'),
(501,'Jenny','12 Tutone Ave','555-867-5309'),
(502,'Sean','1600 N Penn Dr','555-555-1550');

insert into book values
(1001,'The Code Book',14.00),
(1002,'Core Web Programming',49.95),
(1003,'The Hacker Ethic',19.95);

/* Changes for Spring */
Insert into trans Values
(500,1001,'2017/09/13'),
(501,1002,'2017/09/17'),
(501,1002,'2017/09/26'),
(502,1003,'2017/10/03'),
(501,1001,'2017/10/12'),
(502,1002,'2017/10/25');
