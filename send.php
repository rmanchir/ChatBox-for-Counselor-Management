<?php
session_start();
echo "hello";
$msg=$a=$m=$n=$x=$s2=$s1=$x1=$s3=$s4="";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["msg"])) {
$msg=$_GET["msg"];
}
//$msg="hel";
$a=$_GET["roll"];
$m=str_split($a,2);
$n=$m[1];
if($n=="88")
{
  $b=str_split($a,7);
  $s1=$b[1];
  $con=new mysqli("localhost","root","","chat");
  $sql="SELECT name,cousid from students where roll='$a'";
  $result = $con->query($sql);
  if($result->num_rows==1)
  { 
    $rows=$result->fetch_assoc();
    if($rows['cousid']!=0)
      $x=$rows['cousid'];
      $x1=$rows['name'];

  }
  $sql="SELECT name from counsellors where counsid='$x'";
  $result=$con->query($sql);
  if($result->num_rows==1)
  {
    $rows=$result->fetch_assoc();
    $s2=$rows['name'];
  }
  $z=$s1.$s2;
  if($msg!=""){
  $sql="INSERT into $z values('$x1','$msg')";
  if($con->query($sql)==TRUE)
  {

  }
  else
  {
    $sql="CREATE TABLE $z(name VARCHAR(20),message VARCHAR(50))";
    $con->query($sql);
    $sql="INSERT into $z values('$x1','$msg')";
    $con->query($sql);
  }
}
}
else
{
  $b=str_split($a,11);
  $s3=$b[1];
  $s4=str_split($s3,7);
  $s1=$s4[1];
  $con=new mysqli("localhost","root","","chat");
  $sql="SELECT name,cousid from students where roll='$s3'";
  $result = $con->query($sql);
  if($result->num_rows==1)
  { 
    $rows=$result->fetch_assoc();
    if($rows['cousid']!=0)
      $x=$rows['cousid'];
      $x1=$rows['name'];
  }
  $sql="SELECT name from counsellors where counsid='$x'";
  $result=$con->query($sql);
  if($result->num_rows==1)
  {
    $rows=$result->fetch_assoc();
    $s2=$rows['name'];
  }
  $z=$s1.$s2;
  if($msg!=""){
  $sql="INSERT into $z values('$s2','$msg')";
  if($con->query($sql)==TRUE)
  {

  }
  else
  {
    $sql="CREATE TABLE $z(name VARCHAR(20),message VARCHAR(50))";
    $con->query($sql);
    $sql="INSERT into $z values('$s2','$msg')";
    $con->query($sql);
  }
}
}
?>