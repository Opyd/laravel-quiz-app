<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MClass extends Model
{
  protected $primaryKey = 'id';
  public $timestamps = false;
  protected $table = 'classes';
    protected $fillable = [
        'name'
    ];
  public function students(){
    return $this->belongsToMany(User::class, 'students_classes');
  }
  public function tests(){
    return $this->belongsToMany(Test::class, 'tests_classes');
  }
}
