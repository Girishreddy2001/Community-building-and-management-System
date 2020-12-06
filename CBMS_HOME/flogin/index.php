<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="log.css">
</head>
<style>
body{
  background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url(community.jpg);
  background-size: cover;
  
  height:100vh;
}


table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 5px;
  text-align: left;
  border-bottom: 1px solid #FFFFFF;
  color: white;
}

tr:hover {background-color:#808080;}

ul{
  float:left;
  list-style-type:none;
  margin-top: 25px;
}

ul li{
  display: inline-block;
}

ul li a{
  text-decoration: none;
  color: #fff;
  padding: 5px 20px;
  border: 1px solid #fff;
  transition: 0.6s ease;
}

ul li a:hover{
  background-color: #fff;
  color: #000;
}
.container {
  position: absolute;
  top: 40%;
  left:32%;
  width: 30rem;
  height: 20rem;
  box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);
  border-radius: 5px;
  background-color: rgba(255, 255, 255, .15);

  backdrop-filter: blur(5px);

}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

</style>
<body>

<?php
  
  
  try {
  $pdo = new PDO("mysql:host=localhost;port=3306;dbname=cbms","root","root");
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if(isset($_POST['USERNAME'])){
  $UNAME = $_POST['USERNAME'];
  $PASS = $_POST['PASSWORD'];
  $sql = $pdo->query("SELECT COUNT(*) FROM LOGIN WHERE USERNAME ='".$UNAME."'AND PASSWORD ='".$PASS."'LIMIT 1");
  $COUNT = $sql->fetchColumn();

  if($COUNT == 1){
    echo "you have successfully logged in";
    echo "<script> window.location.assign('f_midpage/index.html'); </script>";
    exit();
  }
  else{
    echo "you have entered incorrect password";
    exit();
  }
}

?>




	<div class="container">
		<h2>Login</h2>
		<form  method="post">
      <ul>
        <li>
			<div class="inputBox">
				<input type="text" name="USERNAME" required="">
				<label>Username</label>
			</div>
    </li>
    <li>
			<div class="inputBox">
				<input type="password" name="PASSWORD" required="">
				<label>password</label>
		</div>
  </li>
</ul>
		<input type="submit" name="" value="submit">
  

		</form>
	</div>

</body>
</html>