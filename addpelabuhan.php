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
              <a href="" onclick="" class="list-group-item list-group-item-action" style="background-color: grey; pointer-events: none;">Pelabuhan TPI</a>
              <a href="" onclick="" class="list-group-item list-group-item-action" style="background-color: grey; pointer-events: none;">Pemeriksaan</a>
            </div>
          </div>

          <!-- Right Content -->
          <div class="col-md-9">
            <h2 style="text-align: center; font-weight: bolder;">Selamat Datang di IMIGRASI BATAM</h2>
            <p style="text-align: center;">Siap melayani anda setiap saat</p>

            <main id="menu">
           
            <!-- Table Example -->
            <table class="table table-bordered" id="tabletpipelabuhan">
              <thead>
                <tr>
                  <th>Kode TPI</th>
                  <th>Nama Pelabuhan</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                if(isset($_POST['submit'])){
                  $kodetpi = $_POST['kodetpi'];
                  $namapelabuhan = $_POST['namapelabuhan'];
                  $keterangan = $_POST['keterangan'];

                  if(!empty(trim($kodetpi))){
                    if(!empty(trim($namapelabuhan))){
                      if(!empty(trim($keterangan))){

                        $insertdatatpi = "INSERT INTO tblpelabuhans set kode_tpi = '$kodetpi', nama_pelabuhan = '$namapelabuhan', keterangan = '$keterangan'";

                        $connectinsertdatatpi = mysqli_query($koneksi, $insertdatatpi);  
                        if($connectinsertdatatpi){
                            ?>
                            <script type="text/javascript">
                              alert("Berhasil menambah data pelabuhan ! klik OK dan tunggu 1 detik untuk berpindah halaman");
                              setTimeout(function(){
                              window.location.href="index.php";
                            },1000);  
                            </script>
                            <?php  
                        }else{
                          ?>
                          <script type="text/javascript">
                            alert("gagal tambah data ! klik OK dan tunggu 1 detik untuk berpindah halaman");
                            setTimeout(function(){
                              window.location.href="index.php";
                            },1000);
                          </script>
                          <?php  
                        }
                      }else{  
                        ?>
                        <script type="text/javascript">
                          alert("keterangan tidak boleh kosong");
                        </script>
                        <?php  
                      }
                    }else{
                      ?>
                      <script type="text/javascript">
                        alert("nama pelabuhan tidak boleh kosong");
                      </script>
                      <?php  
                    }
                  }else{
                    ?>
                    <script type="text/javascript">
                      alert("kode TPI tidak boleh kosong");
                    </script>
                    <?php  
                  }

                  
                }

                
                
                  ?>

                  <form method="POST" action="">
                  <tr>
                    <td><input type="text" name="kodetpi" placeholder="kode TPI" required></td>
                    <td><input type="text" name="namapelabuhan" placeholder="Nama pelabuhan" required></td>
                    <td><input type="text" name="keterangan" placeholder="Keterangan" required></td>
                    <td>
              
                        <input type="submit" name="submit" value="Tambah data pelabuhan" style="border: 5px; border: none; color: white; font-weight: bolder; background-color: blue; border-radius: 5px; padding: 5px; margin: 5px;"/>

                 
                    </td>
                  </tr>
                  </form>
              

              
                <!-- Add more table rows as needed -->
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