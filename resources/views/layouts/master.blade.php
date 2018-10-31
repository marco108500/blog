<!DOCTYPE html>
<html lang="en">
<head>
   @include('layouts.head')
</head>

<body>
@include('layouts.nav')
@include('layouts.header')
    <div class="container">
        <div class="row">
            @yield('content')
            @include('layouts.sidebar')
        </div>
    </div>
@include('layouts.footer')
@include('layouts.scripts')
</body>
</html>
