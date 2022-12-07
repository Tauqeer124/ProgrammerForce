
<?php



$conn = new mysqli("localhost", "root", "", "sms");

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}



$sql = "SELECT  sid, sname, scontact, scnic, cname, grades FROM students
INNER JOIN Courses ON students.cid = Courses.cid
INNER JOIN Grades ON students.gid = Grades.gid;";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>
   
    <div class="container">

        <h2>Student Details</h2>
        <a  class="btn btn-info" href="http://localhost/phpcrud/insert.php"> insert new record</a>


<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>Name</th>

        <th>Contact</th>

        <th>Cnic</th>

        <th>Course</th>

        <th>Grade</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['sid']; ?></td>

                    <td><?php echo $row['sname']; ?></td>

                    <td><?php echo $row['scontact']; ?></td>

                    <td><?php echo $row['scnic']; ?></td>

                    <td><?php echo $row['cname']; ?></td>
                    <td><?php echo $row['grades']; ?></td>

                    <td><a class="btn btn-info" href="edit.php?id=<?= $row['sid']; ?>">Edit</a>&nbsp;
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $row['sid']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>