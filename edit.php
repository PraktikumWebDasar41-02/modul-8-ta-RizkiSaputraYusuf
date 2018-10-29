<?php 
include ('koneksi.php');
	$nim     = $_GET['nim'];
    $edit   = "SELECT * FROM datadiri WHERE nim = '$nim'";
    $sql    = mysqli_query($conn,$edit); 
    $row    = mysqli_fetch_assoc($sql);
    $ex_hobi = explode(", ", $row['hobi']);
    $ex_genre = explode(", ", $row['genre']);
    $ex_wisata = explode(", ", $row['wisata']);
 ?>
 <center>
 <h1>Edit Data</h1>
    <form method="POST">
        <table>
            <tr>
                <td>Nim</td>
                <td>:</td>
                <td><input type="text" name="nim" value="<?php echo $row['nim'] ?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $row['nama'] ?>"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tgl_lahir" value="<?php echo $row['tgl_lahir'] ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <input type="email" name="email" value="<?php echo $row['email'] ?>"><br>
                </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><input type="text" name="kelas" value="<?php echo $row['kelas'] ?>"></td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td>:</td>
                <td> 
                    <input type="checkbox" name="hobi[]" value="Nonton" <?php if(array_search("Nonton", $ex_hobi) > -1 ) { echo "checked"; }?>>Nonton<br>
                    <input type="checkbox" name="hobi[]" value="Baca" <?php if(array_search("Baca", $ex_hobi) > -1 ) { echo "checked"; }?>>Baca<br>
                    <input type="checkbox" name="hobi[]" value="Travelling" <?php if(array_search("Travelling", $ex_hobi) > -1 ) { echo "checked"; }?>>Travelling<br> 
                </td>
            </tr>
            <tr>
                <td>Genre Film</td>
                <td>:</td>
                <td> 
                    <input type="checkbox" name="genre[]" value="Romance" <?php if(array_search("Romance", $ex_genre) > -1 ) { echo "checked"; }?>> Romance<br>
                     <input type="checkbox" name="genre[]" value="Anime" <?php if(array_search("Anime", $ex_genre) > -1 ) { echo "checked"; }?> > Anime<br>
                     <input type="checkbox" name="genre[]" value="Adventure" <?php if(array_search("Anime", $ex_genre) > -1 ) { echo "checked"; }?>> Anime<br> 
                </td>
            </tr>
            <tr>
                <td>Tempat Wisata</td>
                <td>:</td>
                <td> <input type="checkbox" name="wisata[]" value="bandung" <?php if(array_search("bandung", $ex_wisata) > -1 ) { echo "checked"; }?>> bandung<br>
                     <input type="checkbox" name="wisata[]" value="Bali" <?php if(array_search("Bali", $ex_wisata) > -1 ) { echo "checked"; }?>> Bali<br>
                     <input type="checkbox" name="wisata[]" value="Garut" <?php if(array_search("Garut", $ex_wisata) > -1 ) { echo "checked"; }?>> Garut<br> 
                </td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="kirim"></td>
            </tr>
        </table>
    </form>
</center>
    <?php
    if (isset($_POST['nim'])) {
        $nim            = $_POST['nim'];
		$nama           = $_POST['nama'];
		$tgl_lahir      = $_POST['tgl_lahir'];
		$email          = $_POST['email'];
		$kelas          = $_POST['kelas'];
        $list_hobi      = implode(", ",  $_POST['hobi']);
        $list_genre     = implode(", ", $_POST['genre']);
        $list_wisata    = implode(", ", $_POST['wisata']);

        $sql = "UPDATE datadiri SET nama='$nama', tgl_lahir='$tgl_lahir', email='$email',kelas='$kelas', hobi='$list_hobi', genre='$list_genre',wisata = '$list_wisata' WHERE nim='$nim'";

        if (mysqli_query($conn, $sql)) {
                header("location: dashboard.php");
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }