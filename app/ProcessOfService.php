<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ProcessOfService
 *
 * @property int $id
 * @property string $name
 * @property string $step
 * @property string $content
 * @property int $service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Service $services
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessOfService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessOfService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessOfService query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessOfService whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessOfService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessOfService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessOfService whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessOfService whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessOfService whereStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProcessOfService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
