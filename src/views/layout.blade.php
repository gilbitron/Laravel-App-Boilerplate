<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@if (isset($page_title) && $page_title)
    {{{ $page_title }}} - {{ Config::get('laravel-app-boilerplate::site_title') }}
    @else
    {{ Config::get('laravel-app-boilerplate::site_title') }}
    @endif</title>
	@if (isset($page_description) && $page_description)
    <meta name="description" content="{{{ $page_description }}}">
	@endif
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    @yield('content')

</body>
</html>
