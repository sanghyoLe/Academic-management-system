<?php
   require_once("./dbconfig.php");
   $sql ="SELECT * FROM professor WHERE professorID='".$_GET['professorID']."'";

   $ret = mysqli_query($con, $sql);   
   if($ret) {
	   $count = mysqli_num_rows($ret);
	   if ($count==0) {
		   echo $_GET['professorID']." 아이디의 회원이 없음!!!"."<br>";
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
   $professorID = $row['professorID'];
   $professorName = $row["professorName"];
   $Phonenumber = $row["Phonenumber"];
   $addr = $row["addr"];
   $lab = $row["lab"];
   $major = $row["major"];
   $department = $row["department"];   
   $mDate = $row["mDate"];      
?>
<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
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
</HEAD>
<BODY>
<h1> 회원 정보 수정 </h1> <br>

<div class="textbox">
<FORM METHOD="post"  ACTION="updateProfessor_result.php">
	아이디 : <INPUT TYPE ="text" NAME="professorID" VALUE=<?php echo $professorID ?> READONLY> <br>
	이름 : <INPUT TYPE ="text" NAME="professorName" VALUE=<?php echo $professorName ?>> <br> 
	핸드폰 번호 : <INPUT TYPE ="text" NAME="Phonenumber" VALUE=<?php echo $Phonenumber ?>> <br>
	주소: <INPUT TYPE ="text" NAME="addr" VALUE=<?php echo $addr ?>> <br>
	연구실 : <INPUT TYPE ="text" NAME="lab" VALUE=<?php echo $lab ?>> <br>
	전공 : <INPUT TYPE ="text" NAME="major" VALUE=<?php echo $major ?>> <br>
	학부 : <INPUT TYPE ="text" NAME="department" VALUE=<?php echo $department ?>> <br>
	회원가입일 : <INPUT TYPE ="text" NAME="mDate" VALUE=<?php echo $mDate ?> READONLY><br>
	<BR><BR>
  <input class="btn btn-default btn-login" type="submit" value="정보 수정">
  
</FORM>


</div>
<form action ="./searchProfessor.php">
<input class="btn btn-default btn-login" type="submit" value="교수 목록으로">
    </form>
    <FORM ACTION ="admin.html">
<input class="btn btn-default btn-login" type="submit" value="관리자 메인으로">
</FORM>

</body>
</html>
