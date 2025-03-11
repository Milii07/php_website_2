

<?php

require_once 'includes/dbh.inc.php';
require_once 'includes/config_session.inc.php';
require 'includes/login_view.inc.php';
require 'includes/articles.inc.php';
require 'includes/categories.inc.php';
require 'includes/category.inc.php';

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
<?php include_once 'menu.php';?>
<div class="container justify-content-center py-3 mb-3">    <h1 class="text-center text-success">
  
  <?php 
for($i=0;$i<count($allCategories);$i++){
  if($_REQUEST['id'] == $allCategories[$i]['id']){
    echo $allCategories[$i]['title'];
    break;
  }
}?></1>
</div>

  <?php if(count($allArticlesByCategory) > 0) { 
    
    for($i=0;$i<count($allArticlesByCategory);$i++){?>
    

        <div class="d-flex mt-5">
          <div class="container d-flex justify-content-center align-items-center text-danger">

              <div class="card" style="width: 70rem;">
                <div class="card-body">
                  <h1 class="card-title"><?php echo $allArticlesByCategory[$i]["title"]?></h1>
                  <h4 class="card-subtitle"><?php echo $allArticlesByCategory[$i]["subtitle"]?></h4>
                  <p class="text-sm-start text-dark">
                  <?php

                  $lines = explode("\n", $allArticlesByCategory[$i]["content"]);

                  if (count($lines) > 1) {
                      echo $lines[0] . "<br>"; 
                      echo $lines[1] . "<br>";  
                  } else {
                      echo $lines[0] . "<br>";
                  } ?>   </p>

                  <p >Author</p>
                  <p class="text-dark"><?php echo getArticleAuthor($pdo,$allArticlesByCategory[$i]["user_id"])["username"];?></p>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <!-- shto butonin edit -->
                    <?php if($is_loggedin && $_SESSION['user_id'] == $allArticlesByCategory[$i]["user_id"]){ ?>
                      <a href=<?php echo "edit.php?article_id=".$allArticlesByCategory[$i]["id"];?> class="btn btn-danger me-md-2" type="button">
                                  Edit
                            </a>
                      <?php } ?>
                    <a href=<?php echo "product.php?article_id=".$allArticlesByCategory[$i]["id"];?>><button class="btn btn-primary me-md-2" type="button">Read more</button></a>
                  </div>
                </div>
              </div>


          </div>

        </div>

        <?php } ?>

<?php } else { ?>
  
  <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <h1 class="text-center text-dark">No article found</h1>
    </div>
    
<?php } ?>
    
    
</body>
</html>