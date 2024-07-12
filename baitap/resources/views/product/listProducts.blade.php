<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="container">
  <h1 class="text-center">Bảng sản phẩm</h1>
    <form action="{{ route('product.listProducts') }}" method="GET" class="mt-3">
      <div class="input-group mb-3">
        <input type="text" class="form-control" name= "name">
        <button class="btn btn-primary">Tìm kiếm</button>
      </div>
    </form>
    <a href="{{route('product.addProduct') }}" class="btn btn-success text-end">Thêm mới</a>
    <a href="{{ route('product.listProducts') }}" class="btn btn-primary">Tất cả sản phẩm</a>
  <div class="wapper-table mt-3">
    <table class="table border">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên</th>
          <th scope="col">Lượt xem</th>
          <th scope="col">Giá</th>
          <th scope="col">Danh mục</th>
          <th scope="col">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach($list as $value )
        <tr>
          <td> {{ $value -> id }} </td>
          <td> {{ $value -> name }} </td>
          <td> {{ $value -> view }} </td>
          <td> {{ $value -> price }} </td>
          <td> {{ $value -> category_name}}  </td>
          <td>
              <a href="{{ route('product.updateProduct', $value -> id) }} " class="btn btn-warning" >Sửa</a>
              <a href="{{ route('product.deleteProduct', $value -> id) }} "  class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không')">Xoá</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>