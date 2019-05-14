<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["department_id"]) && !empty(trim($_GET["department_id"]))){
    // Include config file
    require_once "config_main.php";
    
    // Prepare a select statement
	$department_id=$_GET["department_id"];
    $sql = "SELECT * FROM department WHERE department_id = ".$department_id;
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
		        $department_id = $row["department_id"];
                $department_name = $row["department_name"];
				$description = $row["description"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: department_error.php");
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
    <title>View Department</title>
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
                        <h1>View Department</h1>
                    </div>
					<div class="form-group">
                        <label>Department id</label>
                        <p class="form-control-static"><?php echo $row["department_id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Department Name</label>
                        <p class="form-control-static"><?php echo $row["department_name"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>Description</label>
                        <p class="form-control-static"><?php echo $row["description"]; ?></p>
                    </div>
					
                    <p><a href="..\index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>