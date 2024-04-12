<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUserReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'event_reservation_id',
        'business_user_id',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventReservation()
    {
        return $this->belongsTo(EventReservation::class);
    }
    public function businessUser()
    {
        return $this->belongsTo(BusinessUser::class);
    }
}
