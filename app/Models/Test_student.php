<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_student extends Model
{
  protected $table = 'test_students';
    protected $fillable = [
        'test_id', 'student_id'
    ];
}
