<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emp extends Model
{
    use HasFactory;
    //fillable all column
    // protected $fillable = ['name','email','joining_date','joining_salary','is_active'];

    //non fillable
    protected $guarded =[];
}
