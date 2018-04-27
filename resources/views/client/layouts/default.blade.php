<!doctype html>
<html lang="ru_Ru">
<head>
    @include('client.includes.head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('client.includes.header')
    </header>

    <div id="main" class="row">

        @yield('client.content')

    </div>

    <footer class="row">
        @include('client.includes.footer')
    </footer>

</div>
</body>
</html>