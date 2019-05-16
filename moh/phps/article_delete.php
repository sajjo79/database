<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["article_no"]) && !empty(trim($_GET["article_no"]))){
    // Include config file
    require_once "config_main.php";
    
    // Prepare a select statement
	$article_no=$_GET["article_no"];
    $sql = "delete FROM article WHERE article_no = ".$article_no;
    $res=$conn->query($sql);
                header("location: article_index.php");

    // Close connection
    $conn->close();
} 
?>
</body>
</html>