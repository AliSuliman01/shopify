<?php

namespace App\Http\Controllers\Api\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Merchant\RegisterRequest;
use App\Models\Marchant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\ResponseFormatter;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
       
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            /** @var User $user */
            $user = Auth::user();

            if($user->user_type != (new Marchant)->getMorphClass()){
                return ResponseFormatter::error('Unauthorized', 401);
            }

            $token = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success('Login successful', [
                'token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ]);
        }

        return ResponseFormatter::error('Invalid credentials', 401);
    }


    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        [$merchant, $token] = DB::transaction(function () use ($data) {
            $merchant = Marchant::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'address' => $data['address'] ?? null,
                'phone' => $data['phone'] ?? null,
            ]);

            $merchant->user()->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            $token = $merchant->user->createToken('authToken')->plainTextToken;

            return [$merchant, $token];
        });

        
        return ResponseFormatter::success('Merchant created successfully', [
            'token' => $token,
            'token_type' => 'Bearer',
            'user' => $merchant->user
        ]);
    }
}
