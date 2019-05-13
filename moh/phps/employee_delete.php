<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["person_id"]) && !empty(trim($_GET["person_id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
	$person_id=$_GET["person_id"];
    $sql = "delete FROM employee WHERE person_id = ".$person_id;
    $res=$conn->query($sql);
                header("location: employee_index.php");

    // Close connection
    $conn->close();
} 
?>
</body>
</html>