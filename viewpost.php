<!DOCTYPE html>
<html>
<head>
	<title>All Posts</title>
</head>
<body>
	<div class="col-md-8" >
		<table align="left" cellpadding="10px">
			<thead>
				<tr>
					<td>ID</td>
					<td>Heading</td>
					<td>Title</td>
					<td>Keywords</td>
					<td>Description</td>
					<td>Shortstory</td>
					<td>Fullstory</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				$stm = "SELECT * FROM post";
				include('connection.php');
				$qry =mysqli_query($conn,$stm);
				while ($row =mysqli_fetch_array($qry)) {
					echo "<tr>";
				 	echo "<td>" . $row['id']."</td>";
				 	echo "<td>" . $row['heading']."</td>";
				 	echo "<td>" . $row['title']."</td>";
				 	echo "<td>" . $row['keyword']."</td>";
				 	echo "<td>" . $row['description']."</td>";
				 	echo "<td>" . $row['shortstory']."</td>";
				 	echo "<td>" . $row['fullstory']."</td>";
				 	echo "<td> EDIT | DELETE </>";
				 	echo "</tr>";
				 } 
				?>
			</tbody>
			<tr>
				<td><button><a href="addpost.php">Add Post</a></button></td>
			</tr>
		</table>
	</div>

</body>
</html>