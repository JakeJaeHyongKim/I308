SELECT m.item_name, m.price, SUM(od.qty) as qty
FROM menu as m, order_detail as od
WHERE m.menuid = od.menuid
GROUP BY m.item_name
ORDER BY qty DESC
LIMIT 10;

SELECT m.item_name, m.price, SUM(od.qty) as qty, SUM(od.qty * m.price) as total_sales
FROM menu as m, order_detail as od
WHERE m.menuid = od.menuid
GROUP BY m.item_name
ORDER BY qty DESC
LIMIT 10;

SELECT m.item_name, m.price, SUM(od.qty) as qty, SUM(od.qty * m.price) as total_sales
FROM menu as m, order_detail as od
WHERE m.menuid = od.menuid
GROUP BY m.item_name
ORDER BY total_sales DESC
LIMIT 10;

SELECT DATE_FORMAT(om.order_date, '%W') AS day, SUM(od.qty) AS qty
FROM menu as m, order_detail as od, order_main as om
WHERE m.menuid = od.menuid AND om.orderid = od.orderid AND m.menuid = "7"
GROUP BY day
ORDER BY qty DESC;

SELECT DATE_FORMAT(om.order_date, '%Y') AS year, SUM(od.qty) AS qty, SUM(od.qty * m.price) as total_sales
FROM menu as m, order_detail as od, order_main as om
WHERE m.menuid = od.menuid AND om.orderid = od.orderid AND m.menuid = "7" AND DATE_FORMAT(om.order_date,'%W') = "Sunday"
GROUP BY year
ORDER BY year DESC;
