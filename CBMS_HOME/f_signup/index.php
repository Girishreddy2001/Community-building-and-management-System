<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Signup Form</title>
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
  top: 5%;
  left:32%;
  width: 30rem;
  height: 61rem;
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
input[type=date], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=number], select {
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
  padding: 2px;
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

?>

<?php
   if(isset($_POST['F_ID']) && isset($_POST['F_NAME']) && isset($_POST['L_NAME']) && isset($_POST['DOB']) && isset($_POST['USERNAME']) && isset($_POST['DEPT_ID'])){
        $sql = "INSERT INTO FACULTY(F_ID,F_NAME,L_NAME,DOB,USERNAME,DEPT_ID) VALUES(:F_ID,:F_NAME,:L_NAME,:DOB,:DEPT_ID,:USERNAME)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':F_ID' => $_POST['F_ID'],
                         ':F_NAME' => $_POST['F_NAME'],':L_NAME' => $_POST['L_NAME'],':DOB' => $_POST['DOB'],':USERNAME' => $_POST['USERNAME'],':DEPT_ID' => $_POST['DEPT_ID']));
   }
   

?>
<?php
   if(isset($_POST['USERNAME']) && isset($_POST['PASSWORD'])){
   $sql = "INSERT INTO LOGIN VALUES(:USERNAME,:PASSWORD)";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(array(':USERNAME' => $_POST['USERNAME'],
                         ':PASSWORD' => $_POST['PASSWORD']));
}

?>

<?php
   if(isset($_POST['F_ID']) && isset($_POST['F_EMAIL'])){
   $sql = "INSERT INTO FACULTY_EMAIL VALUES(:F_ID,:F_EMAIL)";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(array(':F_ID' => $_POST['F_ID'],
                         ':F_EMAIL' => $_POST['F_EMAIL']));
}

?>
<?php
   if(isset($_POST['F_ID']) && isset($_POST['F_PHNO'])){
   $sql = "INSERT INTO FACULTY_PH_NO VALUES(:F_ID,:F_PHNO)";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(array(':F_ID' => $_POST['F_ID'],
                         ':F_PHNO' => $_POST['F_PHNO']));
}

?>
<?php
   if(isset($_POST['F_ID']) && isset($_POST['SPL_NAME']) && isset($_POST['CERTIFIED_AUTHORITY'])){
   $sql = "INSERT INTO SPECIALIZATION VALUES(:F_ID,:SPL_NAME,:CERTIFIED_AUTHORITY)";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(array(':F_ID' => $_POST['F_ID'],
                         ':SPL_NAME' => $_POST['SPL_NAME'],
                          ':CERTIFIED_AUTHORITY' => $_POST['CERTIFIED_AUTHORITY']));
}

?>



<div class="container">
		<h2>Signup</h2>
		<form method="post">
			<ul>
			<li>
			<div class="inputBox">
				<input type="text" name="F_NAME" required="">
				<label>First Name</label>
			</div></li>
			<li><div class="inputBox">
				<input type="text" name="L_NAME" required="">
				<label>Second Name</label>
		</div></li>
		<li><div class="inputBox">
				<input type="text" name="USERNAME" required="">
				<label>Username</label>
			</div></li>
		<li><div class="inputBox">
				<input type="password" name="PASSWORD" required="">
				<label>Password</label>
			</div></li>
		<li><div class="inputBox">
				<input type="text" name="F_ID" required="">
				<label>F_ID</label>
			</div>
		</li>
		<li>
		<div class="inputBox">
				<input type="text" name="DEPT_ID" required="">
				<label>Department-ID</label>
		</div></li>
		<li>
		<div class="inputBox">
				<input type="date" name="DOB" required="">
				<label>DOB</label>
		</div></li>
		<li>
		<div class="inputBox">
				<input type="text" name="F_EMAIL" required="">
				<label>F_Email</label>
			</div>
		</li>
		<li>
		<div class="inputBox">
				<input type="number" name="F_PHNO" required="">
				<label>Phone</label>
		</div></li>
		<li>
		<div class="inputBox">
				<input type="text" name="SPL_NAME" required="">
				<label>SPECIALIZATION</label>
			</div></li>
			<li>
			<div class="inputBox">
				<input type="text" name="CERTIFIED_AUTHORITY" required="">
				<label>CERTIFIED AUTHORITY</label>
			</div></li>
		</ul>
		<input type="submit" name="" value="submit">
		</form>
	</div>





</body>
</html>