<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ProductController extends Controller
{
    public function listProducts(Request $request){
        $name = $request->name;
        $list = DB::table('product')
        ->join('category', 'category.id', '=', 'product.category_id')
        ->where('product.name', 'like', '%'. $name .'%')
        ->select('product.*', 'category.name as category_name')
        ->orderBy('view', 'desc')
        ->get();
        return view('product/listProducts') -> with([
            'list' => $list
        ]);
    }
    public function addProduct(){
        $category = DB::table('category')->get();

        return view('product/addProduct') -> with([
            'category' => $category
        ]);
    }
    public function addPostProduct(Request $request){
        $data= [[
            'name' => $request->name,
            'view' => $request->view,   
            'price' => $request->price,
            'category_id' => $request -> idCategory,
            'created_at' => Carbon :: now(),
            'updated_at' => Carbon :: now()
        ]];
        DB:: table('product') -> insert($data);
        return redirect()->route('product.listProducts');
    }
    public function deleteProduct($id){
        DB:: table('product') ->where('id', '=' , $id) ->delete();
        return redirect()->route('product.listProducts');
    }
    public function updateProduct($id){
        $category = DB::table('category')->get();
        $product =  DB:: table('product') -> where('id', '=', $id) -> first();
        return view('product/updateProduct') -> with([
            'product' => $product,
            'category' => $category
        ]);
        
    }
    public function updatePostProduct(Request $request){
        $data= [
            'name' => $request->name,
            'view' => $request->view,   
            'price' => $request->price,
            'category_id' => $request -> idCategory,
            'updated_at' => Carbon :: now()
        ];
        $d = DB::table('product') -> where('id', '=', $request->idProduct)
        ->update($data);
        
        return redirect()->route('product.listProducts');
    }
    public function test(){
        return view('admin/product/list-product');
    }
}
