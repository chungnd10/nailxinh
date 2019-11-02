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
}
