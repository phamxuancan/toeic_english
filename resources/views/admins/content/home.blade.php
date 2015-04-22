@extends('admins.layouts.index')
@section('content')
    <nav class="navbar navbar-default navbar-inverse">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">English<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-toggle="modal" data-target="#createCategory">Create Category</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#insertWord">Insert new word</a></li>
                    </ul>
                </li>
                     <?php if(Auth::check()){

                        echo '<li><a href="logout" >Logout</a></li>';

                     } ?>

            </ul>
        </div>
    </nav>
@endsection
