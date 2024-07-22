@extends('admin.layout.default')

@push('style')
    
@endpush
@section('content')
    <div class="p-4" style="min-height: 800px;">
        @if (session('mesage'))
        <div class="alert alert-primary" role="alert">
            {{session('mesage')}}
          </div>
        @endif
        <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
        <a href="{{ route('admin.products.addProduct') }}" class="btn btn-info">Thêm mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Hành động</th>
                </tr>
               
            </thead>
            <tbody>
                @foreach ($product as $key => $value)
                <tr>
                    <th scope="row"> {{ $key + 1 }} </th>
                    <td> {{ $value->name }} </td>
                    <td> {{ $value->price }} </td>
                    <td> <img src="{{asset($value->image)}}" alt="" width="100" height="100"  style="border-radius:5px; ">  </td>
                    <td>
                        <button class="btn btn-warning">Sửa</button>
                        <button class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    
@endpush