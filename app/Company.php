<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table  = "companies";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'nama',
        'email',
        'website',
        'logo'
    ];
    public function employe(){
        return $this->hasMany(Employee::class);
    }
}
