<div class="panel panel-info">
    <div  class="panel-heading">Danh sách người dùng</div>
          <div class="panel-body">
               <table class="table table-bordered table-hover table-striped table_add_friend">
                   <tr class="bg-info"  >
                       <th class="bg-info" style="text-align: center;" >ID người dùng</th>
                       <th class="bg-info" style="text-align: center;">Avatar</th>
                       <th class="bg-info" style="text-align: center;">Username</th>
                       <th class="bg-info" style="text-align: center;">Ngày tạo</th>
                       <th class="bg-info" style="text-align: center;">Quyền</th>
                       <th class="bg-info" style="text-align: center;">Chức năng</th>
                   </tr>
                   @foreach($users as $user)
                       <tr >
                           <td style="text-align: center;" >{{$user->id}}</td>
                            @if($user->avatar != '')
                               <td style="text-align: center;"><img src="<?php echo URL::to('/') ?>/uploads/avatar/{{$user->avatar}}" height="50" /></td>
                           @else
                                <td style="text-align: center;"><img src="<?php echo URL::to('/') ?>/images/avatar/no_avata_boy.jpg" height="50" /></td>
                           @endif
                           <td style="text-align: center;">{{$user->username}}</td>
                           <td style="text-align: center;">{{$user->created_at}}</td>
                           <td style="text-align: center;">{{$user->permission}}</td>
                           <td style="text-align: center;">
                                <span class="btn btn-danger btn-sm" data-text-loading="Đang xóa..." onclick="User.deleteUser(this,'{{$user->id}}')">Xóa</span>
                           </td>
                       </tr>
                   @endforeach
               </table>
          </div>
</div>