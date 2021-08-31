<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    function __construct() {
        $this->middleware(function($request, $next){
            session(['module_active' => 'user']);
            return $next($request);
        });
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
        $users = User::paginate(10);
        return view('admin.user.list', compact('users'));
    }
}
