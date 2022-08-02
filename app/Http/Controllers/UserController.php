<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Session;

class UserController extends Controller
{
    public function all(){
        $data_user = User::all();
        return view('admin.user.user')
        ->with('data_user',$data_user);
    }

    public function add(UserRequest $request){
        $data = new User();
        $data['name'] = $request->input('name');
        $data['email']= $request->input('email');
        $data['password'] = bcrypt($request->input('password'));
        $data->save();
        Session::put('status', 'Đã thêm quản trị viên');
        return back();
    }

    public function edit($id){
        $data_user = User::all();
        $data = User::find($id);
        return view('admin.user.edit')
        ->with('data_user',$data_user)
        ->with('data',$data);
    }
    public function update(UserRequest $request, $id){
        $data['name'] = $request->input('name');
        $data['email']= $request->input('email');
        $data['password'] = bcrypt($request->input('password'));
        User::where('id',$id)->update($data);
        Session::put('status', 'Cập nhật thành công');
        return redirect('dashboard/user');

    }
    public function delete($id){
        User::find($id)->delete();
        Session::put('status', 'Đã xóa quản trị viên');
        return back();
    }
}
