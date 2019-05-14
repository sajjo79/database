<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["article_no"]) && !empty(trim($_GET["article_no"]))){
    // Include config file
    require_once "config_main.php";
    
    // Prepare a select statement
	$article_no=$_GET["article_no"];
    $sql = "SELECT * FROM article WHERE article_no = ".$article_no;
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
		        $article_no = $row["article_no"];
				$article_date = $row["article_date"];
				$article_subject = $row["article_subject"];
                $article_sender = $row["article_sender"];
                $article_receiver = $row["article_receiver"];
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
                        <p class="form-control-static"><?php echo $row["article_no"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Article Date</label>
                        <p class="form-control-static"><?php echo $row["article_date"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Article type</label>
                        <p class="form-control-static"><?php echo $row["article_type"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Article Sender</label>
                        <p class="form-control-static"><?php echo $row["article_sender"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Article Reciever</label>
                        <p class="form-control-static"><?php echo $row["article_receiver"]; ?></p>
                    </div>
					
                    <p><a href="article_index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>