<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\FamousCustomer
 *
 * @property int $id
 * @property string $full_name
 * @property string $image
 * @property string $description
 * @property int $display_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FamousCustomer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FamousCustomer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FamousCustomer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FamousCustomer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FamousCustomer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FamousCustomer whereDisplayStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FamousCustomer whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FamousCustomer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FamousCustomer whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FamousCustomer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FamousCustomer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'famous_customers';
}
