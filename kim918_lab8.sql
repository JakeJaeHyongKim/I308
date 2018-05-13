CREATE TABLE bookcase
(
bcid INT AUTO_INCREMENT NOT NULL,
location VARCHAR(50),
shelf_num INT,
capacity INT
)
Engine=innodb;

CREATE TABLE book_stock(
bcid INT,
bookid INT,
qty VARCHAR(256) NOT NULL,
FOREIGN KEY(bookid) REFERENCES book(bookid),
FOREIGN KEY(bcid) REFERENCES bookcase(bcid)
)
Engine=innodb;

INSERT INTO bookcase (bcid,location,shelf_num,capacity)
VALUES ('100','room 303','6','50'),('101','room 201','5','50'),('102','room 201','6','25'),('103','room 303','5','20);

INSERT INTO book_stock (bcid, bookid, qty)
VALUES ('100','1001','277),('101','1001','200'),('101','1001','22'),('102','1002','141'),('103','1003','74');

SELECT DISTINCT c.name, b.title
FROM customer as c, book as b, trans as t
WHERE c.id=t.id AND t.bookid=b.bookid AND t.tdate BETWEEN '2017-10-01' AND '2017-10-31';

SELECT b.title, bs.qty
FROM book as c, book_stock as bs
WHERE b.bookid=bs.bookid
GROUP BY b.title;

UPDATE customer
SET phone='999-867-5309'
WHERE name='Jenny';

ALTER TABLE book
ADD column type VARCHAR(50);

UPDATE book
SET type='hardcover'
WHERE bookid='1001';

UPDATE book
SET type='ebook'
WHERE bookid='1002';

UPDATE book
SET type='ebook'
WHERE bookid='1003';