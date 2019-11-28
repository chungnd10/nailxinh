<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoLibrary extends Model
{
    protected $table = 'photo_library';

    protected $fillable = [
        'type_of_service_id',
        'display_status_id'
    ];

    public function category(){
        return $this->belongsTo(TypeOfService::class, 'type_of_service_id');
    }
}
