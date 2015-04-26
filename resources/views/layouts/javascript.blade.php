<script type="text/javascript">
    var home = "{{Config('app.url')}}";
</script>

@section('javascript')
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@show

<script type="text/javascript">
    function getTop(){
        var top = "";
        $.get( "http://toeic.local.com/admins/topPoint", function( data ) {
            $('#topuser').html(data);
        });
    }
</script>