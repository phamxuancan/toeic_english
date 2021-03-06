/**
 * Created by Kudo Shinichi on 4/25/2015.
 */
var User = {
    init:function(){
        that = this;
        that.listTopUser();
        that.managerUser();
    },
    instancePoint:function(){
        that = this;
        that.listTopUser();
    },
    managerUser:function(){
        $.ajax({
            url:'/admins/user',
            data:'',
            type:'GET',
            success:function(result){
                $('#admin_content').html(result);
            },
            error:function(result){
                $('#admin_content').html(result.responseText);
            }
        })
    },
    listTopUser:function(){
        $.ajax({
            url:'/admins/topPoint',
            data:'',
            type:'GET',
            success:function(result){
                $('#top_user_admin').html(result);
            },
            error:function(result){
                $('#top_user_admin').html(result.responseText);
            }
        })
    },
    addUser:function(myself){
        that = this;
        var form = $('#admin_adduser')[0];
        formData = new FormData(form);
        $.ajax({
            url:'/users/signup',
            data:formData,
            type:'POST',
            contentType:false,
            processData:false,
            beforeSend:function(){
                $(myself).button('loading');
            },
            success:function(result){
                if(result.error == 1){
                    $(myself).button('reset');
                    alert(result.message);
                    return false;
                }
                $(myself).button('reset');
                that.managerUser();
                $('#createUserAdmin').modal('hide')
                $('#admin_adduser')[0].reset();
            },
            error:function(result){
                $('#admin_content').html(result.responseText);
            }
        })
    },
    deleteUser:function(myself,user_id){
        $.ajax({
            url:'/admins/deleteUser',
            data:{user_id:user_id},
            type:'POST',
            beforeSend:function(){
                $(myself).button('loading');
            },
            success:function(result){
                if(result.error == 0){
                    $(myself).parent().parent().remove();
                }else{
                    $('#admin_content').html(result.message);
                }
            },
            error:function(result){
                $('#admin_content').html(result.responseText);
            }
        })
    },
    userTestInday:function(){
        $.ajax({
            url:'/admins/userTestInday',
            data:'',
            type:'GET',
            success:function(result){
                    $('#admin_content').html(result);
            },
            error:function(result){
                $('#admin_content').html(result.responseText);
            }
        })
    },
    pointFrom:function(myself){
        var from_point  = $('#fromPoint').val();
        var to_point    = $('#toPoint').val();
        $.ajax({
            url:'/admins/pointFrom',
            data:{to_point:to_point,from_point:from_point},
            type:'GET',
            beforeSend:function(){
                $(myself).button('loading');
            },
            success:function(result){
                $(myself).button('reset');
                $('#admin_point').html(result);
            },
            error:function(result){
                $(myself).button('reset');
                $('#admin_point').html(result.responseText);
            }
        })
    }
}