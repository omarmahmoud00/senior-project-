<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'description', 'info','type'];


    public function subscribes()
    {
        return $this->hasMany(Subscribe::class);
    }

    public function getCards($name){
        $cards = Card::where('type', $name)->get();

        return $this->sort($cards);
         
    }

    private function sort($cards){

        $cards = $cards->sortBy(function($card) {
            return floatval($card->price);
        })->values();

        return $cards;
    }

    public function getPrice($card_id, $service)
    { 
        $card = Card::where([
            ['id', '=', $card_id],
            ['type', '=', $service],
        ])->first();
    
        // Check if a card was found before attempting to access its price
        if ($card) {
            return $card->price;
        }
    
        // Return a default value or null if no card was found
        return null;
    }
    

}
