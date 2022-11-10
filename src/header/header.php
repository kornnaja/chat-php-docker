<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CHAT </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                if (isset($SESSION["username"])) {
                    echo "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                    <li class='nav-item'>
                        <a class='nav-link active' aria-current='page' href='register.php'>Register</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='login.php'>Login</a>
                    </li>";
                   
                } else {
                    
                    if(isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class=nav-link' href='logout.php'>Logout</a>
                    </li>";
                    }else{
                        echo "<li style='visibility: hidden;' class='nav-item'>
                        <a class=nav-link' href='logout.php'>Logout</a>
                    </li>";
                    echo "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                    <li class='nav-item'>
                        <a class='nav-link active' aria-current='page' href='register.php'>Register</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='/login.php'>Login</a>
                    </li>";
                    }
                }
                ?>


                </ul>
            </div>
        </div>
    </nav>
</body>

</html>