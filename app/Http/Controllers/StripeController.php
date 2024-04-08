<?php

namespace App\Http\Controllers;

use App\Models\BusinessUser;
use App\Models\Card;
use Exception;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use Stripe\Exception\CardException;
use App\Http\Controllers\SubscribeController;

class StripeController extends Controller
{
      
    public function index()
    {
        return view('stripe.index');
    }

    public function payment(Request $request)
    {
        $BusinessUser = session('BusinessUser');

        $card = new Card();
        $card_id = $BusinessUser['card_id'] ;
         $service = $BusinessUser['service'] ;
           $price =  $card->getPrice($card_id,$service);

            //  if(!is_numeric($price))    {
            //     return back()->with('error', 'Price information is missing or incorrect.');
            //  } 

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $response = \Stripe\Checkout\Session::create([
            'line_items'=> [[
                'price_data'=>[
                    'currency' => 'usd',
                    'product_data'=>[
                        'name' => $service,
                    ],
                    'unit_amount' => $price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
        ]); 
 

        return redirect()->away($response->url);
        // dd($BusinessUser);

       
    }

    public function success(Request $request){
        $BusinessUser = session('BusinessUser');
            
        $createdBusinessUser =  BusinessUser::create([
                'business_name' => $BusinessUser['business_name'],
                'business_email' => $BusinessUser['business_email'],
                'business_password' => $BusinessUser['business_password'],
                'business_type' => $BusinessUser['business_type'],
                'phone_number' => $BusinessUser['phone_number'],
                'address' => $BusinessUser['address'],
            ]);
            // dd($BusinessUser);
            // $user->store($BusinessUser);
            $card_id = $BusinessUser['card_id'] ;
            $newUserId = $createdBusinessUser->id;

            $Subscribe_Controller =new SubscribeController();
            $Subscribe_Controller->index($newUserId,$card_id);

            // return redirect()->route('admin.index');


            
    }

    public function cancel(Request $request){
    return 'paid faild';
          }
//    private function store_business_user(){
//     $BusinessUser = session('BusinessUser');
            
//          BusinessUser::create([
//             'business_name' => $BusinessUser['business_name'],
//             'business_email' => $BusinessUser['business_email'],
//             'business_password' => $BusinessUser['business_password'],
//             'business_type' => $BusinessUser['business_type'],
//             'phone_number' => $BusinessUser['phone_number'],
//             'address' => $BusinessUser['address'],
//         ]);
        
//    }


}
