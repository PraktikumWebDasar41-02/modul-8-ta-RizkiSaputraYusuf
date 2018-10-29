<center>
	<h1>Lihat Profile</h1>
 <table border="2" width="50%" style="text-align: center;">
 	<tr>
 		<th>Username</th>
 		<th>Password</th>
 	</tr>
 	<?php
 	include("koneksi.php");
 	$sql = "SELECT * FROM user";
 	$result = mysqli_query($conn, $sql);
 		if (mysqli_num_rows($result)>0) {
 			while ($row = mysqli_fetch_assoc($result)) {
 				?>
 				<tr>
 				<td><?php echo $row['username']?></td>
 				<td><?php echo $row['password']?></td>
 				</tr>
 				<?php
 			}
 		}else{
 			echo "0 results";
 		}
 		mysqli_close($conn);
 	?>
 </table>

 <a href="dashboard.php">Home</a>
 </center>