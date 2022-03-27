<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_class extends Model
{
  public $timestamps = false;
  protected $table = 'tests_classes';
    protected $fillable = [
        'test_id', 'm_class_id'
    ];
}
