<?php
$conn=mysqli_connect("db.soic.indiana.edu","i308s17_team87","my+sql=i308s17_team87", "i308s17_team87");
// Check connection
if (!$conn)
    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }
else 
    { echo "Established Database Connection" ;}

$major = mysqli_real_escape_string($conn, $_POST['major']);

$sql = "SELECT DISTINCT CONCAT(a.fname, ' ', a.lname) as name, adv.major as adv_major FROM advisor as a, advisor_expertise as adv WHERE a.advisorID = adv.advisorID and adv.major = '$major';";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table><tr><th>Advisor</th><th>Major</th></tr>";
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr><td>".$row["name"]. "</td><td>".$row["adv_major"]."</td></tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
mysqli_close($conn);
?>