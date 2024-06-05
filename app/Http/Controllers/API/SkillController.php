<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function index(): JsonResponse
    {
        $skills = Skill::all();

        return response()->json([
            'skills' => $skills
        ]);
    }
}
