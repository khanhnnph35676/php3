<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container">
  <form action="{{ route('product.addPostProduct') }}" method="POST">
  @csrf
  <h3 class="text-center mb-5">Thêm mới sản phẩm</h3>
    Tên sản phẩm:
    <input type="text" class="form-control" name="name" ><br>
    Giá sản phẩm:
    <input type="text" class="form-control" name="price" ><br>
    Lượt xem:
    <input type="text" class="form-control" name="view" ><br>
    Danh mục
    <select name="idCategory" id="" class="form-control"><br>
        @foreach($category as $value )
        <option value=" {{$value -> id}}">{{$value -> name}}</option>
        @endforeach
    </select>
    <br><br>
    <button class="btn btn-success">Thêm mới</button>
    <a href="{{ route('product.listProducts') }}" class="btn btn-primary">Trang danh sách</a>
  </form>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>