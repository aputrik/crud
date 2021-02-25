<?php
include "config.php";

//query untuk mengambil data dari tabel user

$sql = "SELECT * FROM users";

//eksekusi query

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>

<head>
	<title>View Page</title>
	<!-- to make it looking good im using bootstrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<h2>users</h2>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if ($result->num_rows > 0) {
					//output data tiap baris
					while ($row = $result->fetch_assoc()) {
				?>

						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['firstname']; ?></td>
							<td><?php echo $row['lastname']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
						</tr>

				<?php		}
				}
				?>

			</tbody>
		</table>
	</div>

</body>

</html>