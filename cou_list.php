<?php
  $t=$_GET['id'];
  $con = new mysqli("localhost","root","","chat");
  $sql = "SELECT idnum FROM counsellors where counsid='$t'";
  $result = $con->query($sql);
  if($result->num_rows==1)
  { 
    $rows=$result->fetch_assoc();
    $id=$rows['idnum'];
  }
  echo "<input type='button' value='Back' onClick='javascript:history.go(-1)' />";
  echo "<table border align='center' style='border: 10px solid black;'><tr><th>Roll Number</th><th>Option</th></tr>";
  echo "<caption><h2>List of students for counselling are:</h2></caption>";
  for($x=1;$x<=20;$x++)
  {
    $y=$x+10*($t-1);
    if($y>=10)
  	$z="16881A05".$y;
  	else
  		$z="16881A050".$y;
  	echo "<tr><td><h4>".$z."</td><td><a href='sendchat.php?roll=$id $z'>Chat Private</a></h4></td>";
  }
  echo "</table>";