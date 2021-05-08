<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Payment extends Model
{
    protected $fillable = ['user_id', 'resnumber', 'course_id', 'payment'];

    public function scopeSpanningPayment($query , $month , $paymen) {
        $query->selectRaw('monthname(created_at) month , count(*) published')
            ->where('created_at' , '>' , Carbon::now()->subMonth($month))
            ->wherePayment($paymen)
            ->groupBy('month')
            ->latest();
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
