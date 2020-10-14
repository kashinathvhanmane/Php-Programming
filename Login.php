<?php
	session_start();
?>
<html>
<body>
<form action="Login.php" method="post">
		name: <input type="text" name="name"></br>
	password: <input type="text" name="password"><br>

	<button type="Sumbit" class="btn btn-default" >Sumbit</button>
	<div class="col-sm-3">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";
		
	$conn= mysqli_connect($servername, $username, $password, $dbname);
		
	if(!$conn)
	{
		die ("connection failed: " . mysqli_connect_error());
	}
	if(!empty($_POST['name'])  && isset($_POST['password']))
	{
		$name= $_POST["name"];
		$password= $_POST["password"];
		
		$sql= "Select * from Login where stud_name='$name' and password='$password'";
		
		$result= mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result)>0)
		{
			$_SESSION["name"] = $name;
			$_SESSION["password"] = $password;
			
			header("location:userInfo.php");			
		}
		else
		{
			echo "wrong name and password ";	
		}
		mysqli_close($conn);
	}
?>
</body>
</html>
