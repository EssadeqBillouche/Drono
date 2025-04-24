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
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'seller') {
                $seller = $user->seller;
                $sellerData = [
                    'id' => $seller->id,
                    'store_name' => $seller->store_name,
                    'store_category' => $seller->store_category,
                    'store_profile' => $seller->store_profile,
                    'store_background_image' => $seller->store_background_image,
                    'description' => $seller->description,
                    'contact_phone' => $seller->contact_phone,
                ];
            }

            return match($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'seller' => redirect()->route('seller.dashboard'),
                'client' => redirect()->route('client.dashboard'),
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
