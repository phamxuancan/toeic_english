    @extends('admins.layouts.index')
    @section('content')
        <nav class="navbar navbar-default navbar-inverse">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav col-lg-3">
                    <li style="width: 165px;">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Quản lý Câu hỏi<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#createQuestionForm"><b class="caret"></b>Thêm câu hỏi mới</a></li>
                            <li><a href="#" onclick="question.listQuestionSound();">Câu hỏi âm thanh</a></li>
                            <li><a href="#" onclick="question.listQuestionText();">Câu hỏi Text</a></li>
                        </ul>
                    </li>
                         <?php use Illuminate\Support\Facades\Session;
                         if(session::has('admin_user')){

                            echo '<li><a href="logout" >Logout</a></li>';

                         } ?>
                </ul>
            </div>
        </nav>
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
                                <label for="question" class="control-label col-lg-3 col-md-3  ">Câu hỏi :</label>
                                <div class="col-lg-9 col-md-9" >
                                    <input type="text" class="form-control" name="question" id="question" placeholder="Nhập câu hỏi ....">
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
                                   <select id="answer_correct" class="col-lg-2 col-md-2 btn btn-sm btn-small btn-success">
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
    @endsection