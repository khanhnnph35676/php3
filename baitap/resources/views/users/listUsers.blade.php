<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('users.addUser') }}">Thêm mới</a>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ Tên</th>
                <th>Email</th>
                <th>Phòng ban</th>
                <th>Số ngày nghỉ</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listUsers as $user)
            <tr>
                <td> {{ $user -> id }} </td>
                <td> {{ $user -> name }} </td>
                <td> {{ $user -> email}} </td>
                <td> {{ $user -> ten_donvi }} </td>
                <td> {{ $user -> songaynghi }} </td>
                <td>
                    <button><a href="{{ route('users.updateUser',$user -> id)}}">Sửa</a></button>
                    <button><a href="{{ route('users.deleteUser',$user -> id)}}" onclick="return confirm('Are you want delete ??')" >Xoá</a></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>