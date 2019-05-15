<?php
// Include config file
require_once "config_main.php";
    $dispatch_id="";
	$article_no="";
	$dispatch_date="";
	$dispatcher_id="";
	$forwarded_to="";
    
if(isset($_POST["dispatch_id"]) && !empty(trim($_POST["dispatch_id"])))
{
	$dispatch_id=$_POST["dispatch_id"];
	$article_no=$_POST["article_no"];
	$dispatch_date=$_POST["dispatch_date"];
	$dispatcher_id=$_POST["dispatcher_id"];
	$forwarded_to=$_POST["forwarded_to"];
	//echo $dispatch_id."-".$article_no."-".$dispatch_date."-".$dispatcher_id."-".$forwarded_to;
	
    $sql = "UPDATE dispatch_info SET 
        article_no='".$article_no."',
        dispatch_date='".$dispatch_date."',
        dispatcher_id='".$dispatcher_id."',
        forwarded_to='".$forwarded_to."'	
        WHERE dispatch_id=".$dispatch_id;
	//echo $sql;
    if($conn->query($sql)==TRUE)
		
		{			
			//echo $sql;
                //header("location: dispatch_index.php");
                //exit();
        } 
		else{
                echo "Something went wrong. Please try again later.";
				echo $conn->error;            }
      
    
    
    // Close connection
    $conn->close();
}
elseif(isset($_GET["dispatch_id"]) && !empty(trim($_GET["dispatch_id"]))){
	$sql = "SELECT * FROM dispatch_info WHERE dispatch_id = ".$_GET["dispatch_id"];
	//echo $sql;
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
        $dispatch_id=$row["dispatch_id"];
        $article_no=$row["article_no"];
        $dispatch_date=$row["dispatch_date"];
        $dispatcher_id=$row["dispatcher_id"];
        $forwarded_to=$row["forwarded_to"];
        //echo $dispatch_id."-".$article_no."-".$dispatch_date."-".$dispatcher_id."-".$forwarded_to;       
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: dispacth_error.php");
                exit();
            }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($dispatch_id_err)) ? 'has-error' : ''; ?>">
                            <label>Dispatch id</label>
                            <input type="text" name="dispatch_id" class="form-control" value="<?php echo $dispatch_id; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($article_no_err)) ? 'has-error' : ''; ?>">
                            <label>Article No</label>
                            <input type="text" name="article_no" class="form-control" value="<?php echo $article_no; ?>">

                        </div>
						<div class="form-group <?php echo (!empty($dispatch_date_err)) ? 'has-error' : ''; ?>">
                            <label>Dispatch date</label>
                            <input type="date" name="dispatch_date" class="form-control" value="<?php echo $dispatch_date ?>">

                        </div>
						<div class="form-group <?php echo (!empty($dispatcher_id_err)) ? 'has-error' : ''; ?>">
                            <label>Dispatcher ID</label>
                            <input type="text" name="dispatcher_id" class="form-control" value="<?php echo $dispatcher_id; ?>">

                        </div>
                       <div class="form-group <?php echo (!empty($forwarded_to_err)) ? 'has-error' : ''; ?>">
                            <label>Forwarded To</label>
                            <input type="text" name="forwarded_to" class="form-control" value="<?php echo $forwarded_to; ?>">

                        </div>
						
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="dispatch_index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
