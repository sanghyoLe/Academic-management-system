<?php
   require_once("./dbconfig.php");
   $sql ="SELECT * FROM student WHERE studentNumber='".$_GET['studentNumber']."'";
   
   $password = $_GET["password"];
   
   
   $ret = mysqli_query($con, $sql);   
   
   
   
   $row = mysqli_fetch_array($ret);
   if($ret) {
	   $count = mysqli_num_rows($ret);
	   if ($count==0) {
            $number = $_GET['studentNumber'];
            echo '<script type="text/javascript">alert("학번이 존재하지 않습니다");</script>';
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
    }
  
   $studentNumber = $row["studentNumber"];
   $studentName = $row["studentName"];
   $major = $row["major"];
   $addr = $row["addr"];
   $phonenumber = $row["phonenumber"];
   $mDate = $row["mDate"];  
   
   
   
?>
<HTML> 
   <HEAD> 
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  
  
      <style>body{padding-top: 250px; 
                  margin: 0 auto;
                  padding-right: 100px;
                  padding-left: 70px;
                  
       }
       
       </style>
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
     KKU 학생용 페이지
    </a>
    </nav>
                  <a class="btn big-login" data-toggle="modal" href="" onclick="openLoginModal();">개인 정보 수정</a>    
                   <a class="btn big-register" data-toggle="modal" href="" onclick="openRegisterModal();">개설 과목 조회</a>
    
  
  
           <div class="modal fade login" id="loginModal">
                <div class="modal-dialog login animated">
                    <div class="modal-content">
                       <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        
                      </div>
                      <div class="modal-body">
                          <div class="box">
                                  <div class="form loginBox">
                                      <form method="post" action="updateStudent_result.php" accept-charset="UTF-8">
                                      학번 : <INPUT class = "form-control" TYPE ="text" NAME="studentNumber" VALUE=<?php echo $studentNumber ?> READONLY> <br>
	                                  이름 : <INPUT class = "form-control" TYPE ="text" NAME="studentName" VALUE=<?php echo $studentName ?>> <br>
	                                  전공: <INPUT class = "form-control"  TYPE ="text" NAME="major" VALUE=<?php echo $major ?>> <br>
	                                  주소 : <INPUT class = "form-control"  TYPE ="text" NAME="addr" VALUE=<?php echo $addr ?>> <br>
	                                  핸드폰 번호 : <INPUT class = "form-control"  TYPE ="text" NAME="phonenumber" VALUE=<?php echo $phonenumber ?>> <br>
	                                  회원가입일 : <INPUT class = "form-control" TYPE ="text" NAME="mDate" VALUE=<?php echo $mDate ?> READONLY ><br>
                                      <input class="btn btn-default btn-login" type="submit" value="수정 하기">
                                      </form>
                                  </div>
                          </div>
                          <div class="box">
                            <div class="content registerBox" style="display:none;">
                            <?php 
                             $sql ="SELECT * FROM openedLecture";
                             $sql2 ="SELECT * FROM student";

                             $ret = mysqli_query($con, $sql);
                             
                             
                             $ret2 = mysqli_query($con, $sql2);
                             $row2 = mysqli_fetch_array($ret2);

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
                                    }
                                    th, td {
                                        border: 1px solid #444444;
                                        padding: 10px;
                                    }
                                    
                                    </style>";
                             echo "<h1> 개설 강좌 목록 </h1>";
                             echo "<TABLE border=1>";
                             echo "<TR>";
                             echo "<TH>이수구분 </TH><TH>과목번호</TH><TH>정원 </TH><TH>언어구분 </TH><TH>수강학부 </TH>";
                             echo "<TH>시간</TH><TH>학점</TH><TH>과목명</TH><TH>담당교수</TH><TH>학년</TH>";
                             echo "</TR>";
                             while($row = mysqli_fetch_array($ret)) {
                                echo "<TR>";
                                echo "<TD>", $row['classiFication'], "</TD>";
                                echo "<TD>", $row['lectureNumber'], "</TD>";
                                echo "<TD>", $row['PersonLimit'], "</TD>";
                                echo "<TD>", $row['Language'], "</TD>";
                                echo "<TD>", $row['department'], "</TD>";
                                echo "<TD>", $row['lectureTime'], "</TD>";
                                echo "<TD>", $row['gradePoint'], "</TD>";
                                echo "<TD>", $row['lectureName'], "</TD>";
                                echo "<TD>", $row['professor'], "</TD>";
                                echo "<TD>", $row['grade'], "</TD>";
                               
                               
                                echo "</TR>";	  
                             }   
                             mysqli_close($con);
                             echo "</TABLE>"; 
                          
                          ?>
                          
                          
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
  
  