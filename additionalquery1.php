<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87", "i308s17_team87");
// Check connection
if (!$conn)
    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }
else 
    { echo "Established Database Connection" ;}

$city = mysqli_real_escape_string($conn, $_POST['city']);

$sql = "SELECT CONCAT(s.fname, ' ', s.lname) as name, sp.phone as phone, s.city as city FROM student as s, student_phone as sp WHERE sp.studentID = s.studentID and s.city = '$city' group by name;";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table><tr><th>Student</th><th>Phone</th><th>City</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row["name"]. "</td><td>".$row["phone"]."</td><td>".$row["city"]."</td></tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
mysqli_close($conn);
?>