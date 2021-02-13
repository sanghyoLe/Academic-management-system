<?php
require_once("./dbconfig.php");
   $studentNumber = $_POST["studentNumber"];
   $studentName = $_POST["studentName"];
   $major = $_POST["major"];
   $addr = $_POST["addr"];
   $phonenumber = $_POST["phonenumber"];
     
   $mDate = $_POST["mDate"]; 
   
   $sql ="UPDATE student SET studentName='".$studentName;
   $sql = $sql."', major='".$major."', addr='".$addr."',phonenumber='".$phonenumber;
   $sql = $sql."', mDate='".$mDate."' WHERE studentNumber='".$studentNumber."'";
   
   $ret = mysqli_query($con, $sql);
 
    
   if($ret) {
	   echo '<script type="text/javascript">alert("수정 완료");</script>';
      echo '<script type="text/javascript">history.go(-2);</script>';
      exit();
   }
   else {
	   echo "데이터 수정 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   } 
   mysqli_close($con);
   
   
?>
