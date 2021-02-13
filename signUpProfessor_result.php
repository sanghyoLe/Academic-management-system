<?php
   require_once("./dbconfig.php");
   $ProfessorID = $_POST["ProfessorID"];
   $password = $_POST["password"];
   $Residentnumber = $_POST["Residentnumber"];
   $addr = $_POST["addr"];
   $professorName = $_POST["professorName"];
   $major = $_POST["major"];
   $addr = $_POST["addr"];   
   $phoneNumber = $_POST["phoneNumber"];
   $mDate = date("Y-m-j");
   $department = $_POST["department"];
   $lab = $_POST["lab"];
   if($ProfessorID == NULL)
   {
    echo '<script type="text/javascript">alert("아이디를 입력 하지 않았습니다");</script>';
    echo '<script type="text/javascript">history.go(-1);</script>';
    die();
   }
   else if($password == NULL)
   {
      echo '<script type="text/javascript">alert("비밀번호를 입력 하지 않았습니다");</script>';
      echo '<script type="text/javascript">history.go(-1);</script>';
      die();
   }
   else if($Residentnumber == NULL)
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
   else if($professorName == NULL)
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
   else if($phoneNumber == NULL)
   {
      echo '<script type="text/javascript">alert("전화번호를 입력 하지 않았습니다");</script>';
      echo '<script type="text/javascript">history.go(-1);</script>';
      die();
   }
   
   
   $sql =" INSERT INTO professor(ProfessorID,password,residentnumber,major,professorName,phonenumber,addr,mdate,department,lab) VALUES('".$ProfessorID."','".$password."','".$Residentnumber."' ";
   $sql = $sql.",'".$major."','".$professorName."','".$phoneNumber."','".$addr."','".$mDate."','".$department."','".$lab."')";
   
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
