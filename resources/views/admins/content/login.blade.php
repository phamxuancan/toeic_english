@extends('admins.layouts.index')
@section('content')
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 col-xs-offset-3" style="margin-top: 100px;">
    <div class="panel panel-primary">
        <div class="panel-heading"> Đăng nhập </div>
        <div class="alert-danger alert" id="error" style="display: none;"></div>
        <div class="panel-body">
             <form id="admin_login">
                        <div class="body">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên tài khoản...">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Nhập mật khẩu...">
                                </div>
                            </div>
                        </div>
                       <div class="col-lg-10 col-md-10  col-sm-10  col-xs-10 col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-5">
                           <button type="button" class="btn btn-info" data-loading-text="Đang đăng nhập..." id="btn_login">Đăng nhập</button>
                       </div>
             </form>
        </div>
    </div>
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
