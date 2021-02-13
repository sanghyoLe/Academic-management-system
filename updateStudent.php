<?php
   require_once("./dbconfig.php");
   $sql ="SELECT * FROM student WHERE studentNumber='".$_GET['studentNumber']."'";

   $ret = mysqli_query($con, $sql);   
   if($ret) {
	   $count = mysqli_num_rows($ret);
	   if ($count==0) {
		   echo $_GET['studentNumber']." 학번의 학생이 없음!!!"."<br>";
		   echo "<br> <a href='main2.html'> <--초기 화면</a> ";
		   exit();	
	   }		   
   }
   else {
	   echo "데이터 검색 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   echo "<br> <a href='main2.html'> <--초기 화면</a> ";
	   exit();
   }   
   $row = mysqli_fetch_array($ret);
   $studentNumber = $row["studentNumber"];
   $studentName = $row["studentName"];
   $major = $row["major"];
   $addr = $row["addr"];
   $phonenumber = $row["phonenumber"];
   $department = $row["department"];   
   $mDate = $row["mDate"];      
   

?>
<HTML>
<HEAD>

<link href="bootstrap.css" rel="stylesheet" />

    <style>
        .textbox {position: relative;
            font-size: 16px;}
        
        .textbox input[type="text"]{ 
            width: 100%; /* 원하는 너비 설정 */ 
            height: auto; /* 높이값 초기화 */ 
            line-height : normal; /* line-height 초기화 */ 
            padding: .8em .8em; /* 원하는 여백 설정, 상하단 여백으로 높이를 조절 */ 
            font-family: inherit; /* 폰트 상속 */ 
            border: 2px solid #999; 
            
            border-radius: 0;
            
        }
        .btn-login{
      background-color: #179e3f;
      border-color: #179e3f;
      border-width: 0;
      color: #FFFFFF;
      display: block;
      margin: 0 auto;
      padding: 15px 50px;
      text-transform: uppercase;
      width: 40%;
  }
               

</style>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
<h1 align="center"> 회원 정보 수정 </h1>
<div class="textbox">
<FORM METHOD="post"  ACTION="updateStudent_result.php">
    학번 : <INPUT TYPE ="text" NAME="studentNumber" VALUE=<?php echo $studentNumber ?>> <br>
	이름 : <INPUT TYPE ="text" NAME="studentName" VALUE=<?php echo $studentName ?>> <br>
	전공: <INPUT TYPE ="text" NAME="major" VALUE=<?php echo $major ?>> <br>
	주소 : <INPUT TYPE ="text" NAME="addr" VALUE=<?php echo $addr ?>> <br>
	핸드폰 번호 : <INPUT TYPE ="text" NAME="phonenumber" VALUE=<?php echo $phonenumber ?>> <br>
	학부 : <INPUT TYPE ="text" NAME="department" VALUE=<?php echo $department ?>> <br>
	회원가입일 : <INPUT TYPE ="text" NAME="mDate" VALUE=<?php echo $mDate ?> READONLY><br>
    
    <BR><BR>
    <div class="textbox">
	<input class="btn btn-default btn-login" type="submit" value="수정 하기">
</FORM>
    </div>
    <form action ="./searchStudent.php">
<input class="btn btn-default btn-login" type="submit" value="학생 목록으로">
    </form>
<FORM ACTION ="admin.html">
<input class="btn btn-default btn-login" type="submit" value="관리자 메인으로">
</FORM>
    </div>
 </BODY> 
 </HTML>

