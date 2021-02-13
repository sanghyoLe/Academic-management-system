<?php
   require_once("./dbconfig.php");
   
   $professorID = $_POST["professorID"];
     
   $sql ="DELETE FROM professor WHERE professorID='".$professorID."'";
   
   $ret = mysqli_query($con, $sql);
 
    
   if($ret) {
	echo '<script type="text/javascript">alert("삭제 완료(데이터는 새로고침 시 갱신됩니다)");</script>';
   echo '<script type="text/javascript">history.go(-2);</script>';
   
    exit();
   }
   else {
	   echo "데이터 삭제 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   } 
   mysqli_close($con);
   
   
?>
