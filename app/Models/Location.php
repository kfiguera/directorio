<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = Str::upper($value);
    }
}
