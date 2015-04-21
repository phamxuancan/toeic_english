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

            <!-- phan nghe -->
            <table class="table">
              <thead>
                <tr><td><h2>Phần nghe</h2></td></tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <p>
                      <b>Câu 1: Day la noi dung của cau hỏi thứ nhât, bạn hãy chọn đáp án đúng theo các đáp án dưới đây, chỉ có 1 đáp án là đúng. Nếu bạn không chọn thì không được tính điẻm</b>
                      <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            A. Đây là phương án A
                          </label><br/>
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            B. Đây là phương án B
                          </label><br/>
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            C. Đây là phương án C
                          </label><br/>
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            D. Đây là phương án D
                          </label>
                      </div>

                      <b>Câu 2: Day la noi dung của cau hỏi thứ nhât, bạn hãy chọn đáp án đúng theo các đáp án dưới đây, chỉ có 1 đáp án là đúng. Nếu bạn không chọn thì không được tính điẻm</b>
                          <div class="radio">
                            <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                              A. Đây là phương án A
                            </label><br/>
                            <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                              B. Đây là phương án B
                            </label><br/>
                            <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                              C. Đây là phương án C
                            </label><br/>
                            <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                              D. Đây là phương án D
                            </label>
                      </div>
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

            $('#user_home_begin').click(function(){
                $("#notification").hide();
                $('#question').show();
                $('.finish').show();

                var url = home+"questions";

                $.get(url,function(result,status,jxhr){
                    var request = result.questions;
                    console.log(request);
                    var data = "";
                    for(i = 0 ; i< request.length; i++){
                        data = data + "<b>"+ request[i].question +"</b>";
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

                    $("#question .content_read").html(data);
                });
            });
        });
    </script>
@endsection