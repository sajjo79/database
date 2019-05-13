<?php
// Include config file
require_once "config.php";

if(isset($_POST["serial_no"]) && !empty(trim($_POST["serial_no"])))
{
	$serial_no=$_POST["serial_no"];
	$person_id=$_POST["person_id"];
	$remarks=$_POST["remarks"];
	$description=$_POST["description"];
	
    $sql = "UPDATE article_employee SET 
	person_id='".$person_id."',
	remarks='".$remarks."',
	description='".$description."'
	WHERE serial_no=".$serial_no;
	//echo $sql;
    if($conn->query($sql)==TRUE)
		{			
			//echo $sql;
                //header("location: article_employee_index.php");
                //exit();
        } 
		else{
                echo "Something went wrong. Please try again later.";
            }
      
    
    
    // Close connection
    $conn->close();
}
elseif(isset($_GET["serial_no"]) && !empty(trim($_GET["serial_no"]))){
	$sql = "SELECT * FROM article_employee WHERE serial_no = ".$_GET["serial_no"];
	//echo $sql;-
			
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
                $serial_no=$row["serial_no"];
	            $person_id=$row["person_id"];
				$remarks=$row["remarks"];
				$description=$row["description"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: article_employee_error.php");
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
                        <div class="form-group <?php echo (!empty($serial_no_err)) ? 'has-error' : ''; ?>">
                            <label>Serial No</label>
                            <input type="text" name="serial_no" class="form-control" value="<?php echo $serial_no; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($person_id_err)) ? 'has-error' : ''; ?>">
                            <label>Person ID</label>
                            <input type="text" name="person_id" class="form-control" value="<?php echo $person_id; ?>">
                        </div>
						<div class="form-group">
                            <label>Remarks </label>
                            <input type="text" name="remarks" class="form-control" value="<?php echo $remarks; ?>">

                        </div>		
					    <div class="form-group">
                            <label>Description </label>
                            <input type="text" name="description" class="form-control" value="<?php echo $description; ?>">

                        </div>							
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="article_employee_index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
</body>
</html>
