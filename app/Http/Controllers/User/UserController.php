<?php

namespace App\Http\Controllers\User;

use App\Branch;
use App\Gender;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\SetPasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\OperationStatus;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //lấy dữ liệu
        $users = User::paginate(10);

        // điều hướng
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        //lấy dữ liệu
        $branchs = Branch::all();
        $genders = Gender::all();
        $roles = Role::where('id', '<>', 1)->get();
        $operation_status = OperationStatus::all();

        // điều hướng
        return view('admin.users.create', compact(
                'branchs',
                'genders',
                'roles',
                'operation_status')
        );
    }

    public function store(AddUserRequest $request)
    {
        // khai báo đối tượng
        $user = new User();

        //nếu có nhập ảnh ảnh
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/users', $name);
            $user->avatar = $name;
        }

        //lưu
        $user->fill($request->all())->save();

        // xuất thông báo
        $notification = array(
            'message' => 'Thêm người dùng thành công !',
            'alert-type' => 'success'
        );

        //điều hướng
        return redirect()->route('users.index')->with($notification);
    }

    public function show($id)
    {
        // tìm kiếm đối tượng
        $user = User::find($id);

        //lấy dữ liệu
        $branchs = Branch::all();
        $genders = Gender::all();
        $roles = Role::where('id', '<>', 1)->get();
        $operation_status = OperationStatus::all();

        // điều hướng
        return view('admin.users.show', compact('user',
                'branchs',
                'genders',
                'roles',
                'operation_status')
        );
    }

    public function update(AddUserRequest $request, $id)
    {
        // khai báo đối tượng
        $user = User::find($id);

        //nếu có nhập ảnh ảnh
        if ($request->hasFile('avatar')) {

            // xoá ảnh cũ
            if (file_exists('upload/images/users/'.$user->avatar && $user->avatar != 'avatar-default.png'))
            {
                unlink('upload/images/users/'.$user->avatar);
            }

            //lưu ảnh mới
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/users', $name);
            $user->avatar = $name;

        }

        //lưu
        $user->fill($request->all())->save();

        // xuất thông báo
        $notify = array(
            'message' => 'Cập nhật người dùng thành công !',
            'alert-type' => 'success'
        );

        //điều hướng
        return redirect()->route('users.index')->with($notify);
    }

    public function destroy($id)
    {
        //tìm kiếm đối tượng
        $user = User::find($id);

        // xoá ảnh cũ
        if (file_exists('upload/images/users/'.$user->avatar  && $user->avatar != 'avatar-default.png')) {
            unlink('upload/images/users/'.$user->avatar);
        }
        // thực thi xóa
        $user->delete();

        //xuất thông báo
        $notify = array(
            'alert-type' => 'success',
            'message' => 'Xoá người dùng thành công !'
        );

        // điều hướng
        return redirect()->route('users.index')->with($notify);
    }

    public function setPassword(SetPasswordRequest $request, $id)
    {
        // tìm kiếm đối tượng
        $user = User::find($id);

        //lưu
        $user->password = Hash::make($request->password);
        $user->save();

        // xuất thông báo
        $notify = array(
            'message' => 'Đặt lại mật khẩu thành công !',
            'alert-type' => 'success'
        );

        // điều hướng
        return redirect()->route('users.index')->with($notify);
    }

    public function profile($id)
    {
        //tìm kiếm đối tượng
        $user = User::find($id);

        // trả về trang 404 nếu không tìm thấy
        if ($user) {
            if (Auth::user()->id != $user->id) {
                return view('admin.errors.404');
            }
        } else {
            return view('admin.errors.404');
        }

        //lấy dữ liệu
        $branchs = Branch::all();
        $genders = Gender::all();
        $roles = Role::where('id', '<>', 1)->get();
        $operation_status = OperationStatus::all();

        //điều hướng
        return view('admin.users.profile', compact('user',
                'branchs',
                'genders',
                'roles',
                'operation_status')
        );
    }

    public function updateImageProfile(Request $request, $id){
        //tìm đối tượng
        $user = User::find($id);

        //validate
        $request->validate(
            [
                'avatar' => 'required|mimes:png,jpg,jpeg'
            ],
            [
                'avatar.required' => 'Hãy chọn ảnh',
                'avatar.mimes' => 'Chỉ chấp nhận ảnh JPG, JPEG, PNG'
            ]
        );

        //nếu có nhập ảnh ảnh
        if ($request->hasFile('avatar')) {

            // xoá ảnh cũ
            if (file_exists('upload/images/users/'.$user->avatar  && $user->avatar != 'avatar-default.png')) {
                unlink('upload/images/users/'.$user->avatar);
            }

            //lưu ảnh mới
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/users', $name);
            $user->avatar = $name;

        }
        //lưu
        $user->save();

        $notify = array(
            'message' => 'Cập nhật ảnh thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('profile', $id)->with($notify);
    }

    //updateProfile
    public function updateProfile(UpdateProfileRequest $request, $id){
        //tìm đối tượng
        $user = User::find($id);

        //lưu
        $user->fill($request->all())->save();

        // xuất thông báo
        $notify = array(
            'message' => 'Cập nhật thông tin thành công !',
            'alert-type' => 'success'
        );

        //điều hướng
        return redirect()->route('profile', $id)->with($notify);
    }
}
