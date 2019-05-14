<?php
session_start();
$loggedin="";
if(isset($_SESSION['logged'])&& $_SESSION['logged']='yes')
{
  $loggedin=$_SESSION['logged'];
}


 ?>
<!DOCTYPE html>
<head>
  <title>Letter Management and Tracking System</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="scripts\includehtm.js"></script>
<script language="javascript">
function CheckLogin(modestr) {
     
     username=document.getElementById("username").value;
     password=document.getElementById("password").value;
     mode=modestr;
     var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         var resp_text=this.responseText;
         //alert(resp_text);
         if(resp_text=='loggedin')
         {
          document.getElementById("loginform").style.visibility="hidden";
          document.getElementById("mainmenu").style.visibility="visible";
          document.getElementById("logoutform").style.visibility="visible";
         }
         if(resp_text=='loggedout')
         {
          document.getElementById("loginform").style.visibility="visible";
          document.getElementById("mainmenu").style.visibility="hidden";
          document.getElementById("logoutform").style.visibility="hidden";
         }
         else
        document.getElementById("login_err").style.visibility=resp_text;
         
       }
     };
     xmlhttp.open("GET", "phps/login.php?username=" + username+"&password="+password+"&mode="+mode, true);
     xmlhttp.send();
   }
   
</script>
</head>
<body>

  <div w3-include-html="htmls\header.html"></div>
  <script> includeHTML(); </script>
<div id="mainmenu"  style="visibility: hidden;" w3-include-html="htmls\mainmenu.html"></div>


  <div class="container" style="margin-top:30px">
    <div class="row">
      <div class="col-sm-4">
        <h2>Welcome</h2>
        <h5>Vice Chancellor's Message</h5>
        <div class="fakeimg"><img src="images\vc.jpg" height="100%" width="100%"></div>
        <p align="justify">The Women University Multan aspires to promote distinctive world class education and research to cultivate and enhance students’ global competence by exploring their hidden potentials, skills and creativity needed to combat the challenges of 21st century. The University is also committed to train and educate the females in the functional and friendly environment providing the strongest foundation to build identity.
  
            Dear young females, the world will see you taking off towards bright academic and professional careers contributing in the progress and prosperity of the country side by side with men, as you are second to none.</p>      
        <hr class="d-sm-none">
      </div>
      <div class="col-sm-8">
        <h2>Letter Tracking and Management System</h2>
        <h5>Track and monitor your letters in real time</h5>
        <div  align="center">
            <form class="form-inline"  action="login.php" method="POST" id="loginform">
                <div style="padding:10;"> 
                    <label>User Name</label>
                     <input type="text" id="username" name="username" class="form-control" >
                    <span class="help-block"></span>
                </div>
                
                <div style="padding:10;"> 
                    <label>Password</label>
                     <input type="password" id="password" name="password" class="form-control" >
                    <span class="help-block"></span>
                </div>
                <div style="padding:10;"> 
                    <label>.</label>
                    <button type="button" onclick="CheckLogin('login')" class="btn btn-primary">Login</button> 
                    <span class="help-block" id="login_err">login error is here</span>
                </div>
                
            </form>
          </div>
          <div  align="center">
            <form class="form-inline"  action="logout.php" method="POST" id="logoutform">
                
                <div style="padding:10;"> 
                    <label>.</label>
                    <button type="button" onclick="CheckLogin('logout')" class="btn btn-primary">Logout</button> 
                    <span class="help-block" id="logout_err">logout error is here</span>
                </div>
                
            </form>
          </div>
        <div align="center"><img src="images/filetracking.png" height="40%" width="40%"></div>
        <script> includeHTML(); </script>
          <?php 
          echo "done".$loggedin;
            if ($loggedin=="yes"){
          ?>
            <script language="javascript">
              document.getElementById("loginform").style.visibility="hidden";
              document.getElementById("mainmenu").style.visibility="visible";
        </script>
          <?php     }  ?>

    
        <h4>Introduction</h4>
        <p>File Tracking System - FTS is a web based application to monitor the pendency of receipts and files and assist in their easy tracking. It is an integrated package which has features right from diarizing of receipts/files, updating its status, opening of new files, tracking the movement of the files, dispatch of letters/files and finally records management.</p>
        <br>
        
      </div>
    </div>
  </div>
  
  <div class="jumbotron text-center" style="margin-bottom:0">
      <div w3-include-html="htmls\footer.html"></div>
      <script> includeHTML(); </script>
  </div>
  
  </body>
  </html>
  