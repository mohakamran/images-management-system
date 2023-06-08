<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Category</title>
    <!-- link css  -->
    <link href="../index.css" rel="stylesheet" />
    <!-- admin css  -->
    <link href="admin-css.css" rel="stylesheet" />
</head>
<body>
   <!-- include navbar admin  -->
   <?php  require "navbar.php"; ?>
   <div class="form-container">
       <h2> Add New Category </h2>
       <p class="text-center">To add a view categories. Please <a href="view-categories.php">click here </a> </p>
       <form method="post" action="">
           <p class="error">
            <?php 
             if(isset($_GET['error'])) {
                echo "Field Is empty!";
             } else if ( isset($_GET['dbfail']) ) {
                echo $dbfail;
             }
            ?>
           </p>
           <p class="success">
            <?php 
             if(isset($_GET['success'])) {
                echo "Category Added Successfuly!";
                echo "<script>window.open('view-categories.php','_self')</script>";
             }
            ?> 
           </p>
           <input type="text" placeholder="Enter a category" name="category_name" />
           <input type="submit" name="btn_submit"  value="Add Category" class="login-btn" />
       </form>
   </div>
</body>
</html>

<?php 
  if (isset($_POST['btn_submit'])) {
    $category_name = $_POST['category_name'];
    if(empty($category_name)) {
        echo "<script>window.open('add-new-category.php?error=error','_self')</script>";
    } else {
        require "database.php";
        $sql = "INSERT INTO categories (Name) VALUES ('$category_name')";
        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.open('add-new-category.php?success=success','_self')</script>";
        } else {
            echo "<script>window.open('add-new-category.php?dbfail='+$conn->error,'_self')</script>";
        }
    }
  }
?>