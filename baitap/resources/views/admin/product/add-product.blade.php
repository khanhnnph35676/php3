@extends('admin.layout.default')
@push('style')
    
@endpush
@section('content')
    <h3>Thêm mới sản phẩm</h3>
    <form action="{{route('admin.products.addPostProduct')}}" enctype="multipart/form-data" 
        method="POST" class="m-3" style="min-height: 800px">
        @csrf
        <label for="nameProduct">Tên sản phẩm</label>
        <input type="text" class="form-control" name="nameProduct" id="nameProduct" placeholder="Tên sản phẩm">
        <label for="price">Giá</label>
        <input type="text" class="form-control" id="price" name="priceProduct" placeholder="Giá sản phẩm">
        <label for="image">Chọn ảnh</label>
        <input type="file" class="form-control" id='image' name="imageProduct" accept="image/*" >
        <button class="btn btn-primary mt-4" type="submit">Thêm mới</button>
    </form>
@endsection
@push('scripts')
    
@endpush