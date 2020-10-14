<html>
<head>
<title>
Image Browse
</title>
</head>
<body>

<form Method="POST" Action="" enctype='multipart/form-data'>
<input type='file' name='file'>

<input type='submit' value='saveimage' name='upload'>
</form>

<?php

	if(isset($_POST['upload']))
		
	{
		$name=$_FILES['file']['name'];
		$target_dir="Images/";
		$target_file=$target_dir.basename($_FILES["file"]["name"]);
		
		$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		$extensions_arr=array("jpg","jpej","png","gif","pdf");
		
		
		
		
		
		
		
		if(in_array($imageFileType,$extensions_arr))
		{
			$servername="localhost";
			$username="root";
			$pass="";
			$dbname="mydatabase";
			
			
			$conn=mysqli_connect($servername,$username,$pass,$dbname);
			
			if(!$conn)
			{
				die("Connection filed....".mysqli_connect_error());
			}
			
			
			$query="insert into image (id,imagefile) VALUES('','$target_file')";
			
			mysqli_query($conn,$query);
			
			move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
			
			
			
		}
		
	}
	
	?>
	
</body>
</html>
	
		

