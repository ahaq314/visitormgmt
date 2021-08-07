<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $table = 'visitors_info';
    protected $fillable = ['first_name','last_name','phone_no','address'];


    public function visitors(){
    	return $this -> hasMany(Visitorlog::class);
    }
}
