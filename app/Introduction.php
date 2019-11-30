<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Introduction
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Introduction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Introduction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Introduction query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Introduction whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Introduction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Introduction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Introduction whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Introduction whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Introduction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
