<?php

require_once 'includes/dbh.inc.php';
require_once 'includes/config_session.inc.php';
require 'includes/login_view.inc.php';
include_once 'includes/articles.inc.php';
include_once 'includes/categories.inc.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <title>Php project</title>
</head>

<body style="background: #f7f7f7">
<?php include_once 'menu.php';?>

<div class="container justify-content-center py-3 mb-3">
    <h1 class="text-center text-success">All Articles</h1>
</div>

<?php 
if (isset($allArticles) && count($allArticles) > 0) {
    for ($i = 0; $i < count($allArticles); $i++) {?>
        <div class="d-flex mt-5">
            <div class="container d-flex justify-content-center align-items-center text-danger">
                <div class="card" style="width: 70rem;">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo $allArticles[$i]["title"] ?></h1>
                        <h4 class="card-subtitle"><?php echo $allArticles[$i]["subtitle"] ?></h4>
                        <p class="text-sm-start text-dark">
                            <?php
                            $lines = explode("\n", $allArticles[$i]["content"]);
                            echo isset($lines[1]) ? $lines[0] . "<br>" . $lines[1] . "<br>" : $lines[0] . "<br>";
                            ?>
                        </p>
                        <p>Author</p>
                        <?php 
                        $author = getArticleAuthor($pdo, $allArticles[$i]["user_id"]);
                        if ($author) { ?>
                            <p class="text-dark"><?php echo $author["username"]; ?></p> 
                        <?php } ?>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <?php if ($is_loggedin && $_SESSION['user_id'] == $allArticles[$i]["user_id"]) { ?>
                              <a href=<?php echo "edit.php?article_id=".$allArticles[$i]["id"];?> class="btn btn-danger me-md-2" type="button">
                                  Edit
                            </a>

                            <?php } ?>
                            <a href="product.php?article_id=<?php echo $allArticles[$i]["id"]; ?>">
                                <button class="btn btn-primary me-md-2" type="button">Read more</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} 
?>

</body>

</html>