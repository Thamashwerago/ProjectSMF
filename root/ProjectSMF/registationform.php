<!DOCTYPE html>
<html>
<head>
<title>Registation Form
</title>
<style>
body{
	background-image: url('images/background5.jpg');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	background-position:center;
	font-size:18px;
	}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #7583cd;
  border-radius:24px;
  cursor: pointer;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover{
  background-color: #d4d9f1;
}
input,select,button{
	background-color: #d4d9f1;
	color:#39478f;
	border-radius:24px;
}
</style>
</head>
<body>
<?php
function test_input($data) {
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data;
}

include 'DBconn.php';

if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}


$ad_no = $name = $innitials = $address = $cont_no = $gender = $stream = $par_innitials = $rel_type = $office_add = $par_cont_no = $dob = $email = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$ad_no=test_input($_POST["ad_no"]);
	$name=test_input($_POST["name"]);
	$innitials=test_input($_POST["innitials"]);
	$address=test_input($_POST["address"]);
	$cont_no=test_input($_POST["cont_no"]);
	$gender=test_input($_POST["gender"]);
	$strName=test_input($_POST["strName"]);
	$par_innitials=test_input($_POST["par_innitials"]);
	$rel_type=test_input($_POST["rel_type"]);
	$office_add=test_input($_POST["office_add"]);
	$par_cont_no=test_input($_POST["par_cont_no"]);
	$dob=test_input($_POST["dob"]);
	$email=test_input($_POST["email"]);
 }
if(isset($_POST["save"])){
	$insert ="INSERT INTO registration (ad_no, name, innitials, address, cont_no, gender, strName, par_innitials, rel_type, office_add, par_cont_no, dob, email)
		VALUES ('$ad_no', '$name', '$innitials', '$address', '$cont_no', '$gender', '$strName', '$par_innitials', '$rel_type', '$office_add', '$par_cont_no', '$dob', '$email')";

		if(mysqli_query($conn,$insert)){
			echo '<script type="text/javascript">';
			echo ' alert("Record added successfully")';
			echo '</script>';
		}else{
			echo '<script type="text/javascript">';
			echo ' alert("Error, invalid record")';
			echo '</script>';
			
		}
}
if (isset($_POST["validate"])){
	if (!preg_match("/^[a-zA-Z\s]*$/",$name)){
		echo '<script type="text/javascript">';
		echo ' alert("Only letters and white space allowed")';
		echo '</script>';
	}
   $search = "SELECT ad_no FROM registration WHERE ad_no = '$ad_no'";
   $result = mysqli_query($conn, $search);
		if (mysqli_num_rows($result) == 1) {
			echo '<script type="text/javascript">';
			echo ' alert("This admission number all ready inserted")';
			echo '</script>';
		}
	}
if (isset($_POST["save"])){
if($_POST['save']=="save") {
	$search = "SELECT ad_no FROM registration WHERE ad_no = '$ad_no'";
   $result = mysqli_query($conn, $search);
		if (mysqli_num_rows($result) == 1) {
			echo '<script type="text/javascript">';
			echo ' alert("This admission number all ready inserted")';
			echo '</script>';
		}
}if (!preg_match("/^[a-zA-Z\s]*$/",$name)){
		echo '<script type="text/javascript">';
		echo ' alert("Only letters and white space allowed")';
		echo '</script>';
	}
}
mysqli_close($conn);
?>
<ul>
  <li><a href="registationform.php">Registration</a></li>
  <li><a href="Examination.php">Examination</a></li>
  <li><a href="Serching.php">Search</a></li>
  <li><a href="ReportsView.php">Reports View</a></li>
  <li style="float:right"><a href="Homepage.php">Home</a></li>
</ul>
<fieldset>
<legend><h1>Registation Form</h1></legend>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<fieldset>
<legend><h2>Student Information</h2></legend>
<table>
<tr><td>Student Admission Number:</td>
<td>
<?php 
if (isset($_POST["validate"])){
	?>
<input type="text" name="ad_no" hidden>
<?php }
else{
?>
	<input type="text" name="ad_no" required>
<?php
}

include 'DBconn.php';

if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}
 if (isset($_POST["validate"])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$ad_no=test_input($_POST["ad_no"]);
}
$search = "SELECT ad_no FROM registration WHERE ad_no = '$ad_no'";
$result = mysqli_query($conn, $search);

if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
	?><input type="text" name="ad_no"  required>
	<?php
  }
	}else{
		?><input type="text" name="ad_no" value="<?php echo $ad_no; ?>" readonly="" required>
		<?php
	}
}
mysqli_close($conn);
?>
</td>
<td><input type="submit" name="validate" value="Validate"></tr>
<tr><td>Student Name In Full:</td>
<td><?php 
if (isset($_POST["validate"])){
	?>
<input type="text" name="name" hidden>
<?php }
else{
?>
	<input type="text" name="name" required>
<?php
}

include 'DBconn.php';

if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}
 if (isset($_POST["validate"])){
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name=test_input($_POST["name"]);
		}
			if (!preg_match("/^[a-zA-Z\s]*$/",$name)){
		?><input type="text" name="name"  required>
			<?php
			}else{
		?><input type="text" name="name" value="<?php echo $name; ?>" readonly="" required>
		<?php
	}
}
mysqli_close($conn);
?></td></tr>
<tr><td>Address:</td>
<td><input type="text" name="address" ></td></tr>
<tr><td>Student Name With Innitials:</td>
<td><input type="text" name="innitials"></td></tr>
<tr><td>Contact number:</td>
<td><?php 
if (isset($_POST["validate"])){
	?>
<input type="text" name="cont_no" hidden>
<?php }else{
?>
	<input type="text" name="cont_no" required>
<?php
}

include 'DBconn.php';

if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}
 if (isset($_POST["validate"])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$ad_no=test_input($_POST["ad_no"]);
$cont_no=test_input($_POST["cont_no"]);
}
$search = "SELECT cont_no FROM registration WHERE ad_no = '$ad_no'";
$result = mysqli_query($conn, $search);

if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		?><input type="text" name="cont_no"  required>
	<?php
		}
	}else{
		?><input type="text" name="cont_no" value="<?php echo $cont_no; ?>" readonly="" required>
		<?php
	}
}
mysqli_close($conn);
?></td></tr></tr>
<tr><td>Date Of Birth:</td>
<td><input type="date" name="dob"></td></tr>
<tr><td>Gender:</td>
<td colspan="2"><input type="Radio" name="gender" value="Male" checked>Male      
	<input type="Radio" name="gender" value="Femail" >Female
</td></tr>
<tr><td>Stream Of Study</td>
<td><select name="strName" required>
  <option value="Bio Science">Bio Science</option>
  <option value="Maths">Maths</option>
  <option value="Commerce">Commerce</option>
  <option value="Arts">Arts</option>
  <option value="Maths_ICT">Maths_ICT</option>
  <option value="Commerce_ICT">Commerce_ICT</option>
  </select>
</td></tr>
</table>
</fieldset>


<fieldset>
<legend><h2>Parents/Guardians</h2></legend>
<table>
<tr><td>Name with Innitials:</td>
<td><input type="text" name="par_innitials"></td>
<td>Relationship Type:</td>
<td><select name="rel_type">
<option value="Farther">Father</option>
<option value="Mother">Mother</option>
<option value="Guardians">Guardian</option>
</select>
</td></tr>
<tr><td>Office Address:</td>
<td><input type="text" name="office_add"></td></tr>
<tr><td>Contact Number:</td>
<td><input type="text" name="par_cont_no"></td></tr>
<tr><td>E-mail:</td>
<td><input type="text" name="email"></td></tr>
<tr><td><input type="submit"  name="save" value="Save"></td>
<td><button type="reset" >Clear</button></td></tr>
</table>
</fieldset>
</fieldset>
</form>
</body>
</html>