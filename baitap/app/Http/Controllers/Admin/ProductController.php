<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProducts(){
        $product = Product:: all();
        return view('admin.product.list-product')->with([
            'product'=>$product
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
}
