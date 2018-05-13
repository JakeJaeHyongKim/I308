<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30", 
"i308s18_team30");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
else 
{echo nl2br("Established Database Connection \n");}

$sql="SELECT a.title, b.name, a.published_year, a.publisher, a.format, a.price FROM album as a, band as b WHERE a.bid=b.bid;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Title</th><th>band</th><th>published year</th><th>format</th><th>price</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo 
"<tr><td>".$row["title"]."</td><td>".$row["name"]."</td><td>".$row["published_year"]."</td><td>".$row["publisher"]."</td><td>".$row["format"]."</td><td>".$row["price"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
