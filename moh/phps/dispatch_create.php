<?php
// Include config file
require_once "config_main.php";
 
// Define variables and initialize with empty values
$dispatch_date = date("d/m/y");
$dispatch_id = $article_no  = $dispatch_time = $dispatched_by = "";
$dispatch_id_err=$article_no_err=$dispatch_date_err=$dispatcher_id_err=$forwarded_to_err=""; 

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
   
    if(empty(trim($_POST["dispatch_id"])))
            {  $dispatch_id_err = "Please enter dispatch id.";   }
    else    {   $dispatch_id = trim($_POST["dispatch_id"]);     }
    echo 'dispatch_id'.trim($_POST["dispatch_id"]);
   
    
    if(empty(trim($_POST["article_no"])))
            {   $article_no_err = "Please enter article no.";  }
    else    {     $article_no = trim($_POST["article_no"]);    }
    echo 'article_no'.trim($_POST["article_no"]);

    if(empty(trim($_POST["dispatch_date"])))
            {  $dispatch_date_err = "Please enter dispatch date."; }
	else    {  $dispatch_date = trim($_POST["dispatch_date"]);   }
    echo 'dispatch_date'.trim($_POST["dispatch_date"]);
   
    if(empty(trim($_POST["dispatcher_id"])))
            {    $dispatcher_id_err = "Please enter dispatch_time.";  }
    else    {    $dispatcher_id = trim($_POST["dispatcher_id"]);     }
    echo 'dispatcher_id'.trim($_POST["dispatcher_id"]);
    
    if(empty(trim($_POST["forwarded_to"])))
            {    $forwarded_to_err = "Please enter destination department or office .";     }
    else    {    $forwarded_to = trim($_POST["forwarded_to"]) ;     }
    echo 'forwarded to'.trim($_POST["forwarded_to"]);
	
    // Check input errors before inserting in database
	if(empty($dispatch_id_err) &&
      empty($article_no_err) &&
	  empty($dispatch_date_err) &&
	  empty($dispatcher_id_err)&&
	  empty($forwarded_to_err ) 
	)
	{
        echo "gong to save";
        // Prepare an insert statement
        $sql = "INSERT INTO dispatch_info (dispatch_id, article_no ,dispatch_date, dispatcher_id, forwarded_to) 
		VALUES (".$dispatch_id.",'".$article_no."','".$dispatch_date."','".$dispatcher_id."','".$forwarded_to."')";
         echo $sql;
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
                        <h2>Dispatch Articles</h2>
                    </div>
                    <p>Please fill this form and submit to add Dispatch record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					 <div class="form-group <?php echo (!empty($dispatch_id_err)) ? 'has-error' : ''; ?>">
                            <label> Dispatch Id</label>
                            <input type="text" name="dispatch_id" class="form-control"><?php echo $dispatch_id; ?>
                            <span class="help-block"><?php echo $dispatch_id_err;?></span>
                        </div>
                       <div class="form-group ">
                            <label>Article No.</label>
							<select name='article_no' class="form-control <?php echo (!empty($article_no_err)) ? 'has-error' : ''; ?>">
							<?php
							$sql="select article_no from article";
							$res=$conn->query($sql);
						     if ($res->num_rows > 0){							
							while ($row=$res->fetch_assoc())
							{
								?>
								<option value="<?php echo $row['article_no'];?>"><?php echo $row['article_no'];?></option>
							 <?php }
							 }else
								 echo "no rows found".$conn->error;
							 ?>
							</select>							
                            <span class="help-block"><?php echo $article_no_err;?>
							</span>
							
                        </div>
					   
                        <div class="form-group <?php echo (!empty($dispatch_date_err)) ? 'has-error' : ''; ?>">
                            <label>Dispatch Date</label>
                            <input type="date" name="dispatch_date" class="form-control" value=<?php echo $dispatch_date ?> ><?php echo $dispatch_date; ?>
                            <span class="help-block"><?php echo $dispatch_date_err;?></span>
                        </div>
                        
                        <div class="form-group <?php echo (!empty($dispatcher_id_err)) ? 'has-error' : ''; ?>">
                            <label> Dispatching Person (Carrier)</label>
                            <select name='dispatcher_id' class="form-control <?php echo (!empty($dispatcher_id_err)) ? 'has-error' : ''; ?>">
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
                
                            <span class="help-block"><?php echo $dispatcher_id_err;?></span>
                        </div>
						
						   <div class="form-group <?php echo (!empty($forwarded_to_err)) ? 'has-error' : ''; ?>">
                            <label> Forwarded To (Department)</label>
                            <select name='forwarded_to' class="form-control <?php echo (!empty($forwarded_id_err)) ? 'has-error' : ''; ?>">
							<?php
							$sql="select department_id from department";
							$res=$conn->query($sql);
						     if ($res->num_rows > 0){							
							while ($row=$res->fetch_assoc())
							{
								?>
								<option value="<?php echo $row['department_id'];?>"><?php echo $row['department_id'];?></option>
							 <?php }
							 }else
								 echo "no rows found".$conn->error;
							 ?>
							</select>
                            <span class="help-block"><?php echo $forwarded_to_err;?></span>
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