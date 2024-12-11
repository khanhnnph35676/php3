<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenController extends Controller
{
   public function login(){
        return view('login');
   }
    public function postLogin(Request $request){
        $dataUserLogin =[
            'email' => $request->email,
            'password' => $request->password
        ];
        // $remeber = $request->has('remeber');
        if(Auth::attempt($dataUserLogin)){
            if(Auth::user()->role=='1'){
                return redirect()->route('admin.products.listProducts');
            }
        }else{
            return redirect()->back()->with([
                'mes' => 'Email hoặc Password không đúng'
            ]);
        }
    }
}
