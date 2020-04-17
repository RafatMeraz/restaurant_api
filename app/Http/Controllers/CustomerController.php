<?php

namespace App\Http\Controllers;

use \Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\CustomerModel;

class CustomerController extends Controller
{
    // Create a new user as customer
    public function createUser(Request $request){
        $name = trim($request->input('name'));
        $email = trim($request->input('email'));
        $password = $request->input('password');
        $phone = trim($request->input('phone'));
        $address = trim($request->input('address'));

        $encrypt_pass = md5(sha1($password));

        // Checking user given email is registered or not
        $checkEmailExists = CustomerModel::where('email',$email)->count();

        if ($checkEmailExists == 0){
            // inserting user data into database
            $result = CustomerModel::insert([
               "name"=> $name,
               "email"=> trim($email),
               "phone"=> $phone,
               "address"=> $address,
               "password"=> $encrypt_pass
            ]);
            if ($result== true){
                $token_key = $this->generateToken($email);
                return response()->json([
                    'error'=> false,
                    'status'=> "User registration successful!",
                    'api_token'=> $token_key
                ]);
            } else {
                return response()->json([
                    'error'=> true,
                    'status'=> "Registration Failed! Try again."
                ]);
            }
        } else {
            return response()->json([
                'error'=> true,
                'status'=> "Email already registered!"
            ]);
        }

    }

    // update user phone number & user name
    public function changeUserNamePhone(Request $request){
        $name = trim($request->input('name'));
        $email = trim($request->input('email'));
        $phone = trim($request->input('phone'));

        $result = CustomerModel::where('email', $email)->update([
            "name"=> $name,
            "phone"=> $phone
        ]);
        if ($result== true){
            return response()->json([
                'error'=> false,
                'status'=> "Update successful!",
            ]);
        } else {
            return response()->json([
                'error'=> true,
                'status'=> "Update Failed! Try again."
            ]);
        }
    }

    // change user password
    public function changePassword(Request $request){
        $old_password = $request->input('old_password');
        $email = trim($request->input('email'));
        $new_password = $request->input('new_password');
        $encrypted_old_password = md5(sha1($old_password));
        $encrypted_new_password = md5(sha1($new_password));

        // checking user exists or not
        $checkOldPassword = CustomerModel::where('password', $encrypted_old_password)->count();
        if ($checkOldPassword == 1){
            $result = CustomerModel::where("email", $email)->update([
                "password"=> $encrypted_new_password
            ]);
            if ($result == true){
                return response()->json([
                    'error'=> false,
                    'status'=> "Password update Successful!",
                ]);
            } else {
                return response()->json([
                    'error'=> true,
                    'status'=> "Password update Failed! Try again."
                ]);
            }
        } else {
            return response()->json([
                'error'=> true,
                'status'=> "Current password is wrong! Try again."
            ]);
        }
    }

    // function for user login with email & password
    public function loginUser(Request $request){
        $email = trim($request->input('email'));
        $password = $request->input('password');
        $encrypted_password = md5(sha1($password));

        // checking user exists or not
        $checkEmailExists = CustomerModel::where('email', $email)->count();
        if ($checkEmailExists == 1){
            $result = CustomerModel::where([
                "email"=> $email,
                "password"=> $encrypted_password
            ])->count();
            if ($result == 1){
                $api_token = $this->generateToken($email);
                return response()->json([
                    'error'=> false,
                    'status'=> "Login successful!",
                    'api_token'=> $api_token
                ]);
            } else {
                return response()->json([
                    'error'=> true,
                    'status'=> "Wrong Password!"
                ]);
            }
        } else {
            return response()->json([
                'error'=> true,
                'status'=> "Email not registered!"
            ]);
        }
    }

    // method for generating the token for user
    private function generateToken($email){
        $key = env("TOKEN_KEY");
        $payload = array(
            "email" => $email,
            "com" => "restaurant_api"
        );
        return JWT::encode($payload, $key);
    }
}
