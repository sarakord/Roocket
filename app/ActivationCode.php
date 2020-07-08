<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use function GuzzleHttp\Psr7\str;

class ActivationCode extends Model
{
    protected $fillable = ['user_id', 'code', 'expire', 'used'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCreateCode($query, $user)
    {
        $code = $this->Code();

        return $query->create([
            'user_id' => $user->id,
            'code' => $code,
            'expire' => Carbon::now()->addMinutes(15)
        ]);
    }

    private function Code()
    {
        do {
            $code = str::random(60);
            $checkCode = static::whereCode($code)->get();
        } while (!$checkCode->isEmpty());

        return $code;
    }
}
