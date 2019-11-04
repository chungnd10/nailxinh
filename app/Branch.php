<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'branches';

    protected $fillable = [
        'name',
        'city_id',
        'phone_number',
        'address'
    ]; 
    
    public function city(){
    	return $this->belongsTo(City::class);
    }

    //đếm user theo chi nhánh
    public function countUserWithBranch($branch_id)
    {

        $user = User::where('branch_id',$branch_id)
                ->count();
        return $user;
    }
}
