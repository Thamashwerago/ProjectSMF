<!DOCTYPE html>
<html>
<head>
<title>Reports View
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

select,input,button{
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
<legend><h1>Reports View</h1></legend>
<form action="ReportPrint.php" method="post">
<table>
<tr>
<td>Enter Subject:</td><td><select name="subject" required>
  <option value="Biology">Biology</option>
  <option value="Combined Maths">Combined Maths</option>
  <option value="Physics">Physics</option>
  <option value="Chemistry">Chemistry</option>
  <option value="ICT">ICT</option>
  <option value="Economics">Economics</option>
  <option value="Accountancy">Accountancy</option>
  <option value="Logic">Logic</option>
  <option value="English">English</option>
  <option value="GIT">GIT</option>
  <option value="Business Studies">Business Studies</option>
  </select></td><td><input  type="submit" name="lps" value="List Of Pass Student"></td></tr>
<tr>
<td>Enter year:</td><td><select name="year" required>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  <option value="2022">2022</option>
  <option value="2023">2023</option>
  <option value="2024">2024</option>
  <option value="2025">2025</option>
  </select></td><td><input  type="submit" name="lfs" value="List Of Failure"></td></tr>
<tr>
<td>Enter Term:</td><td><select name="term" required>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  </select></td><td><input  type="submit" name="t3" value="Best 3 Students"></td></tr>
</table>
</fieldset>
</form>
</body>
</html>