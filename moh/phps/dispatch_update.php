<?php
// Include config file
require_once "config.php";

if(isset($_POST["dispatch_id"]) && !empty(trim($_POST["dispatch_id"])))
{
	$dispatch_id=$_POST["dispatch_id"];
	$person_id=$_POST["person_id"];
	$dispatch_date=$_POST["dispatch_date"];
	$dispatch_time=$_POST["distach_time"];
	$dispacthed_by=$_POST["dispacthed_by"];
	
	
    $sql = "UPDATE dispatched_info SET 
	
	dispatch_date='".$dispatch_date."',
	person_id='"$person_id"',
	dispatch_time='".$dispatch_time."',
	dispatched_by='".$dispatched_by."'	
	WHERE dispatch_id=".$dispatch_id;
	//echo $sql;
    if($conn->query($sql)==TRUE)
		
		{			
			//echo $sql;
                //header("location: dispatch_index.php");
                //exit();
        } 
		else{
                echo "Something went wrong. Please try again later.";
				echo $conn->error;            }
      
    
    
    // Close connection
    $conn->close();
}
elseif(isset($_GET["dispatch_id"]) && !empty(trim($_GET["dispatch_id"]))){
	$sql = "SELECT * FROM dispatch_info WHERE dispatch_id = ".$_GET["dispatch_id"];
	//echo $sql;
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
                $dispatch_id=$row["dispatch_id"];
				$person_id=$row["person_id"];
	            $dispatch_date=$row["dispatch_date"];
			    $dispatch_time=$row["dispatch_time"];
	            $dispatched_by=$row["dispatched_by"];
	            
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: dispacth_error.php");
                exit();
            }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($dispatch_id_err)) ? 'has-error' : ''; ?>">
                            <label>Dispatch id</label>
                            <input type="text" name="dispatch_id" class="form-control" value="<?php echo $dispatch_id; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($person_id_err)) ? 'has-error' : ''; ?>">
                            <label>Person id</label>
                            <input type="text" name="person_id" class="form-control" value="<?php echo $person_id; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($dispatch_date_err)) ? 'has-error' : ''; ?>">
                            <label>Dispatch date</label>
                            <input type="text" name="dispatch_date" class="form-control" value="<?php echo $dispatch_date; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($dispatch_time_err)) ? 'has-error' : ''; ?>">
                            <label>Dispatch time</label>
                            <input type="text" name="dispatch_time" class="form-control" value="<?php echo $dispatch_time; ?>">

                        </div>
                       <div class="form-group <?php echo (!empty($dispatched_by_err)) ? 'has-error' : ''; ?>">
                            <label>Dispatched by</label>
                            <input type="text" name="dispatched_by" class="form-control" value="<?php echo $dispatched_by; ?>">

                        </div>
						
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="dispatch_index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
