<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\BusinessUser;

class BusinessUserController extends Controller
{
        public function index(){
            return view('businessUser.index');
            // Retrieving data from session
            // $service = session('service');
            // $card = session('card');

            // return 'service:' . $service .">>>" ."card" . $card ;

        }

        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'business_name' => 'required|string|max:255',
                'business_email' => 'required|string|email|max:255|unique:business_users,business_email',
                'business_password' => 'required|string|min:8|confirmed',
                'business_type' => 'required|in:Transportation,Hospitality,Entertainment,Events,Attractions,Services',
                'phone_number' => 'required|string|max:255',
                'address' => 'required|string|max:255',
            ]);
        
            // Hash the business password before saving
            $validatedData['business_password'] = Hash::make($validatedData['business_password']);
        
            // Create the business registration record
            
            // BusinessUser::create($validatedData);
       

        $validatedData['service'] = session('service');
        $validatedData['card_id'] = session('card_id');

        session(['BusinessUser' => $validatedData]); 
        session()->save(); 

            //  return redirect()->route('stripe.index',compact('BusinessUser'));
            // return redirect()->route('stripe.index');
            return redirect()->route('stripe.index', ['BusinessUser' => session('BusinessUser')]);

            }


            
        

}
