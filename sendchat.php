<html>
<head>
<script>
var y="<?php echo $_GET['roll'] ?>";
 function submitChat() {
    var x=f.t.value;
    if(x=='')
    {
      alert('filling fields is mandatory');
      return;
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("display").innerHTML = this.responseText;
        document.getElementById("i").click();
      }
    };

    xhttp.open("GET", "send.php?msg="+x+"&roll="+y, true);
    xhttp.send();
   }
  setInterval(a,100);
  function a(){
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET","retrieve.php?roll="+y,true);
    xhttp.send(null);
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
       { document.getElementById("display").innerHTML = this.responseText;

}
}
  }
  
  </script>
</head>
<body>
      <form method="get" name="f" ><h3>
        <br>
        Enter Message : <input name = 't' type = 'text' class='msg'>
        <br><br>
    
          <button type="reset" id="i">Reset</button>
          <button type="button" onclick="submitChat()" class="send">Send</button>
          <input type='button' value='Back' onClick='javascript:history.go(-1)' />
          <a href="logout.php">Logout</a></h3><h4>
          <div class="container" id ="display"></div></h4>  
      
          </form>
</body>
</html>