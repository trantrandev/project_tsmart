<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;


class AdminUserController extends Controller
{
    function __construct() {
       
    }

    function index(Request $request) {         
        $keyword = '';
        //Nếu có tìm kiếm thì chạy, ko thì nó rỗng
        if($request->input('keyword')) {
            $keyword = $request->input('keyword');
        }

        $users = User::where('name', 'LIKE', "%{$keyword}%")->get();

        return view('admin.user.list', compact('users'));
    }

    function add() {
        return view('admin.user.add');
    }

    function store(Request $request) { 
        if($request->input('btn_add')){     
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'confirm' => ['same:password'],
            ],
            [
                'required' => ':attribute không được để trống',
                'confirm.same' => ':attribute không trùng khớp',
                'unique' => ':attribute đã tồn tại trong hệ thống',
                'min' => ':attribute ít nhất phải :min ký tự',
                'max' => ':attribute nhiều nhất chỉ :max ký tự'
            ],
            [
                'name' => 'Họ tên',
                'password' => 'Mật khẩu',
                'confirm' => 'Nhập lại mật khẩu',
                'email' => 'Email'
            ]);
        }

        User::create([
            'name' => $request -> input('name'),
            'email' => $request -> input('email'),
            'password' => Hash::make($request -> input('password'))
        ]);

        return redirect('admin/user')->with('status', 'Thêm thành viên thành công');
    }
}