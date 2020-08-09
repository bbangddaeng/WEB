<!DOCTYPE html>
<?php
  $id = $_POST["id"];
  $pwd = $_POST["pwd"];
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>당신의 운명은?</title>
    <strong>로그인 정보</strong><br/>
      <?php echo "id : ".$id."<br/>"?>
      <?php echo "pwd : "?>
      <?php for($i = 0;$i<strlen($pwd);$i++){ echo "*"; }?>

    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- <script src= "http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
    <!-- <script src= "//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
    <script src="http://jqueryrotate.com/jQueryRotateCompressed.js"></script>
    <script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>

    <script>var ang=0; var final_ang = 0; isPause = true;</script>
    <style>

      div {position:relative;}
      #target{position:relative;}
      .hc{width:200px; left:0; right:0; margin-left:auto; margin-right:auto;}
      .vc{height:0px; top: 0; bottom:0; margin-top:auto; margin-bottom:auto;}
      .button {
        background-color: #4CAF50;
        border:none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration:none;
        display: inline-block;
        font-size: 16px;
        margin:2px 1.7px;
        cursor:pointer;
      }

    </style>

    <script>var tempAng; var dolim; var start; </script>
     <script type="text/javascript">

       var t =  [[' ', ' '],
                   ['', 50]]
       var cnt = t.length-1;
       var data;

       google.charts.load("current", {packages:["corechart"]});

       google.charts.setOnLoadCallback(drawChart);

       function drawChart() {
         data = google.visualization.arrayToDataTable(t);

         var options = {
           legend: 'none',
           pieSliceText: 'label',
           pieStartAngle: ang%360
         };

         var chart = new google.visualization.PieChart(document.getElementById('target'));
         chart.draw(data, options);
       }
     </script>

  </head>

  <body>
    <script>var clk = true; var stopCheck = true;</script>

    <div style="z-index:1;width:600px;height:10px;" class = "hc vc">
      <img id = "dir"style="width:50px;height:50px;left:276px;top:78px;"src = "https://t1.daumcdn.net/cfile/tistory/0360BE3D5083FDF621"></img>
    </div>

    <div id="target" style="width:600px;height:600px;overflow:hidden;"class = "hc vc"></div>

    <div style="z-index:16;width:600px;height:600px;overflow:hidden;left:200px;" class = "hc vc">
      <input style="width:33.5%;"class = "button" id = "btn" type ="button" value =" 돌려돌려 돌림판!   " onclick="if(t.length <=2){alert('최소 2개이상 넣으세요.');return;}
      processing(); "></input>

      <br>
      <input class = "button" type="button" value="빼기" onclick="
      if(chk()){
        cnt--;
        if(t.length == 2){
          t[1][0] = ''; drawChart();return;}
        t.pop();google.visualization.arrayToDataTable(t);
        drawChart();
      }"></input>

      <input class = "button" type ="button" value ="리셋" onclick="
      if(chk()){
        t.splice(2,t.length);t[1][0] = '';
        drawChart();
        }"></input>
        <br>
      <input id = "stop" style = "color:#FA2435;width: 33.5%;font-size:16px;"class = "button"
      type = "button" value = "스톱" onclick="
      if(chk() == false && stopChk() == true){
        stopRotate();
        stopCheck = false;}
      "/>
      <br><br>
      <label ondragstart="return false" contextmenu = "return false" onselectstart="return false"> 추가 ☞ </label>
      <input maxlength ="7"placeholder="입력하시오." style="height:6%;width:24%;text-align:center;"type ="text" id ="inp" value=""/>
      <br><br>
      <label ondragstart="return false" contextmenu = "return false" onselectstart="return false">Made by <strong>박장군</strong></label>

    </div>

    <script>
      $("#dir").css("position","relative");
      $("#dir").css("z-index",20);

      $("#target").css("z-index","-1");
      $("#dir").rotate(90);
      $("[id=inp]").css("border","#4CAF50 3px solid");
      $("#stop").css("cursor","pointer");
      document.getElementById("inp").focus();

      $("#inp" ).keyup(function(e){
        if(e.keyCode == 13 && chk()){
          if($("#inp").val() == ''){
            alert("입력하세요.");
            return;
          }
          if(t.length == 2 && t[1][0] == ''){
            t[1][0] = $("#inp").val();
            document.getElementById("inp").value = null;
            drawChart();
            return;
          }
          else if(t.length == 2 && t[1][0] != ''){
            t.push([$("#inp").val(),50]);
            document.getElementById("inp").value = null;
            if(t.length == 10){
              t.pop();
              alert("최대 8개를 초과할 수 없습니다.");
              return;
            }
            google.visualization.arrayToDataTable(t);
            drawChart();
          }
          else{
            t.push([$("#inp").val(),50]);
            document.getElementById("inp").value = null;
            if(t.length == 10){
              t.pop();
              alert("최대 8개를 초과할 수 없습니다.");
              return;
            }
            google.visualization.arrayToDataTable(t);
            drawChart();
          }
        }
      });

    function random(){
      var res = Math.random();
      return (res*70);
    }

    function rot(){
      stopCheck = false;
      $("#stop").css("cursor","no-drop");
      $('#target').rotate({
            angle:0,
            animateTo:-30,
            duration:500,
            easing: $.easing.easeInBack
        });
      ang -= 30;
      setTimeout("isPause = false;",500);
      setTimeout("$('#stop').css('cursor','pointer');",500);
      setTimeout("stopCheck = true;",500);

      dolim = setInterval(function(){
        if(!isPause){
        drawChart();
        var ta = random();

        ang += ta;
        $("#target").rotate({
          angle:0,
          animateTo:ta,
          easing: $.easing.easeOutQuart
          });
        }
      },1);
    }

    function stopRotate(){
      clearInterval(dolim);
      isPause=false;

      drawChart();
      $('#target').rotate({
            angle:0,
            animateTo:1440,
            duration:3500,
            easing: $.easing.easeOutQuart
        });

      ang = ang%360;
      //alert("ang : "+ ang);
      var len = t.length-1;
      var one_ang = 360/len;
      var temp = t[len - (parseInt(ang/one_ang))][0];

      setTimeout("$('.button').css('cursor','pointer');",3600);
      setTimeout("$('#inp').css('cursor','text');",3600);
      setTimeout("$('#inp').attr('disabled', false)",3600);
      setTimeout(() => alert(temp + " 당첨!!"),3600);
      setTimeout(() => clk = true,3600);
      setTimeout(() => stopCheck = true,3600);
      setTimeout("isPause = true;",3600);
    }

    function processing(){
      if(chk()){
          clk = false;
          $(".button").css("cursor","no-drop");
          //$("[class=button]").css("cursor","no-drop");
          $("#stop").css("cursor","pointer");
          $("#inp").css("cursor","no-drop");
          $("#inp").attr("disabled",true);
          rot();
      }
    }

    function stopChk(){
      if(stopCheck){
        return true;
      }
      else{
        return false;
      }
    }

    function chk(){
      if(clk){
        return true;
      }
      else{
        return false;
      }
    }

    </script>
  </body>
</html>
