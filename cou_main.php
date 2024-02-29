<!DOCTYPE html>
<html>
<body>
<h1><i>Vardhaman College of Engineering<i></h1>
<br><br><br><br>
<h3><a href="logout.php">Logout</a></h3>
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
  $sql = "SELECT counsid,password FROM counsellors where idnum='$roll'";
  $result = $con->query($sql);
  if($result->num_rows==1)
  { 
    $rows=$result->fetch_assoc();
    if($rows['password']==$pwd)
    {
      session_start();
      $_SESSION['idnum']=$roll;
      echo "<h3><a href='index1.html'>Counsellor Information</a></h3>";
      $t=$rows['counsid'];
      echo "<h3><a href='cou_list.php?id=$t'>View list of Students</a></h3>";
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