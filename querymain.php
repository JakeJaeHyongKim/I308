<!doctype html>

<html>

<body>

<h3>Please Select a Query</h3>

<form action= "query3b.php" method ="POST">

3b Produce a list of faculty who have never taught a *specific course*.<br>

Course: <select name="course" required>


<?php

$conn = mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87","i308s17_team87");

// Check connection
if(!$conn){

	die("Connection failed:" . mysqli_connect_error());
}

	$result = mysqli_query($conn,"SELECT distinct courseID, title, course_num FROM course");
	
while($row = mysqli_fetch_assoc($result)){

			unset($courseID,$title,$course_num);

			$courseID = $row['courseID'];

			$title = $row['title'];

			$course_num = $row['course_num'];

			echo '<option value="'.$courseID.'">'.$title. $course_num.'</option>';
}
?>

	</select><br>
<input type="submit" name="3b" value="Query 3b"><br><br>
</form>


<form action="7a.php" method="POST">

7a Produce an alphabetical list of students with their majors who are advised by a *specific advisor*.<br>

Advisor: <select name="advisor" required>

<?php

$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30","i308s18_team30");

// Check connection

if(!$conn){

	die("Connection failed:" . mysqli_connect_error());
}
	
$result = mysqli_query($conn,"SELECT DISTINCT AdvisorID, concat(FirstName,' ',LastName) as Name FROM advisor ORDER BY AdvisorID");

	while($row = mysqli_fetch_assoc($result)){

		unset($AdvisorID,$Name);

		$id = $row['AdvisorID'];

		$name = $row['Name'];

	echo '<option value="'.$id.'">'.$name.'</option>';
}
?>

</select>
<br>

<input type="submit" value="7a"><br>
</form>



<form action="query4c.php" method="POST">


4c Produce a list of all students who took a course that had a prerequisite but the student had not taken the prerequisite. Include the semester, the course subject and number, and the grade the student received.<br>
<input type="submit" name="4c" value="Query 4c"><br><br>
</form>

<form action="query2b.php" method="POST">
2b Produce a list of rooms that are equipped with *some feature* -e.g., "wired instructor station" - that are available at a particular time.<br>
Feature: <select name="feature" required>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87","i308s17_team87");
// Check connection
if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
}
	$result = mysqli_query($conn,"SELECT DISTINCT feature FROM classroom_feature");
	while($row = mysqli_fetch_assoc($result)){
			unset($feature);
			$feature = $row['feature'];
	//		$classroomID = $row['classroomID'];
			echo '<option value="'.$feature.'">'.$feature.'</option>';
}
?>
	</select><br>
Select a Time:<input type="time" name="time"><br>
<input type="submit" name="2b" value="Query 2b"><br><br>
</form>

<form action="query1a.php" method="POST">
1a Produce a roster for a *specified section* sorted by student's last name, first name.<br>
Section #: <select name="section" required>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87","i308s17_team87");
// Check connection
if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
}
	$result = mysqli_query($conn,"SELECT c.title as title, c.course_num as num, s.sectionID as id FROM course as c, section as s WHERE s.courseID=c.courseID;");
	while($row = mysqli_fetch_assoc($result)){
			unset($title,$sectionID,$course_num);
			$title = $row['title'];
			$sectionID = $row['id'];
			$course_num = $row['num'];
			
			echo '<option value="'.$sectionID.'">'.$title . $course_num .'-' . $sectionID .'</option>';
}
?>
	</select><br>
<input type="submit" name="1a" value="Query 1a"><br><br>
</form>

<form action="query6b.php" method="POST">
6b Produce a list of students and faculty who were in a *particular building* at a *particular time*.<br>
Building: <select name="building" required>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87","i308s17_team87");
// Check connection
if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
}
	$result = mysqli_query($conn,"SELECT buildingName FROM classroom");
	while($row = mysqli_fetch_assoc($result)){
			unset($buildingName);
			$buildingName = $row['buildingName'];
			echo '<option value="'.$buildingName.'">'.$buildingName.'</option>';
}
?>
	</select><br>
Select a Time:<input type="time" name="time"><br>
<input type="submit" name="6b" value="Query 6b"><br><br>
</form>

<form action="query5a.php" method="POST">
5a Produce a chronological list (transcript-like) of all courses taken by a *specified student*. Show grades earned.<br>
Student: <select name="student" required>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87","i308s17_team87");
// Check connection
if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
}
	$result = mysqli_query($conn,"SELECT studentID, concat (fname, ' ', lname) as student_name FROM student GROUP BY studentID");

	while($row = mysqli_fetch_assoc($result)){
			unset($student_name, $studentID);
			$student_name = $row['student_name'];
			$studentID = $row['studentID'];
			echo '<option value="'.$studentID.'">'.$student_name.'</option>';
}
?>
	</select><br>
<input type="submit" name="5a" value="Query 5a"><br><br>
</form>

<h3>Additional Queries</h3>

<form action="additionalquery1.php" method="POST">
List students who are from *specified city* and their phone number.<br>
City: <select name="city" required>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87","i308s17_team87");
// Check connection
if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
}
	$result = mysqli_query($conn,"SELECT distinct city FROM student");
	while($row = mysqli_fetch_assoc($result)){
			unset($city);
			$city = $row['city'];
			echo '<option value="'.$city.'">'.$city.'</option>';
}
?>
	</select><br>
<input type="submit" name="A1" value="Query A1"><br><br>
</form>

<form action="additionalquery2.php" method="POST">
List faculty by name who are in *specified department*<br>
Department: <select name="department" required>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87","i308s17_team87");
// Check connection
if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
}
	$result = mysqli_query($conn,"SELECT distinct department FROM faculty");
	while($row = mysqli_fetch_assoc($result)){
			unset($department);
			$department = $row['department'];
			echo '<option value="'.$department.'">'.$department.'</option>';
}
?>
	</select><br>
<input type="submit" name="A2" value="Query A2"><br><br>
</form>

<form action="additionalquery3.php" method="POST">
List advisors by name who are majoring *specified major*<br>
Major: <select name="major" required>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87","i308s17_team87");
// Check connection
if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
}
	$result = mysqli_query($conn,"SELECT distinct major FROM advisor_expertise");
	while($row = mysqli_fetch_assoc($result)){
			unset($major);
			$major = $row['major'];
			echo '<option value="'.$major.'">'.$major.'</option>';
}
?>
	</select><br>
<input type="submit" name="A3" value="Query A3"><br><br>
</form>

</body>
</html>