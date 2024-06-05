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
            ->select('id', 'title', 'description', DB::raw('price / 100 as price_per_hour'), 'start_date', 'end_date', 'created_at') // 'price as price_per_hour' not using the casting
            ->selectRaw( 'TIMESTAMPDIFF(hour, start_date, end_date) as hours')
            ->cursorPaginate(self::PER_PAGE);

        return response()->json([
            'offers' => $offers,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $start = Carbon::parse($request->input('start_date'));
        $end = Carbon::parse($request->input('end_date'));

        $request->merge(['start_date' => $start->format('Y-m-d H:i:s')]);
        $request->merge(['end_date' => $end->format('Y-m-d H:i:s')]);

        $request->validate([
           'title' => ['required', 'string', 'max:255'],
           'description' => ['required', 'string'],
           'salary' => ['required', 'numeric'],
           'hours' => ['required', 'numeric'],
           'requirements' => ['required', 'string'],
           'date' => ['required', 'date_format:Y-m-d H:i:s'],
        ]);

        $diffInHours = $end->diffInHours($start);
        $request->merge(['hours' => $diffInHours]);

        $offer = auth()->user()->offers()->create($request->only(
            'title', 'description', 'salary', 'hours', 'start_date', 'end_date',
        ));

        return response()->json([
            'offer' => $offer,
        ]);

    }
}
