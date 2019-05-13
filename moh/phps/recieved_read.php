<?php
// Check existence of id parameter before processing further
$row="";
if(isset($_GET["recieved_id"]) && !empty(trim($_GET["recieved_id"]))){
    // Include teamconfig file
    require_once "config.php";
    echo $_GET["recieved_id"];
    // Prepare a select statement
	$recieved_id=$_GET["recieved_id"];
    $sql = "SELECT * FROM recieved_info WHERE recieved_id = ".$recieved_id;
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
                $recieved_id = $row["recieved_id"];					
                $recieved_date = $row["recieved_date"];
				$recieved_time = $row["recieved_time"];
				$recieved_by = $row["recieved_by"];
			
			
				
				
				
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: recieved_error.php");
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
                        <label>recieved id</label>
                        <p class="form-control-static"><?php echo $row["recieved_id"]; ?></p>
                    </div>
                    
                    <div class="form-group">
                        <label>recieved date</label>
                        <p class="form-control-static"><?php echo $row["recieved_date"]; ?></p>
                    </div>
					
					<div class="form-group">
                        <label>recieved time</label>
                        <p class="form-control-static"><?php echo $row["recieved_time"]; ?></p>
                    </div>
					<div class="form-group">
                        <label>recieved by</label>
                        <p class="form-control-static"><?php echo $row["recieved_by"]; ?></p>
                    </div>
					
					
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

            
   
