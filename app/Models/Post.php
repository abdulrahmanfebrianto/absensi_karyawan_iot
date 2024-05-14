<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =['tag','name','address','telp','start','salary','holiday_salary','image'];

// Dalam App\Models\Post

public function payrolls()
{
    return $this->hasMany(Payroll::class, 'name', 'name');
}

}
