<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
    <!-- link css  -->
    <link href="../index.css" rel="stylesheet" />
    <!-- admin css  -->
    <link href="admin-css.css" rel="stylesheet" />
</head>
<body>
   <!-- include navbar admin  -->
   <?php  require "navbar.php"; ?>
   <div class="form-container">
       <h2> All categories </h2>
       <p class="text-center">To add a new category. Please <a href="add-new-category.php">click here </a> </p>
       <p class="success">
            <?php 
             if(isset($_GET['success'])) {
                echo "Record delete succesfully!";
             }
             if(isset($_GET['updated'])) {
                echo "Record updated succesfully!";
             }
             
            ?> 
        </p>
        <p class="error">
            <?php 
            if ( isset($_GET['dbfail']) ) {
                echo $dbfail;
             }
            ?>
        </p>
       <div class="responsive-table">
          <table class="table-admin">
              <tr>
                  <th> ID </th>
                  <th> Name </th>
                  <th> Update </th>
                  <th> Delete </th>
              </tr>
              <tbody>
                <?php
                   require "database.php";
                   $recordsPerPage = 5;
                   $counter = 1;
                    // determine page 
                    if (isset($_GET['page'])) {
                        $currentPage = $_GET['page'];
                    } else {
                        $currentPage = 1;
                    }
                    // offset 
                    $offset = ($currentPage - 1) * $recordsPerPage;
                    $sql = "SELECT * FROM categories LIMIT $offset, $recordsPerPage";
                   // Execute the query and get the result
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['ID'];
                            echo "<tr>";
                            echo "<td>".$counter."</td>";
                            echo "<td>".$row['Name']."</td>";
                            echo "<td> <a href='update-category.php?id=$id'> Update </a></td> ";
                            echo "<td> <a onclick='return confirmDelete()'  href='del-category.php?id=$id'> Delete </a></td>";
                            echo "</tr>";
                            $counter++;
                        }
                    }
                    else {
                        echo "<p class='error'> Nothing found in database </p>";
                    }
                ?>
              </tbody>
          </table>
          <?php
            // Pagination links
            $query_my = "SELECT * FROM categories";
            $totalRecords = mysqli_num_rows( $conn->query($query_my) );
            $totalPages = ceil($totalRecords / $recordsPerPage);
            echo "<p class='pagination-links'> ";
            for ($i = 1; $i <= $totalPages; $i++) {
                echo "<a href='view-categories.php?page=$i'>$i</a> ";
            }
            echo "</p>";
          ?>
       </div>
   </div>
   <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</body>
</html>