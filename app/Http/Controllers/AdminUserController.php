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
    
    function list(Request $request) {
         $users = User::paginate(10);
         return view('admin.user.list', compact('users'));
    }

    function add() {
        return view('admin.user.add');
    }

    function store(Request $request){
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
            ]
        );

            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
            return redirect('admin/user/list')->with('status', 'Thêm thành viên thành công');

        }
    }   

    function edit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    function update(Request $request, $id) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
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
        ]
    );

        User::where('id', $id)->update([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect('admin/user/list')->with('status', 'Cập nhật thành công');
    }
    
    function action(Request $request){
        $list_check = $request->input('list_check');
        if($list_check){
            foreach ($list_check as $k=>$id) {
                //Nếu id đang đăng nhập bằng với id của list check
                if(Auth::id() == $id) {
                    unset($list_check[$k]);//loại id đó ra
                }
            }

            //Sau khi loại id ra nếu còn list check thì xử lý tiếp
            if(!empty($list_check)) {
                $act = $request->input('act');
                if($act == 'delete') {
                    User::destroy($list_check);
                    return redirect('admin/user/list')->with('status', 'Bạn đã xóa thành công');
                }

                if($act == 'restore') {
                    User::withTrashed()
                    ->whereIn('id', $list_check)
                    ->restore();
                    return redirect('admin/user/list')->with('status', 'Bạn đã khôi phục thành công');
                }

                if($act == 'forceDelete') {
                    $num_check = count($list_check);

                    User::withTrashed()
                    ->whereIn('id', $list_check)
                    ->forceDelete();
                    return redirect('admin/user/list')->with('status', "Bạn đã xóa vĩnh viễn ".$num_check." tài khoản khỏi hệ thống");
                }

                return redirect('admin/user/list')->with('status_isvalid', 'Bạn cần chọn phần tử để thực thi');
            }

            return redirect('admin/user/list')->with('status_isvalid', 'Bạn không thể thao tác trên chính tài khoản của bạn');
        }else{
            return redirect('admin/user/list')->with('status_isvalid', 'Bạn cần chọn phần tử để thực thi');
        }
    }

    function delete($id) {
        if(Auth::id() != $id){
            $user = User::find($id);
            $user->delete();
            return redirect('admin/user/list')->with('status', 'Xóa thành viên thành công');            
        }else{
            return redirect('admin/user/list')->with('status_isvalid', 'Bạn không thể tự xóa mình ra khỏi hệ thống');
        }
    }
}
