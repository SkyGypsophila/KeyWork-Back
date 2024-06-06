<?php

namespace App\Http\Controllers\API;

use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController
{
    const PER_PAGE = 10;

    public function index(): JsonResponse
    {
        $offers = Offer::query()
            ->select('id', 'title', 'description', 'date', 'salary', 'hours', 'requirements', 'created_at')
            ->cursorPaginate(self::PER_PAGE);

        return response()->json([
            'offers' => $offers,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $date = Carbon::parse($request->input('date'));

        $request->merge(['date' => $date->format('Y-m-d H:i:s')]);

        $request->validate([
           'title' => ['required', 'string', 'max:255'],
           'description' => ['required', 'string'],
           'salary' => ['required', 'numeric'],
           'hours' => ['required', 'numeric'],
           'requirements' => ['required', 'string'],
           'date' => ['required', 'date_format:Y-m-d H:i:s'],
        ]);


        $offer = auth()->user()->offers()->create($request->only(
            'title', 'description', 'salary', 'hours', 'requirements', 'date'
        ));

        return response()->json([
            'offer' => $offer,
        ]);

    }
}
