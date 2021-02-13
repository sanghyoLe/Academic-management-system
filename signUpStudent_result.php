<?php
   require_once("./dbconfig.php");
   $studentNumber = $_POST["studentNumber"];
   $password = $_POST["password"];
   $ResidentNumber = $_POST["ResidentNumber"];
   $addr = $_POST["addr"];
   $studentName = $_POST["studentName"];
   $major = $_POST["major"];
   $phonenumber = $_POST["phonenumber"];
   $mDate = date("Y-m-j");
   $department = $_POST['department'];
   
   if($studentNumber == NULL)
   {
    echo '<script type="text/javascript">alert("학번을 입력 하지 않았습니다");</script>';
    echo '<script type="text/javascript">history.go(-1);</script>';
    die();
   }
   else if((strlen($studentNumber)) != 9)
   {
    
    echo '<script type="text/javascript">alert("학번은 숫자 9자리입니다.");</script>';
    echo '<script type="text/javascript">history.go(-1);</script>';
    die();
    
   }
   else if($password == NULL)
   {
      echo '<script type="text/javascript">alert("비밀번호를 입력 하지 않았습니다");</script>';
      echo '<script type="text/javascript">history.go(-1);</script>';
      die();
   }
   else if($ResidentNumber == NULL)
   {
      echo '<script type="text/javascript">alert("생년월일을 입력 하지 않았습니다");</script>';
      echo '<script type="text/javascript">history.go(-1);</script>';
      die();
   }
   else if($addr == NULL)
   {
      echo '<script type="text/javascript">alert("주소를 입력 하지 않았습니다");</script>';
      echo '<script type="text/javascript">history.go(-1);</script>';
      die();
   }
   else if($studentName == NULL)
   {
      echo '<script type="text/javascript">alert("이름을 입력 하지 않았습니다");</script>';
      echo '<script type="text/javascript">history.go(-1);</script>';
      die();
   }
   else if($major == NULL)
   {
      echo '<script type="text/javascript">alert("전공을 입력 하지 않았습니다");</script>';
      echo '<script type="text/javascript">history.go(-1);</script>';
      die();
   }
   else if($phonenumber == NULL)
   {
      echo '<script type="text/javascript">alert("전화번호를 입력 하지 않았습니다");</script>';
      echo '<script type="text/javascript">history.go(-1);</script>';
      die();
   }
   
   
   
   
   $sql =" INSERT INTO student(studentNumber,password,ResidentNumber,addr,major,studentName,phonenumber,mDate,department) VALUES('".$studentNumber."','".$password."','".$ResidentNumber."' ";
   $sql = $sql.",'".$addr."','".$major."','".$studentName."','".$phonenumber."','".$mDate."','".$department."')";
   
   $ret = mysqli_query($con, $sql);
 
    
   if($ret) {
	   echo '<script type="text/javascript">alert("회원가입 완료");</script>';
      echo '<script type="text/javascript">history.go(-1);</script>';
   }
   else {
	   echo "데이터 입력 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   } 
   mysqli_close($con);
   
   
?>
