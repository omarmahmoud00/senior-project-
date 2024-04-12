<?php

namespace App\Models;

// use GuzzleHttp\Psr7\Request;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Models\Eventreservation;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class BusinessUser  extends Authenticatable

{
    use HasFactory, AuthenticableTrait; 
    protected $fillable = ['business_name', 'email', 'password', 'business_type', 'phone_number', 'address'];

      
     // Returns all subscriptions associated with the business user
    public function subscribes()
    {
        return $this->hasMany(Subscribe::class);
    }

    // Returns all event reservations made by the business user
    public function eventReservations()
    {
        return $this->hasMany(EventReservation::class);
    }
    
    // Returns all event user reservations linked to the business user
    public function eventUserReservation()
    {
        return $this->hasMany(EventUserReservation::class);
    }

    //  public function store(Request $request){
    //             $user = new BusinessUser();

    //             $user->save();
    //         return BusinessUser::create([
    //             'business_name' => $request['business_name'],
    //             'email' => $request['business_email'],
    //             'password' => $request['business_password'],
    //             'business_type' => $request['business_type'],
    //             'phone_number' => $request['phone_number'],
    //             'address' => $request['address'],
    //         ]);
    
    // }                        

}
