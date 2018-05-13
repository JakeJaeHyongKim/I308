<?php

$conn=mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30", "i308s18_team30");

// Check connection
if (!$conn)

    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }

else 
    
{ echo "Established Database Connection" ;}


$course = mysqli_real_escape_string($conn,$_POST['course']);
$sql="SELECT CONCAT(FirstName, ' ', LastName) as Name FROM Faculty WHERE $course != CourseID;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
