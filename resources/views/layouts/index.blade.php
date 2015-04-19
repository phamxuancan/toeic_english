<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
		@include('layouts.head')
	</head>
	<body>

        <div id="container">
            @include('layouts.header')

            <div id="content" class="row">

                <div id="left" class="col-md-9">
                    @include('layouts.navbar')

                    @yield('content')
                </div>

                <div id="right" class="col-md-3">
                    @include('layouts.rightbar')
                </div>

            </div>

            @include('layouts.footer')

        </div>

        @include('layouts.javascript')
	</body>
</html>