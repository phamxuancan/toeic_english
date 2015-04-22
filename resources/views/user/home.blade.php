@extends('layouts.index')
@section('content')
    <center><input type="button" value="bắt đầu" id="user_home_begin" /></center>

    <div style="border: 1px red solid;margin-left: 50px; margin-top: 10px; -webkit-border-radius: 20px;">
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
        <button type="button" class="btn btn-default ">finish</button>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript">
        $('document').ready(function(){
            $('#question').hide();
            $('.finish').hide();
            $("#countTime").hide();

            $('#user_home_begin').click(function(){
                $("#notification").hide();
                $('#question').show();
                $('.finish').show();
                $('#user_home_begin').hide();
                var url = home+"questions";

                $.get(url,function(result,status,jxhr){
                    var request = result.questions;
                    console.log(request);
                    var data = "";
                    for(i = 0 ; i< request.length; i++){
                        data = data + "<b> Câu "+ (i+1) +": "+ request[i].question +"</b>";
                        data = data + "<div class='radio'>";

                        // đáp án A
                        data = data + "<label>";
                        data = data + "<input type='radio' name='optionsRadios"+i+"' id='optionsRadios"+ i +"' value='"+request[i].answer_a+"' >";
                        data = data + request[i].answer_a +"</label><br/>";

                        // đáp án B
                        data = data + "<label>";
                        data = data + "<input type='radio' name='optionsRadios"+i+"' id='optionsRadios"+ i +"' value='"+request[i].answer_b+"' >";
                        data = data + request[i].answer_b +"</label><br/>";

                        // đáp án C
                        data = data + "<label>";
                        data = data + "<input type='radio' name='optionsRadios"+i+"' id='optionsRadios"+ i +"' value='"+request[i].answer_c+"' >";
                        data = data + request[i].answer_c +"</label><br/>";

                        // đáp án D
                        data = data + "<label>";
                        data = data + "<input type='radio' name='optionsRadios"+i+"' id='optionsRadios"+ i +"' value='"+request[i].answer_d+"' >";
                        data = data + request[i].answer_d +"</label>";

                        data = data + "</div>";
                    }

                    $("#countTime").show();
                    showCountTimer();
                    $("#question .content_read").html(data);
                });
            });
        });

        var seconds = 1 ;
        var minus = 120;
        document.counter.d2.value= minus+':'+seconds;
        function showCountTimer(){
            if(minus==0 && seconds == 0){
                document.counter.d2.value= 'hết giờ';
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
                setTimeout("showCountTimer()",1000) ;
            }
        }
    </script>
@endsection