<!DOCTYPE html>
<html>
<head>
<title>Home page
</title>
<style>
body{
	background-image: url('images/background1.jpg');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-size: cover;
	background-position:center;
	font-size:18px;
	}
h1,h3{
	text-align:center;
	background-color: #f1f1f1;
	color:#39478f;
	border-radius:24px;
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
<?php// include 'navBar.php'; ?>
<ul>
  <li><a href="registationform.php">Registration</a></li>
  <li><a href="Examination.php">Examination</a></li>
  <li><a href="Serching.php">Search</a></li>
  <li><a href="ReportsView.php">Reports View</a></li>
  <li style="float:right"><a href="Homepage_login.php" onclick="return confirm('Are you sure you want to logout?');">Logout</a></li>
</ul>
<h1>Welcome</h1>
<h3>Home</h3>
</body>
</html>


