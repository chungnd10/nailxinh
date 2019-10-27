<?php

namespace App\Http\Controllers\User;

use App\Branch;
use App\Gender;
use App\OperationStatus;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $branchs = Branch::all();
        $genders = Gender::all();
        $roles = Role::where('id', '<>', 1)->get();
        $operation_status = OperationStatus::all();
        return view('admin.users.create', compact(
            'branchs',
            'genders',
            'roles',
            'operation_status')
        );
    }

    public function store(Request $request)
    {
        $user = new User();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/users', $name);
            $user->avatar = $name;
        }
        $user->fill($request->all())->save();
        $notification = array(
            'message' => 'Thêm người dùng thành công !',
            'alert-type' => 'success'
        );
        return redirect()->route('users.index')->with($notification);
    }

    public function show($id)
    {
        $user = User::find($id);
        $branchs = Branch::all();
        $genders = Gender::all();
        $roles = Role::where('id', '<>', 1)->get();
        $operation_status = OperationStatus::all();
        return view('admin.users.show', compact('user',
                'branchs',
                'genders',
                'roles',
                'operation_status')
        );
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/users', $name);
            $user->avatar = $name;
        }
        $user->fill($request->all())->save();
        $notify = array(
            'message' => 'Cập nhật người dùng thành công !',
            'alert-type' => 'success'
        );
        return redirect()->route('users.index')->with($notify);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        $notify = array(
            'alert-type' => 'success',
            'message' => 'Xoá người dùng thành công !'
        );
        return redirect()->route('users.index')->with($notify);
    }

    public function setPassword(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();

        $notify = array(
            'message' => 'Đặt lại mật khẩu thành công !',
            'alert-type' => 'success'
        );
        return redirect()->route('users.index')->with($notify);
    }
}
