<?php

require_once 'includes/dbh.inc.php';
require_once 'includes/config_session.inc.php';
include_once 'includes/categories.inc.php';
include_once 'includes/users_model.inc.php';
include_once 'includes/create_model.inc.php';

$allUsers = getAllUsers($pdo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<?php include_once 'menu.php';?>


<div class="container justify-content-center py-3 mb-3">    <h1 class="text-center text-success">Create Category</1></div>
<?php if(isset($_SESSION['error_creating_category'])){?>
        <div style="display: flex; justify-content: center; align-items: center; text-align: center;">
            <h1 style="color: red;"><?php echo $_SESSION['error_creating_category'][0];unset($_SESSION['error_creating_category']);?></h1>

    </div>
    <?php } ?>
<div class="container  d-flex justify-content-center  mt-5">

    <form method="post" action="includes/create_category.php">

        <div class="mb-3"  style="width: 30rem;">
            <label for="title" class="form-label" style="color: purple;">Title:</label>
            <input type="text" class="form-control" id="title" name="title"  required>
        </div>
      
        <button type="submit" class="btn btn-primary">Create</button>
        

    </form>

</div>
</body>
</html>
