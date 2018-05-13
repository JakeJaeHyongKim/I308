<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30", 
"i308s18_team30");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
else 
{echo nl2br("Established Database Connection \n");}

function test_input1($title) {
//remove unnecessary chars like tab/newline/space
$santitle = trim($title);
//remove backslashes
$santitle1 = stripslashes($santitle);
//convert problematic chars into entity representation
//prevents injection in the PHP
$santitle2 = htmlspecialchars($santitle1);
return $santitle2;}

function test_input2($publisher) {
//remove unnecessary chars like tab/newline/space
$sanpublisher = trim($publisher);
//remove backslashes
$sanpublisher1 = stripslashes($sanpublisher);
//convert problematic chars into entity representation
//prevents injection in the PHP
$sanpublisher2 = htmlspecialchars($sanpublisher1);
return $sanpublisher2;}

//escape variables for security sql injection
$title = mysqli_real_escape_string($conn,$_POST['title']);
$band = mysqli_real_escape_string($conn,$_POST['band']);
$publishedyear = mysqli_real_escape_string($conn,$_POST['published_year']);
$publisher = mysqli_real_escape_string($conn,$_POST['publisher']);
$format = mysqli_real_escape_string($conn,$_POST['format']);
$price = mysqli_real_escape_string($conn,$_POST['price']);


//Insert query to insert form data into the artist table
$sql = "INSERT INTO album (title, published_year, publisher, format, price, bid) VALUES 
('$santitle2', '$publishedyear', '$sanpublisher2', '$format', '$price', '$band');";

//check for error on insert
if (!mysqli_query($conn,$sql))
{ die('Error: ' . mysqli_error($conn)); }
else
{echo "1 record added on artist table";}

mysqli_close($conn);
?>
