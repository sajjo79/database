<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$serial_no = $file_no = $article_date = $article_time = $article_subject = $article_disposal = "";
$serial_no_err = $file_no_err = $article_date_err = $article_time_err = $article_subject_err = $article_disposal_err = "";
$query_error = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	// Validate serial_no
    $input_serial_no = trim($_POST["serial_no"]);
    if(empty($input_serial_no)){
        $serial_no_err = "Please enter serial no.";     
    } 
	//elseif(!filter_var($input_serial_no, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $serial_no_err = "Please enter a valid id.";
	//}
	else{
        $serial_no = $input_serial_no;
    }
	
    // Validate file_no
    $input_file_no = trim($_POST["file_no"]);
	
    if(empty($input_file_no)){
        $file_no_err = "Please enter a file no.";
    }
	//elseif(!filter_var($input_file_no, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $file_no_err = "Please enter a valid file no.";
    //}
	else{
        $file_no = $input_file_no;
    }
	
	// Validate article_date
	$input_article_date = trim($_POST["article_date"]);
	
	if(empty($input_article_date)){
        $article_date_err = "Please enter a article date.";
    }
	//elseif(!filter_var($input_article_date, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $article_date_err = "Please enter a valid article date .";
    //}
	else{
        $article_date = $input_article_date;
    }
	
	// Validate article_time
	$input_article_time = trim($_POST["article_time"]);
	
	if(empty($input_article_time)){
        $article_date_err = "Please enter a article time.";
    }
	//elseif(!filter_var($input_article_time, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $article_time_err = "Please enter a valid article date time .";
    //}
	else{
        $article_date = $input_article_date;
    }
	
	// Validate article_subject
	$input_article_subject = trim($_POST["article_subject"]);
	
	if(empty($input_article_subject)){
        $article_subject_err = "Please enter a article subject.";
    }
	//elseif(!filter_var($input_article_subject, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $article_subject_err = "Please enter a valid article subject .";
    //}
	else{
        $article_subject = $input_article_subject;
    }
	 
	 // Validate article_disposal
	$input_article_disposal = trim($_POST["article_disposal"]);
	
	if(empty($input_article_disposal)){
        $article_disposal_err = "Please enter a article disposal.";
    }
	//elseif(!filter_var($input_article_disposal, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $article_disposal_err = "Please enter a valid article disposal .";
    //}
	else{
        $article_disposal = $input_article_disposal;
    }
	
	
	
	
	
    // Check input errors before inserting in database
    if(
	    empty($department_id_err) &&
		empty($file_no_err)	&&
		empty($article_date_err) &&
		empty($article_time_err) &&
		empty($article_subject_err)	&&
		empty($article_disposal_err) 
		){
         //Prepare an insert statement
        $sql = "INSERT INTO article (serial_no, file_no, article_date, article_time, article_subject, article_disposal) 
		VALUES (".$serial_no.",'".$file_no."','".$article_date."','".$article_time."','".$article_subject."','".$article_disposal."')";
        
		// $conn->query($sql);
            if($res=$conn->query($sql)){
                // Records created successfully. Redirect to landing page
                header("location: article_index.php");
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
                    <p>Please fill this form and submit to add Department record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       <div class="form-group <?php echo (!empty($serial_no_err)) ? 'has-error' : ''; ?>"> 
                            <label>Serial No</label>
                            <input type="text" name="serial_no" class="form-control" value="<?php echo $serial_no; ?>">
                            <span class="help-block"><?php echo $serial_no_err;?></span>
                        </div>
					   <div class="form-group <?php echo (!empty($file_no_err)) ? 'has-error' : ''; ?>"> 
                            <label>File No</label>
                            <input type="text" name="file_no" class="form-control" value="<?php echo $file_no; ?>">
                            <span class="help-block"><?php echo $file_no_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($article_date_err)) ? 'has-error' : ''; ?>"> 
                            <label>Article Date</label>
                            <input type="date" name="article_date" class="form-control" value="<?php echo $article_date; ?>">
                            <span class="help-block"><?php echo $article_date_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($article_time_err)) ? 'has-error' : ''; ?>"> 
                            <label>Article Time </label>
                            <input type="text" name="article_time" class="form-control" value="<?php echo $article_time; ?>">
                            <span class="help-block"><?php echo $article_time_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($article_subject_err)) ? 'has-error' : ''; ?>"> 
                            <label>Article Subject</label>
                            <input type="text" name="article_subject" class="form-control" value="<?php echo $article_subject; ?>">
                            <span class="help-block"><?php echo $article_subject_err;?></span>
                        </div>
						<div class="form-group <?php echo (!empty($article_disposal_err)) ? 'has-error' : ''; ?>"> 
                            <label>Article Disposal</label>
                            <input type="text" name="article_disposal" class="form-control" value="<?php echo $article_disposal; ?>">
                            <span class="help-block"><?php echo $article_disposal_err;?></span>
                        </div>
						
						
					
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="article_index.php" class="btn btn-default">Back to Index</a>
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