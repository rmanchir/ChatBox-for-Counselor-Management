<html>
<body>
<div style="background-color:lightblue; top:20; left:460; position:absolute; z-index:1; font-family:times new roman;">
<h1><i>Vardhaman College of Engineering<i></h1>
</div>
<br><br><br><br>
<h3>
<br><br><br><br>
<h3 id="head1" class="w3-text-green"></h3>  <h3 id="head2" class="w3-text-red"></h3>


<?php
$roll=$pwd="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$roll=$_POST["a"];
$pwd=$_POST["b"];
}
if($roll!="")
{
  $con = new mysqli("localhost","root","","chat");
  $sql = "SELECT pwd FROM students where roll='$roll'";
  $result = $con->query($sql);
  if($result->num_rows==1)
  { 
    $rows=$result->fetch_assoc();
    if($rows['pwd']==$pwd)
    {
      $_SESSION['roll']=$roll;
      echo "<table cellpadding='5' border height='40' width='300' align='center' style='border: 5px solid black;'>";
      echo "<tr><th><a href='index1.html'><h3>Student Information</h3></a></th>
      <th><a href='sendchat.php?roll=$roll'><h3>Chat</h3></a></th></tr><tr><th colspan='2'><a href='logout.php'><h3>Logout</h3></a></th></tr>";
    }
    else
    {
      echo "<script>document.getElementById('head2').innerHTML='Invalid password';</script>";
      echo '<script src="jquery.js"></script>
      <script>
      $(document).ready(function(){
              $("#head2").fadeOut(5000)
      });
      </script>';
    }
  }
  else
  {
    echo "<script>document.getElementById('head2').innerHTML='Invalid Roll Number';</script>";
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
            $("#head2").fadeOut(5000)
    });
    </script>';
    exit("");
  }
}
?> 


</body>
</html>