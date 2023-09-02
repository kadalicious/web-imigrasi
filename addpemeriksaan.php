<?php 
include "server/koneksi.php";
session_start();


if(!isset($_SESSION['username'])){
  header("location:login.php");
}


 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Imigrasi</title>
  </head>
  <body>

    <?php 

    if($_SESSION['username']){
      ?>

      <!-- open navbar before login -->
        <nav class="navbar navbar-expand-lg" style="background-color: black;">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="color: white; font-weight: bolder;">IMIGRASI batam</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#" style="color: white;">Beranda</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#" style="color: white;">Informasi</a>
                </li>


             
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; ">
                    <?php echo $_SESSION['username']; ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="logout.php" style="font-weight: bolder; color: red;">Logout</a></li>
                  </ul>
                </li>

              </ul>
            </div>
          </div>
        </nav>
        <!-- close navbar before login -->






    <!-- open main content after login -->
     <!-- Dashboard Content -->
      <div class="container mt-4">
        <div class="row">
          <!-- Left Menu Sidebar -->
          <div class="col-md-3" style="border-right: 1px solid #ddd;">
            <div class="list-group">
              <a href="" onclick="return changecontent('tpipelabuhan')" class="list-group-item list-group-item-action" style="pointer-events: none; background-color: grey;">Pelabuhan TPI</a>
              <a href="" onclick="return changecontent('pemeriksaan')" class="list-group-item list-group-item-action" style="pointer-events: none; background-color: grey;">Pemeriksaan</a>
            </div>
          </div>

          <!-- Right Content -->
          <div class="col-md-9">
            <h2 style="text-align: left; font-weight: bolder;">Tambah data pemeriksaan</h2>

            <main id="menu">
            <!-- Table Example -->
            <table class="table table-bordered" id="pemeriksaan" >
              <thead style="font-size:10px;">
                <tr>
                  <th>Nama Pelabuhan TPI</th>
                  <th>Nama Lengkap</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Kewarganegaraan</th>
                  <th>Tanggal Pengeluaran</th>
                  <th>Tanggal Habis Berlaku</th>
                  <th>Kode Negara</th>
                  <th>Keterangan</th>
                  <th>Paspor</th>
                  <th>Tanggal Penolakan</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody style="font-size:10px;">
                <?php 


                  if(isset($_POST['submit'])){
                    $namapelabuhan = $_POST['namapelabuhan'];
                    $namalengkap = $_POST['namalengkap'];
                    $tanggallahir = $_POST['tanggallahir'];
                    $jeniskelamin = $_POST['jeniskelamin'];
                    $kewarganegaraan = $_POST['kewarganegaraan'];
                    $tanggalpengeluaran = $_POST['tanggalpengeluaran'];
                    $tanggalhabisberlaku = $_POST['tanggalhabisberlaku'];
                    $kodenegara = $_POST['kodenegara'];
                    $keterangan = $_POST['keterangan'];
                    $tanggalpenolakan = $_POST['tanggalpenolakan'];


                    $uploadDir = "paspor/";
                    $namafile = basename($_FILES['paspor']['name']);
                    $uploadedFile = $uploadDir . basename($_FILES['paspor']['name']);
                    $pasporimagename = $_FILES['paspor']['tmp_name'];
                    


                    $cekpelabuhan = "SELECT * FROM tblpelabuhans WHERE nama_pelabuhan = '$namapelabuhan'";
                    $connectcekpelabuhan = mysqli_query($koneksi, $cekpelabuhan);
                    while($takedatapelabuhan = mysqli_fetch_array($connectcekpelabuhan)){
                      $idpelabuhan = $takedatapelabuhan['id'];
                    }

                    $insertdatapemeriksaan = "INSERT INTO tblpemeriksaans set pelabuhan_id = '$idpelabuhan', nama_lengkap = '$namalengkap', tgl_lahir = '$tanggallahir', jenis_kelamin = '$jeniskelamin', kewarganegaraan = '$kewarganegaraan', tgl_pengeluaran = '$tanggalpengeluaran', tgl_habisBerlaku = '$tanggalhabisberlaku', kode_negara = '$kodenegara', keterangan = '$keterangan', paspor = '$namafile', tgl_penolakan = '$tanggalpenolakan'";

                    move_uploaded_file($pasporimagename, $uploadedFile);

                    $connectinsertdatapemeriksaan = mysqli_query($koneksi, $insertdatapemeriksaan);
                    if($connectinsertdatapemeriksaan){
                      ?>
                      <script type="text/javascript">
                        alert("Berhasil menambahkan data pemeriksaan ! klik Ok dan tunggu 2 detik untuk berpindah halaman");
                        setTimeout(function(){
                          window.location.href = "index.php";
                        },2000);
                      </script>
                      <?php  
                    }
                  
                  }

                  
                  ?>

                  <form method="POST" action="" enctype="multipart/form-data">
                  <tr>
                    <td>
                      <select name="namapelabuhan">
                        <?php 

                        $cekpelabuhanterbaru = mysqli_query($koneksi,"SELECT * FROM tblpelabuhans");
                        while($take = mysqli_fetch_array($cekpelabuhanterbaru)){
                          $new = $take['nama_pelabuhan'];
                          ?>
                          <option value="<?php echo $new; ?>"><?php echo $new; ?></option>

                          <?php 
                        }

                         ?>
                        
                      </select>
                      </td>
                    <td>
                      
                      <input type="text" name="namalengkap" placeholder="nama lengkap">
                      </td>
                    <td>
                      
                      <input type="date" name="tanggallahir" placeholder="tanggal lahir">
                      </td>
                    <td>
            
                      <select name="jeniskelamin">
                        <option value="Laki-laki">Laki - laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      </td>
                    <td>
                      
                      <input type="text" name="kewarganegaraan" placeholder="kewarganegaraan">
                      </td>
                    <td>
                      
                      <input type="date" name="tanggalpengeluaran" placeholder="tanggal pengeluaran">
                      </td>
                    <td>
                      
                      <input type="date" name="tanggalhabisberlaku" placeholder="tanggal habis berlaku">
                      </td>
                    <td>
                      
                      <input type="text" name="kodenegara" placeholder="kode negara">
                      </td>

                    <td>
                      <input type="text" name="keterangan" placeholder="keterangan">
                      </td>

                    <td>
                      <input type="file" name="paspor" accept="image/*" required>
                    </td>

                    <td>
                      
                      <input type="date" name="tanggalpenolakan" placeholder="tanggal penolakan">
                      </td>
                    <td>

                      <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">

                        <input type="submit" name="submit" value="Tambah data pemeriksaan" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: blue; border-radius: 5px; padding: 5px; margin: 5px; text-align: center;"/>


                      </div>
                    </td>
                  </tr>
                  </form>
                  <?php  
                
                 ?>

            
              </tbody>
            </table>


            <div style="display: flex; margin-left: 10px; margin-top: 20px;">
              <button onclick="history.back()" style="padding: 5px; border: none; background-color: red; color: white; font-weight: bolder;text-align: center; border-radius: 5px;">Cancel</button>
            </div>

            </main>
          </div>
        </div>
      </div>
    <!-- close main content after login -->



  

      <?php  
    }else{
      // auto go to logins
    }

     ?> 





   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>