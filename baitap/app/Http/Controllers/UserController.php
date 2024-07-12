<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class UserController extends Controller
{
    function showUser(){
        // lấy toàn bộ user
        // $listUsers = DB:: table('users')->get();
        // dd($listUsers);

        // lấy thông tin user có id = 4 
        // $result = DB::table('users')->where('id', '=', '4')-> first(); 
        // $result = DB::table('users')->find(4); // chỉ dùng vs id 
        // // lấy thuộc tính "name" của user có id = 16
        // $result = DB::table('users')->where('id', '=', '16')->value('name');

        // // Lấy danh danh sách iduser của phòng ban "ban giám hiệu"
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','%Ban Giám hiệu%')->value('id');
        // $reusult = DB::table('users')->where('id', '=', $idPhongBan)->pluck('id');

        // // tìm user có độ tuổi lớn nhất trong công ty
        // $result = DB::table('users')->where('tuoi', DB::table('users')->min('tuoi')) ->get();

        // // tìm user có độ tuổi nhỏ nhất trong công ty
        // $result = DB::table('users')->where('tuoi', DB::table('users')->max('tuoi')) ->get();

        // // Đếm phòng ban "Ban giám hiệu" có bao nhiêu user
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','%Ban Giám hiệu%')->value('id');
        // $reusult = DB::table('users')->where('id', '=', $idPhongBan)->count('id');

        // // Lấy danh sách tuổi của user 
        // $result = DB::table('users')->distinct()->pluck('tuoi');

        // Tìm danh sách user có tên "khải" , "thanh"
        // $result = DB::table('users')->where('name', 'like', '%Khải')
        //                            ->orWhere('name', 'like', '%Thanh')
        //                            ->get();

        // lấy danh sách user ở phòng ban "Ban đào tạo"
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','%Ban đào tạo')->value('id');
        // $result = DB::table('users')
        //     ->where('phongban_id','=',$idPhongBan)
        //     ->select('id','name','email')
        //     ->get();

        // 11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        // $result = DB::table('users')
        //     ->where('tuoi','>=','30')
        //     ->select('id','name','email','tuoi')
        //     // ->orderBy('tuoi', 'asc')
        //     ->get();

        // tuổi giảm dần 
        // $result = DB::table('users')
        // ->select('id','name','email','tuoi')
        // ->orderBy('tuoi', 'desc')
        // ->offset(5) bỏ 5 user đầu
        // ->limit(10)
        // ->get();

        // Thêm 1 user ms vào công ty
        // $data = [
        //     'name'=>'Nguyễn Như Khánh',
        //     'email'=>'khanh@gmail.com',
        //     'phongban_id'=>'1',
        //     'songaynghi'=>'0',
        //     'tuoi'=> '19',
        //     'created_at'=>Carbon::now(),
        //     'updated_at'=>Carbon::now(),
        // ];
        // DB::table('users')->insert($data);

        //14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo'
        // $idPhongBan = DB::table('phongban')
        //                 ->where('ten_donvi','like','%Ban đào tạo%')->value('id');
        // $result = DB::table('users')->where('phongban_id',$idPhongBan)
        //         ->select('id','name','email')
        //         -> get();

        // foreach($result as $value){
        //     DB::table('users')->where('id',$value->id)->update(['name' => $value->name .' '.'PĐT']);
        // }
        //  15. Xóa user nghỉ quá 15 ngày
        // DB::table('users')->where('phongban_id')->delete();



        // dd($result);
    }
    public function listUsers(){
        $listUsers = DB::table('users')
            ->join('phongban', 'phongban.id', '=', 'users.phongban_id')
            ->select('users.id', 'users.name', 'users.email', 'users.songaynghi', 'phongban.ten_donvi')
            ->get();
        return view('users/listUsers') -> with([
            'listUsers' => $listUsers
        ]);
    }
    public function addUser(){
        $phongBan = DB::table('phongban')->select('id', 'ten_donvi')->get();
        return view('users/addUser')->with([
        'phongBan' => $phongBan
       ]);
    }
    public function addPostUser(Request $request){
        $data=[
            [
                'name' => $request->nameUser,
                'email' => $request->emailUser,
                'tuoi'=>$request-> ageUser,
                'phongban_id' => $request -> phongbanUser,
                'created_at' => Carbon :: now(),
                'updated_at' => Carbon :: now()
            ]
        ];
        DB::table('users')->insert($data); 
        return redirect()-> route('users.listUsers');
    }

    public function deleteUser($idUser){
        DB::table('users')->where('id', '=', $idUser)->delete();
        return redirect()-> route('users.listUsers');
        
    }

    public function updateUser($idUser){
        $phongBan = DB::table('phongban')->select('id', 'ten_donvi')->get();
        $user = DB::table('users')-> where('users.id', '=', $idUser) 
            ->join('phongban', 'phongban.id','=','users.phongban_id')
            ->select('users.id', 'users.name', 'users.tuoi', 'users.email', 'users.songaynghi', 'phongban.ten_donvi')
            ->first();
        return view('users/updateUser')->with([
            'user'=> $user,
            'phongBan' => $phongBan
            
        ]);
    }
    
    public function updatePostUser(Request $request){
        $data=[
            [
                'name' => $request->nameUser,
                'email' => $request->emailUser,
                'tuoi'=>$request-> ageUser,
                'phongban_id' => $request -> phongbanUser,
                'updated_at' => Carbon :: now()
            ]
        ];
        DB::table('users')->where('id' ,'=' ,$request ->idUser)
        ->update($data);
        return redirect()-> route('users.listUsers');
    }
}
