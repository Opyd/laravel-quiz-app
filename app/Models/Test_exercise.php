<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_exercise extends Model
{
  protected $table = 'test_exercises';
  public $timestamps = false;
    protected $fillable = [
        'test_id', 'exercise_id'
    ];

}
