<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$dispatch_id = $person_id = $dispatch_date  = $dispatch_time = $dispatched_by = "";
$dispatch_id_err = $person_id_err = $dispatch_date_err = $dispatch_time_err = $dispatched_by_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	// Validate id
    $input_dispatch_id = trim($_POST["dispatch_id"]);
	
    if(empty($input_dispatch_id)){
        $dispatch_id_err = "Please enter id.";
    }// elseif(!filter_var($input_dispatch_id, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $dispatch_id_err = "Please enter a valid id.";
    //}
	else{
        $dispatch_id = $input_dispatch_id;
    }
   // Validate id
    $input_person_id = trim($_POST["person_id"]);
	
    if(empty($input_person_id)){
        $person_id_err = "Please enter person_id.";
    }// elseif(!filter_var($input_person_id, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $person_id_err = "Please enter a valid person_id.";
    //}
	else{
        $person_id = $input_person_id;
    }
     // Validate dispatch date
    $input_dispatch_date = trim($_POST["dispatch_date"]);
	
    if(empty($input_dispatch_date)){
        $dispatch_date_err = "Please enter dispatch_date.";
    }// elseif(!filter_var($input_dispatch_date, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $dispatch_date_err = "Please enter a valid dispatch_date.";
    //}
	else{
        $dispatch_date = $input_dispatch_date;
    }
   
   // Validate dispatch time
    $input_dispatch_time = trim($_POST["dispatch_time"]);
	
    if(empty($input_dispatch_time)){
        $dispatch_time_err = "Please enter dispatch_time.";
    }// elseif(!filter_var($input_dispatch_time, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $dispatch_time_err = "Please enter a valid dispatch_time.";
    //}
	else{
        $dispatch_time = $input_dispatch_time;
    }
    // Validate dispatched_by
    $input_dispatched_by = trim($_POST["dispatched_by "]);
	
    if(empty($input_dispatched_by )){
        $dispatched_by_err = "Please enter dispatched by .";
    }// elseif(!filter_var($input_dispatched_by , FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $dispatched_by _err = "Please enter a valid dispatched_by .";
    //}
	else{
        $dispatched_by  = $input_dispatched_by ;
    }
   
    
	
	
    echo $dispatch_id.$person_id.$dispatch_date.$dispatch_time.$dispatched_by;
	
    // Check input errors before inserting in database
	if(empty($recieved_id_err) &&
      empty($person_id_err) &&
	  empty($dispatch_date_err) &&
	  empty($dispatch_time_err)&&
	  empty($dispatched_by_err) 
	)
	{
        // Prepare an insert statement
        $sql = "INSERT INTO dispatch_info (dispatch_id, person_id ,dispatch_date, dispatch_time, dispatched_by) 
		VALUES (".$dispatch_id.",'".$person_id."','".$dispatch_date."','".$dispatch_time."','".$dispatched_by."')";
         //echo $sql;
            if($res=$conn->query($sql)){
                // Records created successfully. Redirect to landing page
                header("location: dispatch_index.php");
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
                    <p>Please fill this form and submit to add Dispatch record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					 <div class="form-group <?php echo (!empty($dispatch_id_err)) ? 'has-error' : ''; ?>">
                            <label> Dispatch Id</label>
                            <input type="text" name="dispatch_id" class="form-control"><?php echo $dispatch_id; ?>
                            <span class="help-block"><?php echo $dispatch_id_err;?></span>
                        </div>
                       <div class="form-group ">
                            <label>person id</label>
							<select name='person_id' class="form-control <?php echo (!empty($person_id_err)) ? 'has-error' : ''; ?>">
							   
							<?php
							$sql="select person_id from employee";
							$res=$conn->query($sql);
						     if ($res->num_rows > 0){
								 
							
							
							while ($row=$res->fetch_assoc())
							{
								?>
								<option value="<?php echo $row['person_id'];?>"><?php echo $row['person_id'];?></option>
							 <?php }
							 }else
								 echo "no rows found".$conn->error;
							 ?>
							</select>
							
							
                            <span class="help-block"><?php echo $person_id_err;?>
							</span>
							
                        </div>
					   
                        <div class="form-group <?php echo (!empty($dispatch_date_err)) ? 'has-error' : ''; ?>">
                            <label> Dispatch Date</label>
                            <input type="date" name="dispatch_date" class="form-control"><?php echo $dispatch_date; ?>
                            <span class="help-block"><?php echo $dispatch_date_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($dispatch_time_err)) ? 'has-error' : ''; ?>">
                            <label> Dispatch time</label>
                            <input type="text" name="dispatch_time" class="form-control"><?php echo $dispatch_time; ?>
                            <span class="help-block"><?php echo $dispatch_time_err;?></span>
                        </div>
						
						   <div class="form-group <?php echo (!empty($dispatched_by_err)) ? 'has-error' : ''; ?>">
                            <label> Dispatched by</label>
                            <input type="text" name="dispatched_by" class="form-control"><?php echo $dispatched_by; ?>
                            <span class="help-block"><?php echo $dispatched_by_err;?></span>
							</div>
						
						
							
                      
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="dispatch_index.php" class="btn btn-default">Back to Index</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>