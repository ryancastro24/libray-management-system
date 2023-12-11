<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'book_id'];
    protected $dates = ['created_at', 'updated_at'];
}
