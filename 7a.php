<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30", 
"i308s18_team30");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
else 
{echo nl2br("Established Database Connection \n");}

$advisor = mysqli_real_escape_string($conn,$_POST['advisor']);

$sql="SELECT CONCAT (s.Firstname,' ',s.Lastname) AS Name, m.MajorName FROM Student as s, Advisor as a, Major as m WHERE s.MajorID = m.MajorID AND s.AdvisorID = a.AdvisorID AND a.AdvisorID =$advisor GROUP BY Name ORDER BY s.Lastname;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Name</th><th>Major</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo 
"<tr><td>".$row["Name"]."</td><td>".$row["m.MajorName"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
