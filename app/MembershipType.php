<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\MembershipType
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int $money_level
 * @property int $discount_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereDiscountLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereMoneyLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\MembershipType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MembershipType extends Model
{
    protected $table = 'membership_type';

    protected $fillable = [
      'title',
      'description',
      'money_level',
      'discount_level'
    ];

}
