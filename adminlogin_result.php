<?php
  $dbpassword = $_POST["dbpassword"];
  if($dbpassword == "XXXXX" || $dbpassword == "XXXXX"|| $dbpassword == "XXXXX"){
   $con=mysqli_connect("localhost", "root", $dbpassword, "kku");
   echo "성공";
   echo("<script>location.href='admin.html';</script>");
  }
else {
  echo '<script type="text/javascript">alert("비밀번호가 맞지 않습니다");</script>';
  echo '<script type="text/javascript">history.go(-1);</script>';
}
   
 
 
 
?>
