<!doctype html>
<html>
<body>
<h2>Album Table</h2>
<h3>Insert a new Album</h3>

<form action="insertalbum.php" method="POST">

Title: <input type="text" name="title" required><br>
Band: <select name="band" required><br>
	<option value="Queen">Queen</option>
	<option value="Rush">Rush</option>
	<option value="Journey">Journey</option>
	<option value="Aerosmith">Aerosmith</option>
	<option value="Nirvana">Nirvana</option>

Published Year: <input type="date" name="pdate"><br>

Publisher: <input type="text" name="publisher"><br>

Format: <select name="format"><br>
	<option value="CD">CD</option>
	<option value="DIGITAL">DIGITAL</option>
	<option value="MP3">MP3</option>

Price: <input type="number" name="price"><br>

<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30","i308s18_team30");
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
