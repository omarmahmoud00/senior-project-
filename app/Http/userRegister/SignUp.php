<?php
namespace App\Http\userRegister;

use Rules\Password;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\returnSelf;

class SignUp {
    private $name; 
    private $email;
    private $password;
    private $business_type_values = ['Transportation','Hospitality','Entertainment','Events', 'Attractions','Services']; 
    private $business_type;
    private $business_id;
    private $user_type;
    public function __construct() { 

     }


     public function validation(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required', Rules\Password::defaults(),
            'business_type' => 'required|in:' . implode(',', $this->business_type_values),
            'business_id' => 'required|integer',
            'user_type'=>'required|boolean'
        ]);

        $errors = $validator->errors()->first();

        if ($validator->fails()) {
            return $errors;
        } else {
            $this->initialize($request);
            return "0";
        }
    }

     private function initialize($request){
        $this->name = $request->name; 
        $this->email = $request->email; 
        $this->password = $request->password; 
        $this->business_type = $request->business_type; 
        $this->business_id = $request->business_id; // Add this line
        $this->user_type = $request->user_type;
    }
    
    public function storeUser() {
        $existingUser = $this->IsUserExist($this->email, $this->business_id);
          

        if ($existingUser) {
            // User already exists with the same email and business_id
            return 1;
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'business_id' => $this->business_id,
            'business_type' => $this->business_type,
            'user_type' => $this->user_type,
        ]);

        // Everything is okay
        return 0;
    }

        // Check if the user with the provided email and business_id already exists
        private function IsUserExist($email,$business_id){
            $existingUser = User::where('email', $this->email)
            ->where('business_id', $this->business_id)
            ->first();
            if ($existingUser) {
                // User already exists with the same email and business_id
                return 1;
            }else{
                return 0;
            }
    }
      
     
        
}
