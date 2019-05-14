<?php
// Include config file
require_once "config_main.php";
 
// Define variables and initialize with empty values
$article_no = $article_type = $article_date =  $article_subject = $article_sender = $article_receiver= "";
$article_no_err = $article_type_err = $article_date_err =  $article_subject_err = $article_sender_err =$article_receiver_err = "";
$query_error = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	// Validate serial_no
    $input_article_no = trim($_POST["article_no"]);
    if(empty($input_article_no)){
        $article_no_err = "Please enter article no.";     
    } 
	//elseif(!filter_var($input_serial_no, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $serial_no_err = "Please enter a valid id.";
	//}
	else{
        $article_no = $input_article_no;
    }
	
    // Validate file_no
    $article_type = trim($_POST["article_type"]);
	
    if(empty($article_type)){
        $article_type_err = "Please select article type.";
    }
	//elseif(!filter_var($input_file_no, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
       // $file_no_err = "Please enter a valid file no.";
    //}

	
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
	 
	 // Validate article_sender
	$input_article_sender = trim($_POST["article_sender"]);
	if(empty($input_article_sender)){  $article_sender_err = "Please enter a article sender.";   }
	else {    $article_sender = $input_article_sender;   }
    
     // Validate article_receiver
	$input_article_receiver = trim($_POST["article_receiver"]);
	if(empty($input_article_receiver)){  $article_receiver_err = "Please enter a article receiver.";   }
	else {    $article_receiver = $input_article_receiver;   }
	
	
    // Check input errors before inserting in database
    if(
	    empty($department_id_err) &&
		empty($file_no_err)	&&
		empty($article_date_err) &&
		empty($article_type_err) &&
        empty($article_subject_err)	&&
        empty($article_sender_err)	&&
		empty($article_receiver_err) 
		){
         //Prepare an insert statement
        $sql = "INSERT INTO article (article_no, article_date, article_type, article_subject, article_sender, article_receiver) 
		VALUES (".$article_no.",'".$article_date."','".$article_type."','".$article_subject."',".$article_sender.",".$article_receiver.")";
       
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
    <title>Create New Article</title>
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
                        <h2>Create New Article</h2>
                    </div>
                    <p>Please fill the following form to create new article</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       <div class="form-group" <?php echo (!empty($article_no_err)) ? 'has-error' : ''; ?>"> 
                            <label>Article No</label>
                            <input type="text" name="article_no" class="form-control" value="<?php echo $article_no; ?>">
                            <span class="help-block"><?php echo $article_no_err;?></span>
                        </div>
					   <div class="form-group" <?php echo (!empty($article_type_err)) ? 'has-error' : ''; ?>"> 
                            <label>Article Type</label>
                            <select name='article_type' class="form-control" value="<?php echo $article_type; ?>">
							    <option value="Application"> Applicaiton</option>
								<option value="LetterResponse"> Letter Response </option>
								<option value="InformationRequested"> Information Requested</option>
                                </select>
                            <span class="help-block"><?php echo $article_type_err;?></span>
                        </div>
						<div class="form-group" <?php echo (!empty($article_date_err)) ? 'has-error' : ''; ?>"> 
                            <label>Article Date</label>
                            <input type="date" name="article_date" class="form-control" value="<?php echo $article_date; ?>">
                            <span class="help-block"><?php echo $article_date_err;?></span>
                        </div>
						<div class="form-group" <?php echo (!empty($article_subject_err)) ? 'has-error' : ''; ?>"> 
                            <label>Article Subject</label>
                            <input type="text" name="article_subject" class="form-control" value="<?php echo $article_subject; ?>">
                            <span class="help-block"><?php echo $article_subject_err;?></span>
                        </div>
                        <div class="form-group" <?php echo (!empty($article_sender_err)) ? 'has-error' : ''; ?>"> 
                            <label>Sender</label>
                            <select name='article_sender' class="form-control <?php echo (!empty($article_sender_err)) ? 'has-error' : ''; ?>">
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
                            <span class="help-block"><?php echo $article_sender_err;?></span>
                        </div>
                        <div class="form-group" <?php echo (!empty($article_receiver_err)) ? 'has-error' : ''; ?>"> 
                            <label>Reveiver</label>
                            <select name='article_receiver' class="form-control <?php echo (!empty($article_receiver_err)) ? 'has-error' : ''; ?>">
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
                            <span class="help-block"><?php echo $article_receiver_err;?></span>
                        </div>	
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="..\index.php?loggedin=true" class="btn btn-primary">Back to Main</a>
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