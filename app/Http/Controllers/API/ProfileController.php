<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::with(['skills', 'experiences', 'education', 'company'])->where('id', Auth::id())->first();

        return response()->json([
            'profile' => $profile,
        ]);
    }
}
