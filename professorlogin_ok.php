<?php
   require_once("./dbconfig.php");
   $sql ="SELECT * FROM professor WHERE professorID='".$_GET['professorID']."'";
   $sql2 = "SELECT password from professor WHERE professorID='".$_GET['professorID']."'";
   $password = $_GET["password"];
   $ret = mysqli_query($con, $sql);   
   $ret2 = mysqli_query($con, $sql2);
   $row = mysqli_fetch_array($ret2);
   
   if($ret) {
	   $count = mysqli_num_rows($ret);
	   if ($count==0) {
        echo '<script type="text/javascript">alert("아이디가 없습니다");</script>';
        echo '<script type="text/javascript">history.go(-1);</script>';

           
		   exit();	
	   }		   
   }
   else {
	   echo "데이터 검색 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   
	   exit();
   }
   if($row['password'] != $password){
    echo '<script type="text/javascript">alert("비밀번호가 다릅니다");</script>';
    echo '<script type="text/javascript">history.go(-1);</script>';
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
    <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />



	<style>body{padding-top: 250px; 
                margin: 0 auto;
                padding-right: 5px;
                padding-left: 5px;
                }</style>


    <link href="bootstrap.css" rel="stylesheet" />

	
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="jquery-1.10.2.js" type="text/javascript"></script>
	<script src="bootstrap.js" type="text/javascript"></script>
	<script src="login-register.js" type="text/javascript"></script>
 </HEAD> 
 <BODY> 
  <nav class="navbar navbar-custom">
  <a class="navbar-brand" href="./main2.html">
    <img src="./logo.png" width="60" height="60" class="d-inline-block align-top" alt="" loading="lazy">
   KKU 교수용 페이지
  </a>
  </nav>
             
                <a class="btn big-login" data-toggle="modal" href="" onclick="openLoginModal();">개인 정보 수정</a>    
                 <a class="btn big-login" data-toggle="modal" href="" onclick="openRegisterModal();">강의 등록 하기</a>
  
                   

		 <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      
                    </div>
                    <div class="modal-body">
                        <div class="box">
                                <div class="form loginBox">
                                    <form method="post" action="updateProfessor_result.php" accept-charset="UTF-8">
                                    아이디 :   <INPUT class="form-control" TYPE="text" NAME="professorID" VALUE=<?php echo $professorID ?> READONLY>
                                    이름 :   <INPUT class="form-control" TYPE="text" NAME="professorName" VALUE=<?php echo $professorName ?>>
                                    핸드폰 번호 :  <INPUT class="form-control" TYPE="text" NAME="Phonenumber" VALUE=<?php echo $Phonenumber ?>>
                                    주소: <INPUT class="form-control" TYPE="text" NAME="addr" VALUE=<?php echo $addr ?>>
                                    연구실   <INPUT class="form-control" TYPE="text" NAME="lab" VALUE=<?php echo $lab ?>>
                                    전공 :   <INPUT class="form-control" TYPE="text" NAME="major" VALUE=<?php echo $major ?>>
                                    회원가입일 :      <INPUT class="form-control" TYPE="text" NAME="mDate" VALUE=<?php echo $mDate ?> READONLY>                        
                                    <input class="btn btn-default btn-login" type="submit" value="수정 하기">
                                    </form>
                                </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="post" html="{:multipart=>true}" data-remote="true" action="openLecture_result.php" accept-charset="UTF-8">
                                    이수구분 : <select class ="form-control"  autofocus name ="classiFication"> 
                                                <option>전공</option>
                                                <option>인성</option>
                                                <option>기초</option>
                                                <option>소양</option>
                                                <option>심화</option>
                                                <option>핵심</option>
                                                <option>자선</option>
                                                <option>교직</option>
                                                <option>이러닝</option>
                                                </select> <br>
                                            과목번호(4자리) : <INPUT class="form-control" TYPE="text" NAME="lectureNumber" onKeyup="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="4"> <BR>
                                            정원 : <select class ="form-control"  autofocus name ="PersonLimit"> 
                                                <option>10</option>
                                                <option>15</option>
                                                <option>20</option>
                                                <option>25</option>
                                                <option>30</option>
                                                <option>35</option>
                                                <option>40</option>
                                                <option>45</option>
                                                <option>50</option>
                                                </select> <br>
                                            언어구분 :<select class ="form-control"  autofocus name ="Language"> 
                                                <option>영어</option>
                                                <option>일본어</option>
                                                <option>한국어</option>
                                                <option>중국어</option>
                                                </select> <br>
                                            학년 :  <select class ="form-control"  autofocus name ="grade"> 
                                                <option>1학년</option>
                                                <option>2학년</option>
                                                <option>3학년</option>
                                                <option>4학년</option>
                                                </select> <br>
                                                수강학부 :<select class ="form-control"  autofocus name ="department"> 
                                                <option>디자인학부</option>
                                                <option>미디어학부</option>
                                                <option>ICT융합공학부</option>
                                                <option>간호복지학부</option>
                                                <option>바이오융합과학부</option>
                                                <option>스포츠헬스과학부</option>
                                                <option>국제비즈니스학부</option>
                                                <option>공공인재학부</option>
                                                <option>문화콘텐츠학부</option>
                                                    </select>
                                                <BR> 
                                            시간 : <select  class ="form-control"  autofocus name ="lectureTime"> 
                                                <option>1시간</option>
                                                <option>2시간</option>
                                                <option>3시간</option>
                                                    </select>
                                            <br>
                                            학점 : <select class ="form-control" autofocus name ="gradePoint"> 
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                </select> <br>
                                            
                                            과목명 : <INPUT class="form-control" TYPE="text" NAME="lectureName"> <BR> 
                                            담당교수 : <INPUT class="form-control" TYPE="text" NAME="professor" VALUE=<?php echo $professorName ?> READONLY> <BR> 
                                <input class="btn btn-default btn-register" type="submit" value="강의 등록하기">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>
                                 <a href="javascript: showRegisterForm();"></a>
                            </span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                            
                             <a href="javascript: showLoginForm();"></a>
                        </div>
                    </div>
    		      </div>
		      </div>
		  </div>

          
    </div>


 </BODY> 
 </HTML>


 