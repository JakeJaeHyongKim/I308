SELECT CONCAT(s.FirstName,' ',s.LastName) AS Name

FROM Course AS c, Major AS m, Student AS s, Section AS sec, Students_taking_courses as stc
WHERE m.MajorID = s.MajorID

AND s.MajorID = c.MajorID

AND stc.StudentID = s.StudentID	

AND m.GraduationReq <= (SELECT SUM(CreditHrs) FROM Course as c, Students_taking_courses as stc, Student as s 
WHERE stc.SectionID = c.SectionID AND s.StudentID =stc.StudentID)
AND s.MajorID = '101' 
GROUP BY Name;




SELECT CONCAT(f.FirstName,' ',f.LastName) AS name

FROM Faculty AS f, Course AS c

WHERE f.FacultyID=c.FacultyID AND c.CourseName != 'Data'

GROUP BY name;





SELECT CONCAT(f.FirstName,' ',f.LastName) AS faculty_name, CONCAT(s.Firstname,' ',s.Lastname) AS student_name

FROM Student AS s, Faculty AS f, Building AS b, Office AS o, Section as se, Students_taking_courses AS stc

WHERE f.DepartmentID = b.DepartmentID AND o.BuildingID = b.BuildingID AND stc.SectionID = se.SectionID 
AND stc.StudentID = s.StudentID AND stc.CourseID = f.CourseID AND b.BuildingID = '1001'  AND se.Time = '10:30:00';







SELECT CONCAT(s.FirstName,' ',s.LastName) AS Name, m.MajorName as Major, s.StudentID

FROM Student AS s, Major as m, Advisor AS a, Students_taking_courses as stc

WHERE s.AdvisorID = a.AdvisorID 
AND m.MajorID = s.MajorID 
AND stc.StudentID = s.StudentID 
AND a.AdvisorID = 1 
GROUP BY s.StudentID 
ORDER BY Name desc;




SELECT CONCAT(b.BuildingName, '-', c.ClassroomID) AS Location
FROM Classroom AS c, Section AS se, Building AS b
WHERE se.ClassroomID = c.ClassroomID 
AND b.BuildingID = se.BuildingID 
AND c.ClassroomID = '4001'
AND se.Time = '10:30:00';




SELECT CONCAT (s.Firstname,' ',s.Lastname) AS name 

FROM Student as s, Section as se, Course as c, Students_taking_courses as stc

WHERE stc.StudentID = s.StudentID 
AND stc.SectionID = '101' 
AND stc.CourseID = '1012'

GROUP BY name

ORDER BY s.Lastname;





SELECT CONCAT(s.Firstname,' ',s.Lastname) AS Name 
FROM Student AS s, Students_taking_courses as stc 
WHERE s.StudentID = stc.StudentID AND stc.SemesterID = '1000';



SELECT CONCAT(s.Firstname,' ',s.Lastname) AS name

FROM Student AS s, Course as c, Semester as sem, Students_taking_courses as stc

WHERE sem.SemesterID = stc.SemesterID

AND stc.StudentID = s.StudentID
AND c.CourseID = stc.CourseID
AND sem.SemesterName = 'FALL 2017'

GROUP BY name

ORDER BY name ASC;