@if(count($users) > 0)
    @foreach($users as $user)
        <a href="#" class="list-group-item" style="font-weight: bold" >{{$user->username}}<span class="badge">{{$user->point}}</span></a>
    @endforeach
@else
    <a href="#" class="list-group-item" style="text-align: center">Chưa có ai làm bài!</a>
@endif
