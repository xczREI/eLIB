<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BorrowRecord extends Model
{
    protected $fillable = [
        'book_id',
        'member_id',
        'borrowed_at',
        'due_date',
        'returned_at',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function ($borrow) {
            // If borrowed_at is set, automatically set due_date
            if ($borrow->borrowed_at) {
                $borrow->due_date = Carbon::parse($borrow->borrowed_at)
                    ->addWeeks(2);
            }
        });
    }
}
