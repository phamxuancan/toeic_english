<script type="text/javascript">
    var home = "{{Config('app.url')}}";
</script>

@section('javascript')
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="/bootstrap/js/jquery-1.11.2.min.js"></script>
@show

<script type="text/javascript">
    function getTop(){
        var top = "";
        $.get( "admins/topPoint", function( data ) {
            $('#topuser').html(data);
        });
    }
</script>