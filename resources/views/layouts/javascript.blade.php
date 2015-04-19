@section('javascript')

    <script type="text/javascript">
        var base_url = "{{ asset('') }}";
		var base_sdk_url = "{{ Config::get('main.sdk_api') }}";
        var base_media_url = "{{ Config::get('main.link_media') }}";
        var urlcurrent = "{{ (URL::current()) }}";
        var language = "{{ Config::get('app.locale') }}";
    </script>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@show

