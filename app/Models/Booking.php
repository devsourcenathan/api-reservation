<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = "bookings";

    protected $fillable = ["noms", "prenom", "sexe", "n_table", "table"];
    // protected $fillable = ["title", "description", "details", "thumbnail", "images"];
}
