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
use App\Services\UserTypeServiceServices;
use App\User;
use Intervention\Image\Image;
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
    protected $user_type_service_services;

    public function __construct(
        UserServices $user_services,
        BranchServices $branch_services,
        GenderServices $gender_services,
        RoleServices $role_services,
        OperationStatusServices $operation_status_services,
        ServiceServices $service_services,
        TypeServiceServices $type_services,
        UserServiceServices $user_services_services,
        UserTypeServiceServices $user_type_service_services
    ) {
        $this->user_services = $user_services;
        $this->branch_services = $branch_services;
        $this->gender_services = $gender_services;
        $this->role_services = $role_services;
        $this->operation_status_services = $operation_status_services;
        $this->service_services = $service_services;
        $this->type_services = $type_services;
        $this->user_services_services = $user_services_services;
        $this->user_type_service_services = $user_type_service_services;
    }

    public function index()
    {
        //nếu là admin thì lấy all
        if (Auth::user()->isAdmin()) {
            $users = $this->user_services->allAndNotAdmin();
        }
        if (Auth::user()->isManager()) {
            // chủ tiệm thì lấy nhân viên của tiệm
            $users = $this->user_services->getUserWithBranch(Auth::user()->branch_id);
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $branchs = $this->branch_services->all();
        $genders = $this->gender_services->all();
        $roles = $this->role_services->allNotAdmin();
        $operation_status = $this->operation_status_services->all();

        return view('admin.users.create', compact(
                'branchs',
                'genders',
                'roles',
                'operation_status')
        );
    }

    public function store(AddUserRequest $request)
    {
        $user = new User();

        $user->fill($request->all())->save();

        $notification = array(
            'message' => 'Thêm người dùng thành công !',
            'alert-type' => 'success'
        );

        return redirect()->route('users.index')->with($notification);
    }

    public function show($id)
    {
        $user = $this->user_services->find($id);

        $branchs = $this->branch_services->all();
        $genders = $this->gender_services->all();
        $roles = $this->role_services->allNotAdmin();
        $operation_status = $this->operation_status_services->all();
        $type_services = $this->type_services->all();
        $services_of_user = $this->user_services_services->getServiceWithId($id);
        $type_services_of_user = $this->user_type_service_services->getTypeServicesOfUser($id);

        return view('admin.users.show', compact('user',
                'branchs',
                'genders',
                'roles',
                'operation_status',
                'type_services',
                'services_of_user',
                'type_services_of_user'
            )
        );
    }

    public function update(AddUserRequest $request, $id)
    {
        $user = $this->user_services->find($id);

        $user->fill($request->all())->save();

        $notify = array(
            'message' => 'Cập nhật người dùng thành công !',
            'alert-type' => 'success'
        );

        return redirect()->route('users.index')->with($notify);
    }

    public function destroy($id)
    {
        $user = $this->user_services->find($id);

        if (file_exists('upload/images/users/'.$user->avatar)
            && $user->avatar != 'avatar-default.png')
        {
            unlink('upload/images/users/'.$user->avatar);
        }

        $user->delete();

        $notify = array(
            'alert-type' => 'success',
            'message' => 'Xoá người dùng thành công !'
        );

        return redirect()->route('users.index')->with($notify);
    }

    public function setPassword(Request $request, $id)
    {
        $user = $this->user_services->find($id);

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

        if ($validator->fails()) {
            return redirect()->route('users.update', $id.'#tab_2')
                ->withErrors($validator)
                ->withInput();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        $notify = array(
            'message' => 'Đặt lại mật khẩu thành công !',
            'alert-type' => 'success'
        );

        return redirect()->route('users.index')->with($notify);
    }

    //set services cho nhan vien
    public function setServices(Request $request, $id)
    {
        $user = $this->user_services->find($id);

        $services_id = $request->input('services_id');
        $type_services_id = $request->input('type_services_id');

        $user->type_services()->sync($type_services_id);
        $user->services()->sync($services_id);

        $notify = array(
            'message' => 'Cập nhật thông tin thành công !',
            'alert-type' => 'success'
        );

        return redirect()->route('users.show', $id . '#tab_3')->with($notify);

    }

    public function changePassword(Request $request, $id)
    {
        $user = $this->user_services->find($id);

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

        if ($validator->fails()) {
            return redirect()->route('profile', $id . '#tab_2')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->old_password])) {

            $user->password = Hash::make($request->password);
            $user->save();

            $notify = array(
                'message' => 'Thay đổi mật khẩu thành công !',
                'alert-type' => 'success'
            );

            return redirect()->route('profile', $id)->with($notify);
        } else {
            return redirect()->route('profile', $id . '#tab_2')
                ->with('old_password', 'Mật khẩu cũ không đúng');
        }
    }

    public function profile($id)
    {
        $user = $this->user_services->find($id);

        if ($user) {
            if (Auth::user()->id != $user->id) {
                return view('admin.errors.404');
            }
        } else {
            return view('admin.errors.404');
        }

        $branchs = $this->branch_services->all();
        $genders = $this->gender_services->all();
        $roles = $this->role_services->allNotAdmin();
        $operation_status = $this->operation_status_services->all();

        return view('admin.users.profile', compact('user',
                'branchs',
                'genders',
                'roles',
                'operation_status')
        );
    }

    public function updateImageProfile(Request $request, $id)
    {

        $user = $this->user_services->find($id);

        $request->validate(
            [
                'avatar' => 'required|mimes:png,jpg,jpeg'
            ],
            [
                'avatar.required' => 'Hãy chọn ảnh',
                'avatar.mimes' => 'Chỉ chấp nhận ảnh JPG, JPEG, PNG'
            ]
        );

        if ($request->hasFile('avatar')) {
            if (file_exists('upload/images/users/'.$user->avatar)
                && $user->avatar != 'avatar-default.png') {
                unlink('upload/images/users/'.$user->avatar);
            }

            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/users', $name);
            $user->avatar = $name;
        }

        $user->save();
        $notify = array(
            'message' => 'Cập nhật ảnh thành công',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.index')->with($notify);
    }

    public function updateProfile(UpdateProfileRequest $request, $id)
    {
        $user = $this->user_services->find($id);

        $user->fill($request->all())->save();

        $notify = array(
            'message' => 'Cập nhật thông tin thành công !',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.index')->with($notify);
    }

    public function changeStatus(Request $request)
    {
        $user = $this->user_services->find($request->id);
        $user->operation_status_id = $request->operation_status_id;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function changeImageProfile(Request $request, $id)
    {
        $user = $this->user_services->find($id);

        $data = json_decode($request->get('image'), true);
        $file = $request->file('image');

        if (!empty($file)) {
            $filename = time() . '.png';
            $folderPath = "upload/images/users/";
            $path = "$folderPath/$filename";

            Image::make($file)->crop(
                intval($data['height']),
                intval($data['width']),
                intval($data['x']),
                intval($data['y'])
            )->save($path);

            $user->update([
                "image" => $path
            ]);

            return [
                'state' => 200,
                'message' => 'success',
                'result' => "/$path"
            ];
        }

        return response()->json(['status' => true]);

    }
}
