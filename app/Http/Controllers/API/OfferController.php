<?php

namespace App\Http\Controllers\API;

use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OfferController
{
    public function index(): JsonResponse
    {
        $offers = Offer::all();

        return response()->json([
            'offers' => $offers,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->merge(['start_date' => Carbon::parse($request->input('start_date'))->format('Y-m-d H:i:s')]);
        $request->merge(['end_date' => Carbon::parse($request->input('end_date'))->format('Y-m-d H:i:s')]);

        $request->validate([
           'title' => ['required', 'string', 'max:255'],
           'description' => ['required', 'string'],
           'price' => ['required', 'numeric'],
           'start_date' => ['required', 'date_format:Y-m-d H:i:s'],
           'end_date' => ['required', 'date_format:Y-m-d H:i:s', 'after:start_date'],
        ]);

        $offer = auth()->user()->offers()->create($request->only(
            'title', 'description', 'price', 'start_date', 'end_date',
        ));

        return response()->json([
            'offer' => $offer,
        ]);

    }
}
