<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class CardController extends Controller
{


    // public function index($name){
    //        $cards = Card::where('type', $name)->get();
    //         $basic  = $cards[0];
    //         $standard  = $cards[1];
    //         $pro  = $cards[2];
    //         // if($cards[0]->price < $cards[1]->price && $cards[0]->price < $cards[2]->price)
    //         return $cards;
    //     // return view('Services.card.index',compact('cards'));
    // }


    public function index($name){

        session(['service' => $name]);
         
        $cards = new Card();
       $cards = $cards->getCards($name);
        $basic = $cards[0];  
        $standard = $cards[1];
        $Premium = $cards[2];
 
          
        return view('Services.card.index',compact('basic','standard','Premium'));
    }


    public Function test(){
        return "done";
    }




    
    





}





