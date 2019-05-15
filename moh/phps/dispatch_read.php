<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["dispatch_id"]) && !empty(trim($_GET["dispatch_id"]))){
    // Include teamconfig file
    require_once "config_main.php";
    echo $_GET["dispatch_id"];
    // Prepare a select statement
	$dispatch_id=$_GET["dispatch_id"];
    $sql = "SELECT * FROM dispatch_info WHERE dispatch_id = ".$dispatch_id;
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
                $dispatch_id = $row["dispatch_id"]; 
				$person_id = $row["article_no"];
                $dispatch_date = $row["dispatch_date"];
				$disptach_time = $row["dispatcher_id"];
				$dispatched_by = $row["forwarded_to"];
			
			
					
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: dispatch_error.php");
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
                        <label>Dispatch id</label>
                        <p class="form-control-static"><?php echo $row["dispatch_id"]; ?></p>
                    </div>

                    <div class="form-group">
                        <label>Article No.</label>
                        <p class="form-control-static"><?php echo $row["article_no"]; ?></p>
                    </div>
                    
                    <div class="form-group">
                        <label>Dispatch date</label>
                        <p class="form-control-static"><?php echo $row["dispatch_date"]; ?></p>
                    </div>
					
					<div class="form-group">
                        <label>Dispatcher Id</label>
                        <p class="form-control-static"><?php echo $row["dispatcher_id"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Forwarded To</label>
                        <p class="form-control-static"><?php echo $row["forwarded_to"]; ?></p>
                    </div>
					
					
                    <p><a href="dispatch_index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>