<?php 
include ("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form</title>
</head>
<body>
	<center>
	<h1 style="color: red">Tambah Data</h1>
	<form method="POST">
		<table>
			<tr>
				<td>Nim</td>
				<td>:</td>
				<td><input type="text" name="nim"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><input type="date" name="tgl_lahir"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>
					<input type="text" name="email"><br>
				</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td><input type="text" name="kelas"></td>
			</tr>
			<tr>
				<td>Hobi</td>
				<td>:</td>
				<td> <input type="checkbox" name="hobi[]" value="Nonton"> Nonton<br>
 					 <input type="checkbox" name="hobi[]" value="Baca"> Baca<br>
 					 <input type="checkbox" name="hobi[]" value="Travelling"> Travelling<br> 
 				</td>
			</tr>
			<tr>
				<td>Genre Film</td>
				<td>:</td>
				<td> <input type="checkbox" name="genre[]" value="Thriller"> Romance<br>
 					 <input type="checkbox" name="genre[]" value="Horror"> Anime<br>
 					 <input type="checkbox" name="genre[]" value="Fantasi"> Adventure<br> 
 				</td>
			</tr>
			<tr>
				<td>Tempat Wisata</td>
				<td>:</td>
				<td> <input type="checkbox" name="wisata[]" value="Lombok"> Bandung<br>
 					 <input type="checkbox" name="wisata[]" value="Bali"> Bali<br>
 					 <input type="checkbox" name="wisata[]" value="RajaAmpat"> garut<br> 
 				</td>
			</tr>
			<tr>
				<td colspan="3"><input type="submit" value="kirim"></td>
			</tr>
		</table>
	</form>
</body>
</center>
</html>
<?php 

	
	if (isset($_POST['nim'])) {

	    $nim       = $_POST['nim'];
	    $nama        = $_POST['nama'];
	    $tgl_lahir	= $_POST['tgl_lahir'];
	    $email  	= $_POST['email'];
	    $kelas		= $_POST['kelas'];
	    $list_hobi 	= implode(", ",$_POST['hobi']);
	    $list_genre = implode(", ", $_POST['genre']); 
	    $list_wisata = implode(", ", $_POST['wisata']);

	    $sql = "INSERT INTO datadiri (nim, nama,tgl_lahir, email, kelas, hobi, genre, wisata) 
	            VALUES ('$nim', '$nama','$tgl_lahir', '$email', '$kelas', '$list_hobi', '$list_genre', '$list_wisata')"; 

	    if (mysqli_query($conn, $sql)) {
	        header("location: dashboard.php");
	    }else {
	        echo "Error: " . $sql . "<br?" . mysqli_error($conn);
	    }


	    mysqli_close($conn);
	}

?>
