<div class="panel panel-default">
    <div class="panel-heading">{{$type}}</div>
          <div class="panel-body">
               <table class="table table-bordered table-hover table-striped table_add_friend">
                   <tr class="bg-info"  >
                       <th class="bg-info" style="text-align: center;" >ID</th>
                       <th class="bg-info" style="text-align: center;">Content</th>
                       <th class="bg-info" style="text-align: center;">Đáp án A</th>
                       <th class="bg-info" style="text-align: center;">Đáp án B</th>
                       <th class="bg-info" style="text-align: center;">Đáp án C</th>
                       <th class="bg-info" style="text-align: center;">Đáp án D</th>
                       <th class="bg-info" style="text-align: center;">Đáp án Đúng</th>
                       <th class="bg-info" style="text-align: center;">Thay đổi</th>
                   </tr>
                   @foreach($questions as $question)
                       <tr >
                           <td style="text-align: center;" >{{$question->id}}</td>
                           @if($type == 'audio')
                                <td style="text-align: center;">
                                 <audio controls preload="none" style="width: 40px;">
                                       <source src="<?php echo URL::to('/') ?>/uploads/audio/{{$question->sound}}" type="audio/mpeg">
                                </audio>
                                </td>

                           @endif
                           @if($type == 'text')
                                <td style="text-align: center;">{{(strlen($question->question)>30)?substr($question->question,0,20).'...':$question->question}}</td>
                           @endif
                           <td style="text-align: center;">{{(strlen($question->answer_a)>30)?substr($question->answer_a,0,20).'...':$question->answer_a}}</td>
                           <td style="text-align: center;">{{(strlen($question->answer_b)>30)?substr($question->answer_b,0,20).'...':$question->answer_b}}</td>
                           <td style="text-align: center;">{{(strlen($question->answer_c)>30)?substr($question->answer_c,0,20).'...':$question->answer_c}}</td>
                           <td style="text-align: center;">{{(strlen($question->answer_d)>30)?substr($question->answer_a,0,20).'...':$question->answer_d}}</td>
                           <td style="text-align: center;">{{$question->answer_correct}}</td>
                           <td style="text-align: center;">
                                <span class="btn btn-warning btn-sm" onclick="Questions.showEditQuestion('{{$question->id}}');" >Sửa</span>
                                <span class="btn btn-danger btn-sm" onclick="Questions.deleteQuestion(this,'{{$question->id}}')">Xóa</span>
                           </td>
                       </tr>
                   @endforeach
               </table>
          </div>
</div>
<div class="modal" id="editQuestionForm" tabindex="-1" role="dialog" aria-labelledby="editQuestionForm" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Sửa câu hỏi</h4>
              </div>
              <div class="modal-body" id="edit_question_form">
              </div>
            </div>

        </div>
</div>