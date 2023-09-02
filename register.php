<?php 

include "server/koneksi.php";

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $ulangpassword = $_POST['ulangpassword'];
 

  if(!empty(trim($username))){
    if(!empty(trim($password))){
      if(!empty(trim($ulangpassword))){
        if($password == $ulangpassword){
          $passwordencrypt = sha1($password);

          $insertdata = "INSERT INTO users set username = '$username', password = '$passwordencrypt', role = 'common_user'";
          $connectinsertdata = mysqli_query($koneksi, $insertdata);
          if($connectinsertdata == true){
            ?>
            <script type="text/javascript">
              alert("berhasil mendaftar, tunggu 2 detik untuk berpindah ke halaman login");
              
              setTimeout(function(){
                window.location.href="login.php";
              },2000);
            </script>
            <?php 
          }
        }else{
          ?>
          <script type="text/javascript">
            alert("kolom password dan ulang password tidak sama");
          </script>
          <?php 
        }
      }else{
        ?>
        <script type="text/javascript">
          alert("kolom ulang password tidak boleh kosong");
        </script>
        <?php  
      }
    }else{
      ?>
      <script type="text/javascript">
        alert("kolom password tidak boleh kosong");
      </script>
      <?php 
    }
  }else{
    ?>
    <script type="text/javascript">
      alert("kolom username tidak boleh kosong");
    </script>
    <?php  
  }


  $sqlregister = "INSERT INTO users set username = '$username', password = '$password'";

  $connectregister = mysqli_query($koneksi, $sqlregister);

  if($connectregister){
    header("location:login.php");
  }else{
   ?>
   <script type="text/javascript">
     alert("Data user tidak ditemukan");
   </script>
   <?php 
  }


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

    <title>Daftar</title>
  </head>
  <body>
  

    <div style="display: flex; justify-content: center;margin-top: 50px;">
      <h1 style="font-weight: bolder;">REGISTER</h1>
    </div>


    <div style="display: flex; justify-content: center;margin-left: 50px; margin-right: 50px; margin-top: 100px;">


    <form method="POST" action="">
      <!-- nama lengkap input -->

      <!-- Username input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Username</label>
        <input type="text" name="username" id="form2Example1" class="form-control" required/>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Password</label>
        <input type="password" name="password" id="form2Example2" class="form-control" required/>
      </div>

       <!-- ulangi Password input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Ulangi Password</label>
        <input type="password" name="ulangpassword" id="form2Example2" class="form-control" required/>
      </div>

      <!-- Submit button -->
      <input type="submit" name="submit" value="Daftar" class="btn btn-primary" style="width: 100%; "/>

      <!-- Register buttons -->
      <div class="text-center">
        <p>Sudah memiliki akun? <a href="login.php" style="text-decoration: none;">Masuk</a></p>
      </div>
    </form>


    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>