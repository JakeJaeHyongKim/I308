<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30", 
"i308s18_team30");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
else 
{echo nl2br("Established Database Connection \n");}

//escape variables for security sql injection
$sanfname = mysqli_real_escape_string($conn, $_POST['artistfname']);
$sanlname = mysqli_real_escape_string($conn, $_POST['artistlname']);

//Insert query to insert form data into the artist table
$sql="INSERT INTO artist (fname,lname) VALUES ('$sanfname','$sanlname');";

//check for error on insert

if (!mysqli_query($conn,$sql))
{ die('Error: ' . mysqli_error($conn)); }
{echo "1 record added on artist table";}

mysqli_close($conn);
?>
