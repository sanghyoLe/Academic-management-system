<?php
   require_once("./dbconfig.php");
   
   $studentNumber = $_POST["studentNumber"];
     
   $sql ="DELETE FROM student WHERE studentNumber='".$studentNumber."'";
   
   $ret = mysqli_query($con, $sql);
 
    
   if($ret) {
      echo '<script type="text/javascript">alert("삭제 완료(데이터는 새로고침 시 갱신됩니다)");</script>';
      echo '<script type="text/javascript">history.go(-2);</script>';
   }
   else {
	   echo "데이터 삭제 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   } 
   mysqli_close($con);
   

?>
