<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["file_no"]) && !empty(trim($_GET["file_no"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
	$file_no=$_GET["file_no"];
    $sql = "delete FROM file WHERE file_no = ".$file_no;
    $res=$conn->query($sql);
                header("location: file_index.php");

    // Close connection
    $conn->close();
} 
?>
</body>
</html>