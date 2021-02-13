<?php
   require_once("./dbconfig.php");

   $professorID = $_POST["professorID"];
   $professorName = $_POST["professorName"];
   $Phonenumber = $_POST["Phonenumber"];
   $addr = $_POST["addr"];
   $lab = $_POST["lab"];
   $major = $_POST["major"];
   
   $mDate = $_POST["mDate"]; 
   
   $sql ="UPDATE professor SET professorName='".$professorName."', Phonenumber=".$Phonenumber;
   $sql = $sql.", addr='".$addr."', lab='".$lab."',major='".$major;
   $sql = $sql."', mDate='".$mDate."' WHERE professorID='".$professorID."'";
   
   $ret = mysqli_query($con, $sql);
 
    
   if($ret) {
    echo '<script type="text/javascript">alert("수정 완료(데이터는 새로고침 시 갱신됩니다)");</script>';
    echo '<script type="text/javascript">history.go(-2);</script>';
    
    exit();
   }
   else {
	   echo "데이터 수정 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   } 
   mysqli_close($con);
   
   
?>
