@extends('admins.layouts.index')
@section('content')
<div class="container">
    <div id="place_login" class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading text-center"><span style="font-weight: bold;font-size: 25px;">Đăng nhập </span></div>
                <div class="panel-body">
                <h4 class="alert-danger alert" id="error" style="display: none;text-align: center"></h4>
                    <form class="form-horizontal" id="form_login">
                        <div class="form-group">
                             <label for="username" class="fa fa-user col-lg-1 control-label fa-2x"></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên tài khoản...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="fa fa-lock fa-2x col-lg-1 control-label"></label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Nhập mật khẩu...">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-5 col-lg-10">
                                <button type="button" class="btn btn-lg btn-success" data-loading-text="Đang đăng nhập..." id="btn_login">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
         $('#btn_login').on('click',function(){
            var form = $('#form_login')[0];
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
