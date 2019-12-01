<?php

namespace App;

use App\Services\ServiceServices;
use Illuminate\Database\Eloquent\Model;

/**
 * App\TypeOfService
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ProcessOfService[] $processOfServices
 * @property-read int|null $process_of_services_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Service[] $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeOfService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeOfService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeOfService query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeOfService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeOfService whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeOfService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeOfService whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeOfService whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeOfService whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TypeOfService whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TypeOfService extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_of_services';

    protected $fillable = [
    	'name',
    	'description'
    ];

    public function services()
    {
    	return $this->hasMany(Service::class);
    }

    public function processOfServices()
    {
    	return $this->hasMany(ProcessOfService::class,'type_of_services_id');
    }

    public function showServices($id)
    {
        return Service::where('type_of_services_id', $id)->get();
    }

    //đếm số dịch vụ
    public function countServicesWithType($type_of_services_id)
    {
        $services = Service::where('type_of_services_id',$type_of_services_id)
                ->count();
        return $services;
    }

    //lấy dịch vụ thuộc loại dịch vụ
    public function getServices($type_services_id)
    {
        $services = Service::where('type_of_services_id', $type_services_id)
            ->orderby('id', 'desc')
            ->get();
        return $services;
    }

    // lấy image theo danh mục
    public function getPhotoLibraryWithType($type_services_id)
    {
        $display_status = config('contants.display_status_display');
        $images = PhotoLibrary::where('type_of_service_id', $type_services_id)
            ->where('display_status_id', $display_status)
            ->orderby('id', 'desc')
            ->take(9)->get();
        return $images;
    }
}
