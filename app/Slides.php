<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Slides
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string $images
 * @property string|null $url
 * @property int $location_display
 * @property int $display_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\DisplayStatus $displayStatus
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slides newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slides newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slides query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slides whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slides whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slides whereDisplayStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slides whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slides whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slides whereLocationDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slides whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slides whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slides whereUrl($value)
 * @mixin \Eloquent
 */
class Slides extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'slides';

    protected $fillable = [
      'title',
      'description',
      'url',
      'display_status_id',
      'location_display'
    ];

    public function displayStatus()
    {
        return $this->belongsTo(DisplayStatus::class);
    }
}
