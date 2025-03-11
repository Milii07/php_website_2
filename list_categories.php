<?php

require_once 


'includes/dbh.inc.php';
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
    <title>List Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<?php include_once 'menu.php';?>


<div class="container justify-content-center py-3 mb-3 d-flex">
    <h1 class="justify-content-center text-success mx-auto">List Categories</h1>
    <?php if($is_loggedin){?>
    <a href="create_category.php"><button  class="btn btn-primary">Create category</button></a>
    <?php } ?>
</div>


<div class="container  d-flex justify-content-center  mt-5">
<table class="table"  style="width: 70%;">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Title</th>
      <?php if($is_loggedin){?>
    <th scope="col">Action</th>
    <?php } ?>
  
    </tr>
  </thead>
  <tbody>
    <?php if(count($allCategories) > 0){?> 
    
    <?php foreach($allCategories as $category){?>
    <tr>
      <th><?php echo $category["id"];?></th>
      <td><?php echo $category["title"];?></td>
      <td>
      
      <?php if($is_loggedin){?>
      <a href=<?php echo "edit_category.php?id=" . $category["id"]; ?>>
        <button class="btn btn-info me-md-2" type="button">Edit</button></a>
        <?php } ?>
      
      <?php if(count(getAllbyCategories($pdo,$category["id"])) <=0 ){?>
    
        <a href=<?php echo "includes/delete.php?category_id=" . $category["id"]; ?>>
        <button class="btn btn-danger me-md-2" type="button">Delete</button></a>

               <?php } else { echo "";} ?>
                          
      </td>
    </tr>
    <?php } ?>

    <?php } else { ?>
      
      <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <p class="text-center">No records found</p>
        </div>
        
    <?php } ?>
  </tbody>
</table>
</div>
</body>
</html>