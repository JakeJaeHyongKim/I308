<!doctype html>
<html>
<body>
<h2>Select from Works_shift</h2>
<h3>Calls same week3.php as in Lecture</h3>
<form action="week13.php" method="POST">
Order Date: <input type="date" name="wdate" min="2003-01-02" required><br>
Role: <select name='roles'>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308f16_team15","my+sql=i308f16_team15","i308f16_team15");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $result = mysqli_query($conn,"SELECT distinct role FROM works_shift");
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['role'];
                  $name = $row['role']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?> 
    </select>
</br>
Time of Order: <input type="time" name="wtime" required><br>
<input type="submit" value="Select the Results">
</form>
</body>
</html>
