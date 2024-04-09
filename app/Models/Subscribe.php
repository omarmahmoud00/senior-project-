<?php

namespace App\Models;

use App\Models\Card;
use App\Models\BusinessUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\Subscribe;

class Subscribe extends Model 
{
    use HasFactory;
    protected $fillable = [
        'business_id', 'card_id','start_date', 'end_date', 'status',
    ];

    public function business()
    {
        return $this->belongsTo(BusinessUser::class);
    }
    
    public function cards()
    {
        return $this->belongsTo(Card::class);
    } 

    public function findRecord($id){

        return  Subscribe::where('business_id', $id)->first();
 
     }

 
}
