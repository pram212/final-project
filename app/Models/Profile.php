<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
