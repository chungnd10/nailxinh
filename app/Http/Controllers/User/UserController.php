<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\User;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*
     * Show page index
     *
     */
    public function index()
    {
        //nếu là admin thì lấy all
        if (Auth::user()->isAdmin()) {
            $users = $this->user_services->allForAdmin('asc');
        }
        // chủ tiệm thì lấy nhân viên của tiệm
        if (Auth::user()->isManager()) {
            $users = $this->user_services->allForManager(Auth::user()->branch_id, 'desc');
        }

        return view('admin.users.index', compact('users'));
    }

    /*
     * Show page create user
     *
     */
    public function create()
    {
        $genders = $this->gender_services->all();

        if (Auth::user()->isAdmin()) {
            $roles = $this->role_services->allForAdmin();
            $branchs = $this->branch_services->all();
        }
        if (Auth::user()->isManager()) {
            $roles = $this->role_services->allForManager();
            $branchs = Auth::user()->branch->name . ', ' . Auth::user()->branch->address;
        }

        $operation_status = $this->operation_status_services->all();

        return view('admin.users.create', compact(
                'branchs',
                'genders',
                'roles',
                'operation_status')
        );
    }

    /*
     * Store new user
     *
     */
    public function store(AddUserRequest $request)
    {
        $user = new User();
        $branch_id = Auth::user()->branch_id;
        $user->display_status_id = config('contants.display_status_hide');
        $user->password = Hash::make(uniqid(16));
        $user->branch_id = $branch_id;
        $user->fill($request->all())->save();

        return redirect()->route('users.index')->with('toast_success', 'Thêm thành công !');
    }

    /*
     * Show user for editing
     *
     */
    public function show($id)
    {
        $user = $this->user_services->find($id);

        $this->authorize('show', $user);

        $genders = $this->gender_services->all();
        $operation_status = $this->operation_status_services->all();
        $display_status = $this->display_status_services->all();
        $type_services = $this->type_services->all('desc');
        $services_of_user = $this->user_services_services->getServiceWithId($id);
        $type_services_of_user = $this->user_type_service_services->getTypeServicesOfUser($id);

        if (Auth::user()->isAdmin()) {
            $roles = $this->role_services->allForAdmin();
            $branchs = $this->branch_services->all();
        }
        if (Auth::user()->isManager()) {
            $roles = $this->role_services->allForManager();
            $branchs = Auth::user()->branch->name . ', ' . Auth::user()->branch->address;
        }

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

    /*
     * Update information user
     *
     */
    public function update(AddUserRequest $request, $id)
    {
        $user = $this->user_services->find($id);
        $this->authorize('show', $user);
        $user->fill($request->all())->save();

        return redirect()->route('users.index')->with('toast_success', 'Cập nhật thành công !');
    }

    /*
     * Delete user
     *
     */
    public function destroy($id)
    {
        $user = $this->user_services->find($id);
        $path = config('contants.upload_users_path');
        $img_default = config('contants.img_user_default');

        checkExistsAndDeleteImage($path, $user->avatar, $img_default);
        $user->delete();

        return redirect()->route('users.index')->with('toast_success', 'Xoá thành công !');
    }

    /*
     * Set new password for user
     *
     */
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
            return redirect()->route('users.update', $id . '#tab_2')
                ->withErrors($validator)
                ->withInput();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index')
            ->with('toast_success', 'Đặt lại mật khẩu thành công !');
    }

    /*
     * Set services for technician
     *
     */
    public function setServices(Request $request, $id)
    {
        $user = $this->user_services->find($id);

        $services_id = $request->input('services_id');
        $type_services_id = $request->input('type_services_id');

        $user->type_services()->sync($type_services_id);
        $user->services()->sync($services_id);

        return redirect()->route('users.index')->with('toast_success', 'Cập nhật thành công !');

    }

    /*
     * Change password in page profile
     *
     */
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
            return redirect()->route('profile', \Hashids::encode($id) . '#tab_2')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->old_password])) {

            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('admin.index')
                ->with('toast_success', 'Cập nhật mật khẩu thành công !');
        } else {
            return redirect()->route('profile', \Hashids::encode($id) . '#tab_2')
                ->with('old_password', '*Mật khẩu cũ không đúng');
        }
    }

    /*
     * Show page update profile only me
     *
     */
    public function profile($id)
    {
        $user = $this->user_services->find($id);

        if ($user->first()) {
            if (Auth::user()->id != $user->id) {
                return view('admin.errors.404');
            }
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

    /*
     * Update profile only me
     *
     */
    public function updateProfile(UpdateProfileRequest $request, $id)
    {
        $user = $this->user_services->find($id);
        $path = config('contants.upload_users_path');
        $img_default = config('contants.img_user_default');

        if ($request->avatar_hidden != null) {
            $image = handleImageBase64($request->avatar_hidden);
            $imageName = getNameImageUnique(12);
            checkExistsAndDeleteImage($path, $user->avatar, $img_default);
            File::put($path . $imageName, $image);
            $user->avatar = $imageName;
        }

        $user->fill($request->all())->save();
        return redirect()->route('admin.index')->with('toast_success', 'Cập nhật thành công !');
    }

    /*
     * Change operation status
     *
     */
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $user = $this->user_services->find($id);
            $user->operation_status_id = $request->operation_status_id;
            $user->save();

            return response()->json(['success' => 'Status change successfully !']);
        }
        return response()->json(['fail' => 'Status change fail !']);
    }

     /*
     * Ajax get user with branch
     *
     */
    public function getUsersWithBranch(Request $request)
    {
        if ($request->ajax()) {
            $branch_id = $request->branch_id;
            $users = $this->user_services->getUsersWithBranch($branch_id);
            return response()->json($users);
        }
        return response('load diff fail !', 201);
    }
}
