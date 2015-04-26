<div class="panel-body">
    <div id="msg_alert"></div>
    {!! Form::open(array('url' => '', 'class'=>'form-horizontal', 'method' => 'POST', 'role' => 'form', 'id'=>'form_edit', 'enctype'=>'multipart/form-data')) !!}
        <div class="row form-group ">
            <div class="col-lg-12  col-md-12  col-sm-12  col-xs-12">
                <?php echo Form::label('type', 'Loại câu hỏi: ', array('class' => 'control-label col-lg-3 col-md-3 col-sm-3 col-xs-3 '))?>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                    <input class="form-control" type="text" value='{{$question->type}}' disabled>
                    <input class="form-control" type="hidden" value='{{$question->type}}' name="type">
                </div>
            </div>
        </div>
            @if($question->type == 'audio')
            <div class="form-group">
                <div class="col-lg-12  col-md-12  col-sm-12  col-xs-12">
                    <?php echo Form::label('audio', 'Audio*:' ,array('class'=>'col-lg-3 col-md-3 col-sm-3 col-xs-3'))?>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                        <?php echo Form::file('audio', array('class'=>'form-control'))?>
                    </div>
                </div>
            </div>
        @endif
        @if($question->type == 'text')
            <div class="form-group">
                <div class="col-lg-12  col-md-12  col-sm-12  col-xs-12">
                    <?php echo Form::label('Question', 'Question :' ,array('class'=>'col-lg-3 col-md-3 col-sm-3 col-xs-3'))?>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                        <?php echo Form::text('question',$question->question, array('class'=>'form-control'))?>
                    </div>
                </div>
            </div>
        @endif
             <div class="form-group">
                    <div class="col-lg-12  col-md-12  col-sm-12  col-xs-12">
                        <?php echo Form::label('a', 'Trả lời A:' ,array('class'=>'col-lg-3 col-md-3 col-sm-3 col-xs-3'))?>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <?php echo Form::text('answer_a',$question->answer_a, array('class'=>'form-control'))?>
                        </div>
                    </div>
             </div>
              <div class="form-group">
                    <div class="col-lg-12  col-md-12  col-sm-12  col-xs-12">
                        <?php echo Form::label('b', 'Trả lời B:' ,array('class'=>'col-lg-3 col-md-3 col-sm-3 col-xs-3'))?>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <?php echo Form::text('answer_b',$question->answer_b, array('class'=>'form-control'))?>
                        </div>
                    </div>
             </div>
             <div class="form-group">
                    <div class="col-lg-12  col-md-12  col-sm-12  col-xs-12">
                        <?php echo Form::label('c', 'Trả lời C:' ,array('class'=>'col-lg-3 col-md-3 col-sm-3 col-xs-3'))?>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <?php echo Form::text('answer_c',$question->answer_c, array('class'=>'form-control'))?>
                        </div>
                    </div>
             </div>
             <div class="form-group">
                    <div class="col-lg-12  col-md-12  col-sm-12  col-xs-12">
                        <?php echo Form::label('d', 'Trả lời D:' ,array('class'=>'col-lg-3 col-md-3 col-sm-3 col-xs-3'))?>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <?php echo Form::text('answer_d',$question->answer_d, array('class'=>'form-control'))?>
                        </div>
                    </div>
             </div>
              <div class="form-group">
                    <div class="col-lg-12  col-md-12  col-sm-12  col-xs-12">
                        <?php echo Form::label('answer_correct', 'Đáp án đúng:' ,array('class'=>'col-lg-3 col-md-3 col-sm-3 col-xs-3'))?>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <?php echo Form::select('answer_correct',['A'=>'A','B'=>'B','C'=>'C','D'=>'D'], isset($question->answer_correct)?$question->answer_correct:'A', array('class' => 'form-control'))?>
                        </div>
                    </div>
                    <input type="hidden" name="question_id" value={{$question->id}}>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                 <button type="button" class="btn btn-primary" data-text-loading="Đang sửa ..." onclick="Questions.editQuestion(this,'{{$question->type}}');">Đồng ý</button>
               </div>

    {!! Form::close() !!}
</div>