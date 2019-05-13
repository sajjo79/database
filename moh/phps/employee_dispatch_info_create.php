<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$person_id = $dispatch_id= "";
$person_id_err = $dispatch_id_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	// Validate person_id
    $input_person_id = trim($_POST["person_id"]);
    if(empty($input_person_id)){
        $person_id_err = "Please enter  id.";     
    } 
	//elseif(!filter_var($input_person_id, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $person_id_err = "Please enter a valid id.";
	//}
	else{
        $person_id = $input_person_id;
    }
	
	// Validate dispatch_id
    $input_dispatch_id = trim($_POST["dispatch_id"]);
    if(empty($input_dispatch_id)){
        $dispatch_id_err = "Please enter id.";     
    } 
	//elseif(!filter_var($input_person_id, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $person_id_err = "Please enter a valid id.";
	//}
	else{
        $dispatch_id = $input_dispatch_id;
    }
	
    
	
    echo $person_id.$dispatch_id;
	
    // Check input errors before inserting in database
    if(
	    empty($person_id_err) &&
		empty($dispatch_id_err)
		){
        // Prepare an insert statement
        $sql = "INSERT INTO employee_dispatch_info(person_id, dispatch_id) 
		VALUES (".$person_id.",'".$dispatch_id."')";
         echo $sql;
            if($res=$conn->query($sql)){
                // Records created successfully. Redirect to landing page
                header("location: employee_dispatch_info_index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.".$conn->error;
            }
			
        }
         
        // Close statement
        $conn->close();
   }
    
    
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       <div class="form-group <?php echo (!empty($person_id_err)) ? 'has-error' : ''; ?>"> 
                            <label>Person id</label>
                            <input type="text" name="person_id" class="form-control" value="<?php echo $person_id; ?>">
                            <span class="help-block"><?php echo $person_id_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($dispatch_id_err)) ? 'has-error' : ''; ?>"> 
                            <label>Dispatch id</label>
                            <input type="text" name="dispatch_id" class="form-control" value="<?php echo $dispatch_id; ?>">
                            <span class="help-block"><?php echo $dispatch_id_err;?></span>
                        </div>
					   
					
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="employee_dispatch_info_index.php" class="btn btn-default">Back to Index</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>