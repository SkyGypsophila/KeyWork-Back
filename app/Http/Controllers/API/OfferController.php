<?php

namespace App\Http\Controllers\API;

use App\Models\Offer;
use Illuminate\Http\JsonResponse;

class OfferController
{
    public function index(): JsonResponse
    {
        $offers = Offer::all();

        return response()->json([
            'offers' => $offers,
        ]);
    }
}
