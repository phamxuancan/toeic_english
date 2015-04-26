    @extends('admins.layouts.index')
    @section('scripts')

    @endsection
    @section('content')
        <nav class="navbar navbar-default navbar-inverse">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav col-lg-12">
                    <li style="width: 175px;">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Quản lý Câu hỏi<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#createQuestionForm"><b class="fa fa-plus"></b>Thêm câu hỏi mới</a></li>
                            <li><a href="#" onclick="Questions.listQuestion('audio');"><b class="fa fa-reply-all"></b>Câu hỏi âm thanh</a></li>
                            <li><a href="#" onclick="Questions.listQuestion('text');"><b class="fa fa-file-text"></b>Câu hỏi Text</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" onclick="User.managerUser();"><b class="fa fa-user"></b>Quản lý người dùng</a>
                    </li>
                         <?php use Illuminate\Support\Facades\Session;
                         if(session::has('admin_user')){

                            echo '<li><a href="logout" ><b class="fa fa-mail-reply"></b>Logout</a></li>';

                         } ?>
                </ul>
            </div>
        </nav>
        <div class="col-lg-12">
            <div class="col-lg-9" id="admin_content">

            </div>
            <div class="col-lg-3">
                 <div class="box box-solid box-primary">
                        <div class="box-header">
                            <h4 style="text-align: center;">Bảng xếp hạng</h4>
                        </div>
                        <div class="box-body">
                            <div id="top_point">
                                <ul>

                                </ul>
                            </div>
                        </div>
                 </div>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="createQuestionForm" tabindex="-1" role="dialog" aria-labelledby="createQuestionForm" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Thêm câu hỏi</h4>
              </div>
              <div class="modal-body">
                    <form id="admin_addQuestion" action="#" class="form-horizontal" method="POST" enctype="multipart/form-data" role="form">
                              <div class="form-group">
                                    <label for="question" class="control-label col-lg-3 col-md-3  ">Loai câu hỏi :</label>
                                    <div class="col-lg-9 col-md-9" >
                                        <select id="type_question" name="type" class="col-lg-4 col-md-4 btn btn-sm btn-small btn-success">
                                             <option value="text" class="btn btn-sm btn-small btn-success">text</option>
                                             <option value="audio" class="btn btn-sm btn-small btn-success">audio</option>
                                       </select>
                                    </div>
                              </div>
                            <div class="form-group" id="text_question">
                                <label for="question" class="control-label col-lg-3 col-md-3  ">Câu hỏi :</label>
                                <div class="col-lg-9 col-md-9" >
                                    <input type="text" class="form-control" name="question" id="question" placeholder="Nhập câu hỏi ....">
                                </div>
                            </div>
                            <div class="form-group" id="audio_question" style="display: none;">
                                <label for="sound" class="control-label col-lg-3 col-md-3  ">Audio :</label>
                                <div class="col-lg-9 col-md-9" >
                                    <input type="file" class="form-control" name="sound" id="sound">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="answer_a" class="control-label col-lg-3 col-md-3 ">Đáp án A :</label>
                                <div class="col-lg-9 col-md-9">
                                    <input type="text" class="form-control" name="answer_a" id="answer_a" placeholder="Đáp án A...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer_b" class="control-label col-lg-3 col-md-3 ">Đáp án B :</label>
                                <div class="col-lg-9 col-md-9">
                                    <input type="text" class="form-control" name="answer_b" id="answer_b" placeholder="Đáp án B...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer_c" class="control-label col-lg-3 col-md-3 ">Đáp án C :</label>
                                <div class="col-lg-9 col-md-9">
                                    <input type="text" class="form-control" name="answer_c" id="answer_c" placeholder="Đáp án C...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer_d" class="control-label col-lg-3 col-md-3 ">Đáp án D :</label>
                                <div class="col-lg-9 col-md-9">
                                    <input type="text" class="form-control" name="answer_d" id="answer_d" placeholder="Đáp án D...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer_correct" class="control-label col-lg-3 col-md-3 ">Đáp án đúng :</label>
                                <div class="col-lg-9 col-md-9">
                                   <select id="answer_correct" name="answer_correct" class="col-lg-2 col-md-2 btn btn-sm btn-small btn-success">
                                         <option value="A" class="btn btn-sm btn-small btn-success">A</option>
                                         <option value="B" class="btn btn-sm btn-small btn-success">B</option>
                                         <option value="C" class="btn btn-sm btn-small btn-success">C</option>
                                         <option value="D" class="btn btn-sm btn-small btn-success">D</option>
                                   </select>
                                </div>
                            </div>
                        </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" data-text-loading="Đang thêm ..." onclick="Questions.addQuestion(this);">Đồng ý</button>
              </div>
            </div>
          </div>
        </div>
          <script type="text/javascript">
            $(document).ready(function(){
                $('#type_question').on('change', function(){
                    var value = $('#type_question').val();
                    if(value == 'text'){
                        $('#text_question').show();
                        $('#audio_question').hide();
                    }else{
                        $('#text_question').hide();
                        $('#audio_question').show();
                    }
                });
            });

            </script>
    @endsection