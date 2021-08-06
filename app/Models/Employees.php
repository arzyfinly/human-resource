<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EmployeesController;

class Employees extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name','last_name','phone','photo','company_id','departement_id','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function company(){
        return $this->belongsTo(Companies::class);
    }
    public function departement(){
        return $this->belongsTo(Departements::class);
    }
}
