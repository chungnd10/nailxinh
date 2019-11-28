<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //nếu là admin thì lấy all
        if (Auth::user()->isAdmin()) {
            $users = $this->user_services->allForAdmin();
        }
        if (Auth::user()->isManager())
        {
            // chủ tiệm thì lấy nhân viên của tiệm
            $users = $this->user_services->allForManager(Auth::user()->branch_id);
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $genders = $this->gender_services->all();

        if (Auth::user()->isAdmin()){
            $roles = $this->role_services->allForAdmin();
            $branchs = $this->branch_services->all();
        }
        if (Auth::user()->isManager()) {
            $roles = $this->role_services->allForManager();
            $branchs = Auth::user()->branch->name.', '.Auth::user()->branch->address;
        }

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

        $user->display_status_id = config('contants.display_status_hide');

        $user->fill($request->all())->save();

        return redirect()->route('users.index')->with('toast_success', 'Thêm thành công !');
    }

    public function show($id)
    {
        $user = $this->user_services->find($id);

        $this->authorize('show',$user);

        $genders = $this->gender_services->all();
        $operation_status = $this->operation_status_services->all();
        $display_status = $this->display_status_services->all();
        $type_services = $this->type_services->all();
        $services_of_user = $this->user_services_services->getServiceWithId($id);
        $type_services_of_user = $this->user_type_service_services->getTypeServicesOfUser($id);

        if (Auth::user()->isAdmin()){
            $roles = $this->role_services->allForAdmin();
            $branchs = $this->branch_services->all();
        }
        if (Auth::user()->isManager()) {
            $roles = $this->role_services->allForManager();
            $branchs = Auth::user()->branch->name.', '.Auth::user()->branch->address;
        }

//        dd($branchs);

        return view('admin.users.show', compact('user',
                'branchs',
                'genders',
                'roles',
                'operation_status',
                'type_services',
                'services_of_user',
                'type_services_of_user',
                'display_status'
            )
        );
    }

    public function update(AddUserRequest $request, $id)
    {
        $user = $this->user_services->find($id);

        $user->fill($request->all())->save();

        return redirect()->route('users.index')->with('toast_success', 'Cập nhật thành công !');
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

        return redirect()->route('users.index')->with('toast_success', 'Xoá thành công !');
    }

    public function setPassword(Request $request, $id)
    {
        $user = $this->user_services->find($id);

        $validator = Validator::make($request->all(),
            [
                'password' => 'required|min:8|max:40',
                'cf_password' => 'required|same:password'
            ],
            [
                'password.required' => 'Mục này không được để trống',
                'password.min' => 'Yêu cầu từ 8-40 ký tự',
                'password.max' => 'Yêu cầu từ 8-40 ký tự',
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

        return redirect()->route('users.index')
            ->with('toast_success', 'Đặt lại mật khẩu thành công !');
    }

    //set services cho nhan vien
    public function setServices(Request $request, $id)
    {
        $user = $this->user_services->find($id);

        $services_id = $request->input('services_id');
        $type_services_id = $request->input('type_services_id');

        $user->type_services()->sync($type_services_id);
        $user->services()->sync($services_id);

        return redirect()->route('users.index')->with('toast_success', 'Cập nhật thành công !');

    }

    public function changePassword(Request $request, $id)
    {
        $user = $this->user_services->find($id);

        $validator = Validator::make($request->all(),
            [
                'old_password' => 'required',
                'password' => 'required|min:8|max:40',
                'cf_password' => 'required|same:password'
            ],
            [
                'old_password.required' => '*Mục này không được để trống',
                'password.required' => '*Mục này không được để trống',
                'password.min' => '*Yêu cầu từ 8-40 ký tự',
                'password.max' => '*Yêu cầu từ 8-40 ký tự',
                'cf_password.required' => '*Mục này không được để trống',
                'cf_password.same' => '*Nhập lại mật khẩu không đúng',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('profile', $id .'#tab_2')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->old_password])) {

            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('admin.index')
                ->with('toast_success', 'Cập nhật mật khẩu thành công !');
        } else {
            return redirect()->route('profile', $id.'#tab_2')
                ->with('old_password', '*Mật khẩu cũ không đúng');
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
        $roles = $this->role_services->allForAdmin();
        $operation_status = $this->operation_status_services->all();

        return view('admin.users.profile', compact('user',
                'branchs',
                'genders',
                'roles',
                'operation_status'
            )
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
                'avatar.required' => '*Hãy chọn ảnh',
                'avatar.mimes' => '*Chỉ chấp nhận ảnh JPG, JPEG, PNG'
            ]
        );

        if ($request->hasFile('avatar'))
        {
            if (file_exists('upload/images/users/'.$user->avatar)
                && $user->avatar != 'avatar-default.png')
            {
                unlink('upload/images/users/'.$user->avatar);
            }

            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $file->storeAs('images/users', $name);
            $user->avatar = $name;
        }

        $user->save();

        return redirect()->route('admin.index')->with('toast_success', 'Cập nhật thành công !');
    }

    public function updateProfile(UpdateProfileRequest $request, $id)
    {
//        dd($request->all());

        $data = json_decode($request->get('image'), true);
        $file = $request->file('image');

        dd($data, $file);

        $user = $this->user_services->find($id);

        $user->fill($request->all())->save();

        return redirect()->route('admin.index')->with('toast_success', 'Cập nhật thành công !');
    }

    public function changeStatus(Request $request)
    {
        $rq = $request->all();

        $user = $this->user_services->find($rq->id);

        $user->operation_status_id = $rq->operation_status_id;

        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function changeImageProfile(Request $request, $id)
    {

        if ($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $user = $this->user_services->find($id);

            $file_name = time().uniqid().$file->getClientOriginalName();

            if (file_exists('upload/images/users/'.$user->avatar)
                && $user->avatar != 'avatar-default.png')
            {
                unlink('upload/images/users/'.$user->avatar);
            }

            $file->storeAs('images/users', $file_name);
        }

        $user->avatar = $file_name;
        $user->save();

        return response('success', 200);

    }
}
