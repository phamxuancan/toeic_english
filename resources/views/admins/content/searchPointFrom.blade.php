@if(count($users) > 0)
<div class="panel panel-primary">
    <div class="panel-heading">Danh sách người thi</div>
          <div class="panel-body">
               <table class="table table-bordered table-hover table-striped table_add_friend">
                   <tr class="bg-info"  >
                       <th class="bg-info" style="text-align: center;" >ID</th>
                       <th class="bg-info" style="text-align: center;">Avatar</th>
                       <th class="bg-info" style="text-align: center;">Username</th>
                        <th class="bg-info" style="text-align: center;">Điểm</th>
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
                            <td style="text-align: center;">{{$user->point}}</td>
                       </tr>
                   @endforeach
               </table>
          </div>
</div>
@else
<div class="panel panel-primary no-padding no-margin">
     <div class="panel-heading">Danh sách người thi</div>
              <div class="panel-body">
               <table class="table table-bordered table-hover table-striped table_add_friend">
                <tr class="bg-info"  >
                      <th class="bg-info" style="text-align: center;" >Không có người có điểm trong khoảng điểm này</th>
                  </tr>
               </table>
              </div>
</div>
@endif