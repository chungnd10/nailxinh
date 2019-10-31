<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Introduction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'introductions';

    protected $fillable = [
      'title',
      'content'
    ];
}
