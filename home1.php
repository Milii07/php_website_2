<div class="container-fluid" style="background: #fff">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="home.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Login Success</span>
      </a>


      <ul class="nav nav-pills">
        <li class="nav-item"><a href="list_categories.php" class="nav-link" style="color: purple;">List Categories</a>
        </li>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="create_article.inc.php" class="nav-link" style="color: purple;">Create Article</a>
        </li>
      </ul>
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

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="home.php" class="nav-link">SETTINGS</a></li>
      </ul>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="includes/logout.php" class="nav-link">LOG IN</a></li>
      </ul>

    </header>
  </div>