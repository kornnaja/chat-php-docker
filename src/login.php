<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <?php
  require "./header/header.php"
  ?>
</head>
<body>
<?php
    require('server.php');
    
    if (isset($_GET['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `tb_user` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("location: index.php");
          
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
  <section class="text-center text-lg-start">
    <div class="container py-4">
      <div class="row g-0 align-items-center">
        <div class="col-lg-12 mb-5 mb-lg-0">
          <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);">
            <div class="card-body p-5 shadow-5 text-center">
              <h2 class="fw- mb-5">Sign up now</h2>
              <form method="GET" name="login">
                <div class="form-outline mb-4">
                  <label class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" />
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" />
                </div><!-- Submit button -->
                <input type="submit" value="Login" name="submit" class="btn btn-success"/></form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
    }
?>
</body>

</html>