<?php

namespace App\Presentation\Http\Controllers\Auth;

use App\Presentation\Http\Controllers\Controller;
use App\Presentation\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Infrastructure\Persistence\Models\User;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'seller') {
                $seller = $user->seller;
                $sellerData = [
                    'role' => 'seller',
                    'id' => $seller->id,
                    'store_name' => $seller->store_name,
                    'store_category' => $seller->store_category,
                    'store_profile' => $seller->store_profile,
                    'store_background_image' => $seller->store_background_image,
                    'contact_phone' => $seller->contact_phone,
                ];
                session(['sessionData' => $sellerData]);
            }elseif ($user->role == 'client'){
                    $client = $user->client;
                    $clientData = [
                        'role' => 'client',
                        'id' => $client->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'profile_image' => $client->profile_image
                    ];
                    session(['sessionData' => $clientData]);
                }
            elseif ($user->role == 'admin'){
                $admin = $user->admin;
                $adminData = [
                    'role' => 'admin',
                    'id' => $admin->id,
                    'name' => $admin->name,
                    'email' => $admin->email,
                    'profile_image' => $admin->profile_image
                ];
                session(['sessionData' => $adminData]);
            }

            return match($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'seller' => redirect()->route('seller.dashboard'),
                'client' => redirect()->route('ClientProfile'),
                default => redirect('/')
            };
        }

        return back()
            ->withErrors(['email' => 'Invalid credentials'])
            ->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout successful!');
    }
}
