<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = ['first_name', 'last_name', 'company_id','email', 'phone'];

    public $timestamps = false;

 public function company(){
    return $this->belongsTo('App\Companies');
 }
 public function getFullName(){
     return $this->first_name.' '.$this->Last_name;
 }
}
