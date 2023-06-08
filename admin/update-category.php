<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <!-- link css  -->
    <link href="../index.css" rel="stylesheet" />
    <!-- admin css  -->
    <link href="admin-css.css" rel="stylesheet" />
</head>
<body>
   <!-- include navbar admin  -->
   <?php  require "navbar.php"; ?>
   <div class="form-container">
        <?php
          require "database.php";
          $id = $_GET['id'];
          $sql = "select * from categories where ID='$id'";
          $sql_res = $conn->query($sql);
          $row= mysqli_fetch_array($sql_res);
          $count = mysqli_num_rows($$row);
        ?>
       <h2> Update Category </h2>
       <form method="post" action="update-category.php?id=<?php echo $row['ID'] ?>">
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
                echo "Category Updated Successfuly!";
                echo "<script>window.open('view-categories.php?updated=success','_self')</script>";
             }
            ?> 
           </p>
           <input type="text" placeholder="update category" value="<?php echo $row['Name'] ?>" name="update_name" />
           <input type="submit" name="update_category"  value="Update Category" class="login-btn" />
       </form>
   </div>
</body>
</html>

<?php 
  if (isset($_POST['update_category'])) {
    $id_new = $_GET['id'];
    $new_category = $_POST['update_name'];
    
    if(empty($new_category)) {
        echo "<script>window.open('update-category.php?error=error&id=$id_new','_self')</script>";
    } else {
        require "database.php";
        $sql = "update categories set Name='$new_category' where ID='$id_new'";
        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.open('update-category.php?success=success','_self')</script>";
        } else {
            echo "<script>window.open('update-category.php?dbfail='+$conn->error,'_self')</script>";
        }
    }
  }
?>