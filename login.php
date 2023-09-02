<?php 

include "server/koneksi.php";

session_start();

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = sha1($_POST['password']);

  if(!empty(trim($username))){
    if(!empty(trim($password))){
      $sql = "SELECT * FROM users WHERE username = '$username'";
      $connect = mysqli_query($koneksi, $sql);
      if(mysqli_num_rows($connect) > 0){
        while($data = mysqli_fetch_array($connect)){
          $usernamedb = $data['username'];
          $passworddb = $data['password'];
        }

        if($username == $usernamedb){
          if($password == $passworddb){
            $_SESSION['username'] = $username;
            header("location:index.php");
          }else{
            ?>
            <script type="text/javascript">
              alert("password salah");  
            </script>
            <?php  
          }
        }else{
          ?>
            <script type="text/javascript">
              alert("username salah");  
            </script>
          <?php
        }
      }else{
        ?>
            <script type="text/javascript">
              alert("Data user tidak ditemukan");  
            </script>
          <?php
      }
    }else{
      ?>
            <script type="text/javascript">
              alert("Password tidak boleh kosong");  
            </script>
          <?php
    }
  }else{
    ?>
            <script type="text/javascript">
              alert("Username tidak boleh kosong");  
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

    <title>Login</title>
  </head>
  <body>
  
    <div style="display: flex; justify-content: center;margin-top: 50px;">
      <h1 style="font-weight: bolder;">LOGIN</h1>
    </div>

    <div style="display: flex; justify-content: center;margin-left: 50px; margin-right: 50px; margin-top: 100px;">


    <form method="POST" action="">
      <!-- Username input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form2Example1">Username</label>
        <input type="text" name="username" id="form2Example1" class="form-control" autofocus/>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form2Example2">Password</label>
        <input type="password" name="password" id="form2Example2" class="form-control" />
      </div>

      <!-- 2 column grid layout for inline styling -->
      <div class="row mb-4">
      

    
      </div>


      <!-- Submit button -->
      <input type="submit" name="submit" value="Masuk" class="btn btn-primary" style="width: 100%; "/>

      <!-- Register buttons -->
      <div class="text-center">
        <p>Belum memiliki akun? <a href="register.php" style="text-decoration: none;">Daftar</a></p>
      </div>
    </form>


    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>