<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use HasFactory;
    protected $table = 'violations';
    protected $fillable = ['room_id', 'user_id', 'violation_id'];
    // protected $casts = [
    //     'violation_id' => 'integer',
    // ];
}
