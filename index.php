<?php 
include "server/koneksi.php";

session_start();

if(!isset($_SESSION['username'])){
  header("location:login.php");
}

  $usernamesession = $_SESSION['username'];
      $cekdatauser = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$usernamesession'");
      while($takeuser = mysqli_fetch_array($cekdatauser)){
        $role = $takeuser['role'];
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
     <script>
    var role = "<?php echo $role; ?>"; // Ambil peran dari PHP
    var tambahPelabuhanButton = document.getElementById("hidecommon");

    if (role === "common_user"){
      document.addEventListener("DOMContentLoaded", function() {
      var hideElements = document.querySelectorAll("#hidecommon");
      for (var i = 0; i < hideElements.length; i++) {
        hideElements[i].style.display = "none";
      }
    });

      document.addEventListener("DOMContentLoaded", function() {
          var hideElements2 = document.querySelectorAll("#hideaddnewuser");
          for (var i = 0; i < hideElements2.length; i++) {
            hideElements2[i].style.display = "none";
          }
    });
    
        }else if(role === "admin"){
          document.addEventListener("DOMContentLoaded", function() {
          var hideElements = document.querySelectorAll("#hideaddnewuser");
          for (var i = 0; i < hideElements.length; i++) {
            hideElements[i].style.display = "none";
          }
    });
        }else if(role === "superadmin"){

        }
    </script>


     
  </head>
  <body>

    <?php 

    if($_SESSION['username']){
      
      ?>

     

      <!-- open navbar before login -->
        <nav class="navbar navbar-expand-lg" style="background-image: url('img/batik.jpg'); background-size: contain;">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="color: white; font-weight: bolder; background-color: black; padding: 5px; border-radius: 5px; border:none;">IMIGRASI batam</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#" style="color: white; font-weight: bolder; background-color: black; padding: 5px; border-radius: 5px; border:none;">Beranda</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#" style="color: white; font-weight: bolder; background-color: black; padding: 5px; border-radius: 5px; border:none; margin-left: 10px;">Informasi</a>
                </li>


             
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; font-weight: bolder; background-color: black; padding: 5px; border-radius: 5px; border:none; margin-left: 10px;">
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
              <a href="" onclick="return changecontent('tpipelabuhan')" class="list-group-item list-group-item-action">Pelabuhan TPI</a>
              <a href="" onclick="return changecontent('pemeriksaan')" class="list-group-item list-group-item-action">Pemeriksaan</a>

               <button id="hideaddnewuser" onclick="window.location.href='addnewuser.php'" style="padding: 5px; border: none; background-color: red; color: white; font-weight: bolder; border-radius: 5px; margin-bottom:10px; margin-top: 10px;">Tambah User baru</button>

            </div>
          </div>

          <!-- Right Content -->
          <div class="col-md-9">
            <h2 style="text-align: center; font-weight: bolder;">Selamat Datang di IMIGRASI BATAM</h2>
            <p style="text-align: center;">Siap melayani anda setiap saat</p>

            <main id="menu">

            <button id="hidecommon" onclick="window.location.href='addpelabuhan.php'" style="padding: 5px; border: none; background-color: blue; color: white; font-weight: bolder; border-radius: 5px; margin-bottom:10px;">Tambah Data Pelabuhan</button>


            <!-- Table Example -->
            <table class="table table-bordered" id="tabletpipelabuhan">
              <thead>
                <tr>
                  <th>Kode TPI</th>
                  <th>Nama Pelabuhan</th>
                  <th>Keterangan</th>
                  <th id="hidecommon">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                $cekdatatpi = "SELECT * FROM tblpelabuhans";
                $connectcekdatatpi = mysqli_query($koneksi, $cekdatatpi);
                while($takedatapelabuhan = mysqli_fetch_array($connectcekdatatpi)){
                  $idpelabuhan = $takedatapelabuhan['id'];
                  $kodetpi = $takedatapelabuhan['kode_tpi'];
                  $namapelabuhan = $takedatapelabuhan['nama_pelabuhan'];
                  $keterangan = $takedatapelabuhan['keterangan'];
                  ?>

                  <tr>
                    <td><?php echo $kodetpi; ?></td>
                    <td><?php echo $namapelabuhan; ?></td>
                    <td><?php echo $keterangan; ?></td>
                    <td id="hidecommon" style="">
                      <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                        <button onclick="window.location.href='viewtpi.php?idpelabuhan=<?php echo $idpelabuhan; ?>'" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: grey; border-radius: 5px; padding: 5px; margin: 5px;">View</button>

                        <button onclick="window.location.href='updatepelabuhan.php?kodetpi=<?php echo $kodetpi; ?>'" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: green; border-radius: 5px; padding: 5px; margin: 5px;">Update</button>

                        <button onclick="deleteconfirm()" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: red; border-radius: 5px; padding: 5px; margin: 5px;">Delete</button>
                      </div>
                    </td>
                  </tr>
                  <?php  
                }
                 ?>

                 <script type="text/javascript">
                   function deleteconfirm(){
                    var confirmdelete = confirm("Anda yakin ingin menghapus ?");
                    if(confirmdelete == true){
                      window.location.href = "deletepelabuhan.php?kodetpi=<?php echo $kodetpi; ?>";
                    }
                   }
                 </script>

              
                <!-- Add more table rows as needed -->
              </tbody>
            </table>

            </main>
          </div>
        </div>
      </div>
    <!-- close main content after login -->


     

    <script type="text/javascript">
      function changecontent(namamenu){
        var tpi = document.getElementById('tpipelabuhan');
        var pemeriksaan = document.getElementById('pemeriksaan');
        var menudashboard = document.getElementById('menu');

        var role = "<?php echo $role; ?>"; 




        if(namamenu == 'tpipelabuhan' && role == "common_user"){
          
           var tableHTML = `

         

            <table class="table table-bordered" id="tabletpipelabuhan">
              <thead>
                <tr>
                  <th>Kode TPI</th>
                  <th>Nama Pelabuhan</th>
                  <th>Keterangan</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php 

                $cekdatatpi = "SELECT * FROM tblpelabuhans";
                $connectcekdatatpi = mysqli_query($koneksi, $cekdatatpi);
                while($takedatapelabuhan = mysqli_fetch_array($connectcekdatatpi)){
                  $idpelabuhan = $takedatapelabuhan['id'];
                  $kodetpi = $takedatapelabuhan['kode_tpi'];
                  $namapelabuhan = $takedatapelabuhan['nama_pelabuhan'];
                  $keterangan = $takedatapelabuhan['keterangan'];
                  ?>

                  <tr>
                    <td><?php echo $kodetpi; ?></td>
                    <td><?php echo $namapelabuhan; ?></td>
                    <td><?php echo $keterangan; ?></td>
                  </tr>
                  <?php  
                }
                 ?>

              
                <!-- Add more table rows as needed -->
              </tbody>
            </table>
          `;
            menudashboard.innerHTML = tableHTML;

        }else if(namamenu == 'tpipelabuhan' && role == "admin"){

           var tableHTML = `

           <button id="hidecommon" onclick="window.location.href='addpelabuhan.php'" style="padding: 5px; border: none; background-color: blue; color: white; font-weight: bolder; border-radius: 5px; margin-bottom:10px;">Tambah Data Pelabuhan</button>

            <table class="table table-bordered" id="tabletpipelabuhan">
              <thead>
                <tr>
                  <th>Kode TPI</th>
                  <th>Nama Pelabuhan</th>
                  <th>Keterangan</th>
                  <th id="hidecommon">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                $cekdatatpi = "SELECT * FROM tblpelabuhans";
                $connectcekdatatpi = mysqli_query($koneksi, $cekdatatpi);
                while($takedatapelabuhan = mysqli_fetch_array($connectcekdatatpi)){
                  $idpelabuhan = $takedatapelabuhan['id'];
                  $kodetpi = $takedatapelabuhan['kode_tpi'];
                  $namapelabuhan = $takedatapelabuhan['nama_pelabuhan'];
                  $keterangan = $takedatapelabuhan['keterangan'];
                  ?>

                  <tr>
                    <td><?php echo $kodetpi; ?></td>
                    <td><?php echo $namapelabuhan; ?></td>
                    <td><?php echo $keterangan; ?></td>
                    <td id="hidecommon">
                      <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                        <button onclick="window.location.href='viewtpi.php?idpelabuhan=<?php echo $idpelabuhan; ?>'" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: grey; border-radius: 5px; padding: 5px; margin: 5px;">View</button>

                        <button onclick="window.location.href='viewtpi.php?kodetpi=<?php echo $kodetpi; ?>'" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: green; border-radius: 5px; padding: 5px; margin: 5px;">Update</button>


                        <button onclick="window.location.href='viewtpi.php?kodetpi=<?php echo $kodetpi; ?>'" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: red; border-radius: 5px; padding: 5px; margin: 5px;">Delete</button>
                      </div>
                    </td>
                  </tr>
                  <?php  
                }
                 ?>

              
                <!-- Add more table rows as needed -->
              </tbody>
            </table>
          `;


          menudashboard.innerHTML = tableHTML;
        }else if(namamenu == 'tpipelabuhan' && role == "superadmin"){
           var tableHTML = `

           <button id="hidecommon" onclick="window.location.href='addpelabuhan.php'" style="padding: 5px; border: none; background-color: blue; color: white; font-weight: bolder; border-radius: 5px; margin-bottom:10px;">Tambah Data Pelabuhan</button>

            <table class="table table-bordered" id="tabletpipelabuhan">
              <thead>
                <tr>
                  <th>Kode TPI</th>
                  <th>Nama Pelabuhan</th>
                  <th>Keterangan</th>
                  <th id="hidecommon">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                $cekdatatpi = "SELECT * FROM tblpelabuhans";
                $connectcekdatatpi = mysqli_query($koneksi, $cekdatatpi);
                while($takedatapelabuhan = mysqli_fetch_array($connectcekdatatpi)){
                  $idpelabuhan = $takedatapelabuhan['id'];
                  $kodetpi = $takedatapelabuhan['kode_tpi'];
                  $namapelabuhan = $takedatapelabuhan['nama_pelabuhan'];
                  $keterangan = $takedatapelabuhan['keterangan'];
                  ?>

                  <tr>
                    <td><?php echo $kodetpi; ?></td>
                    <td><?php echo $namapelabuhan; ?></td>
                    <td><?php echo $keterangan; ?></td>
                    <td id="hidecommon">
                      <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                        <button onclick="window.location.href='viewtpi.php?idpelabuhan=<?php echo $idpelabuhan; ?>'" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: grey; border-radius: 5px; padding: 5px; margin: 5px;">View</button>

                        <button onclick="window.location.href='viewtpi.php?kodetpi=<?php echo $kodetpi; ?>'" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: green; border-radius: 5px; padding: 5px; margin: 5px;">Update</button>


                        <button onclick="window.location.href='viewtpi.php?kodetpi=<?php echo $kodetpi; ?>'" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: red; border-radius: 5px; padding: 5px; margin: 5px;">Delete</button>
                      </div>
                    </td>
                  </tr>
                  <?php  
                }
                 ?>

              
                <!-- Add more table rows as needed -->
              </tbody>
            </table>
          `;


          menudashboard.innerHTML = tableHTML;


        }else if(namamenu == 'pemeriksaan' && role == "common_user"){
          var tableHTML = `
          

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
                  <th>Tanggal Penolakan</th>
                 
                </tr>
              </thead>

              <tbody style="font-size:10px;">
                <?php 

                $cekdatapemeriksaan = "SELECT * FROM tblpemeriksaans";
                $connectcekdatapemeriksaan = mysqli_query($koneksi, $cekdatapemeriksaan);
                while($takedatapemeriksaan = mysqli_fetch_array($connectcekdatapemeriksaan)){
                  $idpemeriksaan = $takedatapemeriksaan['id'];
                  $pelabuhanid = $takedatapemeriksaan['pelabuhan_id'];
                  $namalengkap = $takedatapemeriksaan['nama_lengkap'];
                  $tanggallahir = $takedatapemeriksaan['tgl_lahir'];
                  $jeniskelamin = $takedatapemeriksaan['jenis_kelamin'];
                  $kewarganegaraan = $takedatapemeriksaan['kewarganegaraan'];
                  $tanggalpengeluaran = $takedatapemeriksaan['tgl_pengeluaran'];
                  $tanggalhabisberlaku = $takedatapemeriksaan['tgl_habisBerlaku'];
                  $kodenegara = $takedatapemeriksaan['kode_negara'];
                  $keterangan = $takedatapemeriksaan['keterangan'];
                  $tanggalpenolakan = $takedatapemeriksaan['tgl_penolakan'];

                  $cekpelabuhan = "SELECT * FROM tblpelabuhans WHERE id = '$pelabuhanid'";
                  $connectcekpelabuhan = mysqli_query($koneksi, $cekpelabuhan);
                  while($takekodepelabuhan = mysqli_fetch_array($connectcekpelabuhan)){
                    $namapelabuhanid = $takekodepelabuhan['nama_pelabuhan'];
                  }
                  
                  ?>

                  <tr>
                    <td><?php echo $namapelabuhanid; ?></td>
                    <td><?php echo $namalengkap; ?></td>
                    <td><?php echo $tanggallahir; ?></td>
                    <td><?php echo $jeniskelamin; ?></td>
                    <td><?php echo $kewarganegaraan; ?></td>
                    <td><?php echo $tanggalpengeluaran; ?></td>
                    <td><?php echo $tanggalhabisberlaku; ?></td>
                    <td><?php echo $kodenegara; ?></td>
                    <td><?php echo $keterangan; ?></td>
                    <td><?php echo $tanggalpenolakan; ?></td>
                   
                  </tr>
                  <?php  
                }
                 ?>

            
              </tbody>
            </table>
          `;

          menudashboard.innerHTML = tableHTML;


        }else if(namamenu == 'pemeriksaan' && role == "admin"){
          var tableHTML = `
             <button id="hidecommon" onclick="window.location.href='addpemeriksaan.php'" style="padding: 5px; border: none; background-color: blue; color: white; font-weight: bolder; border-radius: 5px; margin-bottom:10px;">Tambah Data Pemeriksaan</button>

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
                  <th id="hidecommon">Aksi</th>
                </tr>
              </thead>

              <tbody style="font-size:10px;">
                <?php 

                $cekdatapemeriksaan = "SELECT * FROM tblpemeriksaans";
                $connectcekdatapemeriksaan = mysqli_query($koneksi, $cekdatapemeriksaan);
                while($takedatapemeriksaan = mysqli_fetch_array($connectcekdatapemeriksaan)){
                  $idpemeriksaan = $takedatapemeriksaan['id'];
                  $pelabuhanid = $takedatapemeriksaan['pelabuhan_id'];
                  $namalengkap = $takedatapemeriksaan['nama_lengkap'];
                  $tanggallahir = $takedatapemeriksaan['tgl_lahir'];
                  $jeniskelamin = $takedatapemeriksaan['jenis_kelamin'];
                  $kewarganegaraan = $takedatapemeriksaan['kewarganegaraan'];
                  $tanggalpengeluaran = $takedatapemeriksaan['tgl_pengeluaran'];
                  $tanggalhabisberlaku = $takedatapemeriksaan['tgl_habisBerlaku'];
                  $kodenegara = $takedatapemeriksaan['kode_negara'];
                  $keterangan = $takedatapemeriksaan['keterangan'];
                  $paspor = $takedatapemeriksaan['paspor'];
                  $tanggalpenolakan = $takedatapemeriksaan['tgl_penolakan'];

                  $cekpelabuhan = "SELECT * FROM tblpelabuhans WHERE id = '$pelabuhanid'";
                  $connectcekpelabuhan = mysqli_query($koneksi, $cekpelabuhan);
                  while($takekodepelabuhan = mysqli_fetch_array($connectcekpelabuhan)){
                    $namapelabuhanid = $takekodepelabuhan['nama_pelabuhan'];
                  }
                  
                  ?>

                  <tr>
                    <td><?php echo $namapelabuhanid; ?></td>
                    <td><?php echo $namalengkap; ?></td>
                    <td><?php echo $tanggallahir; ?></td>
                    <td><?php echo $jeniskelamin; ?></td>
                    <td><?php echo $kewarganegaraan; ?></td>
                    <td><?php echo $tanggalpengeluaran; ?></td>
                    <td><?php echo $tanggalhabisberlaku; ?></td>
                    <td><?php echo $kodenegara; ?></td>
                    <td><?php echo $keterangan; ?></td>
                    <td><a href="previewpaspor.php?paspor=<?php echo $paspor; ?>"><?php echo $paspor; ?></a></td>
                    <td><?php echo $tanggalpenolakan; ?></td>
                    <td id="hidecommon">

                      <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">

                        <button onclick="window.location.href='updatepemeriksaan.php?idpemeriksaan=<?php echo $idpemeriksaan; ?>'" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: green; border-radius: 5px; padding: 5px; margin: 5px;">Update</button>


                        <button onclick="confirmdelete()" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: red; border-radius: 5px; padding: 5px; margin: 5px;">Delete</button>

                        <button onclick="window.location.href='downloadpdf.php?idpemeriksaan=<?php echo $idpemeriksaan; ?>'" style="border: 1px solid black ;color: black; font-weight: bolder; background-color: white; border-radius: 5px; padding: 5px; margin: 5px;">Pdf</button>

                      </div>
                    </td>
                  </tr>
                  <?php  
                }
                 ?>

            
              </tbody>
            </table>
          `;

          menudashboard.innerHTML = tableHTML;
        }else if(namamenu == 'pemeriksaan' && role == 'superadmin'){
          var tableHTML = `
             <button id="hidecommon" onclick="window.location.href='addpemeriksaan.php'" style="padding: 5px; border: none; background-color: blue; color: white; font-weight: bolder; border-radius: 5px; margin-bottom:10px;">Tambah Data Pemeriksaan</button>

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
                  <th id="hidecommon">Aksi</th>
                </tr>
              </thead>

              <tbody style="font-size:10px;">
                <?php 

                $cekdatapemeriksaan = "SELECT * FROM tblpemeriksaans";
                $connectcekdatapemeriksaan = mysqli_query($koneksi, $cekdatapemeriksaan);
                while($takedatapemeriksaan = mysqli_fetch_array($connectcekdatapemeriksaan)){
                  $idpemeriksaan = $takedatapemeriksaan['id'];
                  $pelabuhanid = $takedatapemeriksaan['pelabuhan_id'];
                  $namalengkap = $takedatapemeriksaan['nama_lengkap'];
                  $tanggallahir = $takedatapemeriksaan['tgl_lahir'];
                  $jeniskelamin = $takedatapemeriksaan['jenis_kelamin'];
                  $kewarganegaraan = $takedatapemeriksaan['kewarganegaraan'];
                  $tanggalpengeluaran = $takedatapemeriksaan['tgl_pengeluaran'];
                  $tanggalhabisberlaku = $takedatapemeriksaan['tgl_habisBerlaku'];
                  $kodenegara = $takedatapemeriksaan['kode_negara'];
                  $keterangan = $takedatapemeriksaan['keterangan'];
                  $paspor = $takedatapemeriksaan['paspor'];
                  $tanggalpenolakan = $takedatapemeriksaan['tgl_penolakan'];

                  $cekpelabuhan = "SELECT * FROM tblpelabuhans WHERE id = '$pelabuhanid'";
                  $connectcekpelabuhan = mysqli_query($koneksi, $cekpelabuhan);
                  while($takekodepelabuhan = mysqli_fetch_array($connectcekpelabuhan)){
                    $namapelabuhanid = $takekodepelabuhan['nama_pelabuhan'];
                  }
                  
                  ?>

                  <tr>
                    <td><?php echo $namapelabuhanid; ?></td>
                    <td><?php echo $namalengkap; ?></td>
                    <td><?php echo $tanggallahir; ?></td>
                    <td><?php echo $jeniskelamin; ?></td>
                    <td><?php echo $kewarganegaraan; ?></td>
                    <td><?php echo $tanggalpengeluaran; ?></td>
                    <td><?php echo $tanggalhabisberlaku; ?></td>
                    <td><?php echo $kodenegara; ?></td>
                    <td><?php echo $keterangan; ?></td>
                    <td><a href="previewpaspor.php?paspor=<?php echo $paspor; ?>"><?php echo $paspor; ?></a></td>
                    <td><?php echo $tanggalpenolakan; ?></td>
                    <td id="hidecommon">

                      <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">

                        <button onclick="window.location.href='updatepemeriksaan.php?idpemeriksaan=<?php echo $idpemeriksaan; ?>'" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: green; border-radius: 5px; padding: 5px; margin: 5px;">Update</button>


                        <button onclick="confirmdelete()" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: red; border-radius: 5px; padding: 5px; margin: 5px;">Delete</button>

                        <button onclick="window.location.href='downloadpdf.php?idpemeriksaan=<?php echo $idpemeriksaan; ?>'" style="border: 1px solid black ;color: black; font-weight: bolder; background-color: white; border-radius: 5px; padding: 5px; margin: 5px;">Pdf</button>

                      </div>
                    </td>
                  </tr>
                  <?php  
                }
                 ?>

            
              </tbody>
            </table>
          `;

          menudashboard.innerHTML = tableHTML;
        }

        return false;

      }

      function confirmdelete(){
        var deleteconfirm = confirm("Apakah anda yakin ingin menghapus ?");
        if(deleteconfirm == true){
          window.location.href = "deletepemeriksaan.php?idpemeriksaan=<?php echo $idpemeriksaan; ?>";
        }
      }


    </script>

   
  

      <?php  
    }else{
      // auto go to logins
    }

     ?> 




<br><br><br><br><br><br><br><br><br><br><br>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>