<?php
// Include config file
require_once "config.php";

if(isset($_POST["recieved_id"]) && !empty(trim($_POST["recieved_id"])))
{
	$recieved_id=$_POST["recieved_id"];
	$person_id=$_POST["person_id"];
	$recieved_date=$_POST["recieved_date"];
	$recieved_time=$_POST["recieved_time"];
	$recieved_by=$_POST["recieved_by"];
	
	
    $sql = "UPDATE recieved_info SET 
	
	recieved_date='".$recieved_date."',
	person_id='"$person_id"',
	recieved_time='".$recieved_time."',
	recieved_by='".$recieved_by."'
	
	WHERE recieved_id=".$recieved_id;
	//echo $sql;
    if($conn->query($sql)==TRUE)
		
		{			
			//echo $sql;
                //header("location: recieved_index.php");
                //exit();
        } 
		else{
                echo "Something went wrong. Please try again later.";
				echo $conn->error;            }
      
    
    
    // Close connection
    $conn->close();
}
elseif(isset($_GET["recieved_id"]) && !empty(trim($_GET["recieved_id"]))){
	$sql = "SELECT * FROM recieved_info WHERE recieved_id = ".$_GET["recieved_id"];
	//echo $sql;
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
                $recieved_id=$row["recieved_id"];
				$person_id=$row["person_id"];
	            $recieved_date=$row["recieved_date"];
			    $recieved_time=$row["recieved_time"];
	           $recieved_by=$row["recieved_by"];
	            
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: recieved_error.php");
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
                        <div class="form-group <?php echo (!empty($recieved_id_err)) ? 'has-error' : ''; ?>">
                            <label>recieved id</label>
                            <input type="text" name="recieved_id" class="form-control" value="<?php echo $recieved_id; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($person_id_err)) ? 'has-error' : ''; ?>">
                            <label>Person id</label>
                            <input type="text" name="person_id" class="form-control" value="<?php echo $person_id; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($recieved_date_err)) ? 'has-error' : ''; ?>">
                            <label>recieved date</label>
                            <input type="text" name="recieved_date" class="form-control" value="<?php echo $recieved_date; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($recieved_time_err)) ? 'has-error' : ''; ?>">
                            <label>recieved time</label>
                            <input type="text" name="recieved_time" class="form-control" value="<?php echo $recieved_time; ?>">

                        </div>
                       <div class="form-group <?php echo (!empty($recieved_by_err)) ? 'has-error' : ''; ?>">
                            <label>recieved by</label>
                            <input type="text" name="recieved_by" class="form-control" value="<?php echo $recieved_by; ?>">

                        </div>
						
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="recieved_index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
