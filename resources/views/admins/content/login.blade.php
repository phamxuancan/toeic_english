@extends('admins.layouts.index')
@section('content')
<div class="col-lg-6 col-md-6 col-md-offset-3 col-lg-offset-3" style="margin-top: 100px;">
    <div class="alert-danger alert" id="error" style="display: none;"></div>
    <form id="admin_login" action="#" class="form-horizontal" method="POST" enctype="multipart/form-data" role="form">
        <div class="form-group">
            <label for="username" class="control-label col-lg-2 col-md-2">Username:</label>
            <div class="col-lg-10 col-md-10" >
                <input type="text" class="form-control" name="username" id="username" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="control-label col-xs-2">Mật khẩu</label>
            <div class="col-lg-10 col-md-10">
                <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Mật khẩu">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-5 col-lg-10 col-md-offset-5 col-md-10">
                <button type="button" class="btn" data-loading-text="Đang đăng nhập..." id="btn_login">Đăng nhập</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
         $('#btn_login').on('click',function(){
            var form = $('#admin_login')[0];
            formData = new FormData(form);
                $.ajax({
                    url:"/admins/confirm",
                    data:formData,
                    type:'POST',
                    contentType: false,
                    processData: false,
                    beforeSend:function(){
                        $('#btn_login').button('loading');
                    },
                    success:function(result){
                         if(result.error == 0){
                            window.location.href = '/admins';
                         }else{
                            $('#btn_login').button('reset');
                            $('#error').show();
                            $('#error').html(result.message);
                         }
                    },
                    error:function(result){
                      $('#btn_login').button('reset');
                     $('#error').show();
                     $('#error').html(result.responseText);
                    }
                })
         });
    });
</script>
@endsection
