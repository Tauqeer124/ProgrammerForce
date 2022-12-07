<?php
$con=mysqli_connect("localhost","root","","sms");

    $student_id = $_GET['id']; 

    $sql = "SELECT * FROM `students` WHERE `sid`='$student_id'";

    $result = $con->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {
            $student_id = $row['sid'];
            
            $student_name = $row['sname'];

            $student_contact = $row['scontact'];

            $student_cnic = $row['scnic'];

            $student_cid = $row['cid'];

            $student_gid = $row['gid'];

        

        } 
        ?>
        <h2>User Update Form</h2>

        


      
<body>
	<form method="post" action="update.php" >
    <div class="input-group">
			<label>Student ID</label>
			<input type="text" name="sid" value="<?php echo $student_id;?>" Readonly >
		</div>
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="sname" value="<?php echo $student_name;?>" >
		</div>
        
		<div class="input-group">
			<label>Contact</label>
			<input type="text" name="scontact" value="<?php echo $student_contact;?>">
		</div>
        <div class="input-group">
			<label>Scnic</label>
			<input type="text" name="scnic" value="<?php echo $student_cnic;?>">
		</div>
     
<div>
        <label for="color">Course name:</label>
<select name="cid" id="color">
	
	<option value="1">frontEnd</option>
	<option value="2">Backend</option>
	<option value="3">Fullstack</option>
  
</select>
</div>
<div>
        <label for="color">Grade:</label>
<select name="gid" id="color">
	
	<option value="1">A</option>
	<option value="2">B</option>
	<option value="3">C</option>
    <option value="4">D</option>
  
</select>
</div>
<div class="input-group">
			<button class="btn" type="submit" name="save" >update</button>
		</div>
	</form>
</body>
</html>
<?php 
    }
    ?>

    
    