<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$serial_no = $person_id = $input_description = "";
$serial_no_err = $person_id_err = $input_description_err"";
$query_error = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	// Validate serial_no
    $input_serial_no = trim($_POST["serial_no"]);
    if(empty($input_serial_no)){
        $serial_no_err = "Please enter serial no.";     
    } 
	//elseif(!filter_var($input_serial_no, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $serial_no_err = "Please enter a valid serial no.";
	//}
	else{
        $serial_no = $input_serial_no;
    }
	
    // Validate person_id
    $input_person_id = trim($_POST["person_id"]);
	
    if(empty($input_person_id)){
        $person_id_err = "Please enter a person id .";
    }
	//elseif(!filter_var($input_person_id, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $person_id_err = "Please enter a valid person id.";
    //}
	else{
        $person_id = $input_person_id;
    }
	
	// Validate description
	$input_description = trim($_POST["description"]);
	
	
	
	
	
	
	
    // Check input errors before inserting in database
    if(
	    empty($serial_no_err) &&
		empty($person_id_err) &&
		
		){
         //Prepare an insert statement
        $sql = "INSERT INTO article_employee (serial_no, person_id, description) 
		VALUES (".$serial_no.",'".$person_id."','".$input_description."')";
        
		// $conn->query($sql);
            if($res=$conn->query($sql)){
                // Records created successfully. Redirect to landing page
                header("location: article_department_index.php");
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
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add Article_Department record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       <div class="form-group <?php echo (!empty($serial_no_err)) ? 'has-error' : ''; ?>"> 
                            <label>Serial No</label>
                            <input type="text" name="serial_no" class="form-control" value="<?php echo $serial_no; ?>">
                            <span class="help-block"><?php echo $serial_no_err;?></span>
                        </div>
					   <div class="form-group <?php echo (!empty($person_id_err)) ? 'has-error' : ''; ?>"> 
                            <label>Person ID</label>
                            <input type="text" name="person_id" class="form-control" value="<?php echo $person_id; ?>">
                            <span class="help-block"><?php echo $person_id_err;?></span>
                        </div>

						<div class="form-group"> 
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="<?php echo $input_description; ?>">
                            <span class="help-block"></span>							
                        </div>
						
					
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="article_department_index.php" class="btn btn-default">Back to Index</a>
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