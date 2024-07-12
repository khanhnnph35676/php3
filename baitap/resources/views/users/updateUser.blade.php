<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{ route('users.updatePostUser') }}" method="POST">
    @csrf
    
        Id: <input type="text" name="idUser" disabled value=" {{$user -> id}} "><br><br>
        Họ tên: <input type="text" name="nameUser" value="{{$user -> name}} "> <br><br>
        Email: <input type="email" name= "emailUser" value="{{$user -> email}} "><br><br>
        Tuổi: <input type="text" name='ageUser' value=" {{ $user -> tuoi}} "><br><br>
        Phòng ban: 
        <select name="phongbanUser" id="">
            @foreach($phongBan as $value)
            <option value=" {{$value -> id}} "> {{$value -> ten_donvi}} </option>
            @endforeach
        </select> <br><br> 
        <button>Sửa</button>
    </form>
</body>
</html>