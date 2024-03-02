<!DOCTYPE html>
<html>
<head>
<title>Searching
</title>
<style>
body{
	background-image: url('images/background6.jpg');
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
button,input,select{
	background-color: #d4d9f1;
	color:#39478f;
	border-radius:24px;
}
</style>
</head>
<body>
<ul>
  <li><a href="registationform.php">Registration</a></li>
  <li><a href="Examination.php">Examination</a></li>
  <li><a href="Serching.php">Search</a></li>
  <li><a href="ReportsView.php">Reports View</a></li>
  <li style="float:right"><a href="Homepage.php">Home</a></li>
</ul>
<fieldset>
<legend><h1>Searching</h1></legend>
<form action="Serching.php" method="post">
<fieldset>
<legend><h3>Personel information</h3></legend>
<table>
<tr><td>Enter student addmission no:</td>
<td><input type="text" name="ad_no" required></td></tr>
<br>
<tr>
<td><input type="submit" name="spi" value="Search personel info"></td>
</tr>
</table>
</fieldset>
<fieldset>
<legend><h3>Marks information</h3></legend>
<table>
<tr><td>Enter year:</td>
<td><select name="year" required>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  <option value="2022">2022</option>
  <option value="2023">2023</option>
  <option value="2024">2024</option>
  <option value="2025">2025</option>
  </select></td></tr>
<tr><td>Enter Term:</td>
<td><select name="term" required>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  </select></td></tr>
<tr>
<td><input type="submit" name="smi" value="Search Marks info"></td>
</tr>
</table>
</fieldset>
<button type="button" onclick="startprint()">Print</button>
<script>
function startprint(){
 window.print();
}
</script>
</form>
</fieldset>
<?php 
function test_input($data) {
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data;
}

include 'DBconn.php';

if  (!$conn) {
    die("Connection failed: " .  mysqli_connect_error());
}
$ad_no = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$ad_no=test_input($_POST["ad_no"]);
	$year=test_input($_POST["year"]);
	$term=test_input($_POST["term"]);
}

if (isset($_POST["spi"])){
	$search = "SELECT ad_no, address,name,cont_no,innitials,dob,gender,strName,par_innitials,rel_type,office_add,par_cont_no,email FROM registration WHERE ad_no = '$ad_no'";
	$result = mysqli_query($conn, $search);

		if (mysqli_num_rows($result) > 0) {
			echo"<fieldset>" .
				"<legend><h1>Registation Form</h1></legend>";
			while($row = mysqli_fetch_assoc($result)) {
			echo"<fieldset>" .
				"<legend><h2>Student Information</h2></legend>" .
				"<table>" .
				"<tr><td>Student Admission Number:</td>" .
				"<td>" .$row["ad_no"]. "</td>" .
				"<td>Address:</td>" .
				"<td>" .$row["address"]. "</td></tr>" .
				"<tr><td>Student Name In Full:</td>" .
				"<td>" .$row["name"]. "</td>" .
				"<td>Contact number:</td>" .
				"<td>". $row["cont_no"]."</td></tr>" .
				"<tr><td>Student Name With Innitials:</td>" .
				"<td>". $row["innitials"]. "</td></tr>" .
				"<tr><td>Date Of Birth:</td>" .
				"<td>". $row["dob"]. "</td></tr>" .
				"<tr><td>Gender:</td>" .
				"<td>". $row["gender"]. "</td></tr>" .
				"<tr><td>Stream Of Study</td>" .
				"<td>". $row["strName"]. "</td></tr>" .
				"</table>" .
				"</fieldset>" .

				"<fieldset>" .
				"<legend><h2>Parents/Guardians</h2></legend>" .
				"<table>" .
				"<tr><td>Name with Innitials:</td>" .
				"<td>". $row["par_innitials"]. "</td>" .
				"<td>Relationship Type:</td>" .
				"<td>". $row["rel_type"]. "</td></tr>" .
				"<tr><td>Office Address:</td>" .
				"<td>". $row["office_add"]. "</td></tr>" .
				"<tr><td>Contact Number:</td>" .
				"<td>". $row["par_cont_no"]. "</td></tr>" .
				"<tr><td>E-mail:</td>" .
				"<td>". $row["email"]. "</td></tr>" .
				"</table>" .
				"</fieldset>";
				
			}
			echo"</fieldset>";
		}else if(isset($_POST["spi"])){
		echo '<script type="text/javascript">';
		echo ' alert("Error,No data in DB or please contact software engineer @Thamashwerago")';
		echo '</script>';
	}
}else if(isset($_POST["smi"])){
	$search = "SELECT marks.ad_no,registration.name,marks.strName,marks.year,marks.termId,marks.marks,marks.subName FROM registration,marks WHERE 
	marks.ad_no='$ad_no' AND 
	registration.ad_no=marks.ad_no AND
	marks.strName=registration.strName AND
	marks.year=$year AND
	marks.termId='$term'";
	$result = mysqli_query($conn, $search);

		if (mysqli_num_rows($result) > 0) {
			$tot=0;
			$row = mysqli_fetch_assoc($result);
			echo"<fieldset>" .
				"<legend><h3>Examination</h3></legend>" .
				"<table>" .
				"<tr><td>Student Addmission No:</td>" .
				"<td>". $row["ad_no"]. "</td></tr>" .
				"<tr><td>Name:</td>" .
				"<td>". $row["name"]. "</td></tr>" .
				"<tr><td>Stream:</td>" .
				"<td>". $row["strName"]. "</td></tr>" .
				"<tr><td>Term:</td>" .
				"<td>". $row["termId"]. "</td></tr>" .
				"<tr><td>year:</td>" .
				"<td>". $row["year"]. "</td></tr>" .
				"<tr><td>Subject</td>" .
				"<td>Marks</td></tr>" .
				"<tr><td>". $row["subName"]. "</td>" .
				"<td>". $row["marks"] . "</td></tr>";
				$tot=$row["marks"];
			while($row = mysqli_fetch_assoc($result)){
				$tot=$tot+$row["marks"];
				echo"<tr><td>". $row["subName"]. "</td>" .
					"<td>". $row["marks"] . "</td></tr>";
			}
			$avg=$tot/5;
		echo"<tr><td>Total</td><td>". 
			$tot."</td></tr>".
			"<tr><td>Average</td><td>". 
			$avg."</td></tr>".
			"</table>" .
			"</fieldset>" ;
		}else if(isset($_POST["smi"])){
		echo '<script type="text/javascript">';
		echo ' alert("Error,No data in DB or please contact software engineer @Thamashwerago")';
		echo '</script>';
	}
}
mysqli_close($conn);
?>
</body>
</html>