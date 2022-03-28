<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
  public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'tests';
    protected $fillable = [
        'title'
    ];
    public function exercises(){
      return $this->belongsToMany(Exercise::class, 'test_exercises');
    }
    public function classes(){
      return $this->belongsToMany(MClass::class, 'tests_classes');
    }
    public function attempts(){
      return $this->belongsToMany(Attempt::class, 'attempts');
    }
}
