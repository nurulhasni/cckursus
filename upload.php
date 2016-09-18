<?php  
session_start();
require_once('conf/config.php');
require_once('conf/data.php');

//periksa apakah user telah menekan submit, dengan menggunakan parameter setingan keterangan
if (isset($_POST['submit']))
{
	
	$judul=$_POST['judul'];
	$nama_gambar=$_FILES['gambar']['name'];
	
	
	//periksa jika data yang dimasukan belum lengkap
	if ($judul=="" ||$nama_gambar=="")
	{
		//jika ada inputan yang kosong
		echo "<p>Data Anda belum lengkap <a href='ujian.php'>kembali</a></p>";
		
	}else{
		
		//definisikan variabel file dan alamat file
		$uploaddir='./baru/';
		$alamatfile=$uploaddir.$nama_gambar;

		//periksa jika proses upload berjalan sukses
		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$alamatfile))
		{
			//catat data file yang berhasil di upload
			$upload=mysql_query("INSERT INTO selesai VALUES('','', '$judul', '$alamatfile')");
			
			if($upload){
				//jika berhasil
				echo "<p>Data Anda berhasil disimpan. Silahkan <a href='sertifikat.php'>cetak sertifikat</a></p>";
			}else{
				echo "gagal simpan data <a href='ujian.php'>kembali</a>";
			}
			
		
		}else{
			//jika gagal
			echo "<p>Proses upload gagal, <a href='ujian.php'>kembali</a></p>";
		}
	}
	
}
else
{
	unset($_POST['submit']);
}
?>
</div>