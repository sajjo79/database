<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["serial_no"]) && !empty(trim($_GET["serial_no"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
	$serial_no=$_GET["serial_no"];
    $sql = "delete FROM article_department WHERE serial_no = ".$serial_no;
    $res=$conn->query($sql);
                header("location: article_department_index.php");

    // Close connection
    $conn->close();
} 
?>
</body>
</html>