<?php
// app/Http/Controllers/Api/UserController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
{
    $this->middleware('api');
}

    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        return response()->json($user);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'full_name' => 'required|string|max:100',
                'email' => 'required|string|email|unique:tb_m_user,email',
                'password' => 'required|string',
            ]);

    
            $user = new User([
                'FULL_NAME' => $request->input('full_name'),
                'EMAIL' => $request->input('email'),
                'PASSWORD' => Hash::make($request->input('password')),
                'ROLE' => 2
            ]);
    
            $user->save();
            
            $response = [
                'isSuccess' => true,
                'message' => 'Success',
                'data' => $user
            ];
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors()->getMessages();
        
            // Proses untuk menangani kesalahan validasi
            $response = [
                'isSuccess' => false,
                'message' => $errors,
                'data' => null
            ];
        
            return response()->json($response, 200);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        $request->validate([
            'full_name' => 'required|string|max:100',
            'email' => 'required|string|email|unique:tb_m_user,email,' . $id,
            'password' => 'nullable|string',
        ]);

        $user->full_name = $request->input('full_name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully.']);
    }
}
