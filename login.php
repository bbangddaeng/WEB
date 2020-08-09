<?php

 ?>
<?php
session_start();

?>
<!DOCTYPE HTML>
<html>
  <head>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src= "//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <title>Login</title>
    <style>
      div {position:relative;}
      .hc{width:300px; left:0; right:0; margin-left:auto; margin-right:auto;}
      .vc{height:0px; top: 0; bottom:0; margin-top:auto; margin-bottom:auto;}
      .button{color:green;}

    </style>
    <h1 style = "margin:0;">(Test)</h1>
  </head>

  <body>
    <div class = "hc vc">
    <h2>
      <img onclick="location.href='https://naver.com/'"style="margin-top:130px;margin-left:3px;position:relative;width:100%;cursor:pointer;"src = "https://lh3.googleusercontent.com/proxy/weA8dXRO0Rl-sabKoEr_WD_CX7yTehCIUHvepJScG79N7R4qG4eBMbZDYvoHaY8d-ZXXDq6t4thqS2R16e4S5TJHc8MjzCNM6OGlPmCDADIFJJw9GdteludhouYVmdbIW_roQxVH_ot_LvqklUyzVw">
    </img>
    </h2>
    <script> var chkVal = false; var idChk = false; var pwdChk = false;</script>
      <form action="./dolimpan.php" method="post">

        <!-- 이름 : <input type = "text" name = "name"/><br/> -->

        <input style = "margin-top:0px;margin-bottom:5px;margin-left:5px;white;width:100%;height:40px;"onkeydown="
        if(event.keyCode == 13 ){
          if(!chk()){return false;}
          else{alert('로그인 되었습니다.'); return true;}
        }"
          value = '' id ="id"placeholder="아이디를 입력하세요." type = "text" name = "id"/><br/>

        <hid class ="hid"style = "color:red;font-size:14px;margin-left:5px;" id="id_error_msg" name="id_error_msg">   아이디를 입력해주세요.</hid>


        <input style = "margin:5px;white;width:100%;height:40px;" onkeydown="
        if(event.keyCode == 13 ){
          if(!chk()){return false;}
          else{alert('로그인 되었습니다.'); return true;}
        }"

          value = '' id = "pwd" placeholder="비밀번호를 입력하세요." type = "password" name = "pwd"/><br/>
        <!-- 이메일 : <input type = "text" name = "email"/><br/> -->

        <hid class = "hid" style = "color:red;font-size:14px;display:none;margin-left:5px;" id="pwd_error_msg" name="pwd_error_msg">  비밀번호를 입력해주세요.</hid>

        <input id = "btn" style = "margin-bottom:0px;cursor:pointer;font-weight:bold;border:#2DB400 solid 3px;background-color:#2DB400;color:white;width:100%;height:45px;margin:5px"
        onkeydown="
        if (event.keyCode == 13 || event.keyCode == 32){
          if(!chk()){return false;}
          else{alert('!!'); return true;}
        }
        "
        onclick="if(chk()){return true;}else{return false;}" type = "submit" value = "로그인"/>
      </form>
      <a href = "https://nid.naver.com/user2/V2Join.nhn?m=agree&lang=ko_KR&cpno=" style="cursor:pointer;margin-top:0px;margin-left:130px;font-size:12px;">회원가입</pp>
    </div>

    <script>

      function chk(){
        if(  $('#id').val() != '' && $('#pwd').val() != ''){
          return true;
        }
        else{
          if($('#pwd').val() == '' && $('#id').val() ==''){
            $('#id_error_msg').show();
            $('#pwd_error_msg').hide();
          }
          else if($('#id').val() == ''){
            if($('#pwd').val() != ''){
              $('#pwd_error_msg').hide();
            }
            $('#id_error_msg').show();
            $('#id').focus();
          }
          else if($('#pwd').val() == ''){
            if($('#id').val() != ''){
                $('#id_error_msg').hide();
            }
            $('#pwd_error_msg').show();
            $('#pwd').focus();
          }
          return false;
        }
      }

    </script>
  </body>

</html>
