<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
      'display_status_id'
    ];

    public function displayStatus()
    {
        return $this->belongsTo(DisplayStatus::class);
    }
}
