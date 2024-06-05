<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::with(['skills', 'experiences', 'company'])->where('id', Auth::id())->get();

        return response()->json([
            'profile' => $profile,
        ]);
    }
}
