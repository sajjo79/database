<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$person_id = $recieved_id= "";
$person_id_err = $recieved_id_err= "";
 
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
	
	// Validate recieved_id
    $input_recieved_id = trim($_POST["recieved_id"]);
    if(empty($input_recieved_id)){
        $recieved_id_err = "Please enter id.";     
    } 
	//elseif(!filter_var($input_person_id, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $person_id_err = "Please enter a valid id.";
	//}
	else{
        $recieved_id = $input_recieved_id;
    }
	
    
	
    echo $person_id.$recieved_id;
	
    // Check input errors before inserting in database
    if(
	    empty($person_id_err) &&
		empty($recieved_id_err)
		){
        // Prepare an insert statement
        $sql = "INSERT INTO employee_recieved_info(person_id, recieved_id) 
		VALUES (".$person_id.",'".$recieved_id."')";
         echo $sql;
            if($res=$conn->query($sql)){
                // Records created successfully. Redirect to landing page
                header("location: employee_recieved_info_index.php");
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
						<div class="form-group <?php echo (!empty($recieved_id_err)) ? 'has-error' : ''; ?>"> 
                            <label>Recieved id</label>
                            <input type="text" name="recieved_id" class="form-control" value="<?php echo $recieved_id; ?>">
                            <span class="help-block"><?php echo $recieved_id_err;?></span>
                        </div>
					   
					
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="employee_recieved_info_index.php" class="btn btn-default">Back to Index</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>