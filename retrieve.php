<?php 
          $msg=$a=$m=$n=$x=$s2=$s1=$x1=$s3=$s4="";
          $con=new mysqli("localhost","root","","chat");
          $a=$_GET['roll'];
          $m=str_split($a,2);
          $n=$m[1];
          if($n=="88")
          {
            $b=str_split($a,7);
            $s1=$b[1];
            $sql="SELECT name,cousid from students where roll='$a'";
            $result = $con->query($sql);
            if($result->num_rows==1)
            { 
              $rows=$result->fetch_assoc();
              if($rows['cousid']!=0)
              {
                $x=$rows['cousid'];
                $x1=$rows['name'];
              }
            }
            $sql="SELECT name from counsellors where counsid='$x'";
            $result=$con->query($sql);
            if($result->num_rows==1)
            {
              $rows=$result->fetch_assoc();
              $s2=$rows['name'];
            }
            $z=$s1.$s2;
            $sql="SELECT * from $z";
            if(($result=$con->query($sql))==TRUE)
            {
              while($rows=$result->fetch_assoc())
              {
                echo $rows['name']." : ".$rows['message']."<br>";
              }
            }
          }
          else
          {
          $b=str_split($a,11);
          $s3=$b[1];
          $s4=str_split($s3,7);
          $s1=$s4[1];
          $sql="SELECT name,cousid from students where roll='$s3'";
          $result = $con->query($sql);
          if($result->num_rows==1)
          { 
            $rows=$result->fetch_assoc();
            if($rows['cousid']!=0)
            {
              $x=$rows['cousid'];
              $x1=$rows['name'];
            }
          }
          $sql="SELECT name from counsellors where counsid='$x'";
          $result=$con->query($sql);
          if($result->num_rows==1)
          {
            $rows=$result->fetch_assoc();
            $s2=$rows['name'];
          }
          $z=$s1.$s2;
          $sql="SELECT * from $z";
          if(($result=$con->query($sql))==TRUE)
            {
              while($rows=$result->fetch_assoc())
              {
                echo $rows['name']." : ".$rows['message']."<br>";
              }
            }
          }
        ?>