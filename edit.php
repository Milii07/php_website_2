<?php

require_once 'includes/dbh.inc.php';

require_once 'includes/config_session.inc.php';

include_once 'includes/categories.inc.php';

include_once 'includes/users_model.inc.php';
include_once 'includes/articles_model.inc.php';

$allUsers = getAllUsers($pdo);

if(!isset($_SESSION['user_id'])){
  header("Location: home.php");
}
$article = getSingleArticle($pdo,$_GET['article_id']);
 
if(!$article){
  header("Location: home.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<div class="container-fluid" style="background: #fff">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="home.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Login Success</span>
        </a>

        <ul class="nav nav-pills">
        <li class="nav-item"><a href="create_article.inc.php" class="nav-link" style="color: purple;">Create article</a></li>
      </ul>
      <?php if($allCategories && count($allCategories) > 0) { for($i=0;$i<count($allCategories);$i++){ ?>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href=<?php echo "category.php?id=" . $allCategories[$i]["id"];?>  class="nav-link" style="color: red;"><?php echo $allCategories[$i]["title"];?></a></li>
      </ul>
      <?php }}?>

      

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

<div class="container justify-content-center py-3 mb-3">    <h1 class="text-center text-success">Edit Article</1></div>

<div class="container  d-flex justify-content-center  mt-5">

    <form method="post" action="includes/create_article.php">


        <div class="mb-3"  style="width: 30rem;">
            <label for="title" class="form-label" style="color: purple;">Title:</label>
            <input type="text" class="form-control" id="title" name="title"  required value='<?php echo $article['title'];?>'>
        </div>

       
        <div class="mb-3  col-md-18">
            <label for="subtitle" class="form-label" style="color: purple;">Subtitle:</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" value='<?php echo $article['subtitle'];?>'>
        </div>

      
      
        <div class="mb-3 col-md-18">
            <label for="user_id" class="form-label" style="color: purple;">User Name:</label>
            <select class="form-select" name="user_id" aria-label="Default select example">
                <option selected>Select user</option>
            
                <?php if($allUsers && count($allUsers) > 0)  for($i=0;$i<count($allUsers);$i++){    ?>
                  <option value="<?php echo $allUsers[$i]["id"];?>" <?php if($allUsers[$i]["id"] == $article['user_id']){ echo 'selected';}?>><?php echo $allUsers[$i]["username"];?></option> <?php
                   }
                ?> 
            </select>
 
        </div>

       
        <div class="mb-3  col-md-18">
            <label for="content" class="form-label" style="color: purple;">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="10" required><?php echo $article['content'];?></textarea>
        </div>

      
        <button type="submit" class="btn btn-primary">Submit change</button>
    </form>
</div>
</body>
</html>

