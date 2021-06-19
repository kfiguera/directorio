<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Directory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'id_number', 'email', 'phone', 'extension', 'title_id', 'office_id', 'state_id', 'user_id', 'location_id'];
    //relaciones
    public function title()
    {
        return $this->belongsTo(Title::class);
    }
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    //Formato
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::upper($value);
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = Str::upper($value);
    }
}
