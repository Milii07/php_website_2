<?php


if(isset($_SESSION['user_id'])){
  $is_loggedin = true;
} else {
  $is_loggedin = false;
}
?>


<div class="container-fluid" style="background: #fff">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="home.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Green Shop</span>
      </a>

      <?php if($is_loggedin){?>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="list_categories.php" class="nav-link" style="color: purple;">List Categories</a>
        </li>
        <?php } ?>
        <?php if($is_loggedin){?>
          <li class="nav-item"><a href="create_article.inc.php" class="nav-link" style="color: purple;">Create Article</a>
          </li>
        <?php } ?>
      <?php if ($allCategories && count($allCategories) > 0) {
        for ($i = 0; $i < count($allCategories); $i++) { ?>
          <ul class="nav nav-pills">
            <li class="nav-item"><a href=<?php echo "category.php?id=" . $allCategories[$i]["id"]; ?> class="nav-link"
                style="color: red;"><?php echo $allCategories[$i]["title"]; ?></a></li>
          </ul>
        <?php }
      } ?>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="home.php" class="nav-link">HOME</a></li>
      </ul>


      <?php if(isset($_SESSION["user_id"])) {?>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php $author = getArticleAuthor($pdo, $_SESSION["user_id"]);  echo $author['username'];?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <ul class="nav nav-pills">
        <li class="nav-item"><a href="home.php" class="nav-link mx-5">SETTINGS</a></li>
      </ul>
            <a href="includes/logout.php" class="btn btn-primary mx-5 ">Logout</a> 

            </div>
      </div> 
<?php } else {?> 
  <a href="index.php"  class="btn btn-primary">Login</a> 
  
        <?php  } ?>
    </header>
  </div>