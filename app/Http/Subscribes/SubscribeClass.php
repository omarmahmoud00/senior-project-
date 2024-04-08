<?php
namespace App\Http\Subscribes;

use App\Models\Card;
use Illuminate\Support\Facades\Log;
use App\Models\Subscribe;
use DateTime;
use DateInterval;
use Exception;

class SubscribeClass {

    private $subscription_type = [
        'Premium' => 24,
        'standard' => 12,
        'basic' => 6,
    ];

    public function createScbscribe($business_id, $card_id) {
        $cardTitle = Card::where('id', $card_id)->value('title');

        if (!$cardTitle) {
            throw new Exception('Card not found.');
        }

        $monthsToAdd = $this->subscription_type[$cardTitle] ?? null;

        if (!$monthsToAdd) {
            throw new Exception('Subscription type not recognized.');
        }

        $currentDate = new DateTime();
        $endDate = (clone $currentDate)->add(new DateInterval("P{$monthsToAdd}M"));

        $formattedCurrentDate = $currentDate->format('Y-m-d');
        $formattedEndDate = $endDate->format('Y-m-d');

      
        $status = 'Active';
        
        if ($currentDate > new DateTime($formattedEndDate)) {
            $status = 'Inactive';
        }

 
        $subscription = Subscribe::create([
            'business_id' => $business_id,
            'card_id' => $card_id,
            'start_date' => $formattedCurrentDate,
            'end_date' => $formattedEndDate,
            'status' => $status,
        ]);
 
        return $subscription;
    }
}
