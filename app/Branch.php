<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * App\Branch
 *
 * @property int $id
 * @property string $name
 * @property string $phone_number
 * @property string $address
 * @property int $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\City $city
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereUpdatedAt($value)
 * @mixin \Illuminate\Database\Eloquent\Collection
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Branch extends Model
{
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
