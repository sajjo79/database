function CheckLogin() {
     
      alert(document.getElementsByName("username").Value);
      
      return;
    
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "login.php?username=" + str, true);
      xmlhttp.send();
    }
  