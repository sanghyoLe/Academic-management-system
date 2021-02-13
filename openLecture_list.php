<?php
   require_once("./dbconfig.php");
   $sql ="SELECT * FROM openedLecture";
 
   $ret = mysqli_query($con, $sql);   
   if($ret) {
	   $count = mysqli_num_rows($ret);
   }
   else {
	   echo "openedLecture 데이터 검색 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   exit();
   } 
   echo "<style>
   table {
       font-size: 12px;
       width: 100%;
       border: 2px solid #444444;
       border-collapse: collapse;
       text-align:center;
   }
   th, td {
       border: 1px solid #444444;
       padding: 10px;
   }
   
   </style>";
   echo "<h1 align=center> 개설 강좌 목록 </h1>";
   echo "<TABLE border=1>";
   echo "<TR>";
   echo "<TH>이수구분 </TH><TH>과목번호</TH><TH>정원 </TH><TH>언어구분 </TH><TH>수강학부 </TH>";
   echo "<TH>시간 </TH><TH>학점 </TH><TH>과목명 </TH><TH>담당교수 </TH><TH>학년 </TH><TH>삭제</TH>";
   echo "</TR>";
   
   while($row = mysqli_fetch_array($ret)) {
	  echo "<TR>";
	  echo "<TD>", $row['classiFication'], "</TD>";
	  echo "<TD>", $row['lectureNumber'], "</TD>";
	  echo "<TD>", $row['PersonLimit'], "</TD>";
	  echo "<TD>", $row['Language'], "</TD>";
	  echo "<TD>", $row['department'], "</TD>";
	  echo "<TD>", $row['lectureTime'], "</TD>";
	  echo "<TD>", $row['gradePoint'], "학점</TD>";
	  echo "<TD>", $row['lectureName'], "</TD>";
      echo "<TD>", $row['professor'], "</TD>";
      echo "<TD>", $row['grade'], "학년</TD>";
      echo "<TD>", "<a href='deleteLecture.php?lectureNumber=", $row['lectureNumber'], "'>삭제</a></TD>";
	  echo "</TR>";	  
   }   
   mysqli_close($con);
   echo "</TABLE>"; 
 
?>

<html>
   <head>
      <style>
         .btn-login{
      background-color: #179e3f;
      border-color: #179e3f;
      border-width: 0;
      color: #FFFFFF;
      display: block;
      margin: 0 auto;
      padding: 15px 50px;
      text-transform: uppercase;
      width: 20%;
  }
  .btn-login:hover, .registerBox .btn-register:hover{
    background-color: #14cc2d;
    color: #FFFFFF;
}
  </style>
   </head>
   <body>
      <br><br>
   <form action ="./admin.html">
   <input class="btn btn-default btn-login" type="submit" value="관리자 화면으로">
    </form>
</body>
</html>

