var category = {
    createCategory:function(myself){
        var that = this;
        var form = document.getElementById('formCreateCategory');
        formData = new FormData(form);
        $.ajax({
            url:'/users/createCategory',
            data:formData,
            type:'POST',
            contentType:false,
            processData:false,
            beforeSend:function(){
                $(myself).button('loading');
            },
            success:function(result){
                if( result.error == 1){
                    $('.error').show();
                    $('.error').html(result.message);
                    $('.error').addClass('alert-danger');
                    $(myself).button('reset');
                }else{
                    that.loadCategory();
                    $('.error').hide();
                    $('#createCategory').modal('hide');
                }
            },
            error:function(result){
                $(myself).button('reset');
                console.log(result.responseText);
            }
        })
    },
    loadCategory:function(){
        $.ajax({
            url:'/users/loadCategory',
            data:'',
            type:'GET',
            success:function(result){
                $('#list_category').html(result);
            },
            error:function(result){
                console.log(result.responseText);
            }
        })
    },
    showItems:function(myself,category_id){
        $('a').removeClass('actives');
        $(myself).addClass('actives');
        $.ajax({
            url:'/category/showItems',
            data:{category_id:category_id},
            type:'GET',
            success:function(result){
                $('#word_items').html(result);
            },
            error:function(){

            }
        });

    }
}