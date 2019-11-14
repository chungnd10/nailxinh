<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessOfService extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'process_of_services';

    protected $fillable = [
    	'name',
    	'step',
    	'content',
    	'service_id'
    ];

    public function services(){
    	return $this->belongsTo(Service::class, 'service_id');
    }
}
