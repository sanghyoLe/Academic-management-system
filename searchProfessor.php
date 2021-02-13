<?php
   require_once("./dbconfig.php");

   $sql ="SELECT * FROM professor";
 
   $ret = mysqli_query($con, $sql);   
   if($ret) {
	   $count = mysqli_num_rows($ret);
   }
   else {
	   echo "professor 데이터 검색 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   exit();
   } 
   echo "<style>
   table {
     width: 100%;
     border: 2px solid #444444;
     border-collapse: collapse;
   }
   th, td {
     border: 1px solid #444444;
     padding: 10px;
   }
 </style>";
   echo "<h1 align=center> 회원 검색 결과 </h1>";
   echo "<TABLE border=1>";
   echo "<TR>";
   echo "<TH>아이디</TH><TH>이름</TH><TH>전화번호</TH><TH>주소</TH><TH>전공</TH>";
   echo "<TH>학부</TH><TH>연구실</TH><TH>가입일</TH><TH>수정</TH><TH>삭제</TH>";
   echo "</TR>";
   
   while($row = mysqli_fetch_array($ret)) {
	  echo "<TR>";
	  echo "<TD>", $row['professorID'], "</TD>";
	  echo "<TD>", $row['professorName'], "</TD>";
	  echo "<TD>", $row['Phonenumber'], "</TD>";
	  echo "<TD>", $row['addr'], "</TD>";
	  echo "<TD>", $row['major'], "</TD>";
	  echo "<TD>", $row['department'], "</TD>";
	  echo "<TD>", $row['lab'], "</TD>";
	  echo "<TD>", $row['mDate'], "</TD>";
	  echo "<TD>", "<a href='updateProfessor.php?professorID=", $row['professorID'], "'>수정</a></TD>";
	  echo "<TD>", "<a href='deleteProfessor.php?professorID=", $row['professorID'], "'>삭제</a></TD>";
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

