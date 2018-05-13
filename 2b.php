<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30", 
"i308s18_team30");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
else 
{echo nl2br("Established Database Connection \n");}

$classroom = mysqli_real_escape_string($conn,$_POST['classroom']);
$time = mysqli_real_escape_string($conn,$_POST['time']);
$day = mysqli_real_escape_string($conn,$_POST['day']);

SELECT CONCAT(b.BuildingName, '-', c.ClassroomID) AS Location FROM Classroom AS c, Section AS se,  Building AS b WHERE se.ClassroomID = c.ClassroomID AND b.BuildingID = se.BuildingID AND c.ClassroomID = $classroom AND $time BETWEEN se.Time AND se.EndTime AND se.Day = $day;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Location</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo 
"<tr><td>".$row["Location"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
