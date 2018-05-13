<?php

$conn=mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87", "i308s17_team87");

// Check connection
if (!$conn)

    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }

else 
    
{ echo "Established Database Connection" ;}



$courseid = mysqli_real_escape_string($conn, $_POST['course']);



$sql = "SELECT f.facultyID as id, concat(f.fname, ' ',f.lname) as name FROM faculty as f WHERE not exists(SELECT * FROM section as s, course as c WHERE f.facultyID=s.facultyID and s.courseID = c.courseID and c.courseID='$courseid');";




$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) 
{
	echo "<table><tr><th>FacultyID</th><th>Name</th></tr>";
	
while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row["id"]. "</td><td>".$row["name"]. "</td></tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
mysqli_close($conn);
?>