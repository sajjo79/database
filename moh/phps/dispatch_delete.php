<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["dispatch_id"]) && !empty(trim($_GET["dispatch_id"]))){
    // Include config file
    require_once "config_main.php";
    
    // Prepare a select statement
	$dispatch_id=$_GET["dispatch_id"];
    $sql = "delete FROM dispatch_info WHERE dispatch_id = ".$dispatch_id;
    $res=$conn->query($sql);
                header("location: dispatch_index.php");

    // Close connection
    $conn->close();
    
} 
?>
<a href="dispatch_index.php" class="btn btn-success pull-right">Back</a>
</body>
</html>