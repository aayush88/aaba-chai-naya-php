<!DOCTYPE html>
<html>
<head>
	<title>Add Post</title>
</head>
<body>
	

	<form method="post" action="" name="addpost">
		<fieldset>
			<legend align="center"><strong>Upload Your Content</strong></legend>
			Title:   <textarea rows="2" cols="30" type="text" name="title" placeholder="Enter your Title"></textarea>
			Keyword: <textarea rows="2" cols="30" placeholder="Keyword" name="keyword"></textarea><br/>
			Heading: <textarea rows="4" cols="30" placeholder="Heading" name="heading"></textarea>
			Description: <textarea rows="6" cols="30" placeholder="Description" name="description"></textarea><br/>
			Short Story: <textarea rows="6" cols="30" placeholder="ShortStory" name="shortstory"></textarea>
			Full Story: <textarea rows="10" cols="30" placeholder="Full Story" name="fullstory"></textarea><br/>
			<select size=1 name="category_id">
				<?php
				$stmt = "SELECT * FROM category WHERE status = 1";
				include('connection.php');
				$qry = mysqli_query($conn, $stmt);
				while($row = mysqli_fetch_array($qry))
				{
					echo "<option value =" .$row['id'] .">".$row['name']."</option>";
				}
				mysqli_close($conn);
				?>
			</select>

			<select size=1 name="user_id">
				<?php
				$stmt = "SELECT * FROM users WHERE status = 0";
				include('connection.php');
				$qry = mysqli_query($conn, $stmt);
				while($row = mysqli_fetch_array($qry))
				{
					echo "<option value =" .$row['id'] .">".$row['username']."</option>";
				}
				mysqli_close($conn);
				?>
			</select>
			<input type="submit" name="submit" placeholder="Post" value="submit">
			<button><a href="viewpost.php">View Post</a></button>
		</fieldset>
	</form>

</body>
</html>

<?php 
		if (isset($_POST['submit'])) 
		{
			$title = $_POST['title'];
			$keyword = $_POST['keyword'];
			$heading = $_POST['heading'];
			$description = $_POST['description'];
			$shortstory = $_POST['shortstory'];
			$fullstory = $_POST['fullstory'];
			$category_id = $_POST['category_id'];
			$postdate = $_POST['postdate'];
			$user_id = $_POST['user_id'];
			if (empty($heading) && empty($fullstory)) {
				echo "Heading and Full Story are mandatory.";
			}
			else{
				include ('connection.php');
				$input = "INSERT INTO post(title, keyword, heading, description, shortstory, fullstory, category_id, postdate, user_id) VALUES ('$title', '$keyword', '$heading', '$description', '$shortstory', '$fullstory', $category_id, $user_id, 0)";
				$qry = mysqli_query($conn, $input) or die (mysqli_error());
				if ($qry) {
					echo "Post added";
				}
				else{
					echo "Trouble posting your file.Try again later";
				}
			}
		}
	?>