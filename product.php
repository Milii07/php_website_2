
<?php

require_once 'includes/dbh.inc.php';
require_once 'includes/config_session.inc.php';
require 'includes/login_view.inc.php';
require 'includes/articles_model.inc.php';

$singleArticle = getSingleArticle($pdo,$_GET['article_id']);
if(!$singleArticle){
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
      <a href="home.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Login Success</span>
      </a>


      <ul class="nav nav-pills">
        <li class="nav-item"><a href="home.php" class="nav-link">HOME</a></li>
      </ul>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="home.php" class="nav-link">SETTINGS</a></li>
      </ul>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="includes/logout.php" class="nav-link">LOGOUT</a></li>
      </ul>
    </header>
  
  </div>


  <?php if($singleArticle) { ?>
    

  <div class="d-flex mt-5">
    <div class="container d-flex justify-content-center align-items-center text-danger">

       <div class="card" style="width: 70rem;">
        <a href="home.php" class="d-flex justify-content-end mt-3 me-3"><button class="btn btn-primary" type="button">Home Page</button></a>

          <div class="card-body">
            <h1 class="card-title"><?php echo $singleArticle["title"]?></h1>
            <h4 class="card-subtitle"><?php echo $singleArticle["subtitle"]?></h4>
            <p class="text-sm-start text-dark"><?php echo $singleArticle["content"]?></p>

            <p class="ps-1">Author</p>
            <p class="text-dark"><?php echo getArticleAuthor($pdo,$singleArticle["user_id"])["username"];?></p>
           
          </div>
        </div>


    </div>

</div>


<?php }  else { echo "Article not found";}?>

    
    
</body>
</html>