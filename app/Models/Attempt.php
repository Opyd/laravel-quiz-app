<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
  protected $table = 'attempts';
    protected $fillable = [
        'test_id', 'student_id', 'exercise_id', 'answer', 'correct'
    ];
}
