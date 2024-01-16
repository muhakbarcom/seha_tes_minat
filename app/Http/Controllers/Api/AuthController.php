<?php
// app/Http/Controllers/Api/AuthController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public $response = [
        'success' => true,
        'message' => 'Success',
        'data' => []
    ];

    public function register(Request $req){
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string',
            'confirm_password' => 'required|string|same:password',
        ]);

        if ($validator->fails()) {
            $this->response['success'] = false;
            $this->response['message'] = $validator->errors();
            return response()->json($this->response, 400);
        }

        $input = $req->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['token'] = $user->createToken('auth_token')->plainTextToken;
        $success['name'] = $user->name;

        $this->response['data'] = $success;
        $this->response['message'] = 'User register successfully!';
        return response()->json($this->response, 201);
    }

    public function login(Request $req){
        try {

            
            $validator = Validator::make($req->all(), [
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);
    
            if ($validator->fails()) {
                $this->response['success'] = false;
                $this->response['message'] = $validator->errors();
                return response()->json($this->response, 200);
            }
            
            if (!auth()->attempt($req->only('email', 'password'))) {
                $this->response['success'] = false;
                $this->response['message'] = 'Invalid credentials';
                return response()->json($this->response, 200);
            }
           
    
            $user = User::where('email', $req->email)->first();
            $success['token'] = $user->createToken('auth_token')->plainTextToken;
            $success['name'] = $user->name;
            $success['email'] = $user->email;
    
    
            $this->response['data'] = $success;
            $this->response['message'] = 'User login successfully!';

            return response()->json($this->response, 200);
        } catch (\Exception $e) {
            $this->response['success'] = false;
            $this->response['message'] = $e->getMessage();
            return response()->json($this->response, 500);
        }
    }

    public function logout(Request $req){

        try {
            auth('web')->logout();

            $user = $req->user();
            $id = $user->currentAccessToken()->id;
        // Revoke a specific user token
        Auth::user()->tokens()->where('id', $id)->delete();

        $this->response['message'] = 'User logout successfully!';
        $this->response['data'] = null;
        $this->response['success'] = true;
        return response()->json($this->response, 200);
        } catch (\Throwable $th) {
            $this->response['message'] = $th->getMessage();
            $this->response['data'] = null;
            $this->response['success'] = false;
            return response()->json($this->response, 500);
        }

        
    }

    // public function logout(Request $req){
    //     Auth::user()->tokens()->where('id', Auth::id())->delete();
    //     return response()->json(['message' => 'Successfully logged out']);
    // }
}
