/**
 * Created by Kudo Shinichi on 4/23/2015.
 */
var Questions = {
    addQuestion : function (myself){
        that = this;
        var type = $('#type_question').val();
        var form = $('#admin_addQuestion')[0];
        formData = new FormData(form);
        $.ajax({
            url:'/questions/createQuestion',
            data:formData,
            type:'POST',
            contentType:false,
            processData:false,
            beforeSend:function(){
                $(myself).button('loading');
            },
            success:function(result){
                if(result.error == 0){
                    that.listQuestion(type);
                }
            },
            error:function(result){

            }
        })
    },
    listQuestion:function(type){
        $.ajax({
           url:'/questions/listQuestion',
           data:{type:type},
           type:'GET',
            success:function(result){
                    $('#admin_content').html(result);
            },
            error:function(result){

            }
        });
    },
    showEditQuestion:function(question_id){
        $.ajax({
            url:'/questions/getDataEditQuestion',
            data:{question_id:question_id},
            type:'GET',
            success:function(result){
                $('#editQuestionForm').modal('show');
                $('#editQuestionForm').find('#edit_question_form').html(result);
            },
            error:function(result){

            }
        })
    },
    editQuestion:function(myself){
        that = this;
        var form = $('#form_edit')[0];
        formData = new FormData(form);
        $.ajax({
            url:'/questions/editQuestion',
            data:formData,
            type:'POST',
            contentType:false,
            processData:false,
            beforeSend:function(){
                $(myself).button('loading');
            },
            success:function(result){

            },
            error:function(result){

            }
        })
    }
}