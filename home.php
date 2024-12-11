
<?php
        require_once 'includes/config_session.inc.php';

require 'includes\login_view.inc.php';

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
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Login Success</span>
        </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="includes/home.php" class="nav-link">Logout</a></li>
      </ul>
    </header>
  
  </div>



  <div class="d-flex mt-5">
  <div class="container d-flex justify-content-center align-items-center text-danger">
    <h3> <?php
    output_username();
    ?>
    </h3>
  </div>

</div>


    
    
</body>
</html>