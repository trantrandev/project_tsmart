@extends('layouts.admin')
@section('content')
<div class="content container-fluid">
    {{-- SHOW STATUS --}}
    @if (session('status') || session('status_isvalid'))
    @php
    $name_session = session('status')?'status':'status_isvalid' ;
    $value_session = session('status')?session('status'):session('status_isvalid') ;
    @endphp
    <div class="alert mb-0 mt-5 @php echo show_status_bg($name_session)  @endphp">{{ $value_session }} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button></div>
    @endif
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <div class="mt-5 d-flex justify-content-between align-items-center">
                    <h4 class="card-title mt-2">Tài khoản</h4>
                    <div class="group-item d-flex align-items-center">
                        <div class="top-nav-search mt-0 mr-3 ">
                            <form class="m-0">
                                <input type="text" class="form-control" name="keyword" value="{{ request()->input('keyword') }}" placeholder="Tìm theo tên">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <a href="{{ route('user.add') }}" class="btn btn-primary veiwbutton">Thêm mới</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped table-checkall ">
                            <thead>
                                <tr>                                    
                                    <th scope="col" style="padding-left: 10px;">
                                        <input type="checkbox" name="checkall">
                                    </th>                                    
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Email</th> 
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Quyền</th>
                                    <th class="text-right">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count() > 0)
                                @foreach ($users as $user)
                                <tr>
                                    <td><input type="checkbox" name=checkbox></td> 
                                    <td><a href="">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="custom-badge status-green">{{ $user->created_at }}</span>
                                    </td>
                                    <td>{!! show_status($user->status) !!}</td>
                                    <td>Quản trị</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item edit" href="edit-employee.html"><i class="fas fa-pencil-alt m-r-5"></i> Sửa</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset"><i class="fas fa-trash-alt m-r-5"></i> Xóa</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7"><p class="bg-info text-white p-2 mb-0">Không bản ghi nào được tìm thấy</p></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="delete_asset" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="{{ asset('img/sent.png') }}" alt="" width="50" height="46">
                    <h3 class="delete_class">Bạn chắc chắn muốn xóa bản ghi này?</h3>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a> 
                        <button type="button" class="btn btn-danger" autofocus>Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
<script src="//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.0/datatables.min.js"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
{{-- <script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script> --}}
@endsection