<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Office extends Model
{
    use HasFactory;

    protected $fillable = ['description'];
    //Formato
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::upper($value);
    }
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = Str::upper($value);
    }
}
