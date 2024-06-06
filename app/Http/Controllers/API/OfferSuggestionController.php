<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OfferSuggestionController extends Controller
{
    protected const GOOGLE_API = 'https://generativelanguage.googleapis.com/';

    // https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=$GOOGLE_API_KEY

    public function generate(Request $request, int $id): JsonResponse
    {
        //$result = Http::get(self::GOOGLE_API . 'v1beta/models?key='. env('GEMINI_API_KEY'))->json();
        $result = Http::post(self::GOOGLE_API . 'v1beta/models/chat-bison-001:generateMessage?key='. env('GEMINI_API_KEY'), [
            'prompt' => [
                'context' => 'You are great on answer question.',
                'messages' => [
                    'content' => 'React.js is(max 50 words)',
                ]
            ]
        ])->json();

        return response()->json([
            'results' => $result,
        ]);
    }
}
