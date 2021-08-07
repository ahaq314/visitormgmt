<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitorlog extends Model
{
    use HasFactory;
     protected $table = 'visitors_log';
     protected $fillable = ['visitor_id','check_in','check_out','purpose'];
 
    public function visitor(){
    	return $this -> belongsTo(Visitor::class);
    }
}
