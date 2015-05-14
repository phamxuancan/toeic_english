    @extends('admins.layouts.index')
        <script src="<?php echo URL::to('/') ?>/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        $(function(){
            User.init();
        });
    </script>
    @section('content')
        <nav class="navbar navbar-default">
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <li style="width: 165px;text-align: center;">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" onclick="User.managerUser();"><b class="fa fa-user"></b> Quản lý người dùng</a>
                          <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#createUserAdmin"><b class="fa fa-plus"></b>Thêm người dùng</a></li>
                        </ul>
                    </li>
                    <li style="width: 183px;text-align: center;">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Thống kê người dùng<b class="fa caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a href="#" onclick="User.userTestInday();"><b class="fa fa-align-right"></b>Người thi hôm nay</a></li>
                            <li><a href="/admins/searchFointFrom"><b class="fa fa-align-right"></b>Số người đạt điểm [A,B]</a></li>
                        </ul>
                    </li>
                    <li style="width: 170px;text-align: center;">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Quản lý câu hỏi<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#createQuestionForm"><b class="fa fa-plus"></b>Thêm câu hỏi mới</a></li>
                            <li><a href="#" onclick="Questions.listQuestion('audio');"><b class="fa fa-reply-all"></b>Câu hỏi âm thanh</a></li>
                            <li><a href="#" onclick="Questions.listQuestion('text');"><b class="fa fa-file-text"></b>Câu hỏi text</a></li>
                        </ul>
                    </li>
                         <?php use Illuminate\Support\Facades\Session;
                         if(session::has('admin_user')){

                            echo '<li class=" pull-right"><a href="/admins/logout" >Đăng xuất <b class="fa fa-arrow-circle-o-right"></b></a></li>';

                         } ?>
                </ul>
            </div>
        </nav>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" id="admin_content">

            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                 <div class="box box-solid box-warning">
                        <div class="box-header">
                            <h4 style="text-align: center;">Điểm cao</h4>
                        </div>
                        <div class="box-body">
                            <div id="top_point">
                                <div id="top_user_admin"></div>
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
                                    <label for="question" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3  ">Loai câu hỏi :</label>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" >
                                        <select id="type_question" name="type" class="col-lg-4 col-md-4 btn btn-sm btn-small btn-success">
                                             <option value="text" class="btn btn-sm btn-small btn-success">text</option>
                                             <option value="audio" class="btn btn-sm btn-small btn-success">audio</option>
                                       </select>
                                    </div>
                              </div>
                            <div class="form-group" id="text_question">
                                <label for="question" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3  ">Câu hỏi :</label>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" >
                                    <input type="text" class="form-control" name="question" id="question" placeholder="Nhập câu hỏi ....">
                                </div>
                            </div>
                            <div class="form-group" id="audio_question" style="display: none;">
                                <label for="sound" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3  ">Audio :</label>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" >
                                    <input type="file" class="form-control" name="sound" id="sound">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="answer_a" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3 ">Đáp án A :</label>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="answer_a" id="answer_a" placeholder="Đáp án A...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer_b" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3 ">Đáp án B :</label>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="answer_b" id="answer_b" placeholder="Đáp án B...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer_c" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3 ">Đáp án C :</label>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="answer_c" id="answer_c" placeholder="Đáp án C...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer_d" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3 ">Đáp án D :</label>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" class="form-control" name="answer_d" id="answer_d" placeholder="Đáp án D...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="answer_correct" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3 ">Đáp án đúng :</label>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                   <select id="answer_correct" name="answer_correct" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 btn btn-sm btn-small btn-success">
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
         <!-- Add user admin -->
         <div class="modal fade" id="createUserAdmin" tabindex="-1" role="dialog" aria-labelledby="createUserAdmin" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Thêm người dùng</h4>
              </div>
              <div class="modal-body">
                    <form id="admin_adduser" action="#" class="form-horizontal" method="POST" enctype="multipart/form-data" role="form">
                              <div class="form-group">
                                    <label for="question" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3  ">Quyền người dùng</label>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" >
                                        <select id="type_question" name="permission" class="col-lg-4 col-md-4 btn btn-sm btn-small btn-success">
                                             <option value="admin" class="btn btn-warning">Admin</option>
                                             <option value="user" class="btn btn-success">User</option>
                                       </select>
                                    </div>
                              </div>
                            <div class="form-group">
                                <label for="username" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3  ">Tên đăng nhập</label>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" >
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Nhập tên đăng nhập...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3  ">Email :</label>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" >
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Nhập email ...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3 ">Mật khẩu</label>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="avatar" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3 ">Avatar</label>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    <input type="file" class="form-control" name="avatar" id="avatar">
                                </div>
                            </div>
                        </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" data-text-loading="Đang thêm ..." onclick="User.addUser(this);">Đồng ý</button>
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
            <style type="text/css">
                #navbar-collapse li:hover{
                background-color:#e1bcff;
                }
            </style>
    @endsection
