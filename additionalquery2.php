<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87", "i308s17_team87");
// Check connection
if (!$conn)
    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }
else 
    { echo "Established Database Connection" ;}

$department = mysqli_real_escape_string($conn, $_POST['department']);

$sql = "SELECT CONCAT(fname, ' ', lname) as name, department FROM faculty WHERE  department = '$department';";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table><tr><th>Faculty</th><th>Department</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row["name"]. "</td><td>".$row["department"]."</td></tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
mysqli_close($conn);
?>