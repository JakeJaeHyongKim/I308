<!doctype html>
<html>
<body>
<h2>I308 Team 30 Final Project</h2>
<h3>Queries</h3>

3b.) Produce a list of faculty who have never taught a *specified course*

<form action="3b.php" method="POST">
Course: <select name="course" required><br>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30","i308s18_team30");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $result = mysqli_query($conn,"SELECT CourseID, CourseName FROM Course ORDER BY CourseID;");
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($CourseID, $CourseName);
                  $courseid = $row['CourseID'];
                  $name = $row['CourseName']; 
                  echo '<option value="'.$courseid.'">'.$name.'</option>';
}
?> 
</select>
<br>
<input type="submit" value="Submit course">

</form>
<br>

<form action="2b.php" method="POST">
2b.) Produce a list of rooms that are equipped with *some feature* (e.g.wired 
instructor station) that are available at a particular time.<br>

Classroom: <select name="classroom" required><br>

<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30","i308s18_team30");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $result = mysqli_query($conn,"SELECT DISTINCT Feature, ClassroomID FROM Classroom ORDER BY ClassroomID;");
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($Feature, $ClassroomID);
                  $feature = $row['Feature'];
                  $classroom = $row['ClassroomID']; 
                  echo '<option value="'.$classroom.'">'.$feature.'</option>';
}
?> 
</select>
<br>
Day: <select name="day" required>
<option value ='MON'>Monday</option>
<option value ='TUE'>Tuesday</option>
<option value ='WED'>Wednesday</option>
<option value ='THU'>Thursday</option>
<option value ='FRI'>Friday</option>
</select>

Time: (Sections are between 2'o clock and 11 o'clock) <input type="time" name="time"><br>


<input type="submit" value="Submit feature and time">

<br>
</form>
<br>
<form action="9b.php" method="POST">
9b)Produce a list of students with hours earned who have met graduation requirements for a *specified major*.<br>

Major: <select name="major" required><br>

<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30","i308s18_team30");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $result = mysqli_query($conn,"SELECT MajorID, MajorName FROM Major ORDER BY 
MajorID;");
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($MajorID, $MajorName);
                  $id = $row['MajorID'];
                  $name = $row['MajorName']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?>

</select>
<input type="submit" value="Submit major">

</form>

<br>
<form action="7a.php" method="POST">

7a Produce an alphabetical list of students with their majors who are advised by a *specific advisor*.<br>

Advisor: <select name="advisor" required>

<?php

$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30","i308s18_team30");

// Check connection

if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
}
$result = mysqli_query($conn,"SELECT DISTINCT AdvisorID, CONCAT(FirstName,' ',LastName) AS Name FROM Advisor ORDER BY AdvisorID");
	while($row = mysqli_fetch_assoc($result)){
		unset($AdvisorID,$Name);
		$id = $row['AdvisorID'];
		$name = $row['Name'];
	echo '<option value="'.$id.'">'.$name.'</option>';
}
?>

</select>

<br>

<input type="submit" value="Submit Advisor"><br>
<br>

</form>

6c  Produce a list of students and faculty who were in a *particular building* at a *particular time*. 
Also include in the list faculty and advisors who have offices in that building. (15 points)
<form action="6c.php" method="POST">
Building: <select name="building" required>

<?php

$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30","i308s18_team30");

// Check connection

if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
}
$result = mysqli_query($conn,"SELECT DISTINCT BuildingID, BuildingName FROM Building ORDER BY BuildingID");
	while($row = mysqli_fetch_assoc($result)){
		unset($BuildingID,$BuildingName);
		$id = $row['BuildingID'];
		$name = $row['BuildingName'];
	echo '<option value="'.$id.'">'.$name.'</option>';
}
?>

</select>
<br>
Day: <select name="day" required>
<option value ='MON'>Monday</option>
<option value ='TUE'>Tuesday</option>
<option value ='WED'>Wednesday</option>
<option value ='THU'>Thursday</option>
<option value ='FRI'>Friday</option>
<br>
Time: Sections are between 2'o clock and 11 o'clock)  <input type="time" name="time"><br>

<input type="submit" value="Submit building and time">

</form>

<h4> Additional Queries </h4>
<form action="additional1.php" method="POST">
Produce an alphabetical list of students who have taken a specified semester.
<br>
Semester: <select name="semester" required>

<?php

$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30","i308s18_team30");

// Check connection

if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
}
$result = mysqli_query($conn,"SELECT DISTINCT SemesterID, SemesterName FROM Semester ORDER BY SemesterID");
	while($row = mysqli_fetch_assoc($result)){
		unset($SemesterID,$SemesterName);
		$id = $row['SemesterID'];
		$name = $row['SemesterName'];
	echo '<option value="'.$id.'">'.$name.'</option>';
}
?>

</select>

<input type="submit" value="Submit Semester">

</form>
<br>
Produce a list of faculty who works in *specified department*
<form action="additional2.php" method="POST">
<br>
Department: <select name="department" required>

<?php

$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30","i308s18_team30");

// Check connection

if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
}
$result = mysqli_query($conn,"SELECT DISTINCT DepartmentID, Name FROM Department ORDER BY DepartmentID");
	while($row = mysqli_fetch_assoc($result)){
		unset($DepartmentID,$Name);
		$id = $row['DepartmentID'];
		$name = $row['Name'];
	echo '<option value="'.$id.'">'.$name.'</option>';
}
?>

</select>

<input type="submit" value="Submit Department">
</form>

</body>
</html>

