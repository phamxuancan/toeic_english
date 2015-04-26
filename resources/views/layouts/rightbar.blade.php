<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 4/17/2015
 * Time: 5:28 PM
 */
 ?>
<script type="text/javascript">
    $('document').ready(function(){
        var top = "";
        $.get( "http://toeic.local.com/top", function( data ) {
            for( i = 0 ; i < data.points.length ; i++ ){
                top = top + "<li>" + data.points[i].username +" - "+ data.points[i].point +" điểm"+"</li>";
            }
            $('#topuser').html(top);
        });
    });
</script>

<center><h3>Bảng xếp hạng</h3></center>
<ol id="topuser">
</ol>
