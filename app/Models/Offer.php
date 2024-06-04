<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    const PRICE_CONVERSION_FACTOR = 100;

    protected $fillable = [
        'title',
        'description',
        'price',
        'start_date',
        'end_date',
        'creator_id',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => $value / self::PRICE_CONVERSION_FACTOR,
            set: fn (int $value) => $value * self::PRICE_CONVERSION_FACTOR,
        );
    }
}
