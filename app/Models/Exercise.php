<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
  protected $table = 'exercises';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'question', 'answ_1','answ_2','answ_3','answ_4','correct'
    ];
    public function tests(){
      return $this->belongsToMany(Test::class, 'test_exercises');
    }
    public function attempts(){
      return $this->belongsToMany(Attempt::class, 'attempts');
    }
}
