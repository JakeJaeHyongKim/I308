<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>



<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30", 
"i308s18_team30");
// Check connection
if (mysqli_connect_errno())
{echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
else 
{echo nl2br("Established Database Connection \n");}

$building = mysqli_real_escape_string($conn,$_POST['building']);
$day = mysqli_real_escape_string($conn,$_POST['day']);
$time = mysqli_real_escape_string($conn,$_POST['time']);


$sql="CONCAT(f.Firstname,' ',f.Lastname) AS faculty_name, CONCAT(s.Firstname,' ',s.Lastname) AS student_name
FROM Student AS s, Faculty AS f, Building AS b, Office AS o, Section as se, Students_taking_courses AS stc 
WHERE f.DepartmentID = b.DepartmentID AND o.BuildingID = b.BuildingID AND f.OfficeID = o.OfficeID AND stc.SectionID = se.SectionID AND stc.StudentID = s.StudentID AND stc.CourseID = f.CourseID AND b.BuildingID = $building  AND se.Time = $time";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'><tr><th>faculty_name</th><th>Student_name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo 
"<tr><td>".$row["faculty_name"]."</td></tr>".$row["student_name"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($conn);
?>

</body>
</html>
