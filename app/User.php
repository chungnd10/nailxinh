<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Config;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'full_name',
        'phone_number',
        'birthday',
        'address',
        'branch_id',
        'gender_id',
        'operation_status_id',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function operationStatus()
    {
        return $this->belongsTo(OperationStatus::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class,'user_services');
    }
    public function hasPermission(Permission $permission)
    {
        return !!optional(optional($this->role)->permissions)->contains($permission);
    }

    public function isAdmin()
    {
        $role_admin = config('contants.role_admin');
        return $this->role->id == $role_admin;
    }

    public function isManager()
    {
        $role_manager = config('contants.role_manager');
        return $this->role->id == $role_manager;
    }
}
