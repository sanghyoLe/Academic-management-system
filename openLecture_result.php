<?php
   require_once("./dbconfig.php");
  $lectureNumber = $_POST['lectureNumber'];
  $classiFication = $_POST['classiFication'];
  $PersonLimit = $_POST['PersonLimit'];
  $Language = $_POST['Language'];
  $department = $_POST['department'];
  $lectureTime = $_POST['lectureTime'];
  $lectureName = $_POST['lectureName'];
  $gradePoint = $_POST['gradePoint'];
  $professor = $_POST['professor'];
  $grade = $_POST['grade'];

   if($lectureNumber == NULL)
   {
    echo '<script type="text/javascript">alert("과목번호를 입력 하지 않았습니다");</script>';
    echo '<script type="text/javascript">history.go(-1);</script>';
    die();
   }
   else if($lectureName == NULL)
   {
      echo '<script type="text/javascript">alert("과목명을 입력 하지 않았습니다");</script>';
      echo '<script type="text/javascript">history.go(-1);</script>';
      die();
   }
   $sql =" INSERT INTO openedlecture(lectureNumber,classiFication,PersonLimit,Language,department,lectureTime,gradePoint,lectureName,professor,grade) VALUES('".$lectureNumber."','".$classiFication."','".$PersonLimit."' ";
   $sql = $sql.",'".$Language."','".$department."','".$lectureTime."',".$gradePoint.",'".$lectureName."','".$professor."','".$grade."')";
   
   $ret = mysqli_query($con, $sql);
 
 
   if($ret) {
      echo '<script type="text/javascript">alert("과목 개설 완료");</script>';
      echo '<script type="text/javascript">history.go(-1);</script>';
   }
   else {
	   echo "과목 개설 실패!!!"."<br>";
      echo "실패 원인 :".mysqli_error($con);
      echo "<br> <a href='main2.html'> <--초기 화면</a> ";
   } 
   mysqli_close($con);
   
   
?>
