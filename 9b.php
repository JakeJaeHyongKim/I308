<?php

$conn=mysqli_connect("db.soic.indiana.edu","i308s18_team30","my+sql=i308s18_team30", "i308s18_team30");

// Check connection
if (!$conn)

    {die("Failed to connect to MySQL: " . mysqli_connect_error()); }

else 
    
{ echo "Established Database Connection" ;}


$majorid= mysqli_real_escape_string($conn,$_POST['major']);

$sql="SELECT CONCAT(s.FirstName,' ',s.LastName) AS Name
FROM Course AS c, Major AS m, Student AS s, Section AS sec, Students_taking_courses as stc
WHERE m.MajorID = s.MajorID
AND s.MajorID = c.MajorID
AND stc.StudentID = s.StudentID	
AND m.GraduationReq <= (SELECT SUM(CreditHrs) FROM Course as c, Students_taking_courses as stc, Student as s 
WHERE stc.SectionID = c.SectionID AND s.StudentID =stc.StudentID)
AND s.MajorID = $majorid
GROUP BY Name;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
