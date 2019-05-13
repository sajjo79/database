<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["recieved_id"]) && !empty(trim($_GET["recieved_id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
	$recieved_id=$_GET["recieved_id"];
    $sql = "delete FROM employee_recieved_info WHERE recieved_id = ".$recieved_id;
    $res=$conn->query($sql);
                header("location: employee_recieved_info_index.php");

    // Close connection
    $conn->close();
} 
?>
</body>
</html>