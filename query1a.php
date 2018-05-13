<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87", "i308s17_team87");
// Check connection
if (!$conn)
    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }
else 
    { echo "Established Database Connection" ;}

$section = mysqli_real_escape_string($conn, $_POST['section']);

$sql = "SELECT s.studentID as studentID, concat(s.lname, ' ',s.fname) as name, sec.sectionID as section_ID FROM student as s, section as sec, grade as g Where sec.sectionID = '$section' and g.studentID = s.studentID and g.sectionID = sec.sectionID ORDER BY name asc;";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table><tr><th>Student</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row["name"]. "</td></tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
mysqli_close($conn);
?>