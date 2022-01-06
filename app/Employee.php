<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table  = 'employees';
    protected $fillable = [
        'name',
        'company_id',
    ];
    public function company(){
        return $this->belongsTo(Company::class);
        
    }
}