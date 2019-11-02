<?php

namespace App;

use App\Services\TypeServiceServices;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'services';

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
