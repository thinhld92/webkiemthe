<?php
require_once('../includes/config.php');
require_once('model/func.php');

if( $user->is_logged_in() ){ header('Location: index.php'); } 
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Kevin109">
  <meta name="generator" content="Hugo 0.79.0">
  <title>Admin Login</title>
  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
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
  <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
  <main class="form-signin">

    <form action="" method="post">
      <!--       <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
      <h1 class="h3 mb-3 fw-normal">Đăng nhập hệ thống</h1>
      <?php
  //process login form if submitted
      if(isset($_POST['submit'])){
        $username = anti_sql($_POST['username']);
        $password = anti_sql($_POST['password']);   
        if($user->login($username,$password)){ 
          //logged in return to index page
          header('Location: index.php');
          exit;
        } else {
          $message = '<p class="alert alert-danger">Tài khoản hoặc mật khẩu không chính xác!</p>';
        }
  }//end if submit
  if(isset($message)){ echo $message; }
  ?>
  <label for="inputEmail" class="visually-hidden">Tài khoản</label>
  <input type="text" name="username" class="form-control" placeholder="Tài khoản" required autofocus>
  <label for="inputPassword" class="visually-hidden">Mật khẩu</label>
  <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
  <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Đăng Nhập</button>
  <!--  <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p> -->
</form>
</main>
</body>
</html>
