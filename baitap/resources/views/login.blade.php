<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href=" {{asset ('assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3>Đăng nhập</h3>
        @if (session('mes'))
            <span class="text-danger">{{ session('mes') }}</span>
        @endif
        <form action=" {{ route('postLogin') }}" method="POST">
            @csrf
           <span>Email</span>
            <input type="email" name="email" class="form-control">
            <span>Password</span>
            <input type="password" name="password" class="form-control">

            <input type="checkbox" name="remember" id=""> Remember me

            <br>
            <button type="submit" class="btn btn-success">Đăng nhập</button>
        </form>
    </div>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
