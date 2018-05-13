<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87", "i308s17_team87");
// Check connection
if (!$conn)
    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }
else 
    { echo "Established Database Connection" ;}

$advisorid = mysqli_real_escape_string($conn, $_POST['advisor']);

$sql = "SELECT s.studentID as id, concat(s.fname, ' ', s.lname) as name, sm.major as major FROM student as s, student_major as sm, advisor_has_student as ahs, advisor as a WHERE s.studentID = ahs.studentID and ahs.advisorID = a.advisorID and s.studentID = sm.studentID and a.advisorID = '$advisorid' GROUP BY s.studentID ORDER BY name desc;";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table><tr><th>Student ID</th><th>Name</th><th>Major</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row["id"]. "</td><td>".$row["name"]. "</td><td>".$row["major"]. "</td></tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
mysqli_close($conn);
?>