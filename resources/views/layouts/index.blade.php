<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
		@include('layouts.head')
	</head>
	<body>

        <div id="container">
            @include('layouts.header')

            <div id="content" class="row">
                @include('layouts.navbar')
                <div id="right" class="col-md-9">
                    @include('layouts.rightbar')
                </div>

                <div id="left" class="col-md-9" style="padding-left: 0px;">
                    @yield('content')
                </div>



            </div>

            @include('layouts.footer')

        </div>


        <script>
            jQuery(document).ready(function($) {
//                var i = 1;
//                for(i=1;i<10;i++){
//                    var tmp = "#progressbar" + i ;
//                    var value_index = parseInt($(tmp).attr('value-index'));
//                    $( tmp ).progressbar( { "value": value_index });
//                }
            });
        </script>
        {{--<div style="height: 100px; border: 1px greenyellow solid">--}}
        <?php
//            for($i=1;$i<10;$i++){
//                echo "<p id='progressbar".$i."' value-index='".rand(0,100)."'></p>";
//            }
        ?>
        {{--</div>--}}

        @include('layouts.javascript')
	</body>
</html>