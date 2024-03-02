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

.form-popup {
  display: none;
  z-index: 9;
}

.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
  position:absolute;
  background:transparent;
  background-repeat:no-repeat;
  background-size: cover;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  
}

.form-container input[type=text], .form-container input[type=password] {
  width:80%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  transition:0.5s;
}

.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
  width:90%;
}

.form-container .btn {
  background-color:#39478f;
  color: #f1f1f1;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

.form-container .cancel {
  background-color:#39478f;
}

.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
input,select,button{
	background-color: #d4d9f1;
	color:#39478f;
	border-radius:24px;
}
b{
 color:white;
 font-size:20px;
 }
</style>
</head>
<body>
<ul>
  <li style="text-decoration:line-through;" onclick="youcant()"><a>Registration</a></li>
  <li style="text-decoration:line-through;" onclick="youcant()"><a>Examination</a></li>
  <li style="text-decoration:line-through;" onclick="youcant()"><a>Search</a></li>
  <li style="text-decoration:line-through;" onclick="youcant()"><a>Reports View</a></li>
  <li style="float:right" onclick="popup()"><a>Login</a></li>
</ul>
<h1>Welcome</h1>
<h3>Home</h3>
<div class="form-popup" id="myForm">
  <form action="Homepage_login.php" class="form-container" method="post">
     <h1>Login</h1>

       <b>User Name:</b><br>
         <input type="text" placeholder="Enter user name" name="userName" required>

       <b>Password:</b><br>
         <input type="password" placeholder="Enter Password" name="password" required>

     <input type="submit" class="btn" name="login" value="Login">
     <button type="reset" class="btn cancel" onclick="closepop()">Close</button>
  </form>
</div>
<script>
function youcant() {
  alert("You must login first to use other functions");
    return false;
}
function popup() {
 document.getElementById("myForm").style.display = "block";
}
function closepop() {
 document.getElementById("myForm").style.display = "none";
} 
</script>
<?php
include 'DBconn.php';
if  (!$conn) {
    die("Connection failed: " .  mysqli_connect_error());
}

if(isset($_POST["login"])){
  $userName=$_POST["userName"];
  $password=$_POST["password"];
  $select = "SELECT `userName`,`password` FROM user WHERE userName='$userName' AND password= '$password' ";
  $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) == 1) {
       header("location: Homepage.php");
    }else{
       echo '<script type="text/javascript">';
       echo ' alert("Invalid E-mail or Password")';
       echo '</script>';
    }
}
?>
</body>
</html>