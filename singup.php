<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
if(isset($_SESSION['user_id'])){
    header("Location: home.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Php project</title>  
</head>
<body style="background: #f7f7f7">
<div class="container-fluid" style="background: #fff">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="singup.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Sing up System</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link">Log in</a></li>
      </ul>
    </header>
  </div>

  <form method="post" action="includes/signup.inc.php" name="signup_form" id="signup_form">
    <div class="col my-5 d-flex justify-content-center">
        <div class="card" style="width: 25rem; padding: 30px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <label for="text"><p class="">Name</p></label>
                        <input type="text" id="Name" name="username" class="form-control" placeholder="Name" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="text"><p class="">Surname</p></label>
                        <input type="text" id="Surname" name="surname" class="form-control" placeholder="Surname" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="email"><p class="">Email address</p></label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="name@gmail.com" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="date"><p class="">Birthday</p></label>
                        <input type="date" id="Birthday" name="birthday" class="form-control" placeholder="Surname" required>
                    </div>
                </div>


                <div class="row my-2">
                    <div class="col-12">
                        <label for="password"><p class="">Password</p></label>
                        <input type="password" id="password" name="pwd"  class="form-control"  maxlength="7" minlength="4" required>
                    </div>
                </div>

                <!-- No row class, just d-flex to align and auto width -->
                <div class="d-flex justify-content-end my-3">
                    <button type="submit" class="btn btn-primary">Sing up</button>
                </div>
            </div>
        </div>
    </div>

</form>



</div>
<?php
check_signup_errors();
?>
    
    
</body>
</html>