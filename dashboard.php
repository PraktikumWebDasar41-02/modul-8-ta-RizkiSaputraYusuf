<center> 
<h1>DASHBOARD</h1>
<table border="1" cellspacing="2" cellpadding="16">
<form action="dashboard.php" method="POST">
	<tr>
		<td colspan="10" align="right">Nim : <input type="text" name="search"> 
			<input type="submit" name="kirim" value="Cari">

	<a style="padding-left: 320px" href="newData.php">Tambah data</a> 
	<a href="lihatData.php">Lihat Profil</a>
		</td>
	
	</tr>

</form>
	<tr>
		<th>Nim</th>
		<th>Nama</th>
		<th>Tanggal Lahir</th>
		<th>Email</th>
		<th>Kelas</th>
		<th>Hobi</th>
		<th>Genre Film</th>
		<th>Tempat Wisata</th>
		<th colspan="2">Action</th>
	</tr>
	<?php 
		@$search = $_POST['search'];
		include ('koneksi.php');
		$sql1 = "SELECT * FROM datadiri WHERE nim LIKE '%$search%'";
		$result = mysqli_query($conn, $sql1);
			
		if (mysqli_num_rows($result)>0) {
			while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $row['nim']?></td>
				<td><?php echo $row['nama']?></td>
				<td><?php echo $row['tgl_lahir']?></td>
				<td><?php echo $row['email']?></td>
				<td><?php echo $row['kelas']?></td>
				<td><?php echo $row['hobi']?></td>
				<td><?php echo $row['genre']?></td>
				<td><?php echo $row['wisata']?></td>
				<td><a href="delete.php?nim=<?php echo $row['nim']; ?>"> Hapus</a> </td>
				<td> <a href="edit.php?nim=<?php echo $row['nim']; ?>"> Edit</a></td>
			</tr>
			<?php
			}
		} else{
			echo "0 results";
		}
 	?>
 </table>

</center>