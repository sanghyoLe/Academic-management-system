<?php
   require_once("./dbconfig.php");
   $sql ="SELECT * FROM openedLecture WHERE lectureNumber='".$_GET['lectureNumber']."'";

   $ret = mysqli_query($con, $sql);   
   if($ret) {
	   $count = mysqli_num_rows($ret);
	   if ($count==0) {
		   echo $_GET['lectureNumber']." "."<br>";
		   
		   exit();	
	   }		   
   }
   else {
	   echo "데이터 검색 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   
	   exit();
   }   
   $row = mysqli_fetch_array($ret);
   $professor = $row['professor'];
   $lectureName = $row['lectureName'];
   $lectureNumber = $row['lectureNumber'];
   
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

<h1 align=center> 강의 삭제 </h1>
<div class="textbox">
<FORM METHOD="post"  ACTION="deleteLecture_result.php">
    과목번호 : <INPUT TYPE ="text" NAME="lectureNumber" VALUE=<?php echo $lectureNumber    ?> READONLY> <br> 
    과목명 : <INPUT TYPE ="text" NAME="lectureName" VALUE=<?php echo $lectureName    ?> READONLY> <br> 
    담당교수 : <INPUT TYPE ="text" NAME="professor" VALUE=<?php echo $professor ?> READONLY> <br>
	<BR><BR>
	
	<INPUT class="btn  btn-defalut btn-login" TYPE="submit"  VALUE="과목 삭제">
</FORM>

</div>
<form action ="./openLecture_list.php">
<input class="btn btn-default btn-login" type="submit" value="강의 목록으로">
    </form>
<FORM ACTION ="admin.html">
<input class="btn btn-default btn-login" type="submit" value="관리자 메인으로">
</FORM>

</BODY>
</HTML>
