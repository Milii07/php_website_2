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

if (!isset($_SESSION['user_id']) || $article['user_id'] != $_SESSION['user_id']) {
    header("Location: home.php");
    exit();
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
<?php include_once 'menu.php';?>


<div class="container justify-content-center py-3 mb-3">    <h1 class="text-center text-success">Edit Article</1></div>

<div class="container  d-flex justify-content-center  mt-5">

    <form method="post" action="includes/update_article.php">

    
        <input type="hidden" name="article_id" value='<?php echo $article['id'];?>' />

        <div class="mb-3"  style="width: 30rem;">
            <label for="title" class="form-label" style="color: purple;">Title:</label>
            <input type="text" class="form-control" id="title" name="title"  required value='<?php echo $article['title'];?>'>
        </div>

       
        <div class="mb-3  col-md-18">
            <label for="subtitle" class="form-label" style="color: purple;">Subtitle:</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" value='<?php echo $article['subtitle'];?>'>
        </div>

    
       
        <div class="mb-3  col-md-18">
            <label for="content" class="form-label" style="color: purple;">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="10" required><?php echo $article['content'];?></textarea>
        </div>

        <div class="mb-3 col-md-18">
    <label for="content" class="form-label" style="color: purple;">Category:</label>
    <select class="form-select" name="category" aria-label="Select category">
        <option value="" >Select an option</option>
        <?php 
       
        foreach ($allCategories as $category) {
          
            $selected = ($category['id'] == $article['category_id']) ? 'selected' : '';
            echo "<option value='" . $category['id'] . "' $selected>" . $category['title'] . "</option>";
        }
        ?>
    </select>
</div>
        <button type="submit" class="btn btn-primary">Submit change</button>
    </form>
</div>
</body> 
</html>

