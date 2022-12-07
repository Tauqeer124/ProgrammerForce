<?php include "header.php";

// NOT SHOW PAGE TO THESE ROLES
if ($_SESSION['role'] == 'normal' || $_SESSION['role'] == 'admin') {
    header("Location:http://localhost/phpsession/login.php");
}

?>
<div class="container my-3">
    <div class="row">
        <h1 class="text-center mt-5"><b>Student Managment System | <span class="text-primary">Grades</span></b></h1>
        <div class="col-md-4 mt-5">
            <div class="table-responsive">
            <a href="indexpage.php" class="btn btn-sm btn-info my-2">Home</a>
                <table class="table text-white">
                    <thead>
                        <tr class="bg-success">
                            <th scope="col">#</th>
                            
                            <th scope="col">Grade</th>
                            <th scope="col">Status</th>

                            <!-- <th scope="col">Edit</th>
                            <th scope="col">Delete</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // GET ALL COURSES DATA
                        include "dbcon.php";
                        $sql = "SELECT * FROM grades";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $value) {
                        ?>
                                <tr>
                                    <th scope="row"><?= $value['gid'] ?></th>
                                    <td><?= $value['grades'] ?></td>
                                    <td><?= $value['status'] ?></td>
                                   
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
       
           
        </div>
    </div>
</div>

<?php

?>
<?php include "footer.php"; ?>
