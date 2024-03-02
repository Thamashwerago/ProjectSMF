<!DOCTYPE html>
<html>
<head>
<title>
Examination
</title>
<style>
body{
	background-image: url('images/background2.jpg');
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
	background-color:#d4d9f1;
	color:#39478f;
	border-radius:24px;
}
input.tranpar{
	background:transparent;
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
<legend><h1>Examination</h1></legend>
<form action="" method="post">
<table>
<tr><td>Student Addmission No:</td>
<td><?php 
if (isset($_POST["search"])){
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
 if (isset($_POST["search"])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$ad_no=$_POST["ad_no"];
}
$search = "SELECT ad_no FROM registration WHERE ad_no = '$ad_no'";
$result = mysqli_query($conn, $search);

if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
	?><input type="text" name="ad_no" value="<?php echo $row['ad_no']; ?>" readonly="">
	<?php

	}
  }else if(isset($_POST["search"])){
		echo '<script type="text/javascript">';
		echo ' alert("Error,No data in DB or please contact software engineer @Thamashwerago")';
		echo '</script>';
  }
}
mysqli_close($conn);
?></td>
<td><input  type="submit" value="Search" name="search"></td>
</tr>
<tr>
<?php
include 'DBconn.php';

if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}
 if (isset($_POST["search"])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$ad_no=$_POST["ad_no"];
}
$search = "SELECT name FROM registration WHERE ad_no = '$ad_no'";
$result = mysqli_query($conn, $search);

if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
	?><td>Name:</td>
	<td><input type="text" name="name" value="<?php echo $row['name']; ?>" readonly=""></td>
	<?php

	}
  }else if(isset($_POST["search"])){
		echo '<script type="text/javascript">';
		echo ' alert("Error,No data in DB or please contact software engineer @Thamashwerago")';
		echo '</script>';
  }
}
mysqli_close($conn);
?></tr>
<tr>
<?php
include 'DBconn.php';

if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}
 if (isset($_POST["search"])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$ad_no=$_POST["ad_no"];
}
$search = "SELECT strName FROM registration WHERE ad_no = '$ad_no'";
$result = mysqli_query($conn, $search);
if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
	?><td>Subject Stream:</td>
	<td><input type="text" name="stream" value="<?php echo $row['strName']; ?>" readonly=""></td>
	<?php
	}
}else if(isset($_POST["search"])){
		echo '<script type="text/javascript">';
		echo ' alert("Error,No data in DB or please contact software engineer @Thamashwerago")';
		echo '</script>';
 }
}
mysqli_close($conn);
?></tr>
</table>
<?php
if (isset($_POST["search"])){
 echo "<hr>";
?><table>
<tr><td colspan="2">Term:<select name="term">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
</select></td>
<td>Year:<select name="year">
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
</select></td></tr>
<tr><th>Subject</th><th>Marks</th></tr>
<?php
}

include 'DBconn.php';

if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}
if (isset($_POST["search"])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$ad_no=$_POST["ad_no"];
}
$search1 = "SELECT strName FROM registration WHERE ad_no = '$ad_no'";
$result1 = mysqli_query($conn, $search1);
if(mysqli_num_rows($result1)>0){
	while($row1 = mysqli_fetch_assoc($result1)){
		$strName=$row1['strName'];
	}
}
$search ="SELECT subject.subName FROM subject,stream,stream_subject WHERE stream.strName='$strName'AND stream.strName = stream_subject.strName AND stream_subject.subName = subject.subName";
$result = mysqli_query($conn, $search);
if(mysqli_num_rows($result)>0){
	$subArray = array("sub1","sub2","sub3","sub4","sub5");
	$marksNameArray = array("m1","m2","m3","m4","m5");
	$arrayLength = count($marksNameArray);
	$i=0;
	while ($i<$arrayLength){
		while($row = mysqli_fetch_assoc($result)){
		?><tr><td><input class="tranpar" type="text" name="<?php echo $subArray[$i]; ?>" value="<?php echo $row['subName']; ?>" readonly=""></td>
			<td><input type="text" name="<?php echo $marksNameArray[$i]; ?>"></td></tr>
		<?php
		$i++;
		}
	}
	
}else{
	echo '<script type="text/javascript">';
		echo ' alert("Error,No data in DB or please contact software engineer @Thamashwerago")';
		echo '</script>';
}
?>
	
	<tr><td><input type="submit" name="save" value="Save"></td>
	<td><input type="reset" name="clear" value="Clear"></td></tr>
	
	
<?php
}else if(isset($_POST["search"])){
		echo '<script type="text/javascript">';
		echo ' alert("Error,No data in DB or please contact software engineer @Thamashwerago")';
		echo '</script>';
}
mysqli_close($conn);
?><?php

include 'DBconn.php';

if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}


if(isset($_POST['save'])){

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $ad_no=$_POST["ad_no"];
 $strName=$_POST["stream"];
 $subName1=$_POST["sub1"];
 $subName2=$_POST["sub2"];
 $subName3=$_POST["sub3"];
 $subName4=$_POST["sub4"];
 $subName5=$_POST["sub5"];
 $termId=$_POST["term"];
 $m1=$_POST["m1"];
 $m2=$_POST["m2"];
 $m3=$_POST["m3"];
 $m4=$_POST["m4"];
 $m5=$_POST["m5"];
 $year=$_POST["year"];
}

$insert ="INSERT INTO marks (termId,subName,ad_no,strName,marks,year)
 VALUES ('$termId','$subName1','$ad_no','$strName',$m1,$year),('$termId','$subName2','$ad_no','$strName',$m2,$year),('$termId','$subName3','$ad_no','$strName',$m3,$year),('$termId','$subName4','$ad_no','$strName',$m4,$year),('$termId','$subName5','$ad_no','$strName',$m5,$year)";


if($m1<0 || $m1>100 || $m2<0 || $m2>100 || $m3<0 || $m3>100 || $m4<0 || $m4>100 || $m5<0 || $m5>100){
	echo '<script type="text/javascript">';
	echo ' alert("Marks must be in between 0 and 100")';
	echo '</script>';
}else if(mysqli_query($conn,$insert)){
	echo '<script type="text/javascript">';
	echo ' alert("Record fill successfully")';
	echo '</script>';
}else{
	echo '<script type="text/javascript">';
	echo ' alert("Error, cannot fill table")';
	echo '</script>';
	echo mysqli_error($conn);
}
}

mysqli_close($conn);
?>
</table>
</fieldset>
</form>
</body>
</html>