<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
	@section('title')
		Trang chủ -
	@show

	@if(!isset($title))
	    {{ $title = "" }}
    @endif

	{{ $title }}
</title>

@if(!isset($description))
    {{ $description = "" }}
@endif

@if(!isset($keyword))
        {{ $keyword = "" }}
@endif
<meta name="description" content="{{$description }}"/>
<meta name="keywords" 	 content="{{ $keyword }}"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="vi" />
<meta name="robots" content="index, follow" />
<meta http-equiv="X-UA-Compatible" content="IE=9" /> <!-- fix outline ie 9 -->

<meta property="og:site_name" 	content="{{ $title }}" />
<meta property="og:image" 		content="{{ Config::get('main') .'/public/assets/img/logo/thumbnail_logo.png' }}"/>
<meta property="og:title" 	  	content="{{ $title }}" />
<meta property="og:description" content="{{ $description }}" />
<meta property="og:url" 		content="{{ URL::full() }}" />
<meta property="og:type" 		content="website" />

<link rel="shortcut icon" href="{{ Config::get('main') .'/public/assets/img/logo/favicon.ico' }}" type="image/x-icon"/>

<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/css/style.css" rel="stylesheet" type="text/css"/>
