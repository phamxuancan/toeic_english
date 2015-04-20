<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 4/17/2015
 * Time: 9:24 PM
 */
 ?>
 <div class="row">
    <!-- navbar -->
    <nav class="navbar navbar-default">
        <ul class="nav navbar-nav">
            @if(!Auth::check())
                <li><a href="/users/login">Đăng nhập</a></li>
                <li><a href="/users/signup">Đăng ký</a></li>
            @else
                <li><a href="/users/info">{{Auth::user()['username']}}</a></li>
                <li><a href="/users/logout">Logout</a></li>
            @endif
        </ul>
    </nav>
</div>