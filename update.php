<?php
include "config.php";

// code untuk menjalankan perintah jika tombol update diklik
if (isset($_POST['update'])) {
	$firstname = $_POST['firstname'];
	$user_id = $_POST['user_id'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// query update
	$sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password' WHERE `id`='$user_id'";

	// eksekusi query
	$result = $conn->query($sql);

	// jika berhasil diubah maka akan muncul pesan berhasil, jika tidak akan ada pesan error
	if ($result == TRUE) {
		echo "Record updated successfully.";
	} else {
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}


if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	$sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$first_name = $row['firstname'];
			$lastname = $row['lastname'];
			$email = $row['email'];
			$password  = $row['password'];
			$id = $row['id'];
		}

?>
		<h2>User Update Form</h2>
		<form action="" method="post">
			<fieldset>
				<legend>Personal information:</legend>
				First name:<br>
				<input type="text" name="firstname" value="<?php echo $first_name; ?>">
				<input type="hidden" name="user_id" value="<?php echo $id; ?>">
				<br>
				Last name:<br>
				<input type="text" name="lastname" value="<?php echo $lastname; ?>">
				<br>
				Email:<br>
				<input type="email" name="email" value="<?php echo $email; ?>">
				<br>
				Password:<br>
				<input type="password" name="password" value="<?php echo $password; ?>">
				<br><br>
				<input type="submit" value="Update" name="update">
			</fieldset>
		</form>

		</body>

		</html>




<?php
	} else {
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}
}
?>