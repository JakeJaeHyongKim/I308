<!doctype html>
<html>
<body>
<h2>Album Table</h2>
<h3>Insert a new Album</h3>
<form action="albuminsert.php" method="POST">

Title: <input type="text" name="title" maxlength="50" required><br>
</br>
Band: <select name="band" required><br>
<?php
$conn = mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30","i308s18_team30");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $result = mysqli_query($conn,"SELECT bid,name FROM band ORDER BY name");
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($bid, $name);
                  $bid = $row['bid'];
                  $name = $row['name']; 
                  echo '<option value="'.$bid.'">'.$name.'</option>';
}
?> 

    </select>
<br></br>
Published Year: <input type="year" name="pyear" min="1900" 
max="2020" required><br>
</br>

Publisher: <input type="text" name="publisher" maxlength="50" required><br>
</br>

Format: <select name="format" required><br>
<option value="MP3">MP3</option>
<option value="CD">CD</option>
<option value="DIGITAL">DIGITAL</option>
</select>
</p>
</br>
Price: <input type="number" name="price" required>Between $0 and $99,999.99<br>
</br>

<input type="submit" value="Insert Album">
<br></br>

</form>

<form action="albumselect.php" method="POST">

<input type="submit" value="Select Album table">

</form>
</body>
</html>

