<?php
if(isset($_POST['login']))
{
	if ((!empty($_POST['m'])) || (!empty($_POST['n'])))
	{
	include("simple_html_dom.php");
	$x=$_POST['m'];
	$d=$_POST['n'];
	$y=$d;
		$data = array(
"rollno"=> $x,
"wak"=> $y,
"ok"=> "SignIn"
);
function login($url,$data){
    $fp = fopen("cookie.txt", "w");
    fclose($fp);
    $login = curl_init();
    curl_setopt($login, CURLOPT_COOKIEJAR, "cookie.txt");
    curl_setopt($login, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($login, CURLOPT_TIMEOUT, 40000);
    curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($login, CURLOPT_URL, $url);
    curl_setopt($login, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($login, CURLOPT_POST, TRUE);
    curl_setopt($login, CURLOPT_POSTFIELDS, $data);
    ob_start();
    return curl_exec ($login);
    ob_end_clean();
    curl_close ($login);
    unset($login);    
}                  
 

 $res= login("http://studentscorner.vardhaman.org/student_corner_index.php",$data);
 	$html =new simple_html_dom();
	$html->load($res);
	$flag=1;
	foreach($html->find("center") as $link)
	{
		$a=$link->plaintext;
	
		if($a=="Invalid RollNumber/Web Access Key" or $a=="Invalid Web Access Key")
		{
		header("location:alert.html");
         $flag=2;
            break;		 
	        }
	}
	
	
 if($flag==1)
 {
$c=login("http://studentscorner.vardhaman.org/Students_Corner_Frame.php",$data);	 
	$html =new simple_html_dom();
	$html->load($c);
	
	
 $cse="http://resources.vardhaman.org/images/cse/";
 $it="http://resources.vardhaman.org/images/it/";
 $ece="http://resources.vardhaman.org/images/ece/";

 
$ar=str_split($x);

$str="";
if($ar[6]==0)
{
  if($ar[7]==5)
  {
 $str=$cse.$x.".jpg";
 
}
 if($ar[7]==4)
  {
 
$str=$ece.$x.".jpg";

}
}
if($ar[6]==1)
{
 $str=$it.$x.".jpg";

}
	echo "<img src=$str height=140 width=122 style=border: solid 5px #AAAAAA>";
	foreach($html->find("td[colspan=2]") as $link)
	{
	echo $link->plaintext."<br>";
	}
	echo "<hr>";
$c=login("http://studentscorner.vardhaman.org/student_information.php",$data);	 
	$html =new simple_html_dom();
	$html->load($c);
	foreach($html->find("tr[height=25]") as $link)
	{
	echo $link->plaintext."<br>";
	}	
	
	echo "<hr>";
	$c=login("http://studentscorner.vardhaman.org/src_programs/students_corner/CreditRegister/credit_register.php",$data);	 
	$html =new simple_html_dom();
	$html->load($c);
	echo "<table width=160>";
	foreach($html->find("th[colspan=8]") as $link)
	{
		echo "<tr>";
	echo $link->plaintext."<br>";
	echo "</tr>";
	}	
	echo "<hr>";
	$c=login("http://studentscorner.vardhaman.org/student_attendance.php",$data);	 
	$html =new simple_html_dom();
	$html->load($c);
	echo "Attedance Percentage"."<br>";
	foreach($html->find("font[size=5]") as $link)
	{
		
	echo $link->plaintext."<br>";
	
	}	
	 
 }	 
 }
  else
 	echo "<h2>Credentials Required</h2>";
 }
?>
