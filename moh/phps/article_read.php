<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["serial_no"]) && !empty(trim($_GET["serial_no"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
	$serial_no=$_GET["serial_no"];
    $sql = "SELECT * FROM article WHERE serial_no = ".$serial_no;
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
		        $serial_no = $row["serial_no"];
                $file_no = $row["file_no"];
				$article_date = $row["article_date"];
				$article_time = $row["article_time"];
				$article_subject = $row["article_subject"];
				$article_disposal = $row["article_disposal"]
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: article_error.php");
                exit();
            }
            
        
		
    // Close connection
    $conn->close();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
					<div class="form-group">
                        <label>Serial No</label>
                        <p class="form-control-static"><?php echo $row["serial_no"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>File No</label>
                        <p class="form-control-static"><?php echo $row["file_no"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Article Date</label>
                        <p class="form-control-static"><?php echo $row["article_date"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Article time</label>
                        <p class="form-control-static"><?php echo $row["article_time"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Article Date</label>
                        <p class="form-control-static"><?php echo $row["article_date"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Article Disposal</label>
                        <p class="form-control-static"><?php echo $row["article_disposal"]; ?></p>
                    </div>
					
                    <p><a href="article_index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>