<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use OpenAI\Laravel\Facades\OpenAI;

class OfferSuggestionController extends Controller
{
    public function generate(int $id)
    {
        $results = OpenAI::completions()->create([
            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => 'PHP is',
        ]);

        return response()->json([
            'models' => $id,
        ]);
    }
}
