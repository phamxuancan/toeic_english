@extends('layouts.index')
 <script src="<?php echo URL::to('/') ?>/bootstrap/js/jquery-1.11.2.min.js"></script>
@section('content')
<div id="outside_form">
    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" id="form_register" style="text-align: center" >
        <div class="form-group col-lg-12" >
          <span class="alert-danger error_register"></span>
       </div>
--------------
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
       ----------
        <div class="form-group col-lg-11" >
            <label for="register_name" class="control-label col-lg-2">Username:</label>
            <input type="text" name="username" id="register_name" class="form-control col-lg-10"/>
        </div>
        <div class="form-group col-lg-11 ">
            <label for="password" class="control-label col-lg-1">Password:</label>
            <input type="text" name="password" id="password" class="form-control col-lg-10" />
        </div>
         <div class="form-group col-lg-1 ">
            <span class="fa fa-check-circle same" style="display: none;" ></span>
        </div>
        <div class="form-group col-lg-11" >
            <label for="repassword" class="control-label col-lg-1">RePassword:</label>
            <input type="text" name="repassword" id="repassword" class="form-control col-lg-10" />
        </div>
         <div class="form-group col-lg-1 ">
            <span class="fa fa-check-circle same" style="display: none;"></span>
        </div>
        <div class="form-group col-lg-11">
            <label for="avatar" class="control-label col-lg-1">File:</label>
            <input type="file" name="avatar" id="avatar" class="form-control col-lg-10"/>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
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