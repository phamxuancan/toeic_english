/**
 * Created by Kudo Shinichi on 4/25/2015.
 */
var User = {
    managerUser:function(){
        $.ajax({
            url:'/admins/user',
            data:'',
            type:'GET',
            success:function(result){

            },
            error:function(result){

            }
        })
    }
}