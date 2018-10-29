 <center>
<br><br><br><br>
 	<h1> Login</h1>
 		<br>
<form method="post">
     	<table>
 	<tr>
 		<td>Username</td>
 		<td>:</td>
 		<td><input type="text" name="username"> </td>
 	</tr>
 	<tr>
 		<td>Password</td>
 		<td>:</td>
 		<td><input type="password" name="password"></td>
 	</tr>
 	<tr>
 		<td><input style="width: 150px" type="submit" name="kirim" value="Login"></td>
 	</tr>
</table>
</form>
</center>
<?php
	if (isset($_POST['kirim'])) {
		session_start();
		include("koneksi.php");
		@$username = $_POST["username"];
		@$password = $_POST["password"];

		$sql = "SELECT * from user where username = '$username' and password = '$password'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) != 0) {
			header("Location: dashboard.php");
		}else {
			echo "Login Gagal";
		}
	}

?>