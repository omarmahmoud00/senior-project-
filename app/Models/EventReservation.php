<?php

namespace App\Models;

use App\Models\BusinessUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventReservation extends Model
{
    use HasFactory;

    protected $fillable = ['event_name', 'number_of_tickets','price', 'start_date', 'end_date', 'business_id'];

    public function businessUser()
    {
        return $this->belongsTo(BusinessUser::class);
    }
}

