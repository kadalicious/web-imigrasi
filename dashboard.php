<?php 
include 'server/koneksi.php';
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="bootstraps.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">Lidya dental cares</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <!--
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  -->
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Jadwal reservasi
            </a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
        -->
        </ul>

        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

    <div style="display: flex; justify-content: center;margin-top: 50px; margin-bottom: 20px;">
      <h3 style="font-weight: bolder;">Jadwal reservasi yang telah terjadwal</h3>
    </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead style="text-align: center;">
            <tr>
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal reservasi</th>
                <th scope="col">Jam</th>
                <th scope="col">Jenis kelamin</th>
                <th scope="col">Keluhan</th>
                <th scope="col">No. whatsapp</th>
                <th scope="col">Action</th>
              </tr>
            </tr>
          </thead>
          <tbody style="text-align: center;">
            <?php 

             $cekbooking = "SELECT * FROM reservasi";
             $conncekbooking = mysqli_query($koneksi, $cekbooking);
             while($databooking = mysqli_fetch_array($conncekbooking)){
              $idreservasi = $databooking['id_reservasi'];
              $iduser = $databooking['id_user'];
              $jadwalreservasi = $databooking['jadwal_reservasi'];
              $nowa = $databooking['nowa'];
              $jam = $databooking['jam_reservasi'];
              $menit = $databooking['menit_reservasi'];
              $keluhan = $databooking['keluhan'];

              if (substr($nowa, 0, 1) === "0") {
                  $replacewa = substr_replace($nowa, "62", 0, 1);
              } else {
                  $replacewa = $nowa; // Tidak perlu perubahan
              }

              $datauser = "SELECT * FROM user WHERE id_user = '$iduser'";
              $conndatauser = mysqli_query($koneksi, $datauser);
              while($takedatuser = mysqli_fetch_array($conndatauser)){
                $namalengkap = $takedatuser['namalengkap'];
                $nohp = $takedatuser['nohp'];
                $jeniskelamin = $takedatuser['jeniskelamin'];
              }
              ?>

              <tr>
                <th scope="row"><?php echo $namalengkap; ?></th>
                <td ><?php echo $jadwalreservasi; ?></td>
                <td ><?php echo $jam; ?> : <?php echo $menit; ?></td>
                <td ><?php echo $jeniskelamin; ?></td>
                <td ><?php echo $keluhan; ?></td>
                <td >
                  <?php echo $nowa; ?>
                  <a href="https://wa.me/<?php echo $replacewa; ?>" style="text-decoration: none; color: red;">Kirim pesan</a>
                </td>
                <td >
                  <div style="display: flex; flex-direction: row;">
                    <button onclick="" style="color: white; background-color: red; padding: 5px;border:none; border-radius: 5px; margin: 5px; font-weight: bolder;">Selesai</button>
                    <button  onclick="window.location.href='editreservasi.php?idreservasi=<?php echo $idreservasi; ?>'" style="color: white; background-color: green;padding: 5px;border:none; border-radius: 5px; margin: 5px; font-weight: bolder;">Edit</button>
                  </div>
                </td>



              </tr>

              <?php 
             } 
              ?>
        
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="js/dashboard.js"></script>
  </body>
</html>
