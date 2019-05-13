<?php
// Include config file
require_once "config_main.php";

if(isset($_POST["department_id"]) && !empty(trim($_POST["department_id"])))
{
	$department_id=$_POST["department_id"];
	$department_name=$_POST["department_name"];
	$description=$_POST["description"];
	
    $sql = "UPDATE department SET 
	department_name='".$department_name."',
	description='".$description."'
	WHERE department_id=".$department_id;
	//echo $sql;
    if($conn->query($sql)==TRUE)
		{			
			//echo $sql;
                header("location: department_index.php");
                //exit();
        } 
		else{
                echo "Something went wrong. Please try again later.".$conn->error;
            }
      
    
    
    // Close connection
    $conn->close();
}
elseif(isset($_GET["department_id"]) && !empty(trim($_GET["department_id"]))){
	$sql = "SELECT * FROM department WHERE department_id = ".$_GET["department_id"];
	//echo $sql;-
			
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
                $department_id=$row["department_id"];
	            $department_name=$row["department_name"];
				$description=$row["description"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: department_error.php");
                exit();
            }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Department</title>
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
                        <h2>Update Department </h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($department_id_err)) ? 'has-error' : ''; ?>">
                            <label>Department id</label>
                            <input type="text" name="department_id" class="form-control" value="<?php echo $department_id; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($department_name_err)) ? 'has-error' : ''; ?>">
                            <label>Department Name</label>
                            <input type="text" name="department_name" class="form-control" value="<?php echo $department_name; ?>">
                        </div>
					    <div class="form-group">
                            <label>Description </label>
                            <input type="text" name="description" class="form-control" value="<?php echo $description; ?>">

                        </div>							
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="department_index.php" class="btn btn-primary">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
</body>
</html>
