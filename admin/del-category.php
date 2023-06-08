<?php
require "database.php";
$id = $_GET['id'];
$query = "delete from categories where ID='$id' ";
// Execute the query
if ($conn->query($query) === TRUE) {
    echo "<script>window.open('view-categories.php?success=success','_self')</script>";
} else {
    echo "<script>window.open('view-categories.php?dbfail='+$conn->error,'_self')</script>";
}


?>