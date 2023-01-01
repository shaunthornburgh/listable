<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['beds', 'baths', 'area', 'street_nr', 'street', 'city', 'state', 'code', 'country_id', 'price'];
}
