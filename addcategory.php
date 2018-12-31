<!DOCTYPE html>
<html>
<head>
	<title>Add categories</title>
</head>
<body>

<form method="post" name="addcategory" action="">
	<fieldset>
		<legend align="center">Add category</legend>
		Name:<input type="text" name="categoryname" placeholder="Category Name">
		Status: <input type="radio" name="status" value=1>active
				<input type="radio" name="status" value=0>deactive<br/>
		<input type="submit" name="submit" value="Submit">
		<button><a href="allcategories.php">View Category</a></button>
	</fieldset> 
</form>

</body>
</html>


<?php
	if(isset($_POST['submit']))
	{
		$categoryname=$_POST['categoryname'];
		$status = $_POST['status'];
		if(empty($categoryname))
		{
			echo "<b>Enter the Name of category</b>";
		}
		else
		{
			include('connection.php');
			$input="INSERT INTO category(name, status) VALUES ('$categoryname', '$status')";
			$qry=mysqli_query($conn, $input) or die(mysqli_error());
			if($qry)
			{
				echo "category added";
			}
			else
			{
				echo "Something Wrong";
			}
		}
	}
?>