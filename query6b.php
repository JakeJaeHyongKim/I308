<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87", "i308s17_team87");
// Check connection
if (!$conn)
    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }
else 
    { echo "Established Database Connection" ;}

$building = mysqli_real_escape_string($conn, $_POST['building']);
$time = mysqli_real_escape_string($conn, $_POST['time']);

$sql = "SELECT concat (s.fname, ' ', s.lname) as stu_name, concat (f.fname, ' ',f.lname) as fac_name, sec.start_time as section_time, c.buildingName as Building_Name FROM student as s, faculty as f, grade as g, classroom as c, section as sec WHERE g.studentID = s.studentID  and g.facultyID = f.facultyID and sec.sectionID = g.sectionID  and c.classroomID = g.classroomID and c.buildingName = '$building' and sec.start_time = '$time';";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table><tr><th>Students</th><th>Faculty</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row["stu_name"]. "</td><td>".$row["fac_name"]."</td></tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
mysqli_close($conn);
?>