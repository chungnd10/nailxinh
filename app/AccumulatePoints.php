<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AccumulatePoints
 *
 * @property int $id
 * @property int $phone_number
 * @property float $total_money
 * @property int $membership_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\MembershipType $membership_type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AccumulatePoints newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AccumulatePoints newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AccumulatePoints query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AccumulatePoints whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AccumulatePoints whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AccumulatePoints whereMembershipTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AccumulatePoints wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AccumulatePoints whereTotalMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AccumulatePoints whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AccumulatePoints extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accumulate_points';

    protected $primaryKey = 'phone_number';

    public function membership_type()
    {
        return $this->belongsTo(MembershipType::class);
    }

    public function membershipType($money)
    {

        $membership_type = MembershipType::orderby('money_level', 'asc')->get();

        // kiểm tra xem khách hàng thuộc lại thành viên nào và lấy % giảm giá
        $t = -1;
        foreach ($membership_type as $item) {
            if ($item->money_level < $money && $item->money_level > $t) {
                $title = $item->title;
            }
        }

        return $title;
    }
}
