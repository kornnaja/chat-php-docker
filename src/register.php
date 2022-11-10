<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <?php
  require "./header/header.php"
  ?>
</head>

<body>
  <?php
  require('server.php');
  // When form submitted, insert values into the database.
  if (isset($_REQUEST['username'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $firstname = stripslashes($_REQUEST['firstname']);
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = stripslashes($_REQUEST['lastname']);
    $lastname = mysqli_real_escape_string($conn, $lastname);

    $query    = "INSERT into `tb_user` (username, password, firstname,lastname)
                     VALUES ('$username', '" . md5($password) . "', '$firstname', '$lastname')";
    $result   = mysqli_query($conn, $query);
    if ($result) {
      echo "<div class='form'>
          <h3>You are registered successfully.</h3><br/>
          <p class='link'>Click here to <a href='login.php'>Login</a></p>
          </div>";
    } else {
      echo "<div class='form'>
          <h3>Required fields are missing.</h3><br/>
          <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
          </div>";
    }
  } else {
  ?>
    <div class="container mt-5" >
      <div class="card" style="width: 100%; ">
        <div class="card-body">
          <form method="post" action="" class="mx-1 mx-md-4">
            <div class="d-flex flex-row align-items-center mb-4">
              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <label class="form-label" for="form3Example1c">Username</label>
                <input type="text" name="username" id="form3Example1c" class="form-control" />
              </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <label class="form-label" for="form3Example3c">Password</label>
                <input type="password" name="password" id="form3Example3c" class="form-control" />

              </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <label class="form-label" for="form3Example4c">Firstname</label>
                <input type="text" name="firstname" id="form3Example4c" class="form-control" />

              </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
              <i class="fas fa-key fa-lg me-3 fa-fw"></i>
              <div class="form-outline flex-fill mb-0">
                <label class="form-label" for="form3Example4cd">Lastname</label>
                <input type="text" name="lastname" id="form3Example4cd" class="form-control" />

              </div>
            </div>
            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <input type="submit" name="submit" value="Register" class="btn btn-success">
            </div>
          </form>
        </div>
      </div>
    </div>

  <?php
  }
  ?>


</body>

</html>