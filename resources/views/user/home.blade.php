@extends('layouts.index')
@section('content')
    <center><input type="button" value="bắt đầu" id="user_home_begin" /></center>

    <div style="border: 1px red solid; margin-left: 50px; margin-top: 10px; -webkit-border-radius: 20px;">
        <div id="notification">
            <center> nội dung thông báo, nếu click nội dung hide và show đề thi </center>
        </div>
        <div id="question"class="row">
            <table class="table">
              <thead>
                <tr><td><h2>Phần đọc</h2></td></tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <p class="content_read">

                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
    <!-- button finish -->
    <div class="row text-center finish">
        <button id="buttonFinish" type="button" class="btn btn-default ">finish</button>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript">
        //biến toàn cục
        var ketqua = new Array();
        var arrayResult = new Array();
        var socauhoi = 0;
        var seconds = 1;
        var minus = 90;
        var funTime;
        var score;

        var user_id = 0;

        $('document').ready(function(){
            $('#question').hide();
            $('.finish').hide();
            // $("#countTime").hide();
            user_id = "<?php echo Auth::user()['id']; ?>";

            $('#user_home_begin').click(function(){
                $("#notification").hide();
                $('#question').show();
                $('.finish').show();
                $('#user_home_begin').hide();

                var url = home+"questions";

                $.get(url,function(result,status,jxhr){
                    var request = result.text;
                    console.log(request);
                    var data = "";
                    socauhoi = request.length;
                    for(i = 0 ; i< request.length; i++){
                        data = data + "<b> Câu "+ (i+1) +": "+ request[i].question +"</b>";
                        data = data + "<div class='radio'>";

                        // đáp án A
                        data = data + "<label id='"+(i+1)+"a"+"'>";
                        data = data + "<input type='radio' name='optionsRadios"+(i+1)+"' class='rad' id='optionsRadios"+ (i+1) +"' value='"+(i+1)+"a."+request[i].answer_a+"' >";
                        data = data + "A. " + request[i].answer_a +"</label><br/>";

                        // đáp án B
                        data = data + "<label  id='"+(i+1)+"b"+"'>";
                        data = data + "<input type='radio' name='optionsRadios"+(i+1)+"' class='rad' id='optionsRadios"+ (i+1) +"' value='"+(i+1)+"b."+request[i].answer_b+"' >";
                        data = data + "B. " + request[i].answer_b +"</label><br/>";

                        // đáp án C
                        data = data + "<label  id='"+(i+1)+"c"+"'>";
                        data = data + "<input type='radio' name='optionsRadios"+(i+1)+"' class='rad' id='optionsRadios"+ (i+1) +"' value='"+(i+1)+"c."+request[i].answer_c+"' >";
                        data = data + "C. " + request[i].answer_c +"</label><br/>";

                        // đáp án D
                        data = data + "<label  id='"+(i+1)+"d"+"'>";
                        data = data + "<input type='radio' name='optionsRadios"+(i+1)+"' class='rad' id='optionsRadios"+ (i+1) +"' value='"+(i+1)+"d."+request[i].answer_d+"' >";
                        data = data + "D. " + request[i].answer_d +"</label>";

                        data = data + "</div>";
                        ketqua[i+1] = (i+1)+request[i].answer_correct;
                    }

                    $("#countTime").css('visibility', '');
                    showCountTimer();
                    $("#question .content_read").html(data);
                });
            });
        });
        
        function processResult(){
            score = 0;
            $(".rad:checked").each(function() {
                alert("Radio: " + $(this).val());
                if(ketqua.lastIndexOf($(this).val().substr(0,2))!= -1){
                    score++;
                }

            })
            alert("điểm số:"+score);
        }

        //disable radio button
        function disRadio(){
            $(".rad").attr("disabled", true);
        }

        //show color right result
        function showColor(arrayChange){
            i = arrayChange.length;
            for(i=0 ; i <= arrayChange.length; i++){
                $("#"+arrayChange[i]).css( "color", "green" );
            }
            
        }
        function finishTest(){
            processResult();
            disRadio();
            showColor(ketqua);
            if(user_id == 0){
                
            }else{
                $.post( home+"point/add", {user_id: user_id, point: score , time: minus+""+seconds})
                .done(function( data ) {
                    if(data.error == 1){
                        alert(data.message);
                    }else{
                        alert(data.message);
                    }
                    
                });
            }

        }

        $("#buttonFinish").click(function () {
            finishTest();
            clearTimeout(funTime);
        });

        //xử lý time
        
        document.counter.d2.value= minus+':'+seconds;
        function showCountTimer(){
            if(minus==0 && seconds == 0){
                document.counter.d2.value= 'hết giờ';
                finishTest();
            }else{
                if (seconds<=0){
                    seconds=60 ;
                    minus-=1 ;
                 }
                 if (seconds<=-1){
                    seconds=0 ;
                    minus+=1 ;
                    window.location.href = "http://toeic.local.com/";
                 }
                 else
                    seconds-=1 ;

                document.counter.d2.value= minus+' phút : '+seconds+' giây';
                funTime = setTimeout("showCountTimer()",1000);
            }
        }


    </script>
@endsection