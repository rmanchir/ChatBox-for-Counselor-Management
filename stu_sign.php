<html>
<body>

<div style="background-color:lightblue; top:20; left:400; position:absolute; z-index:1; font-family:times new roman;">
<h1><i>Vardhaman College of Engineering<i></h1>
</div>	
<h3 id="head1" class="w3-text-green"></h3>  <h3 id="head2" class="w3-text-red"></h3>
<div style="top:220; left:470; position:absolute; z-index:1;">
<form method="POST">
  <h3>
	<b>
	Name: <input name = 'a' type = 'text'>
	<br><br>
	ID Number: <input name = 'b' type = 'text'>
	<br><br>
	Phone Number: <input name = 'c' type = 'text'>
	<br><br>
	Password   : <input name = 'd' type = 'password'>
	<br><br>
	<p>
		<button type="reset">Reset</button>
	    <button type="submit">Sign Up</button>
      <input type="button" value="Back" onClick="javascript:history.go(-1)" />
	</p>
  <br><br><a href="index.html">Go Home</a><br>
	</b>
</h3>
</form>
</div>
</body>
</html>



<?php
$name=$roll=$phn=$pwd="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name=$_POST["a"];
$roll=$_POST["b"];
$phn=$_POST["c"];
$pwd=$_POST["d"];
}
if($phn!=""){
if((!preg_match("/^[0-9]{10}$/",$phn)))
  {
    echo "<script>document.getElementById('head2').innerHTML='Invalid phno';</script>";
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
            $("#head2").fadeOut(5000)
    });
    </script>';
    exit("");
  }


  $con = new mysqli("localhost", "root","","chat");
  $sql = "SELECT roll FROM students";
  $result = $con->query($sql);
  if($result->num_rows>0)
  {
    $c=0;
    while($rows=$result->fetch_assoc())
    {
      if($roll==$rows["roll"])
      {
        echo "<script>document.getElementById('head2').innerHTML='Student already registered.Login using credentials.';</script>";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      	<script>
      	$(document).ready(function(){
      	        $("#head2").fadeOut(5000)
      	});
      	</script>';
        break;
      }
      $c++;
    }

    if($c==$result->num_rows)
    {
      $sql="INSERT into students(name,roll,phn,pwd) values('$name','$roll','$phn','$pwd')";
      if($con->query($sql) == TRUE)
      {
        echo "<script>document.getElementById('head1').innerHTML='Sign_Up Successfull';</script>";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      	<script>
      	$(document).ready(function(){
      	        $("#head1").fadeOut(5000)
      	});
      	</script>';
      }
      else
      {
        echo "<script>document.getElementById('head2').innerHTML='Sign-Up failed.Please try again.';</script>";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      	<script>
      	$(document).ready(function(){
      	        $("#head2").fadeOut(5000)
      	});
      	</script>';
      }
    }
  }
  else
  {
    $sql="INSERT into students(name,roll,phn,pwd) values('$name','$roll','$phn','$pwd')";
      if($con->query($sql) == TRUE)
      {
        echo "<script>document.getElementById('head1').innerHTML='Sign_Up Successfull';</script>";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      	<script>
      	$(document).ready(function(){
      	        $("#head1").fadeOut(5000)
      	});
      	</script>';
      }
      else
      {
        echo "<script>document.getElementById('head2').innerHTML='Sign-Up failed.Please try again.';</script>";
        echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      	<script>
      	$(document).ready(function(){
      	        $("#head2").fadeOut(5000)
      	});
      	</script>';
      }
    }
$x=str_split($roll,8);
$y=$x[1];
$z=$y/20;
if($z>0 && $z<=1)
  $c=1;
elseif($z<=2)
  $c=2;
elseif($z<=3)
  $c=3;
elseif($z<=4)
  $c=4;
elseif($z<=5)
  $c=5;
$sqll="UPDATE students set cousid=$c where roll='$roll'";
$con -> query($sqll);
$sqlll="SELECT name from counsellors where counsid=$c";
$resultt=$con -> query($sqlll);
$rows = $resultt -> fetch_assoc();
$a=str_split($roll,7);
$b=$a[1];
$x=$b.$rows["name"];
$sql="CREATE TABLE $x(name VARCHAR(20),message VARCHAR(50))";
$result=$con->query($sql);
  } 
?>
