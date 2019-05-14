<?php
// Include config file
require_once "config_main.php";

if(isset($_POST["article_no"]) && !empty(trim($_POST["article_no"])))
{
	$article_no=$_POST["article_no"];
	$article_date=$_POST["article_date"];
	$article_type=$_POST["article_type"];
	$article_subject=$_POST["article_subject"];
    $article_sender=$_POST["article_sender"];
    $article_receiver=$_POST["article_receiver"];
	
	
    $sql = "UPDATE article SET 
	article_date='".$article_date."',
	article_type='".$article_type."',
	article_subject='".$article_subject."',
	article_sender='".$article_sender."',
    article_receiver='".$article_receiver."'
	WHERE article_no=".$article_no;
	//echo $sql;
    if($conn->query($sql)==TRUE)
		{			
			//echo $sql;
                //header("location: article_index.php");
                //exit();
        } 
		else{
                echo "Something went wrong. Please try again later.".$conn->error;
            }
      
    
    
    // Close connection
    $conn->close();
}
elseif(isset($_GET["article_no"]) && !empty(trim($_GET["article_no"]))){
	$sql = "SELECT * FROM article WHERE article_no = ".$_GET["article_no"];
	//echo $sql;-
			
    $res=$conn->query($sql);
	$row = $res->fetch_assoc();
    if($res->num_rows == 1){
                $article_no=$row["article_no"];
				$article_date=$row["article_date"];
				$article_type=$row["article_type"];
				$article_subject=$row["article_subject"];
                $article_sender=$row["article_sender"];
                $article_receiver=$row["article_receiver"];
				
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: article_error.php");
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
                        <div class="form-group <?php echo (!empty($article_no_err)) ? 'has-error' : ''; ?>">
                            <label>Article No</label>
                            <input type="text" name="article_no" class="form-control" value="<?php echo $article_no; ?>">
                        </div>
						<div class="form-group" <?php echo (!empty($article_date_err)) ? 'has-error' : ''; ?>">
                            <label>Article Date</label>
                            <input type="text" name="article_date" class="form-control" value="<?php echo $article_date; ?>">
                        </div>
						<div class="form-group" <?php echo (!empty($article_type_err)) ? 'has-error' : ''; ?>">
                            <label>Article Type</label>
                            <input type="text" name="article_type" class="form-control" value="<?php echo $article_type; ?>">
                        </div>
						<div class="form-group <?php echo (!empty($article_subject_err)) ? 'has-error' : ''; ?>">
                            <label>Article Subject</label>
                            <input type="text" name="article_subject" class="form-control" value="<?php echo $article_subject; ?>">
                        </div>
						<div class="form-group <?php echo (!empty($article_sender_err)) ? 'has-error' : ''; ?>">
                            <label>Article Sender</label>
                            <input type="text" name="article_sender" class="form-control" value="<?php echo $article_sender; ?>">
                        </div>
                        <div class="form-group <?php echo (!empty($article_receiver_err)) ? 'has-error' : ''; ?>">
                            <label>Article Reciever</label>
                            <input type="text" name="article_receiver" class="form-control" value="<?php echo $article_receiver; ?>">
                        </div>
					    						
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="article_index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
</body>
</html>
