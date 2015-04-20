@extends('layouts.index')
 <script src="<?php echo URL::to('/') ?>/bootstrap/js/jquery-1.11.2.min.js"></script>
@section('content')
    <div id="outside_form">
        <form action="/users/authentication" id="form_login" method="post" class="text-center form-horizontal" role="form" style="background: #dfffd0;" enctype="multipart/form-data">
            <div class="form-group alert-danger alert_error"></div>
            <div class="form-group ">
                 <label class="control-label col-lg-2 col-lg-offset-3" for="username">username :</label>
                 <div class="col-lg-2">
                    <input type="text" name="username" id="username" class="form-group" />
                 </div>
            </div>
            <div class="form-group ">
                 <label class="control-label col-lg-2 col-lg-offset-3  " for="password">Password:</label>
                 <div class="col-lg-2 ">
                    <input type="password" name="password" id="password" class="form-group" />
                 </div>
            </div>
            <div class="form-group">
                 <div class="col-lg-offset-5 col-lg-1">
                    <input id="bnt_sub" class="btn btn-sm btn-success" data-loading-text="Loading..." type="submit"></span>
                 </div>
                 {{--<input type="hidden" name="token" value="{{ csrf_token() }}">--}}
            </div>
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