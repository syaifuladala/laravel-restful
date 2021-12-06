<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'products';
    const CREATED_AT = null;
    const UPDATE_AT = null;
    protected $guarded = [];
}
