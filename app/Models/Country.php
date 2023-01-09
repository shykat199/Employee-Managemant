<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable=['name','country_code'];
    use HasFactory;

    public function state(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(State::class,'country_id','id');
    }

}
