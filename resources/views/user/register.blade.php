@extends('layouts.index')
 <script src="<?php echo URL::to('/') ?>/bootstrap/js/jquery-1.11.2.min.js"></script>
@section('content')
<div id="outside_form">
    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" id="form_register" style="text-align: center" >
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
       <div class="form-group ">
           <label class="control-label col-lg-2 col-lg-offset-3  " for="repassword">Repassword:</label>
           <div class="col-lg-2 ">
              <input type="password" name="repassword" id="repassword" class="form-group" />
           </div>
       </div>

       <div class="form-group">
          <label for="avatar" class="control-label col-lg-2 col-lg-offset-3">Avatar:</label>
          <div class="col-lg-2 ">
              <input type="file" name="avatar" id="avatar" class="form-control"/>
          </div>
       </div>
       <div class="form-group">
            <div class="col-lg-offset-5 col-lg-1">
               <input id="bnt_sub" class="btn btn-sm btn-success" data-loading-text="Loading..." type="submit"></span>
            </div>
            {{--<input type="hidden" name="remember_token" value="{{ csrf_token() }}">--}}
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