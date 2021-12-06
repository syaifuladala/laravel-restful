<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customer';
    const CREATED_AT = null;
    const UPDATE_AT = null;
    protected $guarded = [];
}
