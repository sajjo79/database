<?php
// Include config file
require_once "config_main.php";
 
// Define variables and initialize with empty values
$department_id = $department_name = $input_description = "";
$department_id_err = $department_name_err = "";
$query_error = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	// Validate department_id
    $input_department_id = trim($_POST["department_id"]);
    if(empty($input_department_id)){
        $department_id_err = "Please enter department id.";     
    } 
	elseif(!is_numeric($input_department_id)){
        $department_id_err = "Please enter a numeric id for department.";
	}
	else{
        $department_id = $input_department_id;
    }
	
    // Validate department_name
    $input_department_name = trim($_POST["department_name"]);
	
    if(empty($input_department_name)){
        $department_name_err = "Please enter a department name.";
    }
	//elseif(!filter_var($input_department_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $department_name_err = "Please enter a valid department name.";
    //}
	else{
        $department_name = $input_department_name;
    }
	
	// Validate description
	$input_description = trim($_POST["description"]);
	
	
	
	
	
	
    // Check input errors before inserting in database
    if(
	    empty($department_id_err) &&
		empty($department_name_err)		
		){
         //Prepare an insert statement
        $sql = "INSERT INTO department (department_id, department_name, description) 
		VALUES (".$department_id.",'".$department_name."','".$input_description."')";
        
		// $conn->query($sql);
            if($res=$conn->query($sql)){
                // Records created successfully. Redirect to landing page
                header("location: department_index.php");
               exit();
            } else{
                $query_error = "Something went wrong. Please try again later.".$conn->error;
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
    <div class="wrapper" style="background-color: MediumSeaGreen;>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2 align="center">Add New Department</h2>
                    </div>
                    <p align="center">Please fill this form and submit to add Department record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       <div class="form-group <?php echo (!empty($department_id_err)) ? 'has-error' : ''; ?>"> 
                            <label>Department id</label>
                            <input type="text" name="department_id" class="form-control" value="<?php echo $department_id; ?>">
                            <span class="help-block"><?php echo $department_id_err;?></span>
                        </div>
					   <div class="form-group <?php echo (!empty($department_name_err)) ? 'has-error' : ''; ?>"> 
                            <label>Department Name</label>
                            <input type="text" name="department_name" class="form-control" value="<?php echo $department_name; ?>">
                            <span class="help-block"><?php echo $department_name_err;?></span>
                        </div>
						<div class="form-group"> 
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="<?php echo $input_description; ?>">
                            <span class="help-block"></span>							
                        </div>
						
                        <div align="center">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="..\index.php?loggedin=true" class="btn btn-primary">Back to Index</a>
    </div>
						<div class="form-group"	>
							<?php echo $query_error;?>
						
						</div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>