

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
</head>
<body>
	<form method="post" action="add.php" >
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="sname" value="">
		</div>
		<div class="input-group">
			<label>Contact</label>
			<input type="text" name="scontact" value="">
		</div>
        <div class="input-group">
			<label>Scnic</label>
			<input type="text" name="scnic" value="">
		</div>
     
<div>
        <label for="color">Course name:</label>
<select name="cid" id="color">
	<option value="">Choose course</option>
	<option value="1">frontEnd</option>
	<option value="2">Backend</option>
	<option value="3">Fullstack</option>
  
</select>
</div>
<div>
        <label for="color">Grade:</label>
<select name="gid" id="color">
	<option value="">Choose grade</option>
	<option value="1">A</option>
	<option value="2">B</option>
	<option value="3">C</option>
    <option value="4">D</option>
  
</select>
</div>
<div class="input-group">
			<button class="btn" type="submit" name="save" >Save</button>
		</div>
	</form>
</body>
</html>
    