<!DOCTYPE html>
<html>
<head>
	<title>All Categories</title>
</head>
<body>
	<div class="col-lg-12">
		<?php
			if (isset($_GET['message'])) {
				echo "<span class = 'alertalert-success'>". $_GET['message']."</span>";
			}
		?>

	</div>
	<div class="col-md-8" >
		<table align="left" cellpadding="10px">
			<thead>
				<tr>
					<td>ID</td>
					<td>Category Name</td>
					<td>status</td>
					<td>functions</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				//selecting all users
				$stm = "SELECT * FROM category";
				//making connection
				include('connection.php');
				//query
				$qry =mysqli_query($conn,$stm);
				//fetching and printing data
				while ($row =mysqli_fetch_array($qry)) {
					echo "<tr>";
				 	echo "<td>" . $row['id']."</td>";
				 	echo "<td>" . $row['name']."</td>";
				 	echo "<td>" . $row['status']."</td>";
				 	echo "<td> <a href= editdeletecategory.php?id=". $row['id']."&action=edit>EDIT </a> |<a href= editdeletecategory.php?id=". $row['id']."&action=delete>DELETE</a></td>";
				 	echo "</tr>";
				 } 
				?>
			</tbody>
			<tr>
				<td><button><a href="addcategory.php">Add categories</a></button></td>
			</tr>
		</table>
	</div>

</body>
</html>