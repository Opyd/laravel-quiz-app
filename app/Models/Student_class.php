<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_class extends Model
{
  public $timestamps = false;
  protected $table = 'students_classes';
    protected $fillable = [
        'mclass_id', 'user_id'
    ];
}
