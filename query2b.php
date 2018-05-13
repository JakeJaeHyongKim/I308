<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87", "i308s17_team87");
// Check connection
if (!$conn)
    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }
else 
    { echo "Established Database Connection" ;}

$feature = mysqli_real_escape_string($conn, $_POST['feature']);
$time = mysqli_real_escape_string($conn, $_POST['time']);

$sql = "SELECT c.classroomID as classroomID,c.buildingName as buildingName FROM classroom as c, classroom_feature as cf,section as s WHERE cf.feature='$feature' and c.classroomID=cf.classroomID and c.classroomID=s.classroomID and ('$time' between s.start_time and s.end_time) GROUP BY c.classroomID;";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table><tr><th>ClassroomID</th><th>Building Name</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row["classroomID"]. "</td><td>".$row["buildingName"]. "</td></tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
mysqli_close($conn);
?>