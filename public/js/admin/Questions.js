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
                    that.loadQuestion(type);
                }
            },
            error:function(result){

            }
        })
    },
    loadQuestion:function(type){
        
    }
}