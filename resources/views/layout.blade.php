<!DOCTYPE html>
<html lang="en" style="font-size:16px;">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@include('layout.heads')

<body>
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
    @include('layout.script')
</body>

</html>