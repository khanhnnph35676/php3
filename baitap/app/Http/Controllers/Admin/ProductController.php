<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProducts(){
        $listProduct = Product::paginate(10);
        return view('admin.product.list-product')->with([
            'listProduct'=>$listProduct
        ]);
    }
    public function addProduct(){
       return view('admin.product.add-product');
    }
    public function addPostProduct(Request $request){
        $imageUrl = '';
        if($request ->hasFile('imageProduct')){
            $image = $request ->file('imageProduct');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "imageProduct/";
            $image->move(public_path($link), $nameImage);
            $imageUrl = $link . $nameImage;
        }
        $data = [
            'name' => $request->nameProduct,
            'price' => $request->priceProduct,
            'image'=> $imageUrl
        ];
        Product::create($data);
        return redirect()->route('admin.products.listProducts')->with([
            'message' => 'Thêm mới thành công'
        ]);
    }
    function deleteProduct(Request $request){
        $product = Product::find($request->idProduct);
        if($product->image !=null && $product->image != ''){
            File::delete(public_path($product->image));
        }
        $product->delete();
        return redirect()->back()->with([
            'mesage'=>'Xoá thành công'
        ]);
    }
}
