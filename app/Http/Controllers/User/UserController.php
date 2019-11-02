<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Services\BranchServices;
use App\Services\GenderServices;
use App\Services\OperationStatusServices;
use App\Services\RoleServices;
use App\Services\ServiceServices;
use App\Services\TypeServiceServices;
use App\Services\UserServices;
use App\Services\UserServiceServices;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $user_services;
    protected $branch_services;
    protected $gender_services;
    protected $role_services;
    protected $operation_status_services;
    protected $service_services;
    protected $type_services;
    protected $user_services_services;

    public function __construct(
        UserServices $user_services,
        BranchServices $branch_services,
        GenderServices $gender_services,
        RoleServices $role_services,
        OperationStatusServices $operation_status_services,
        ServiceServices $service_services,
        TypeServiceServices $type_services,
        UserServiceServices $user_services_services
    ) {
        $this->user_services = $user_services;
        $this->branch_services = $branch_services;
        $this->gender_services = $gender_services;
        $this->role_services = $role_services;
        $this->operation_status_services = $operation_status_services;
        $this->service_services = $service_services;
        $this->type_services = $type_services;
        $this->user_services_services = $user_services_services;
    }

    // danh sách user
    public function index()
    {
        //nếu là admin thì lấy all
        if (Auth::user()->isAdmin()) {
            //lấy dữ liệu
            $users = $this->user_services->allAndNotAdmin();
        }
        if (Auth::user()->isManager()) {
            // chủ tiệm thì lấy nhân viên của tiệm
            $users = $this->user_services->getUserWithBranch(Auth::user()->branch_id);
        }
        // điều hướng
        return view('admin.users.index', compact('users'));
    }

    //tạo mới người dùng
    public function create()
    {
        //lấy dữ liệu
        $branchs = $this->branch_services->all();
        $genders = $this->gender_services->all();
        $roles = $this->role_services->allNotAdmin();
        $operation_status = $this->operation_status_services->all();
        // điều hướng
        return view('admin.users.create', compact(
                'branchs',
                'genders',
                'roles',
                'operation_status')
        );
    }

    // lưu người dùng mới
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

    // hiển thị 1 user để sửa
    public function show($id)
    {
        // tìm kiếm đối tượng
        $user = User::find($id);

        //lấy dữ liệu
        $branchs = $this->branch_services->all();
        $genders = $this->gender_services->all();
        $roles = $this->role_services->allNotAdmin();
        $operation_status = $this->operation_status_services->all();
        $type_services = $this-> type_services->all();
        $services_of_user = $this->user_services_services->getServiceWithId($id);
        // điều hướng
        return view('admin.users.show', compact('user',
                'branchs',
                'genders',
                'roles',
                'operation_status',
                'type_services',
                'services_of_user'
            )
        );
    }

    // cập nhật thông tin 1 user
    public function update(AddUserRequest $request, $id)
    {
        // khai báo đối tượng
        $user = User::find($id);
        //nếu có nhập ảnh ảnh
        if ($request->hasFile('avatar')) {
            // xoá ảnh cũ
            if (file_exists('upload/images/users/' . $user->avatar) && $user->avatar != 'avatar-default.png') {
                unlink('upload/images/users/' . $user->avatar);
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

    //xóa 1 user
    public function destroy($id)
    {
        //tìm kiếm đối tượng
        $user = User::find($id);
        // xoá ảnh cũ
        if (file_exists('upload/images/users/' . $user->avatar) && $user->avatar != 'avatar-default.png') {
            unlink('upload/images/users/' . $user->avatar);
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

    // đặt lại mật khẩu
    public function setPassword(Request $request, $id)
    {
        // tìm kiếm đối tượng
        $user = User::find($id);

        //validate
        $validator = Validator::make($request->all(),
            [
                'password' => 'required|min:6|max:40',
                'cf_password' => 'required|same:password'
            ],
            [
                'password.required' => 'Mục này không được để trống',
                'password.min' => 'Yêu cầu từ 6-40 ký tự',
                'password.max' => 'Yêu cầu từ 6-40 ký tự',
                'cf_password.required' => 'Mục này không được để trống',
                'cf_password.same' => 'Nhập lại mật khẩu không đúng',
            ]
        );

        // điều hướng nếu lỗi
        if ($validator->fails()) {
            return redirect()->route('users.update', $id . '#tab_2')
                ->withErrors($validator)
                ->withInput();
        }

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

    //set services cho nhan vien
    public function setServices(Request $request, $id)
    {
        //tìm kiếm đối tượng
        $user = User::find($id);
        // lấy dữ liệu
        $services_id = $request->input('services_id');
        //lưu
        $user->services()->sync($services_id);
        //xuất thông báo
        $notify = array(
            'message' => 'Cập nhật thông tin thành công !',
            'alert-type' => 'success'
        );
        // điều hướng
        return redirect()->route('users.show', $id.'#tab_3')->with($notify);

    }

    //đổi mật khẩu
    public function changePassword(Request $request, $id)
    {
        // tìm kiếm đối tượng
        $user = User::find($id);
        //validate
        $validator = Validator::make($request->all(),
            [
                'old_password' => 'required',
                'password' => 'required|min:6|max:40',
                'cf_password' => 'required|same:password'
            ],
            [
                'old_password.required' => 'Mục này không được để trống',
                'password.required' => 'Mục này không được để trống',
                'password.min' => 'Yêu cầu từ 6-40 ký tự',
                'password.max' => 'Yêu cầu từ 6-40 ký tự',
                'cf_password.required' => 'Mục này không được để trống',
                'cf_password.same' => 'Nhập lại mật khẩu không đúng',
            ]
        );
        // điều hướng nếu lỗi
        if ($validator->fails()) {
            return redirect()->route('profile', $id . '#tab_2')
                ->withErrors($validator)
                ->withInput();
        }
        // kiểm tra đúng email và mật khẩu
        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->old_password])) {
            //lưu
            $user->password = Hash::make($request->password);
            $user->save();
            // xuất thông báo
            $notify = array(
                'message' => 'Thay đổi mật khẩu thành công !',
                'alert-type' => 'success'
            );
            // điều hướng
            return redirect()->route('profile', $id)->with($notify);
        } else {
            return redirect()->route('profile', $id . '#tab_2')
                ->with('old_password', 'Mật khẩu cũ không đúng');
        }
    }

    // thông tin user
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
        $branchs = $this->branch_services->all();
        $genders = $this->gender_services->all();
        $roles = $this->role_services->allNotAdmin();
        $operation_status = $this->operation_status_services->all();
        //điều hướng
        return view('admin.users.profile', compact('user',
                'branchs',
                'genders',
                'roles',
                'operation_status')
        );
    }

    // cập nhật ảnh user
    public function updateImageProfile(Request $request, $id)
    {
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
            if (file_exists('upload/images/users/' . $user->avatar) && $user->avatar != 'avatar-default.png') {
                unlink('upload/images/users/' . $user->avatar);
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

    // cập nhật thông tin user
    public function updateProfile(UpdateProfileRequest $request, $id)
    {
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

    // thay đổi trạng thái
    public function changeStatus(Request $request)
    {
        $user = User::find($request->id);
        $user->operation_status_id = $request->operation_status_id;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
