<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87", "i308s17_team87");
// Check connection
if (!$conn)
    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }
else 
    { echo "Established Database Connection" ;}

$student = mysqli_real_escape_string($conn, $_POST['student']);

$sql = "SELECT DISTINCT concat (s.fname, ' ', s.lname) as student_name, s.studentID as studentID, g.grade as grade, c.title as course_title, c.courseID as course_ID, c.course_num as course_num, c.credits as course_credits, sem.title as semester FROM student as s, grade as g, course as c, section as sec, semester as sem WHERE c.courseID = sec.courseID and g.sectionID = sec.sectionID and g.studentID = s.studentID and sem.semesterID = sec.semesterID and s.studentID='$student' ORDER BY sem.start_date ;";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table><tr><th>Student</th><th>Grade</th><th>Course</th><th>CourseID</th><th>Course Num</th><th>Credits</th><th>Semester</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row["student_name"]. "</td><td>".$row["grade"]."</td><td>".$row["course_title"]."</td><td>".$row["course_ID"]."</td><td>".$row["course_num"]."</td><td>".$row["course_credits"]."</td><td>".$row["semester"]."</td></tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
mysqli_close($conn);
?>