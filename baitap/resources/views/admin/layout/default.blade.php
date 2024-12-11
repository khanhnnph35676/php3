<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ |
        
    </title>
    <link href=" {{asset ('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}  ">
    @stack('style')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- sitebar -->
            @include('admin.layout.siderbar')
            <div class="col-9 offset-3 p-0 position-relative">
            <!-- header -->
                @include('admin.layout.header')
                <!-- main -->
                @yield('content')
                <!--footer -->
                @include('admin.layout.footer')
            </div>
        </div>
    </div>


    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    @stack('scripts')
</body>

</html>