<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sighup Form</title>
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
  height: 58rem;
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
   if(isset($_POST['REG_NO']) && isset($_POST['F_NAME']) && isset($_POST['L_NAME']) && isset($_POST['DOB']) && isset($_POST['S_USER_NAME']) && isset($_POST['DEPT_ID'])){
        $sql = "INSERT INTO STUDENT(REG_NO,F_NAME,L_NAME,DOB,S_USER_NAME,DEPT_ID) VALUES(:REG_NO,:F_NAME,:L_NAME,:DOB,:S_USER_NAME,:DEPT_ID
                )";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':REG_NO' => $_POST['REG_NO'],
                         ':F_NAME' => $_POST['F_NAME'],':L_NAME' => $_POST['L_NAME'],':DOB' => $_POST['DOB'],':S_USER_NAME' => $_POST['S_USER_NAME'],':DEPT_ID' => $_POST['DEPT_ID']));
   }
   

?>
<?php
   if(isset($_POST['S_USER_NAME']) && isset($_POST['PASSWORD'])){
   $sql = "INSERT INTO LOGIN VALUES(:USERNAME,:PASSWORD)";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(array(':USERNAME' => $_POST['S_USER_NAME'],
                         ':PASSWORD' => $_POST['PASSWORD']));
}

?>

<?php
   if(isset($_POST['REG_NO']) && isset($_POST['EMAIL'])){
   $sql = "INSERT INTO STUDENT_EMAIL VALUES(:REG_NO,:EMAIL)";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(array(':REG_NO' => $_POST['REG_NO'],
                         ':EMAIL' => $_POST['EMAIL']));
}

?>
<?php
   if(isset($_POST['REG_NO']) && isset($_POST['PH_NO'])){
   $sql = "INSERT INTO STUDENT_PH_NO VALUES(:REG_NO,:PH_NO)";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(array(':REG_NO' => $_POST['REG_NO'],
                         ':PH_NO' => $_POST['PH_NO']));
}

?>
<?php
   if(isset($_POST['REG_NO']) && isset($_POST['INTEREST'])){
   $sql = "INSERT INTO STUDENT_INTEREST VALUES(:REG_NO,:INTEREST)";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(array(':REG_NO' => $_POST['REG_NO'],
                         ':INTEREST' => $_POST['INTEREST']));
}

?>



<div class="container">
		<h2>Signup</h2>
		<form method="post">
			<ul>
			<li><div class="inputBox">
				<input type="text" name="F_NAME" required="">
				<label>First Name</label>
			</div></li>
			<li><div class="inputBox">
				<input type="text" name="L_NAME" required="">
				<label>Second Name</label>
		</div></li>
		<li><div class="inputBox">
				<input type="text" name="S_USER_NAME" required="">
				<label>Username</label>
			</div></li>
		<li><div class="inputBox">
				<input type="password" name="PASSWORD" required="">
				<label>Password</label>
			</div></li>
		<li><div class="inputBox">
				<input type="text" name="REG_NO" required="">
				<label>Reg-No</label>
		  </div></li>
		<li><div class="inputBox">
				<input type="text" name="DEPT_ID" required="">
				<label>Department-ID</label>
		</div></li>
		<li><div class="inputBox">
				<input type="date" name="DOB" required="">
				<label>DOB</label>
		</div></li>
		<li><div class="inputBox">
				<input type="text" name="EMAIL" required="">
				<label>Email</label>
		</div></li>
		<li><div class="inputBox">
				<input type="number" name="PH_NO" required="">
				<label>Phone</label>
		</div></li>
		<li><div class="inputBox">
				<input type="text" name="INTEREST" required="">
				<label>Interests</label>
			</div></li>
		<li>
		<input type="submit" name="" value="submit">
	</li>
</ul>
		</form>
	</div>





</body>
</html>