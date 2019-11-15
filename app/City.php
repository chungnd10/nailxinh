<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';
    
    public function branchs(){
    	return $this->hasMany(Branch::class);
    }

    public function getBranch($id)
    {
        return Branch::where('city_id', $id)->get();
    }
}
