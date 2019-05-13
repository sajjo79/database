<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$recieved_id =$person_id = $recieved_date  = $recieved_time = $recieved_by = "";
$recieved_id_err = $person_id_err = $recieved_date_err = $recieved_time_err =$recieved_by_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	// Validate id
    $input_recieved_id = trim($_POST["recieved_id"]);
	
    if(empty($input_recieved_id)){
        $recieved_id_err = "Please enter no.";
    }// elseif(!filter_var($input_recieved_id, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $recieved_id_err = "Please enter a valid no.";
    //}
	else{
        $recieved_id = $input_recieved_id;
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
     // Validate recieved date
    $input_recieved_date = trim($_POST["recieved_date"]);
	
    if(empty($input_recieved_date)){
        $recieved_date_err = "Please enter recieved_date.";
    }// elseif(!filter_var($input_recieved_date, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $recieved_date_err = "Please enter a valid recieved_date.";
    //}
	else{
        $recieved_date = $input_recieved_date;
    }
   
   // Validate time
    $input_recieved_time = trim($_POST["recieved_time"]);
	
    if(empty($input_recieved_time)){
        $recieved_time_err = "Please enter recieved_time.";
    }// elseif(!filter_var($input_recieved_time, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $recieved_time_err = "Please enter a valid recieved_time.";
    //}
	else{
        $recieved_time = $input_recieved_time;
    }
    // Validate recieved_by
    $input_recieved_by = trim($_POST["recieved_by "]);
	
    if(empty($input_recieved_by )){
        $recieved_by_err = "Please enter recieved by .";
    }// elseif(!filter_var($input_recieved_by , FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $recieved_by _err = "Please enter a valid recieved_by .";
    //}
	else{
        $recieved_by  = $input_recieved_by ;
    }
   
    
	
	
    echo $recieved_id.$person_id.$recieved_date.$recieved_time.$recieved_by;
	
    // Check input errors before inserting in database
	if(empty($recieved_id_err) &&
	   empty($person_id_err) &&
	   empty($recieved_date_err) &&
	   empty($recieved_time_err)&&
	   empty($recieved_by_err) 
	)
	{
        // Prepare an insert statement
        $sql = "INSERT INTO recieved_info (recieved_id, person_id, recieved_date, recieved_time, recieved_by) 
		        VALUES (".$recieved_id.",'".$person_id."','".$recieved_date."','".$recieved_time."','".$recieved_by."')";
         //echo $sql;
            if($res=$conn->query($sql)){
                // Records created successfully. Redirect to landing page
                header("location: recieved_index.php");
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
                    <p>Please fill this form and submit to add Receiver record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					 <div class="form-group <?php echo (!empty($recieved_id_err)) ? 'has-error' : ''; ?>">
                            <label> Recieved Id</label>
                            <input type="text" name="recieved_id" class="form-control"><?php echo $recieved_id; ?>
                            <span class="help-block"><?php echo $recieved_id_err;?></span>
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
					   
                        <div class="form-group <?php echo (!empty($recieved_date_err)) ? 'has-error' : ''; ?>">
                            <label>Recieved Date</label>
                            <input type="date" name="recieved_date" class="form-control"><?php echo $recieved_date; ?>
                            <span class="help-block"><?php echo $recieved_date_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($recieved_time_err)) ? 'has-error' : ''; ?>">
                            <label>Recieved time</label>
                            <input type="text" name="recieved_time" class="form-control"><?php echo $recieved_time; ?>
                            <span class="help-block"><?php echo $recieved_time_err;?></span>
                        </div>
						
						   <div class="form-group <?php echo (!empty($recieved_by_err)) ? 'has-error' : ''; ?>">
                            <label>Recieved by</label>
                            <input type="text" name="recieved_by" class="form-control"><?php echo $recieved_by; ?>
                            <span class="help-block"><?php echo $recieved_by_err;?></span>
							</div>
						
						
							
                      
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="recieved_index.php" class="btn btn-default">Back to Index</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>