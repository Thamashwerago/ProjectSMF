<!DOCTYPE html>
<html>
<head>
<title>Queries view
</title>
<style>
body{
	background-image: url('images/background4.jpg');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	background-position:center;
	font-size:18px;
	}
input,button{
	background-color: #d4d9f1;
	color:#39478f;
	border-radius:24px;
}
</style>
</head>
<body>
<a href="ReportsView.php"><button type="button">&lt;&lt; Back</button></a>
<button type="submit" onclick="startprint()">Print</button>
<script>
function startprint(){
 window.print();
}
</script>
<?php 

include 'DBconn.php';

if  (!$conn) {
    die("Connection failed: " .  mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$subName=$_POST["subject"];
	$year=$_POST["year"];
	$termName=$_POST["term"];
}

if (isset($_POST["lps"])){
	$search = "SELECT registration.name,marks.marks,marks.termId,marks.year,marks.subName FROM registration,marks WHERE 
	marks.subName='$subName' AND marks.year=$year AND marks.termId='$termName' AND marks.ad_no=registration.ad_no AND marks.marks>=40";
	$result = mysqli_query($conn, $search);

     if (mysqli_num_rows($result) > 0) {
		 $row = mysqli_fetch_assoc($result);
		echo"<table border=\"1\">" .
			"<caption><b>Pass Students list".
			"</b></caption>" .
			"<br>" .
			"Subject Name:".$row["subName"] .
			"<br>" .
			"Term:".$row["termId"] .
			"<br>" .
			"Year:".$row["year"] .
			"<th>Student Name:</th>" .
			"<th>Marks:</th></tr>";
            
	     while($row = mysqli_fetch_assoc($result)) {
	        echo"<td>".$row["name"]."</td>" .
				"<td>". $row["marks"]. "</td></tr>" ;
        }
		echo"</table>";
    }else if(isset($_POST["lps"])){
		echo '<script type="text/javascript">';
		echo ' alert("Error,No data in DB or please contact software engineer @Thamashwerago")';
		echo '</script>';
	}
}else if (isset($_POST["lfs"])){
	$search = "SELECT registration.name,marks.marks,marks.termId,marks.year,marks.subName FROM registration,marks WHERE 
	marks.subName='$subName' AND marks.year=$year AND marks.termId='$termName' AND marks.marks<40";
	$result = mysqli_query($conn, $search);

        if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			echo"<table border=\"1\">" .
				"<caption><b>Fail Students list".
				"</b></caption>" .
				"<br>" .
				"Subject Name:".$row["subName"] .
				"<br>" .
				"Term:".$row["termId"] .
				"<br>" .
				"Year:".$row["year"] .
				"<th>Student Name:</th>" .
				"<th>Marks:</th></tr>";
	        while($row = mysqli_fetch_assoc($result)) {
	            echo"<td>".$row["name"]."</td>" .
					"<td>". $row["marks"]. "</td></tr>" ;
		}
		echo"</table>";
	}else if(isset($_POST["lfs"])){
		echo '<script type="text/javascript">';
		echo ' alert("Error,No data in DB or please contact software engineer @Thamashwerago")';
		echo '</script>';
	}
}else if (isset($_POST["t3"])){
	$search = "SELECT marks.subName,registration.name,marks.marks,marks.year,marks.termId FROM marks,registration WHERE marks.ad_no=registration.ad_no AND marks.subName='$subName' AND marks.year=$year AND marks.termId='$termName' group by marks.subName desc  limit 3";
	$result = mysqli_query($conn, $search);

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			echo"<table border=\"1\">" .
			"<caption><b>Fail Students list".
			"</b></caption>" .
			"<br>" .
			"Subject Name:".$row["subName"] .
			"<br>" .
			"Term:".$row["termId"] .
			"<br>" .
			"Year:".$row["year"] .
			"<th>Student Name:</th>" .
			"<th>Marks:</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo"<td>".$row["name"]."</td>" .
				"<td>". $row["marks"]. "</td></tr>" ;
		}
		echo"</table>";
	}else if(isset($_POST["t10"])){
		echo '<script type="text/javascript">';
		echo ' alert("Error,No data in DB or please contact software engineer @Thamashwerago")';
		echo '</script>';
	}
}
	
mysqli_close($conn);
?>
</body>
</html>