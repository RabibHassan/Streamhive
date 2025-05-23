<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscription';

    protected $fillable = [
        'name',
        'status',
        'users_id',
        'payment_date',
        'expiry_date',
    ];
}
