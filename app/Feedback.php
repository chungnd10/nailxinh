<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Feedback
 *
 * @property int $id
 * @property string $full_name
 * @property string $content
 * @property string $image
 * @property int $display_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\DisplayStatus $displayStatus
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback whereDisplayStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feedback whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Feedback extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedbacks';

    protected $fillable = [
        'full_name',
        'content',
        'display_status_id'
    ];

    public function displayStatus()
    {
        return $this->belongsTo(DisplayStatus::class);
    }
}
