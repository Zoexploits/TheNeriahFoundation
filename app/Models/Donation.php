<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    // Define the table if it's not following Laravel's naming convention
    protected $table = 'donations';

    // List the fillable attributes
    protected $fillable = [
        'cause_id',
        'amount',
        'reference',
        'email',
        'status',
    ];

    // Optionally, you can add guarded properties
    // protected $guarded = [];
}
