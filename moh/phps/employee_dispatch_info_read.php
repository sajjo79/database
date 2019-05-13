<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["dispatch_id"]) && !empty(trim($_GET["dispatch_id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
	$dispatch_id=$_GET["dispatch_id"];
    $sql = "SELECT * FROM employee_dispatch_info WHERE dispatch_id = ".$dispatch_id;
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
		        $person_id = $row["person_id"];
                $dispatch_id = $row["dispatch_id"];
				
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: employee_dispatch_info_error.php");
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
                        <label>Person id</label>
                        <p class="form-control-static"><?php echo $row["person_id"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Dispatch id</label>
                        <p class="form-control-static"><?php echo $row["dispatch_id"]; ?></p>
                    </div>
                    
                    
                    <p><a href="employee_dispatch_info_index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>