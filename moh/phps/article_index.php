<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Letter Tracking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Article Details</h2>
                        <a href="article_create.php" class="btn btn-success pull-right">Add New Entity</a>
                        <a href="../index.php" class="btn btn-success pull-right">Back to Main</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config_main.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM article order by article_no";
					$res=$conn->query($sql);
					$tablestr="";
					if($res->num_rows>0) {  //$mystr=$mystr." world";
                            $tablestr.="<table class='table table-bordered table-striped'>";
                                $tablestr.= "<thead>";
                                    $tablestr.="<tr>";
                           
                                        $tablestr.="<th>Article No</th>";
										$tablestr.="<th>Date</th>";
										$tablestr.="<th>Type</th>";
										$tablestr.="<th>Subject</th>";
                                        $tablestr.="<th>Sender</th>";
                                        $tablestr.="<th>Receiver</th>";
 										$tablestr.="<th>Actions</th>";
                                    $tablestr.="</tr>";
                                $tablestr.="</thead>";
                                $tablestr.="<tbody>";
                                while($row = $res->fetch_assoc()){
                                    $tablestr.= "<tr>";
                                        $tablestr.="<td>" .  $row['article_no'] . "</td>";
										$tablestr.= "<td>" . $row['article_date'] . "</td>";
										$tablestr.= "<td>" . $row['article_type'] . "</td>";
										$tablestr.= "<td>" . $row['article_subject'] . "</td>";
                                        $tablestr.= "<td>" . $row['article_sender'] . "</td>";
                                        $tablestr.= "<td>" . $row['article_receiver'] . "</td>";
										
                                        
                                        $tablestr.="<td>";
                                            $tablestr.="<a href='article_read.php?article_no=". $row['article_no'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            $tablestr.= "<a href='article_update.php?article_no=". $row['article_no'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            $tablestr.= "<a href='article_delete.php?article_no=". $row['article_no'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        $tablestr.= "</td>";
                                    $tablestr.= "</tr>";
                                }
                                $tablestr.= "</tbody>";                            
                            $tablestr.= "</table>";
							echo $tablestr;	
							}
                    else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                    } 
                    // Close connection
                    $conn->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>