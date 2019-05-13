<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["dispatch_id"]) && !empty(trim($_GET["dispatch_id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
	$dispatch_id=$_GET["dispatch_id"];
    $sql = "delete FROM employee_dispatch_info WHERE dispatch_id = ".$dispatch_id;
    $res=$conn->query($sql);
                header("location: employee_dispatch_info_index.php");

    // Close connection
    $conn->close();
} 
?>
</body>
</html>