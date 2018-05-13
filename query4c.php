<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87", "i308s17_team87");
// Check connection
if (!$conn)
    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }
else 
    { echo "Established Database Connection" ;}

$sql = "
SELECT DISTINCT concat(s.fname, ' ',s.lname) as full_name, sem.title as title, concat(c.title, ' ',c.course_num) as course, g.grade as grade
FROM student as s, course as c, semester as sem, grade as g, section as se
WHERE g.studentID = s.studentID 
and se.sectionID = g.sectionID 
and se.courseID = c.courseID 
and sem.semesterID = se.semesterID
And EXISTS
  ( SELECT * 
    FROM course_prereq as cp
    WHERE c.courseID = cp.courseID
      AND NOT EXISTS
            ( SELECT *
	      from course_prereq as cp1
              WHERE concat(c.title, ' ',c.course_num) = concat(cp1.title, ' ',cp1.course_num)
            )
  )
;";

$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table><tr><th>Student</th><th>Semester</th><th>Course</th><th>Grade</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row["full_name"]. "</td><td>".$row["title"]. "</td><td>".$row["course"]. "</td><td>".$row["grade"]."</tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
mysqli_close($conn);
?>