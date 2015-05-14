@extends('layouts.index')
 <script src="<?php echo URL::to('/') ?>/bootstrap/js/jquery-1.11.2.min.js"></script>
@section('content')
    <div id="outside_form">
        <form action="/users/authentication" id="form_login" method="post" class="text-center form-horizontal" role="form" enctype="multipart/form-data">
            {{--dddd--}}
            <div class="panel panel-info" style="border: 1px;">
                <div class="panel-heading text-center" style="height:40px;margin-top:20px;padding-top:5px;"><span style="font-weight: bold;font-size: 25px;">Đăng nhập </span></div>
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
                                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Nhập mật khẩu...">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-5 col-lg-10">
                                    <a class="btn btn-info" href="/users/home">Trang chủ</a>
                                    <button type="submit" class="btn" data-loading-text="Đang đăng nhập..." id="btn_login">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
            {{--ddd--}}
        </form>
      </div>
@endsection
<script>
    $(document).ready(function(){

        $('#repassword').focusout(function(){
            var pass   =  $('#password').val();
            var repass =   $('#repassword').val();
            if(pass == repass){
                $('.same').show();
            }else{
                $('.same').hide();
            }
        });
         $('#password').focusout(function(){
            var pass   =  $('#password').val();
            var repass =   $('#repassword').val();
            if(pass == repass){
                $('.same').show();
            }else{
                $('.same').hide();
            }
        })
    });
</script>