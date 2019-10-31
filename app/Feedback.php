<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedbacks';

    protected $fillable = [
        'phone_number',
        'full_name',
        'content',
        'display_status_id'
    ];

    public function displayStatus()
    {
        return $this->belongsTo(DisplayStatus::class);
    }
}
