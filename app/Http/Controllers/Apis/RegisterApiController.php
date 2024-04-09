<?php
namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\userRegister\SignUp;
use Illuminate\Support\Facades\Validator;

// use App\Models\User;

class RegisterApiController extends Controller
{
    // private $errors ;

    public function storeData(Request $request)
{
    try {
        $signup = new SignUp($request);
        $validationErrors = $signup->validation($request);
        // Check for validation errors
        if ($validationErrors !== "0") {
            $responsePayload = [
                'status'  => 'error',
                'status_code'  => '400',
                'message' => 'Validation Error',
                'errors'  => $validationErrors,
            ];
            // Return a response with a 400 status code
            return response()->json($responsePayload, 400);
        } else {
            $storeErrors = $signup->storeUser();

            if ($storeErrors) {
                $responsePayload = [
                    'status'  => 'error',
                    'status_code'  => '422',
                    'message' => 'User with this email already exists',
                ];

                // Return a response with a 422 status code
                return response()->json($responsePayload, 422);
            }

            $responsePayload = [
                'status'  => 'success',
                'status_code'  => '201',
                'message' => 'User stored successfully',
            ];

            // Return a response with a 201 status code
            return response()->json($responsePayload, 201);
        }
    } catch (\Exception $e) {
        $errorMessage = $e->getMessage();
        $responsePayload = [
            'status'  => 'error',
            'status_code'  => '500',
            'message' => 'Internal Server Error',
            'errors'  => $errorMessage,
        ];

        // Return a response with a 500 status code
        return response()->json($responsePayload, 500);
    }
}

    
}
