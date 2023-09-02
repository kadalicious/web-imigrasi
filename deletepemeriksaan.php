<?php 

include "server/koneksi.php";
session_start();

$getidpemeriksaan = $_GET['idpemeriksaan'];

$delete = "DELETE FROM tblpemeriksaans WHERE id = '$getidpemeriksaan'";
$connectdelete = mysqli_query($koneksi, $delete);
if($connectdelete){
	?>
	<script type="text/javascript">
		alert("Berhasil menghapus, klik Ok dan tunggu 2 detik untuk berpindah halaman");
		setTimeout(function(){
			window.location.href = "index.php";
		},2000);
	</script>
	<?php  
}


 ?>