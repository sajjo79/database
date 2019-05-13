<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["department_id"]) && !empty(trim($_GET["department_id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
	$department_id=$_GET["department_id"];
    $sql = "delete FROM department WHERE department_id = ".$department_id;
    $res=$conn->query($sql);
                header("location: department_index.php");

    // Close connection
    $conn->close();
} 
?>
</body>
</html>