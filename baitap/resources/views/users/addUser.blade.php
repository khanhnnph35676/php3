<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="{{ route('users.addPostUser') }}" method="POST">
    @csrf
        Id: <input type="text" disabled><br><br>
        Họ tên: <input type="text" name="nameUser"> <br><br>
        Email: <input type="email" name= "emailUser"><br><br>
        Tuổi: <input type="number" name='ageUser'><br><br>
        Phòng ban: 
        <select name="phongbanUser" id="">
            @foreach($phongBan as $value)
            <option value=" {{$value -> id}} "> {{$value -> ten_donvi}} </option>
            @endforeach
        </select> <br><br>
        <button>Thêm mới</button>
    </form>
</body>
</html>
