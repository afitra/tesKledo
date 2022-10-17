<?php

namespace App\Models;

use App\Models\Overtime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'salary'
    ]; 

    public function Overtimes()
    {
        return $this->hasMany(Overtime::class, 'employee_id', 'id');
    }
}
